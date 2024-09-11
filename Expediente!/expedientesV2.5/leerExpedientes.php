<?php
//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//echo '<pre>';
//print_r($expedientes);
//echo '</pre>';
//Recorremos el array $expedientes
echo '<ul>';
foreach ($expedientes as $clave => $exp) {
	echo '<li>';
	echo '<a href="leerExpediente.php?id='.$clave.'">';
		echo $exp['nombre'].' '.$exp['ape1'].' '.$exp['ape2'];
	echo '</a>';
	echo '</li>';
}
echo '</ul>';