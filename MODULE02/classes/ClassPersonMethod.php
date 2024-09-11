<?php
// Creamos la clase Persona con propiedades y métodos
class Persona {
    // Propiedades
    public $nombre;
    public $ape1;
    public $ape2;
    public $fechaNacimiento;
    public $genero;

    // Métodos para obtener las propiedades individualmente
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

    // Método para mostrar los detalles de la persona
    function mostrarDetalles() {
        echo 'mostrarDetalles:<br>';
        echo $this->getNombre().'<br>';
        echo $this->getApe1().'<br>';
        echo $this->getApe2().'<br>';
        echo $this->getFechaNacimiento().'<br>';
        echo $this->getGenero().'<br>';
    }

    // Otro método que devuelve los detalles como una cadena
    function devolverDetalles() {
        return 'devolverDetalles:<br>'.$this->getNombre().'<br>'.$this->getApe1().'<br>'.$this->getApe2().'<br>'.$this->getFechaNacimiento().'<br>'.$this->getGenero().'<br>';
    }
}

// Creamos el objeto $persona1 que es una instancia de la clase Persona
$persona1 = new Persona();
$persona1->nombre = 'Oksana';
$persona1->ape1 = 'Fedyukova';
$persona1->ape2 = 'Fedyukova';
$persona1->fechaNacimiento = '1985-08-22';
$persona1->genero = 'Femenino';

// Mostramos las propiedades de $persona1 usando los métodos
$persona1->mostrarDetalles();
echo $persona1->devolverDetalles();

// Separación de los objetos
echo '<hr>';

// Creamos el objeto $persona2 que es otra instancia de la clase Persona
$persona2 = new Persona();
$persona2->nombre = 'Nikola';
$persona2->ape1 = 'Molina';
$persona2->ape2 = 'Fedyukov';
$persona2->fechaNacimiento = '2024-05-14';
$persona2->genero = 'Masculino';

// Mostramos las propiedades de $persona2 usando los métodos
$persona2->mostrarDetalles();
echo $persona2->devolverDetalles();
?>