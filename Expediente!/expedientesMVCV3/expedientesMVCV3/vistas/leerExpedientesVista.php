<?php
require_once '../comun/libreria.php';
cabecera('Leer expedientes','');
echo '<ul class="menu">';
echo '<li><a href="controladores/anadirExpediente1Controlador.php">Añadir expediente</a></li>';
echo '</ul>';
//Recorremos el array $expedientes
echo '<ul class="listaPersonas">';
foreach ($expedientes as $clave => $exp) {
	echo '<li>';
	echo '<img src="./datos/imgpeques/'.$exp->getFoto().'" style="width:75px;">';
	echo '<a href="controladores/leerExpedienteControlador.php?id='.$clave.'">';
		echo $exp->getNombre().' '.$exp->getApe1().' '.$exp->getApe2();
	echo '</a>';
	echo '<a class="boton" href="controladores/borrarExpedienteControlador.php?id='.$clave.'">Borrar</a>';
	echo '<a class="boton" href="modificarExpediente1.php?id='.$clave.'">Modificar</a>';

	echo '</li>';
}
echo '</ul>';
pie();