<?php
require_once 'modelos/expedientesArchivadosClass.php';
require_once 'modelos/expedienteClass.php';
$expedientesObj = new expedientesArchivados();
$expedientes = $expedientesObj->getExpedientes();
//echo '<pre>';
//print_r($expedientes);
//echo '</pre>';
require_once 'vistas/leerExpedientesVista.php';