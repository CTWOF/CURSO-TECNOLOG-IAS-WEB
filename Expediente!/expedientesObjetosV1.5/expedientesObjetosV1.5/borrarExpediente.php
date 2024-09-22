<?php
require_once '../comun/libreria.php';
require_once 'expedienteClass.php';
require_once 'expedientesArchivadosClass.php';
cabecera('Borrar expediente','');
//instanciamos la clase expedientesArchivados creando el objeto $expedientesObj
$expedientesObj = new expedientesArchivados();
//recuperamos el id pasado por parametro
$id = $_GET['id'];
//Llamamos al metodo borrarExpediente.
$expedientesObj->borrarExpediente($id);
header('Location: index.php');