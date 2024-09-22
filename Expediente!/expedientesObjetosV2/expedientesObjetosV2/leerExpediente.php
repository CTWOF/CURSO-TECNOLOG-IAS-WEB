<?php
require_once 'expedientesArchivadosClass.php';
require_once 'expedienteClass.php';

require_once '../comun/libreria.php';
cabecera('Leer expediente','');

$expedientesObj = new expedientesArchivados();
$expedientes = $expedientesObj->getExpedientes();
//recuperamos el id pasado por parametro
$id = $_GET['id'];
//A partir del id, buscamos en el array $expedientes la posición del id. 
//Esto nos recupera todos los datos de la persona en concreto
$exp = $expedientes[$id];
//echo '<pre>';
//print_r($exp);
//echo '</pre>';

echo '<h1>Expediente de '.$exp->getNombre().' '.$exp->getApe1().' '.$exp->getApe2().'</h1>';
echo '<img src="./imgpeques/'.$exp->getFoto().'">';
foreach ($exp->getMaterias() as $clau => $mat) {
	echo '<br><strong>'.$mat['nombre'].'</strong>: '.$mat['nota'].'<br>'.$mat['comentario'];
}

pie();