<?php 
	class BodegaModel
	{
		private $db;	
		public function __construct()
		{
			$this->db = new Base();
		}

		public function ListarBodega(){
			$this->db->query("SELECT tbl_regional.tbl_regional_NOMBRE, tbl_centro.tbl_centro_NOMBRE, tbl_sede.tbl_sede_NOMBRE, tbl_bodega.tbl_bodega_ID, tbl_bodega.tbl_bodega_NOMBRE, tbl_bodega.tbl_bodega_ESTADO, tbl_bodega.tbl_sede_tbl_sede_ID, tbl_bodega.tbl_sede_tbl_centro_tbl_centro_ID, tbl_bodega.tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID FROM tbl_bodega JOIN tbl_regional ON tbl_regional.tbl_regional_ID = tbl_bodega.tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID JOIN tbl_centro ON tbl_centro.tbl_centro_ID = tbl_bodega.tbl_sede_tbl_centro_tbl_centro_ID JOIN tbl_sede ON tbl_sede.tbl_sede_ID = tbl_bodega.tbl_sede_tbl_sede_ID WHERE tbl_bodega.tbl_bodega_ESTADO = 1");
			return $resultado = $this->db->registros();
		}

		public function RegistrarBodega($datos){
			$this->db->query("INSERT INTO tbl_bodega(tbl_bodega_ID, tbl_bodega_NOMBRE, tbl_sede_tbl_sede_ID, tbl_sede_tbl_centro_tbl_centro_ID, tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID, tbl_bodega_ESTADO) VALUES (NULL, :bodegaNombre, :bodegaSede, :bodegaCentro, :bodegaRegional, 1)");
			$this->db->bind(':bodegaNombre', $datos['bodegaNombre']);
			$this->db->bind(':bodegaSede', $datos['bodegaSede']);
			$this->db->bind(':bodegaCentro', $datos['bodegaCentro']);
			$this->db->bind(':bodegaRegional', $datos['bodegaRegional']);
			if($this->db->execute()){ return true; }else{ return false;}  
		}
        public function ObtenerBodega($idBodega){
        	$this->db->query("SELECT tbl_regional.tbl_regional_NOMBRE, tbl_centro.tbl_centro_NOMBRE, tbl_sede.tbl_sede_NOMBRE, tbl_bodega.tbl_bodega_ID, tbl_bodega.tbl_bodega_NOMBRE, tbl_bodega.tbl_bodega_ESTADO, tbl_bodega.tbl_sede_tbl_sede_ID, tbl_bodega.tbl_sede_tbl_centro_tbl_centro_ID, tbl_bodega.tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID FROM tbl_bodega JOIN tbl_regional ON tbl_regional.tbl_regional_ID = tbl_bodega.tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID JOIN tbl_centro ON tbl_centro.tbl_centro_ID = tbl_bodega.tbl_sede_tbl_centro_tbl_centro_ID JOIN tbl_sede ON tbl_sede.tbl_sede_ID = tbl_bodega.tbl_sede_tbl_sede_ID WHERE tbl_bodega.tbl_bodega_ID = :idBodega");
  			$this->db->bind(':idBodega', $idBodega);
			$row = $this->db->registro();
			return $row;
        }
		public function DeleteBodega($idBodega) {
			$this->db->query("UPDATE tbl_bodega SET tbl_bodega_ESTADO = 0 WHERE tbl_bodega_ID = '$idBodega'");
			($this->db->execute())? true : false;
		}
	}
?>