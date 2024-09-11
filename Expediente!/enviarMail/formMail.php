<pre>
<?php
	//print_r($_POST);
?>
</pre>
<?php
	$salida  ='<h1>Datos del expediente</h1>';
	$salida .='<strong>Nombre:</strong> '.$_POST['nombre'].' '.$_POST['ape1'].' '.$_POST['ape2'].'<br>';
    $salida .='<strong>Idiomas:</strong> ';
	foreach ($_POST['idiomas'] as $idi) {
		switch($idi) {
			case 'es':
				$salida .= 'Castellano ';
				break;
			case 'ca':
				$salida .= 'Catalan ';
				break;
			case 'fr':
				$salida .= 'Francés ';
				break;
			case 'en':
				$salida .= 'Inglés ';
				break;
			default:
				$salida .= 'No es un idioma';
	}
	}
	$salida  .='<br><strong>Genero:</strong> '.$_POST['genero'].'<hr>';
	$salida .='<strong>Materias</strong><br>';
	foreach ($_POST['materias'] as $mat) {
		$salida .= '<strong>'.$mat['nombre'].'</strong> '.$mat['nota'].'<br>';
		$salida .= $mat['comentario'].'<br>';
	}
 
	//Vamos a subir el archivo
	if (isset($_POST['botonSubmit']) && $_POST['botonSubmit'] == 'Enviar')
	{
  		if (isset($_FILES['fichero1']) && $_FILES['fichero1']['error'] === UPLOAD_ERR_OK)
  		{
    		// get details of the uploaded file
    		$fileTmpPath = $_FILES['fichero1']['tmp_name'];
    		$fileName = $_FILES['fichero1']['name'];
    		$fileSize = $_FILES['fichero1']['size'];
    		$fileType = $_FILES['fichero1']['type'];
 
    		$fileNameCmps = explode(".", $fileName);  // ['Captura de Pantalla 2024-08-05 a las 19','55','44','png']
    		$fileExtension = strtolower(end($fileNameCmps)); // 'png'

    		// sanitize file-name
    		$newFileName = md5(time() . $fileName) . '.' . $fileExtension; //creamos un nombre único para nuestro archivo.

    		// check if file has one of the following extensions
    		$allowedfileExtensions = array('jpg', 'gif', 'png','webp');

    		if (in_array($fileExtension, $allowedfileExtensions)) //Comprobamos si la extensión del archivo esta permitida.
    		{
      			// directory in which the uploaded file will be moved, la carperta tiene que estar creada previamente.
      			$uploadFileDir = './uploaded_files/';
      			$dest_path = $uploadFileDir . $newFileName;

      			if(move_uploaded_file($fileTmpPath, $dest_path)) 
      			{
					$imagen = new Imagick($dest_path);
					//$imagen->cropThumbnailImage(200,200);
					$imagen->resizeImage(200,200,Imagick::FILTER_UNDEFINED, 1);
					$imagen->writeImage('./imgpeques/'.$newFileName);  					
					$salida .= '<img src="https://docente.104cubes.com/modulo2/enviarMail/imgpeques/'.$newFileName.'">' ;
      			}
      			else 
      			{
        			echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      			}
    		}
    		else
    		{
      				echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    		}
  		}
  		else
  		{
    		echo 'There is some error in the file upload. Please check the following error.<br>';
    		echo 'Error:' . $_FILES['fichero1']['error'];
  		}
	} else {
		echo 'No viene del formulario correcto';
	}
		
	echo $salida;


//Load Composer's autoloader
require '../../vendor/autoload.php';

//Creamos el archivo pdf
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled', true);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

//$dompdf->getOptions()->setChroot('/path/to/common/assets-directory');

$dompdf->loadHtml($salida);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();

//Nombre del Documento.
$nombreArchivo = 'expediente-'.$_POST['nombre'].$_POST['ape1'].$_POST['ape2'].'.pdf';

file_put_contents( './pdfs/'.$nombreArchivo, $output);


// Enviamos el mail

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bmulleras@gmail.com';                     //SMTP username
    $mail->Password   = 'nocr wbrq tweu fnae';                               //SMTP password
    $mail->SMTPSecure =  'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
    //Recipients
    $mail->setFrom('bmulleras@gmail.com', 'Borja Mulleras');
    $mail->addAddress('bmulleras@uoc.edu');     //Add a recipient
    $mail->addReplyTo('borja.mulleras@hotmail.com', 'Information');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Expediente académico';
    $mail->Body    = $salida;
    $mail->AltBody = 'Necesita un cliente de HTML para leer el correo electrónico.';
	//Attachment
	$mail->addAttachment('./pdfs/'.$nombreArchivo);    
	
	
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}









?>