<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../php.css">
</head>
<body>	
	<pre>
	<?php
	//Recuperar los datos del JSON
	$fichero = file_get_contents('coches.json');
	//Convertir los datos en formato json a un array de php
	$coches = json_decode($fichero,true);
	echo '$coches antes de añadir:<br>';
	print_r($coches);
	//Creamos el array de la persona a añadir.
	$coche = array(
		'Marca' => $_POST['Marca'],
		'Modelo' => $_POST['Modelo'],
		'Color' => $_POST['Color'],
		'Matricula' => $_POST['Matricula']
	);
	//Añadimos la personas al array de coches.
	$coches[]=$coche;
	echo '$coches después de añadir una persona<br>';
	print_r($coches);
	//convertimos el array en formato JSON
	$cochesJSON=json_encode($coches);
	//Escribir el JSON en el archivo coches.json
	file_put_contents("coches.json",$cochesJSON);
   ?>
	</pre>
</body>
</html>