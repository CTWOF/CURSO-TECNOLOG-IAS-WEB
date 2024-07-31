<pre>
<?php
// print_r($_POST);
$personas = $_POST['personas'];
//print_r($personas);
foreach ($personas as $per) {
	if (!empty($per['nombre'])) {
		echo $per['nombre'].' '.$per['ape1'].' '.$per['ape2'].' ';
		if (isset($per['idiomas'])) {
			foreach ($per['idiomas'] as $idi) {
				switch ($idi) {
					case 'ES':
						echo 'Castellano ';
						break;
					case 'CA':
						echo 'Catalán ';
						break;
					case 'FR':
						echo 'Frances ';
						break;
					case 'EN':
						echo 'Inglés ';
						break;
					default:
						echo 'Idioma desconocido ';
	
				}
			}
		}
		echo '<br>';
		
	} else {
		echo 'No hay nombre<br>';
	}
}
?>
</pre>
