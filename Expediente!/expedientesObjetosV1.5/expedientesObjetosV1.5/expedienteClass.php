<?php
class Expediente {
    // Propiedades del expediente
    private $nombre;
    private $ape1;
    private $ape2;
    private $idiomas;
    private $genero;
    private $foto;
    private $materias;

    // Constructor
    public function __construct($nombre, $ape1, $ape2 = null, $idiomas = [], $genero = null, $foto = null, $materias = []) {
        $this->nombre = $nombre;
        $this->ape1 = $ape1;
        $this->ape2 = $ape2;
        $this->idiomas = $idiomas;
        $this->genero = $genero;
        $this->foto = $foto;
        $this->materias = $materias;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getApe1() {
        return $this->ape1;
    }

    public function getApe2() {
        return $this->ape2;
    }

    public function getIdiomas() {
        return $this->idiomas;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getMaterias() {
        return $this->materias;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApe1($ape1) {
        $this->ape1 = $ape1;
    }

    public function setApe2($ape2) {
        $this->ape2 = $ape2;
    }

    public function setIdiomas($idiomas) {
        if(is_array($idiomas)) {
            $this->idiomas = $idiomas;
        } else {
            throw new Exception("Idiomas debe ser un array.");
        }
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setMaterias($materias) {
        if(is_array($materias)) {
            $this->materias = $materias;
        } else {
            throw new Exception("Materias debe ser un array.");
        }
    }
/*
    // Métodos para manipular el array de idiomas
    public function agregarIdioma($idioma) {
        $this->idiomas[] = $idioma;
    }

    public function eliminarIdioma($idioma) {
        $key = array_search($idioma, $this->idiomas);
        if($key !== false) {
            unset($this->idiomas[$key]);
            $this->idiomas = array_values($this->idiomas); // Reindexa el array
        }
    }

    public function listarIdiomas() {
        return $this->idiomas;
    }

    // Métodos para manipular el array de materias
    public function agregarMateria($materia) {
        $this->materias[] = $materia;
    }

    public function eliminarMateria($materia) {
        $key = array_search($materia, $this->materias);
        if($key !== false) {
            unset($this->materias[$key]);
            $this->materias = array_values($this->materias); // Reindexa el array
        }
    }

    public function listarMaterias() {
        return $this->materias;
    }
*/	
}
?>
