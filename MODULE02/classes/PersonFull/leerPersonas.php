<?php
require_once 'ClassPersonNationalityFull.php';

$contenido = file_get_contents('personas.txt');

$personas = unserialize($contenido);

foreach ($personas as $persona) {
    $persona->mostrarDatos();
    echo '<hr>';
}
?>