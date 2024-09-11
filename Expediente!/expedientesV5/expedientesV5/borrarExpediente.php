<?php
require_once '../../comun/libreria.php';
cabecera('Borrar expediente','');

//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//recuperamos el id pasado por parametro
$id = $_GET['id'];
//echo '<pre>';
//print_r($expedientes);
unset($expedientes[$id]);
//echo 'Despues de ejecutar el unset '.$id;
//print_r($expedientes);
//convertimos el array en formato JSON
$expedientesJSON=json_encode($expedientes);
//Escribir el JSON en el archivo expedientes.json
file_put_contents("expedientes.json",$expedientesJSON);
header('Location: index.php');