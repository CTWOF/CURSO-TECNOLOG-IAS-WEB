<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos.css">
	</head>
	<body>

<?php
session_start();
 
    $username = $_POST['username'];
    $password = $_POST['password'];
	//Conectamos a nuestra bbdd
	//$mysqli = new mysqli('Host', 'tu_usuario', 'tu_contraseña', 'bbdd');
	$mysqli = new mysqli('localhost:3306', 'borja', 'NhPSw97ne8m~?dxh', 'borja_bbdd1');
	if ($mysqli->connect_errno) {
    	// La conexión falló. ¿Que vamos a hacer? 
    	// Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
    	// No se debe revelar información delicada

    	// Probemos esto:
    	echo "Lo sentimos, este sitio web está experimentando problemas.";

    	// Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
    	// de todas formas, es imprimir información relacionada con errores de MySQL 
   	 	echo "Error: Fallo al conectarse a MySQL debido a: \n";
    	echo "Errno: " . $mysqli->connect_errno . "\n";
    	echo "Error: " . $mysqli->connect_error . "\n";
        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    	exit;
	}	
	// Realizar una consulta SQL
	// $sql="SELECT atributo1,atributo2 FROM tabla WHERE condicion_busqueda"
		
	$sql="SELECT username,password,valor_sesion,fecha_conexion FROM usuarios WHERE username='".$username."'";	
	echo $sql;	    
	if (!$resultado = $mysqli->query($sql)) {
    	// ¡Oh, no! La consulta falló. 
    	echo "Lo sentimos, este sitio web está experimentando problemas.";

    	// De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    	// cómo obtener información del error
    	echo "Error: La ejecución de la consulta falló debido a: \n";
    	echo "Query: " . $sql . "\n";
    	echo "Errno: " . $mysqli->errno . "\n";
    	echo "Error: " . $mysqli->error . "\n";
    	exit;
	}	
	// ¡Uf, lo conseguimos!. Sabemos que nuestra conexión a MySQL y nuestra consulta
	// tuvieron éxito, pero ¿tenemos un resultado?
	if ($resultado->num_rows === 0) {
    	// ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
    	// no. Nosotros decidimos. En este caso, ¿podría haber sido
    	// actor_id demasiado grande? 
    	echo "Lo sentimos. No se pudo encontrar una coincidencia para el username ".$username.". Inténtelo de nuevo.";
    	exit;
	}
	// Ahora, sabemos que existe solamente un único resultado en este ejemplo, por lo
	// que vamos a colocarlo en un array asociativo donde las claves del mismo son los
	// nombres de las columnas de la tabla
	$usuario = $resultado->fetch_assoc();
	echo '<pre>';
	print_r($usuario);
	echo '</pre>';
	echo hash('MD5',$password);
    if (!(hash('MD5',$password)==$usuario['password'])) {
        echo '<p class="error">Usuario y password no válidos</p>';
       } 
	else {
            //$_SESSION['user_id'] = hash('MD5',$username);
            //$_SESSION['username'] = $username;	
		    //$_SESSION["timeout"] = time();
		//Queremos modificar el registro del username y añadir el id de la sesion y el tiempo de conexion.
		//Modificar el contenido de una tabla se hace con el comando UPDATE, la estructura es	
		//$sql = "UPDATE tabla SET atributo1=valor1, atributo2=valor2 WHERE condicion_busqueda";
		$date = date('Y-m-d H:i:s', time()); //'09/20/2024 10:50:00'
		$sql ="UPDATE usuarios SET valor_sesion='".session_id()."',fecha_conexion='".$date."' WHERE username = '".$username."'";
		echo $sql;
		if ($mysqli->query($sql) === TRUE) {
            $_SESSION['username'] = $username;	
  			header("Location: inicio.php");
			//echo 'Conexión realizada';
		} else {
  			echo "Error updating record: " . $mysqli->error;
		}
        }
// El script automáticamente cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$mysqli->close();
?>
		
	</body>
</html>