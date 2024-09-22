<?php
require_once 'ClassPersonFull.php';

class PersonaConNacionalidad extends Persona {
    public $nacionalidad;

    // Constructor extendido
    public function __construct($nombre, $ape1, $ape2, $fechaNacimiento, $genero, $nacionalidad) {
        parent::__construct($nombre, $ape1, $ape2, $fechaNacimiento, $genero);
        $this->setNacionalidad($nacionalidad);
    }

    function getNacionalidad() {
        return $this->nacionalidad;
    }

    function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    function mostrarDatos() {
        parent::mostrarDatos();
        echo '<hr>';
        echo 'Nacionalidad: ' . $this->getNacionalidad() . '<br>';
    }
}
echo '<hr>';
$persona = new PersonaConNacionalidad('Oksana', 'Fedyukova', '', '1990-05-10', 'Femenino', 'Ucraniana');
$persona->mostrarDatos();

?>