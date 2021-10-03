<?php 

	Class Regional Extends Controlador{
		
        public function __construct(){
			$this->RegionalModel = $this->modelo('RegionalModel');
		}

		public function ListarRegional(){
			$ListarRegional = $this->RegionalModel->ListarRegional();
			$datos = [
				'ListarRegional' => $ListarRegional
			];
			$this->vista('configuracion/Regional/ListarRegional', $datos);
		}

		public function RegistrarRegional(){
			$regional = $_POST['Regional'];
			$this->RegionalModel->RegistrarRegional($regional);
		}

		public function ObtenerRegional($idRegional){
			$result = $this->RegionalModel->ObtenerRegionalID($idRegional);
			$datos = [
				'idRegional' => $idRegional,
				'nombre' => $result->tbl_regional_NOMBRE,
			];
			$this->vista('configuracion/Regional/EditarRegional',$datos);
		}
		
		public function EditarRegional(){
			$datos =[
				'idRegional' => $_POST['idRegional'],
			    'nombreRegional' => $_POST['nombreRegional']
			];
			$this->RegionalModel->EditarRegional($datos);

		}


		//eliminar 

		public function EliminarRegional($idRegional){
			$result = $this->RegionalModel->ObtenerRegionalID($idRegional);
			$datos = [
				'idRegional' => $idRegional,
				'nombre' => $result->tbl_regional_NOMBRE,
			];
			$this->vista('configuracion/Regional/EliminarRegional',$datos);
			
		}

		public function DeleteRegional(){
			$this->RegionalModel->EliminarRegional($_POST['idRegional']);
		}
        
		//Comparar la regional
		public function CompareRegional(){
			$result = $this->RegionalModel->Compare($_POST['regional']);
			echo json_encode($result);
		}



		
	}
?>