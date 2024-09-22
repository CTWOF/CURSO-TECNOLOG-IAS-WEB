<?php
echo __DIR__;
require_once __DIR__.'/../modelos/expedientesArchivadosClass.php';
require_once __DIR__.'/../modelos/expedienteClass.php';
$expedientesObj = new expedientesArchivados();
//recuperamos el id pasado por parametro
$id = $_GET['id'];
$exp = $expedientesObj->getExpediente($id);

require_once __DIR__.'/../vistas/leerExpedienteVista.php';