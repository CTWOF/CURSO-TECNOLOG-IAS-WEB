<?php

	class Persona
	{

        public $nombre;
        public $apellidos;

        //----------------------------------------------------

        function getNombre() {
            return $this->nombre;
        }

        //----------------------------------------------------

        function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        //----------------------------------------------------

        function getApellidos() {
            return $this->apellidos;
        }

        //----------------------------------------------------

        function setApellidos( $apellidos ) {
            $this->apellidos = $apellidos;
        }

	}

?>