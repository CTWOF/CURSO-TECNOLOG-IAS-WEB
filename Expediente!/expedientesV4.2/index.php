<?php
require_once '../comun/libreria.php';
cabecera('Leer expedientes','');
echo '<ul class="menu">';
echo '<li><a href="anadirExpediente1.php">Añadir expediente</a></li>';
echo '</ul>';
//Recuperar los datos del JSON
$fichero = file_get_contents('expedientes.json');
//Convertir los datos en formato json a un array de php
$expedientes = json_decode($fichero,true);
//echo '<pre>';
//print_r($expedientes);
//echo '</pre>';
//Recorremos el array $expedientes
echo '<ul class="listaPersonas">';
foreach ($expedientes as $clave => $exp) {
	echo '<li>';
	echo '<img src="./imgpeques/'.$exp['foto'].'" style="width:75px;">';
	echo '<a href="leerExpediente.php?id='.$clave.'">';
		echo $exp['nombre'].' '.$exp['ape1'].' '.$exp['ape2'];
	echo '</a>';
	echo '<a class="boton" href="borrarExpediente.php?id='.$clave.'">Borrar</a>';
	echo '<a class="boton" href="modificarExpediente1.php?id='.$clave.'">Modificar</a>';

	echo '</li>';
}
echo '</ul>';
pie();