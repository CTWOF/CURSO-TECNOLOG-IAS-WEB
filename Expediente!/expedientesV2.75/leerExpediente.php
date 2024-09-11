<?php
//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
$id = $_GET['id'];
$exp = $expedientes[$id];
echo '<pre>';
//print_r($exp);
echo '</pre>';
echo '<h1>Expediente de '.$exp['nombre'].' '.$exp['ape1'].' '.$exp['ape2'].'</h1>';
echo '<img src="./imgpeques/'.$exp['foto'].'">';
foreach ($exp['materias'] as $mat) {
	echo '<br>'.$mat['nombre'].': '.$mat['nota'];
}
