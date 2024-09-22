<?php
class expedientesArchivados {
	private $expedientes = [];
	function __construct() {
		$contenido = file_get_contents('expedientes.txt');
		$this->expedientes = unserialize($contenido);
	}
	function getExpedientes() {
		return $this->expedientes;
	}
	function getExpediente($id) {
		return $this->expedientes[$id];
	}
	function anadirExpediente($expediente) {
		$this->expedientes[] = $expediente;
		$this->guardarExpedientes();
	}
	function guardarExpedientes() {
		$expedientesGuardar = serialize($this->expedientes);
		file_put_contents('expedientes.txt',$expedientesGuardar);
	}
	function modificarExpediente($id,$expediente) {
		$this->expedientes[$id]=$expediente;
		$this->guardarExpedientes();
	}
	function borrarExpediente($id) {
		unset($this->expedientes[$id]);
		$this->guardarExpedientes();
	}
}

