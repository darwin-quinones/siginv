<?php 
	class Instructor Extends Controlador{

		public function __construct(){
			$this->SedeModel = $this->modelo('SedeModel');
			$this->InstructorModel = $this->modelo('InstructorModel');
		}

		public function ListarInstructor(){
			$ListarInstructor = $this->InstructorModel->ListarInstructor();
			$ListarSede = $this->SedeModel->ListarSede();
			$datos = [
				'ListarInstructor' => $ListarInstructor,
				'ListarSedes' => $ListarSede
			];
			$this->vista('personal/Instructor/ListarInstructor', $datos);
		}

		public function RegistrarInstructor(){
			$datos = [
				'instructorSedeID' => trim($_POST['instructorSedeID']),
				'instructorNombre' => trim($_POST['instructorNombre']),
				'instructorApellido' => trim($_POST['instructorApellido']),
				'instructorTipoDocumento' => trim($_POST['instructorTipoDocumento']),
				'instructorNumeroDocumento' => trim($_POST['instructorNumeroDocumento']),
				'instructorNumeroTelefono' => trim($_POST['instructorNumeroTelefono']),
				'instructorDirecionCorreo' => trim($_POST['instructorDirecionCorreo']),
				'instructorDirecion' => trim($_POST['instructorDirecion']),
			];
			$this->InstructorModel->RegistrarInstructor($datos);
		}
		
		public function ObtenerInstructorId($idInstructor){
			$ListarSede = $this->SedeModel->ListarSede();
			$result = $this->InstructorModel->ObtenerInstructorId($idInstructor);
			$datos = [
				'idInstructor' => $idInstructor,
				'ListarSede' => $ListarSede,
				'instructorNombre' => $result->tbl_instructor_NOMBRES,
				'instructorApellido' => $result->tbl_instructor_APELLIDOS,
				'instructorTipoDocumento' => $result->tbl_instructor_TIPODOCUMENTO,
				'instructorNumeroDocumento' => $result->tbl_instructor_NUMDECUMENTO,
				'instructorNumeroTelefono' => $result->tbl_instructor_TELEFONO,
				'instructorDirecionCorreo' => $result->tbl_instructor_CORREO,
				'instructorDirecion' => $result->tbl_instructor_DIRECION
			];
			$this->vista('personal/Instructor/EditarInstructor', $datos);
		}

		public function EditarInstructor(){
			$datos = [
				'idInstructor' => trim($_POST['idInstructor']),
				'instructorSedeID' => trim($_POST['instructorSedeID']) ,
				'instructorNombre' => trim($_POST['instructorNombre']),
				'instructorApellido' => trim($_POST['instructorApellido']) ,
				'instructorTipoDocumento' => trim($_POST['instructorTipoDocumento']),
				'instructorNumeroDocumento' => trim($_POST['instructorNumeroDocumento']),
				'instructorNumeroTelefono' => trim($_POST['instructorNumeroTelefono']),
				'instructorDirecionCorreo' => trim($_POST['instructorDirecionCorreo']),
				'instructorDirecion' => trim($_POST['instructorDirecion'])
			];
			$this->InstructorModel->EditarInstructor($datos);
		}

		public function EliminarInstructor($idInstructor){
			$result = $this->InstructorModel ->ObtenerInstructorId($idInstructor);
			$datos = [
				'idInstructor' => $idInstructor,
				'instructorNombre' => $result->tbl_instructor_NOMBRES,
				'instructorApellido' => $result->tbl_instructor_APELLIDOS,
				'instructorTipoDocumento' => $result->tbl_instructor_TIPODOCUMENTO,
				'instructorNumeroDocumento' => $result->tbl_instructor_NUMDECUMENTO,
				'instructorNumeroTelefono' => $result->tbl_instructor_TELEFONO,
				'instructorDirecionCorreo' => $result->tbl_instructor_CORREO,
				'instructorDirecion' => $result->tbl_instructor_DIRECION
			];
			$this->vista('personal/Instructor/EliminarInstructor' ,$datos);
		}

		public function DeleteInstructor(){
			$this->InstructorModel->EliminarInstructor($_POST['idInstructor']);
		}

		public function CompararInstructor(){
			$result = $this->InstructorModel->CompararInstructor($_POST['instructorNombre']);
			echo json_encode($result);
		}
	}
?>