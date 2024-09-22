<?php
require_once 'cocheLujoClass.php';
//leer el contenido
$contenido = file_get_contents('coches.txt');
//Deserializar el contenido para obtener el array de objetos
$coches=unserialize($contenido);
//echo '<pre>';
//print_r($coches);
foreach ($coches as $coche) {
	$coche->verDatos();
	echo '<hr>';
}