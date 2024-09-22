<?php
require_once '../comun/libreria.php';
cabecera('Leer expedientes','');
echo '<ul class="menu">';
echo '<li><a href="anadirExpediente1.php">Añadir expediente</a></li>';
echo '</ul>';
//Recorremos el array $expedientes
echo '<ul class="listaPersonas">';
foreach ($expedientes as $clave => $exp) {
	echo '<li>';
	echo '<img src="./datos/imgpeques/'.$exp->getFoto().'" style="width:75px;">';
	echo '<a href="leerExpediente.php?id='.$clave.'">';
		echo $exp->getNombre().' '.$exp->getApe1().' '.$exp->getApe2();
	echo '</a>';
	echo '<a class="boton" href="borrarExpediente.php?id='.$clave.'">Borrar</a>';
	echo '<a class="boton" href="modificarExpediente1.php?id='.$clave.'">Modificar</a>';

	echo '</li>';
}
echo '</ul>';
pie();