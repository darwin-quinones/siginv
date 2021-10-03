<?php

	class SedeModel{
		private $db;

		public function __construct(){
			$this->db = new Base();
		}

		public function ListarSede(){
			$this->db->query("SELECT tbl_regional.tbl_regional_ID,tbl_regional.tbl_regional_NOMBRE, tbl_centro.tbl_centro_ID ,tbl_centro.tbl_centro_NOMBRE, tbl_sede.tbl_sede_ID, tbl_sede.tbl_sede_NOMBRE, tbl_sede.tbl_sede_RESPONSABLE, tbl_sede.tbl_sede_TELEFONO FROM tbl_centro INNER JOIN tbl_regional ON tbl_centro.tbl_regional_tbl_regional_ID = tbl_regional.tbl_regional_ID INNER JOIN tbl_sede ON tbl_centro.tbl_centro_ID=tbl_sede.tbl_centro_tbl_centro_ID WHERE tbl_sede.tbl_sede_ESTADO = 1");
			//Execute
			return $resultados = $this->db->registros();
		}
		// register sede
		public function RegistrarSede($datos){
			$this->db->query("INSERT INTO tbl_sede (tbl_sede_NOMBRE, tbl_sede_RESPONSABLE, tbl_sede_TELEFONO,  tbl_centro_tbl_regional_tbl_regional_ID, tbl_centro_tbl_centro_ID) VALUES ( :sedeNombre, :sedeResponsable, :sedeTelefono, :sedeRegional, :sedeCentro)");
			$this->db->bind(':sedeNombre', $datos['sedeNombre']);
			$this->db->bind(':sedeResponsable', $datos['sedeResponsable']);
			$this->db->bind(':sedeTelefono', $datos['sedeTelefono']);
			$this->db->bind(':sedeRegional', $datos['sedeRegional']);
			$this->db->bind(':sedeCentro', $datos['sedeCentro']);
			if($this->db->execute()){
				return true;
			}else{
			   return false;
			}
		}
		// get sede
		public function ObtenerSedeId($idSede) {
			$this->db->query("SELECT * FROM tbl_sede WHERE tbl_sede_ID = :idSede" );
			$this->db->bind(':idSede', $idSede);
			$row = $this->db->registro();
			return $row;
		}
		// edit sede
		public function EditarSede($datos){
			$this->db->query("UPDATE tbl_sede SET  tbl_sede_NOMBRE = :sedeNombre, tbl_sede_RESPONSABLE = :sedeResponsable, tbl_sede_TELEFONO = :sedeTelefono, tbl_centro_tbl_centro_ID = :sedeCentro, tbl_centro_tbl_regional_tbl_regional_ID = :sedeRegional WHERE tbl_sede_ID = :idSede");
			$this->db->bind(':idSede', $datos['idSede']);
			$this->db->bind(':sedeNombre', $datos['sedeNombre']);
			$this->db->bind(':sedeResponsable', $datos['sedeResponsable']);
			$this->db->bind(':sedeTelefono', $datos['sedeTelefono']);
			$this->db->bind(':sedeCentro', $datos['sedeCentro']);
			$this->db->bind(':sedeRegional', $datos['sedeRegional']);

			if($this->db->execute()){
			   return true;
		    }else{
			  return false;
		    }
		}
		// delete sede
		public function EliminarSede($idSede){
            $this->db->query("UPDATE tbl_sede SET tbl_sede_ESTADO = 0 WHERE tbl_sede_ID = :idSede");
			$this->db->bind(':idSede', $idSede);
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
        }
		// compare sede
		public function CompararSede($sedeNombre){
			$this->db->query("SELECT * FROM tbl_sede WHERE tbl_sede_NOMBRE = '$sedeNombre' AND tbl_sede_ESTADO = 1");
			$result = $this ->db->registros();
			return $result ;
		}

    }
?>
