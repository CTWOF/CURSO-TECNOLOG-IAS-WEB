<?php
require_once 'ClassPerson.php';

class PersonaConNacionalidad extends Persona
{
    public $nacionalidad;

    function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

}

$ucraniana = new PersonaConNacionalidad('Oksana', 'Fedyukova', '', '1985-08-22', 'Femenino');
$ucraniana->setNacionalidad('Ucraniana');

echo 'Estos son los datos de la persona con nacionalidad:<br>';
$ucraniana->mostrarDatos();
echo '<strong>NACIONALIDAD</strong><br>' . $ucraniana->getNacionalidad() . '<br>';

echo 'Fin del programa<br>';
?>