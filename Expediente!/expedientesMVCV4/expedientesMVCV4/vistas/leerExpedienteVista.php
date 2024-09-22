<?php
require_once '../../../comun/libreria.php';
cabecera('Leer expediente','');
echo '<h1>Expediente de '.$exp->getNombre().' '.$exp->getApe1().' '.$exp->getApe2().'</h1>';
echo '<img src="./imgpeques/'.$exp->getFoto().'">';
foreach ($exp->getMaterias() as $clau => $mat) {
	echo '<br><strong>'.$mat['nombre'].'</strong>: '.$mat['nota'].'<br>'.$mat['comentario'];
}
pie();