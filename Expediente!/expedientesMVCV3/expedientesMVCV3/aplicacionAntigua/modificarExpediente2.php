<pre>
<?php
	//print_r($_POST);
?>
</pre>
<?php 
	require_once 'expedienteClass.php';
	require_once 'expedientesArchivadosClass.php';

	//Vamos a subir el archivo
	if (isset($_POST['botonSubmit']) && $_POST['botonSubmit'] == 'Guardar')
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
					//$salida .= '<img src="https://docente.104cubes.com/modulo2/enviarMail/imgpeques/'.$newFileName.'">' ;
					//Asignamos la nueva foto al array asociativo $_POST['foto']
					$_POST['foto']=$newFileName;
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
	} else {
		echo 'No viene del formulario correcto';
	}
$expediente = new Expediente($_POST['nombre'], $_POST['ape1'], $_POST['ape2'],$_POST['idiomas'],$_POST['genero'], $_POST['foto'], $_POST['materias']);
//recuperar los expedientes
$expedientesObj = new expedientesArchivados();
$id = $_POST['id'];
//Reemplazamos el expediente nuevo en el $id de los expedientes.
$expedientesObj->modificarExpediente($id,$expediente);
header('Location: index.php');





//Generamos el array para guardar los datos en el archivo JSON
$expediente = $_POST;
//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//Recuperamos el id del expediente a modificar.
$id = $_POST['id'];
$expedientes[$id]=$expediente;
//convertimos el array en formato JSON
$expedientesJSON=json_encode($expedientes);
//Escribir el JSON en el archivo coches.json
file_put_contents("expedientes.json",$expedientesJSON);
header('Location: index.php');