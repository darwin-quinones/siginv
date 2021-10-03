<?php 
	
	class CentroModel{
		private $db;
        
		public function __construct(){
			$this->db = new Base();
		}
		
		public function ListarCentro(){
			$this->db->query("SELECT tbl_regional.tbl_regional_NOMBRE, tbl_regional.tbl_regional_ID, tbl_centro.tbl_centro_ID ,tbl_centro.tbl_centro_NOMBRE, tbl_centro.tbl_centro_SUBDIRECTOR, tbl_centro.tbl_centro_TELEFONO FROM tbl_centro INNER JOIN tbl_regional ON tbl_centro.tbl_regional_tbl_regional_ID = tbl_regional.tbl_regional_ID WHERE tbl_centro_ESTADO = 1");
			//Ejecutar
			return $resultados = $this->db->registros();

		}
		public function RegistrarCentro($datos){
			$this->db->query("INSERT INTO tbl_centro (tbl_centro_ID, tbl_centro_NOMBRE, tbl_centro_TELEFONO, tbl_centro_SUBDIRECTOR, tbl_regional_tbl_regional_ID) VALUES (null, :centroNombre, :centroTelefono, :centroSubdirector, :centroRegional)");
			$this->db->bind(':centroNombre', $datos['centroNombre']);
			$this->db->bind(':centroTelefono', $datos['centroTelefono']);
			$this->db->bind(':centroSubdirector', $datos['centroSubdirector']);
			$this->db->bind(':centroRegional', $datos['centroRegional']);
			if($this->db->execute()){ 
				return true; 
			}else{ 
			   return false;
			} 
		}
		public function ObtenerCentroId($idCentro) {
			$this->db->query("SELECT * FROM tbl_centro WHERE tbl_centro_ID = :idCentro");
			$this->db->bind(':idCentro', $idCentro);
			$row = $this->db->registro();
			return $row;
		}

		public function EditarCentro($datos){
			$this->db->query("UPDATE tbl_centro SET tbl_centro_NOMBRE = :centroNombre , tbl_centro_TELEFONO = :centroTelefono , tbl_centro_SUBDIRECTOR = :centroSubdirector , tbl_regional_tbl_regional_ID = :centroRegional WHERE tbl_centro_ID = :idCentro");
			$this->db->bind(':centroNombre', $datos['centroNombre']);
			$this->db->bind(':idCentro', $datos['idCentro']); 
			$this->db->bind(':centroRegional', $datos['centroRegional']);	
			$this->db->bind(':centroTelefono', $datos['centroTelefono']);
			$this->db->bind(':centroSubdirector', $datos['centroSubdirector']);
			if($this->db->execute()){ 
			   return true; 
		    }else{ 
			  return false;
		    } 
		}

		public function EliminarCentro($idCentro){
        	$this->db->query("UPDATE tbl_centro SET tbl_centro_ESTADO = 0 WHERE tbl_centro_ID = :idCentro");
			$this->db->bind(':idCentro', $idCentro);
			if($this->db->execute()){ 
				return true; 
			}else{ 
				return false;
			} 
        }
		
		// comparar 
		public function Comparar(){
			$centroNombre = $_POST['centroNombre'];
			$this->db->query("SELECT * FROM tbl_centro WHERE tbl_centro_NOMBRE = '$centroNombre' AND tbl_centro_ESTADO = 1");
			$result = $this ->db-> registros();
			return $result ;
		}

		public function loadCentros($idRegional){
			$this->db->query("SELECT * FROM tbl_centro WHERE tbl_regional_tbl_regional_ID = '$idRegional'");
			return $result = $this->db->registros();
		}

	}
?>