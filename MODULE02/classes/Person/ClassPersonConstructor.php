<?php
// Creamos la clase Persona con las propiedades indicadas
class Persona {
    // Propiedades privadas
    private $nombre;
    private $ape1;
    private $ape2;
    private $fechaNacimiento;
    private $genero;

    // Constructor para inicializar las propiedades
    function __construct($nombre, $ape1, $ape2, $fechaNacimiento, $genero) {
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

    function getApe1() {
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

    // Método para mostrar los datos
    function mostrarDatos() {
        echo 'Datos de la persona:<br>';
        echo 'Nombre: ' . $this->getNombre() . '<br>';
        echo 'Primer Apellido: ' . $this->getApe1() . '<br>';
        echo 'Segundo Apellido: ' . $this->getApe2() . '<br>';
        echo 'Fecha de Nacimiento: ' . $this->getFechaNacimiento() . '<br>';
        echo 'Género: ' . $this->getGenero() . '<br>';
    }
}

// Creamos el objeto $persona1
$persona1 = new Persona('Oksana', 'Fedyukova', ' ', '1985-08-22', 'Femenino');
// Mostramos los datos de $persona1
$persona1->mostrarDatos();

// Separación de los objetos
echo '<hr>';

// Creamos el objeto $persona2
$persona2 = new Persona('Nikola', 'Molina', 'Fedyukov', '2016-05-14', 'Masculino');
// Mostramos los datos de $persona2
$persona2->mostrarDatos();
?>