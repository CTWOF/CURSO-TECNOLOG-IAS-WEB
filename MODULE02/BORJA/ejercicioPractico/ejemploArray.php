<?php
$persona1 = [
	'Nombre' => 'Borja',
	'Apellido1' => 'Mulleras',
	'Apellido2' => 'Vinzia'
];
echo '<pre>';
print_r($persona1);
echo '</pre>';
foreach ($persona1 as $key => $val) {
	echo $key.': '.$val.'<br>';
}

$persona2 = [
	'Nombre' => 'Gloria',
	'Apellido1' => 'Perez',
	'Apellido2' => 'Alcalde'
];
echo '<pre>';
print_r($persona2);
echo '</pre>';
foreach ($persona2 as $key => $val) {
	echo $key.': '.$val.'<br>';
}
$personas = array();
$personas[] = $persona1;
$personas[] = $persona2;
echo '<pre>';
print_r($personas);
echo '</pre>';

foreach ($personas as $clave => $per) {
	echo $per['Nombre'].' '.$per['Apellido1'].' '.$per['Apellido2'].'<br>';
}










