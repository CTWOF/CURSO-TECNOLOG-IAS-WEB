<?php
function cabecera($titulo,$estilos_propio) {
echo '<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>'.$titulo.'</title>
				<link rel="stylesheet" type="text/css" href="../comun/estilos.css">';
	if (!empty($estilos_propio)) {
			echo '<link rel="stylesheet" type="text/css" href="../comun/'.$estilos_propio.'">';
	};
				
echo			' <script src="index.js"></script>
			</head>
		<body>
			<div id="contenedor">
					<h1>'.$titulo.'</h1>';
}	
function pie() {
 echo '</div>
	</body>
</html>';
}
?>