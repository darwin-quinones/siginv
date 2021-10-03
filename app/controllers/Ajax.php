<?php 
	class Ajax Extends Controlador{
		public function __construct(){
			$this->EstanteModel = $this->modelo('EstanteModel');
			$this->BodegaModel = $this->modelo('BodegaModel');
			$this->GavetaModel = $this->modelo('GavetaModel');
		}

		public function ObtenerBodegas(){
			$ListarBodegas = $this->BodegaModel->ListarBodegas();
			echo json_encode($ListarBodegas);
		}
		
		/*
		public function ObtenerEstantes(){
			$ListarEstantes = $this->EstanteModel->ListarEstantes();
			echo json_encode($ListarEstantes);
		}
		*/
		public function ObtenerEstante(){
			$IdBodega = $_POST['IdBodega'];
			$ListarBodegas = $this->EstanteModel->ObtenerEstante($IdBodega);
			echo json_encode($ListarBodegas);
		}

		public function ObtenerGaveta(){
			$IdEstante = $_POST['IdEstante'];
			$ListarGavetas = $this->GavetaModel->ObtenerGaveta($IdEstante);
			echo json_encode($ListarGavetas);
		}
	}
?>