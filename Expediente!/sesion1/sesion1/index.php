<?php

	require_once("Persona.php");

	// Iniciar la sesión
	session_start();

	// Crear una instancia del objeto:
	$objPersona = new Persona();
	$objPersona->setNombre("MARTINA");
	$objPersona->setApellidos("MARRERO MEDINA");

	// Variables de sesión:
	$_SESSION['usuario'] = $objPersona;
    $_SESSION['tabla'][]='A';
    $_SESSION['tabla'][]='B';

	echo "PAGINA PRINCIPAL<br />";
	echo "================<p />";

	// Mostrar informaci?n del objeto en la sesi?n:
	echo "Nombre: [".$_SESSION['usuario']->getNombre()."]<br/>";
	echo "Apellidos: [".$_SESSION['usuario']->getApellidos()."]<p/>";

	echo "<a href='03_sesion2.php'>Ir a la otra página</a><br/>";

?>