<?php
//require_once 'expedienteClass.php';
require_once __DIR__.'/../modelos/expedientesArchivadosClass.php';
//instanciamos la clase expedientesArchivados creando el objeto $expedientesObj
$expedientesObj = new expedientesArchivados();
//recuperamos el id pasado por parametro
$id = $_GET['id'];
//Llamamos al metodo borrarExpediente.
$expedientesObj->borrarExpediente($id);
header('Location: ../index.php');