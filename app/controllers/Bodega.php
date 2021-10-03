<?php 

	Class Bodega Extends Controlador{
		public function __construct(){
			$this->BodegaModel = $this->modelo('BodegaModel');
		}

		public function ListarBodega(){
			
			$this->vista('configuracion/Bodega/ListarBodega', $datos);
		}
	}

?>