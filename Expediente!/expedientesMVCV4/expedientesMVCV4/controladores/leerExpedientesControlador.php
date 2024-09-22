<?php
require_once __DIR__.'/../modelos/expedientesArchivadosClass.php';
require_once __DIR__.'/../modelos/expedienteClass.php';
$expedientesObj = new expedientesArchivados();
$expedientes = $expedientesObj->getExpedientes();
//echo '<pre>';
//print_r($expedientes);
//echo '</pre>';
require_once __DIR__.'/../vistas/leerExpedientesVista.php';