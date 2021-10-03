<?php 
	class BodegaModel
	{
		private $db;	
		public function __construct()
		{
			$this->db = new Base();
		}

		public function ObtenerBodegasID($idBodega){
            $this->db->query('SELECT * FROM tbl_bodega  WHERE Tbl_bodega_ID = :idBodega');
            $this->db->bind(':idBodega' , $idBodega);
            return $row = $this->db->registro();
        }

		public function ListarBodegas(){
			$this->db->query('SELECT * FROM tbl_bodega WHERE tbl_bodega_ESTADO = 1');
			return $resultado = $this->db->registros();
		}

		public function InsertarBodega($datos){
			$this->db->query('INSERT INTO tbl_bodega (Tbl_bodega_ID, Tbl_bodega_NOMBRE) VALUES (null, :nombre)');
			$this->db->bind(':nombre', $datos['nombre']);
			if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function ActualizarBodega($datos){
            $this->db->query("UPDATE tbl_bodega SET Tbl_bodega_NOMBRE = :nombreBodega  WHERE Tbl_bodega_ID = :idBodega");
            $this->db->bind(':idBodega', $datos['idBodega']);
            $this->db->bind(':nombreBodega', $datos['nombreBodega']);
            if($this->db->execute()) { 
				return true; 
			}else{ 
				return false;
			}  
        }

        public function EliminarBodega($datos){
        	$this->db->query('UPDATE tbl_bodega SET tbl_bodega_ESTADO = 0 WHERE Tbl_bodega_ID = :idBodega');
        	$this->db->bind(':idBodega', $datos['idBodega']);
  			if($this->db->execute()){ 
				return true; 
			}else{ 
				return false;
			} 
        }
	}
?>