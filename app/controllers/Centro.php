<?php 
	class Centro Extends Controlador{

		public function __construct(){
			$this->CentroModel = $this-> modelo('CentroModel');
			$this->RegionalModel = $this->modelo('RegionalModel');
		}
		
		public function ListarCentro(){
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$datos = [
				'ListarCentro' => $ListarCentro,
				'ListarRegional' => $ListarRegional
			];
			$this->vista('configuracion/Centro/ListarCentro' , $datos);
		}	

		public function RegistrarCentro(){
			$datos = [
				'centroNombre' => trim($_POST['centroNombre']),
				'centroTelefono' => trim($_POST['centroTelefono']),
				'centroSubdirector' => trim($_POST['centroSubdirector']),
				'centroRegional' => trim($_POST['centroRegional'])
			];
			$this->CentroModel->RegistrarCentro($datos);
		}

		public function ObtenerCentroId($idCentro){
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$result = $this->CentroModel->ObtenerCentroId($idCentro);
			$datos = [
				'idCentro' => $idCentro,
				'ListarRegional' => $ListarRegional,
				'centroNombre' => $result->tbl_centro_NOMBRE,
				'centroTelefono' => $result->tbl_centro_TELEFONO,
				'centroSubdirector' => $result->tbl_centro_SUBDIRECTOR
			];
			$this->vista('configuracion/Centro/EditarCentro',$datos);
		}

		public function EditarCentro(){
			$datos =[
				'idCentro' => $_POST['idCentro'],
				'centroRegional' =>$_POST['centroRegional'],
			    'centroNombre' => $_POST['centroNombre'],
				'centroTelefono' => $_POST['centroTelefono'],
				'centroSubdirector' => $_POST['centroSubdirector']
			];
			$this->CentroModel->EditarCentro($datos);
		}

		//eliminar 
		public function EliminarCentro($idCentro){
			$result = $this->CentroModel->ObtenerCentroID($idCentro);
			$datos = [
				'idCentro' => $idCentro,
				'centroNombre' => $result->tbl_centro_NOMBRE,
				'centroTelefono' => $result->tbl_centro_TELEFONO,
				'centroSubdirector' => $result->tbl_centro_SUBDIRECTOR
			];
			// obtenido los vista del modelo vista 
			$this->vista('configuracion/Centro/EliminarCentro',$datos);
			
		}

		public function DeleteCentro(){
			$this->CentroModel->EliminarCentro($_POST['idCentro']);
		}

		// verificar si existe el centro y el subdirector al editar
		public function CompararCentro(){
			$result = $this->CentroModel->Comparar($_POST['centroNombre']);
			echo json_encode($result);  // devuelve objeto json
		}

		public function loadCentros(){
			$idRegional = $_POST['regionalID'];
			//instancia al modelo 
			$result = $this->CentroModel->loadCentros($idRegional);
			echo json_encode($result);
		}
	}
?>