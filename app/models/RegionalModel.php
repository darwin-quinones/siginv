<?php 
	
	class RegionalModel{
		private $db;
		
		public function __construct(){
			$this->db = new Base();
		}

		public function ObtenerRegionalID($idRegional){
            $this->db->query('SELECT * FROM tbl_regional WHERE tbl_regional_ID = :idRegional');
			$this->db->bind(':idRegional' , $idRegional);
            $row = $this->db->registro();
			return $row;
		}

		public function ListarRegional(){
			$this->db->query("SELECT * FROM tbl_regional WHERE tbl_regional_ESTADO = 1");
			return $resultados = $this->db->registros();
		}

		public function CompararDatos($nombreRegional){
			$this->db->query("SELECT * FROM tbl_regional WHERE tbl_regional_NOMBRE = '$nombreRegional' AND tbl_regional_ESTADO = 1");
			return $result = $this->db->registro();
		}

		// comparar 
		public function Compare($nombreRegional){
			$this->db->query("SELECT * FROM tbl_regional WHERE tbl_regional_NOMBRE = '$nombreRegional' AND tbl_regional_ESTADO = 1");
			return $result = $this->db->registro();
		}

		public function RegistrarRegional($regional){
			$this->db->query("INSERT INTO tbl_regional (tbl_regional_ID, tbl_regional_NOMBRE, tbl_regional_ESTADO) VALUES (null, :nombre, 1)");
			
			$this->db->bind(':nombre', $regional);
			if ($this->db->execute()){
				return true;
			}else{
				return false;
			}
		}

		public function EditarRegional($datos){
            $this->db->query("UPDATE tbl_regional SET tbl_Regional_NOMBRE = :nombreRegional  WHERE tbl_Regional_ID = :idRegional");
            $this->db->bind(':idRegional', $datos['idRegional']);
            $this->db->bind(':nombreRegional', $datos['nombreRegional']);
            if($this->db->execute()){ 
				return true; 
			}else{ 
				return false;
			}  
        }

        public function EliminarRegional($idRegional){
        	$this->db->query("UPDATE tbl_regional SET tbl_regional_ESTADO = 0 WHERE  tbl_regional_ID = :idRegional");
			$this->db->bind(':idRegional', $idRegional);
			if($this->db->execute()){ 
				return true; 
			}else{ 
				return false;
			} 
        }
	}
?>