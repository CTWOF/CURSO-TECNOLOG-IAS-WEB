<?php
require_once 'cocheClass.php';
class cocheLujo extends Coche {
	public $equipamientoExtra;
	public function __construct($color,$potencia,$modelo,$marca,$equipamiento) {
		parent::__construct($color,$potencia,$modelo,$marca);
		$this->setEquipamientoExtra($equipamiento);

	}
	//getters
	function getEquipamientoExtra() {
		return $this->equipamientoExtra;
	}
	//setters
	function setEquipamientoExtra($equip) {
		$this->equipamientoExtra = $equip;
	}
	//redefinición del método verDatos
	function verDatos() {
		parent::verDatos();
		echo '<strong>Equipamiento extra</strong><br>'.$this->getEquipamientoExtra().'<br>';	
	}
}