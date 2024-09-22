<?php

	require_once("Persona.php");

	session_start();  // Continuar la sesi?n

	if( isset($_SESSION['usuario']) == true )
	{

		echo "COMPROBAR LOS VALORES<br />";
		echo "=======================<p />";
		echo '<pre>';
		print_r( $_SESSION );
		echo '</pre>';
		echo "<p />";

		// Mostrar información del objeto en la sesión:
		echo "Nombre: [".$_SESSION['usuario']->getNombre()."]<br/>";
		echo "Apellidos: [".$_SESSION['usuario']->getApellidos()."]<p/>";

	}
	else
	{
		echo "<p>No has pasado por la p?gina principal</p>";
	}

	echo "<a href='index.php'>Volver a la p?gina principal</a>";

?>		
