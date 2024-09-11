<?php
require_once '../comun/libreria.php';
cabecera('Leer expediente','');

//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//recuperamos el id pasado por parametro
$id = $_GET['id'];
//A partir del id, buscamos en el array $expedientes la posición del id. 
//Esto nos recupera todos los datos de la persona en concreto
$exp = $expedientes[$id];
//echo '<pre>';
//print_r($exp);
//echo '</pre>';
echo '<h1>Expediente de '.$exp['nombre'].' '.$exp['ape1'].' '.$exp['ape2'].'</h1>';
echo '<img src="./imgpeques/'.$exp['foto'].'">';
foreach ($exp['materias'] as $clau => $mat) {
	echo '<br><strong>'.$mat['nombre'].'</strong>: '.$mat['nota'].'<br>'.$mat['comentario'];
}
pie();