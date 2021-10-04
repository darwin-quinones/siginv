<?php 

	Class Bodega Extends Controlador{
		public function __construct(){
			$this->BodegaModel = $this->modelo('BodegaModel');
			$this->AmbienteModel = $this->modelo('AmbienteModel');
			$this->CentroModel = $this-> modelo('CentroModel');
			$this->RegionalModel = $this->modelo('RegionalModel');
			$this->SedeModel = $this->modelo('SedeModel');
			$this->InstructorModel = $this->modelo('InstructorModel');
		}

		public function ListarBodega(){
			$ListarAmbiente = $this->AmbienteModel->ListarAmbiente();
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$ListarSede = $this->SedeModel->ListarSede();
			$ListarBodega = $this ->BodegaModel->ListarBodega();
			$datos = [
				'ListarReginal' => $ListarRegional,
				'ListarCentro' => $ListarCentro,
				'ListarAmbientes' => $ListarAmbiente,
				'ListarSede' => $ListarSede,
				'ListarBodega' => $ListarBodega
			];
			$this->vista('configuracion/Bodega/ListarBodega', $datos);
		}
		public function RegistrarBodega(){
			$datos = [
				'bodegaRegional' => trim($_POST['bodegaRegional']),
				'bodegaCentro' => trim($_POST['bodegaCentro']),
				'bodegaSede' => trim($_POST['bodegaSede']),
				'bodegaNombre' => trim($_POST['bodegaNombre'])
			];
			$this->BodegaModel->RegistrarBodega($datos);
		}
		public function EliminarBodega($idBodega) {
			$result = $this->BodegaModel->ObtenerBodega($idBodega);
			$datos = [
				'bodegaNombre' => $result->tbl_bodega_NOMBRE,
				'idBodega' => $idBodega
			];
			$this->vista('configuracion/Bodega/EliminarBodega', $datos);
		}
		public function DeleteBodega() {
			$idBodega = trim($_POST['idBodega']);
			$this->BodegaModel->DeleteBodega($idBodega);
		}
	}

?>