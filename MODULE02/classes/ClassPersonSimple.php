<?php
// Creamos la clase Persona con propiedades
class Persona {
    public $nombre;
    public $ape1;
    public $ape2;
    public $fechaNacimiento;
    public $genero;
}

// Creamos el objeto $persona1 que es una instancia de la clase Persona
$persona1 = new Persona();
$persona1->nombre = 'Oksana';
$persona1->ape1 = 'Fedyukova';
$persona1->ape2 = 'Fedyukova';
$persona1->fechaNacimiento = '1985-08-22';
$persona1->genero = 'Femenino';

// Mostramos las propiedades de $persona1
echo $persona1->nombre.'<br>';
echo $persona1->ape1.'<br>';
echo $persona1->ape2.'<br>';
echo $persona1->fechaNacimiento.'<br>';
echo $persona1->genero.'<br>';

// Separación de los objetos
echo '<hr>';

// Creamos el objeto $persona2 que es otra instancia de la clase Persona
$persona2 = new Persona();
$persona2->nombre = 'Nikola';
$persona2->ape1 = 'Molina';
$persona2->ape2 = 'Fedyukov';
$persona2->fechaNacimiento = '2024-05-14';
$persona2->genero = 'Masculino';

// Mostramos las propiedades de $persona2
echo $persona2->nombre.'<br>';
echo $persona2->ape1.'<br>';
echo $persona2->ape2.'<br>';
echo $persona2->fechaNacimiento.'<br>';
echo $persona2->genero.'<br>';
?>