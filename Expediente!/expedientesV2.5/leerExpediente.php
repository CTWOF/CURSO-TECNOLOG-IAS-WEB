<?php
//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
$id = $_GET['id'];
$exp = $expedientes[$id];
echo '<pre>';
print_r($exp);
echo '</pre>';