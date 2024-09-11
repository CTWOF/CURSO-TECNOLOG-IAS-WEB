<?php
// Creamos la clase Persona con propiedades privadas y métodos públicos para obtener y establecer valores
class Persona {
    // Propiedades privadas
    private $nombre;
    private $ape1;
    private $ape2;
    private $fechaNacimiento;
    private $genero;

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

    // Método para mostrar los detalles de la persona
    function mostrarDetalles() {
        echo 'mostrarDetalles:<br>';
        echo $this->getNombre().'<br>';
        echo $this->getApe1().'<br>';
        echo $this->getApe2().'<br>';
        echo $this->getFechaNacimiento().'<br>';
        echo $this->getGenero().'<br>';
    }

    // Método que devuelve los detalles como una cadena
    function devolverDetalles() {
        return 'devolverDetalles:<br>'.$this->getNombre().'<br>'.$this->getApe1().'<br>'.$this->getApe2().'<br>'.$this->getFechaNacimiento().'<br>'.$this->getGenero().'<br>';
    }
}

// Creamos el objeto $persona1 que es una instancia de la clase Persona
$persona1 = new Persona();
$persona1->setNombre('Oksana');
$persona1->setApe1('Fedyukova');
$persona1->setApe2('Fedyukova');
$persona1->setFechaNacimiento('1985-08-22');
$persona1->setGenero('Femenino');

// Mostramos las propiedades de $persona1 usando los métodos
$persona1->mostrarDetalles();
echo $persona1->devolverDetalles();

// Separación de los objetos
echo '<hr>';

// Creamos el objeto $persona2 que es otra instancia de la clase Persona
$persona2 = new Persona();
$persona2->setNombre('Nikola');
$persona2->setApe1('Molina');
$persona2->setApe2('Fedyukov');
$persona2->setFechaNacimiento('2024-05-14');
$persona2->setGenero('Masculino');

// Mostramos las propiedades de $persona2 usando los métodos
$persona2->mostrarDetalles();
echo $persona2->devolverDetalles();
?>