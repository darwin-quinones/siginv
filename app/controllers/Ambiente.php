<?php 
	class Ambiente Extends Controlador{

		public function __construct(){
			$this->AmbienteModel = $this->modelo('AmbienteModel');
			$this->CentroModel = $this-> modelo('CentroModel');
			$this->RegionalModel = $this->modelo('RegionalModel');
			$this->SedeModel = $this->modelo('SedeModel');
			$this->InstructorModel = $this->modelo('InstructorModel');
		}
		// list ambiente
		public function ListarAmbiente(){
			$ListarAmbiente = $this->AmbienteModel->ListarAmbiente();
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$ListarSede = $this->SedeModel->ListarSede();
			
			$datos = [
				'ListarAmbientes' => $ListarAmbiente,
				'ListarCentro' => $ListarCentro,
				'ListarRegional'=> $ListarRegional,
				'ListarSede' => $ListarSede
			];
			$this->vista('configuracion/Ambiente/ListarAmbiente', $datos);
		}
		// Load centros
		public function LoadCentros() {
			$idRegional = $_POST['regionalID'];
			$result = $this->AmbienteModel->LoadCentros($idRegional);
			echo json_encode($result);
		}
		// Load sedes
		public function LoadSedes(){
			$idCentro = $_POST['centroID'];
			$result = $this->AmbienteModel->LoadSedes($idCentro);
			echo json_encode($result);
		}

		/* Funcion to register ambiente */
		public function RegistrarAmbiente(){
			$datos = [
				'ambienteRegional' => trim($_POST['ambienteRegional']),
				'ambienteCentro' => trim($_POST['ambienteCentro']),
				'ambienteSede' => trim($_POST['ambienteSede']),
				'ambienteNombre' => trim($_POST['ambienteNombre']),
				'ambienteInstructor' => trim($_POST['ambienteInstructor'])
			];
			$this->AmbienteModel->RegistrarAmbiente($datos);
		}
		
 		/*Compare ambiente so that you cannot register another with the same name */	
		public function CompararAmbiente(){
			$result = $this->AmbienteModel->CompararAmbiente($_POST['ambienteNombre']);
			echo json_encode($result);
		}
		// get ambiente
		public function ObtenerAmbiente($idAmbiente) {
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$ListarCentro = $this->CentroModel->ListarCentro();
			$ListarSede = $this->SedeModel->ListarSede();
			$result = $this->AmbienteModel->ObtenerAmbiente($idAmbiente);
			$datos = [
				'idAmbiente' => $idAmbiente,
				'ambienteNombre' => $result->tbl_amb_NOMBRE,
				'ListarRegional' => $ListarRegional,
				'ListarCentro' => $ListarCentro,
				'ListarSede' => $ListarSede
			];
			/*Send data to the view editarAmbiente */
			$this->vista('configuracion/Ambiente/EditarAmbiente', $datos);
		}
		/*Function to edit */
		public function EditarAmbiente() {
			$datos = [
				'idAmbiente' =>$_POST['idAmbiente'],
				'ambienteNombre' =>$_POST['ambienteNombre'],
				'ambienteInstructor' =>$_POST['ambienteInstructor'],
				'ambienteRegional' =>$_POST['ambienteRegional'],
				'ambienteCentro' =>$_POST['ambienteCentro'],
				'ambienteSede' =>$_POST['ambienteSede']
			];
			$this->AmbienteModel->EditarAmbiente($datos);
		}

		//first, we have to get the data 
		public function EliminarAmbiente($idAmbiente){
			$result = $this->AmbienteModel->ObtenerAmbiente($idAmbiente);
			$datos = [
				'idAmbiente' => $idAmbiente,
				'ambienteNombre' => $result->tbl_amb_NOMBRE,
				'ambienteInstructor' => $result->tbl_instructor_NOMBRES,
				'ambienteSede' => $result->tbl_sede_tbl_sede_ID
			];
			$this->vista('configuracion/Ambiente/EliminarAmbiente', $datos);
		}
		//afterward delete
		public function DeleteAmbiente(){
			$idAmbiente = $_POST['idAmbiente'];
			$result = $this->AmbienteModel->DeleteAmbiente($idAmbiente);
			return $result;
		}
		public function LoadInstructores() {
			$idSede = trim($_POST['sedeID']);
			$result = $this->AmbienteModel->LoadInstructores($idSede);
			echo json_encode($result);
		}
	}

?>