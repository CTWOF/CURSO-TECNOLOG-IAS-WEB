<?php
class Persona {
    // Propiedades
    private $nombre;
    public $ape1;
    public $ape2;
    public $fechaNacimiento;
    public $genero;

    // Método construct y destruct
    function __construct($nombre = null, $ape1 = null, $ape2 = null, $fechaNacimiento = null, $genero = null) {
        $this->setNombre($nombre);
        $this->setApe1($ape1);
        $this->setApe2($ape2);
        $this->setFechaNacimiento($fechaNacimiento);
        $this->setGenero($genero);
    }

    // Métodos getters
    function getNombre() {
        return $this->nombre;
    }

    public function getApe1() {
        return $this->ape1;
    }

    function getApe2() {
        return $this->ape2;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getGenero() {
        return $this->genero;
    }

    // Métodos setters
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApe1($ape1) {
        $this->ape1 = $ape1;
    }

    function setApe2($ape2) {
        $this->ape2 = $ape2;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function mostrarDatos() {
        echo 'Datos de la persona:<br>';
        echo 'Nombre: ' . $this->getNombre() . '<br>';
        echo 'Primer Apellido: ' . $this->getApe1() . '<br>';
        echo 'Segundo Apellido: ' . $this->getApe2() . '<br>';
        echo 'Fecha de Nacimiento: ' . $this->getFechaNacimiento() . '<br>';
        echo 'Género: ' . $this->getGenero() . '<br>';
    }

    function esMayorQue($otraPersona) {
        return strtotime($this->getFechaNacimiento()) < strtotime($otraPersona->getFechaNacimiento());
    }
}

?>