<pre>
<?php
 //print_r($_POST);
$personas = $_POST['personas'];
print_r($personas);
foreach ($personas as $per) {
	if (!empty($per['nombre'])) {
		echo $per['nombre'].' '.$per['ape1'].' '.$per['ape2'].'<br>';
	} else {
		echo 'No hay nombre';
	}
}
?>
</pre>
