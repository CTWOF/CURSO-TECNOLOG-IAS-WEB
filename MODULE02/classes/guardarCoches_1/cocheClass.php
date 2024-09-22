<?php
//Creamos la clase Coche solo con propiedades
class Coche {
	//Propiedades
	private $color;
	public $potencia;
    public $modelo;
	public $marca;
	//Método construct y destruct
	function __construct($color = null,$potencia = null,$modelo = null,$marca = null) {
		$this->setColor($color);
		$this->setPotencia($potencia);
		$this->setMarca($marca);
		$this->setModelo($modelo);	
	}	
	function __destruct() {
		echo 'Estamos eliminando el objeto:<br>'.$this->verDatosFuncion();
	}
	//Métodos getters
	function getColor() {
		return $this->color;
	}
	public function getPotencia() {
		return $this->potencia;
	}
	function getModelo() {
		return $this->modelo;
	}
	function getMarca() {
		return $this->marca;
	}
	//Métodos setters
	function setColor($COLOR) {
		$this->color = $COLOR;
	}
	function setPotencia($potencia) {
		//if (is_numeric($potencia)) {
			$this->potencia = $potencia;
		//} else {
		//	echo 'Error en el formato de la potencia';
		//	exit();
		//}
	}
	function setModelo($model) {
		$this->modelo = $model;
	}
	function setMarca($marca) {
		$this->marca = $marca;
	}	
	
	//Resto de métodos
	function verDatos() {
		echo 'verDatos:<br>'; 
		echo $this->getMarca().'<br>';
		echo $this->getModelo().'<br>';
		echo $this->getColor().'<br>';
		echo $this->getPotencia().'<br>';
	}
	function verDatosFuncion() {
		return 'verDatosFuncion:<br>'.$this->getMarca().'<br>'.$this->getModelo().'<br>'.$this->getColor().'<br>'.$this->getPotencia().'<br>';		
	}
	function masPotencia($otroCoche) {
		return $this->getPotencia() > $otroCoche->getPotencia();
	}
}