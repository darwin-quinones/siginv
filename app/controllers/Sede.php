<?php 
	class Sede Extends Controlador{

		public function __construct(){
			$this->SedeModel = $this->modelo('SedeModel');
			$this->CentroModel = $this-> modelo('CentroModel');
			$this->RegionalModel = $this->modelo('RegionalModel');
		}
		// list sede
		public function ListarSede(){
			$ListarSede = $this->SedeModel->ListarSede();
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$datos = [
				'ListarSede' => $ListarSede,
				'ListarCentro' => $ListarCentro,
				'ListarRegional' => $ListarRegional
			];
			$this->vista('configuracion/Sede/ListarSede' , $datos);
		}
		// register sede
		public function RegistrarSede(){
			$datos = [
				'sedeNombre' => trim($_POST['sedeNombre']),
				'sedeResponsable' => trim($_POST['sedeResponsable']),
				'sedeTelefono' => trim($_POST['sedeTelefono']),
				'sedeRegional' => trim($_POST['sedeRegional']),
				'sedeCentro' => trim($_POST['sedeCentro']),
			];
			$this->SedeModel->RegistrarSede($datos);
		}
		// get sede
		public function ObtenerSede($idSede){
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$result = $this->SedeModel->ObtenerSedeId($idSede);
			$datos = [
				'idSede' => $idSede,
				'ListarRegional' => $ListarRegional,
				'ListarCentro' => $ListarCentro,
				'sedeNombre' => $result->tbl_sede_NOMBRE,
				'sedeResponsable' => $result->tbl_sede_RESPONSABLE,
				'sedeTelefono' => $result->tbl_sede_TELEFONO,
			];
			$this->vista('configuracion/Sede/EditarSede',$datos);
		}
		// edit sede
		public function EditarSede(){
			$datos = [
				'idSede' => $_POST['idSede'],
				'sedeRegional' =>$_POST['sedeRegional'],
				'sedeCentro' => $_POST['sedeCentro'],
				'sedeNombre'=> $_POST['sedeNombre'], 
				'sedeResponsable' =>$_POST['sedeResponsable'],
				'sedeTelefono' => $_POST['sedeTelefono'],
			];
			$this->SedeModel->EditarSede($datos);
		}
		// first, we have to get the data
		public function EliminarSede($idSede){
			$result = $this->SedeModel ->ObtenerSedeId($idSede);
			$datos =[
				'idSede' => $idSede,
				'sedeNombre' => $result->tbl_sede_NOMBRE,
				'sedeResponsable' => $result->tbl_sede_RESPONSABLE,
				'sedeTelefono' => $result->tbl_sede_TELEFONO

			];
			$this->vista('configuracion/Sede/EliminarSede' ,$datos);

		}
		// afterward delete 
		public function DeleteSede(){
			$this->SedeModel->EliminarSede($_POST['idSede']);
		}
		// compare sede
		public function CompararSede(){
			$result = $this->SedeModel->CompararSede($_POST['sedeNombre']);
			echo json_encode($result);
		}
	}
?>