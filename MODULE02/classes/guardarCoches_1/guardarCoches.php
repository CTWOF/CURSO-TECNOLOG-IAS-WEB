<?php

require_once 'cocheLujoClass.php';
//creamos el objeto $miCocheLujo que será una instancia de la clase cocheLujo
$coches = [
		new cocheLujo('negro','120','A3','Audi','Asientos calefactables'),
		new cocheLujo('rojo','280','Testarrosa','Ferrari','Descapotable'),
		new cocheLujo('azul','220','Q9','Audi','Asientos calefactables')
	];
echo '<pre>';
print_r($coches);

$cochesSerializados = serialize($coches);
file_put_contents('coches.txt',$cochesSerializados);








