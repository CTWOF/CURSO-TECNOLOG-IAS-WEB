	<?php
	session_start();
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
	$sql = "SELECT usuarios.*
			FROM `usuarios` 
			WHERE `valor_sesion`='".session_id()."' 
  				and username='".$_SESSION['username']."'
  				and date_add(fecha_conexion, INTERVAL 3 HOUR) > now();";
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
    	echo "Lo conexión a esta sesión no es válida.";
    	exit;
	}
	?>