<?php 
	
	Class GavetaModel{
		private $db;
		public function __construct(){
			$this->db = new Base();
		}

		public function ObtenerGavetasID($idGaveta){
            $this->db->query('SELECT * FROM tbl_gaveta WHERE tbl_gaveta_ID = :idGaveta');
            $this->db->bind(':idGaveta' , $idGaveta);
            $row = $this->db->registro();
            return $row;
        }

        public function ObtenerGaveta($IdEstante){
        	 $this->db->query("SELECT tbl_gaveta_ID, tbl_estante_tbl_bodega_tbl_bodega_ID, tbl_estante_tbl_estante_ID, tbl_gaveta_NUMERO, tbl_gaveta_EStADO FROM tbl_gaveta WHERE tbl_gaveta_ESTADO = 1 AND tbl_estante_tbl_estante_ID = :IdEstante");
            $this->db->bind(':IdEstante', $IdEstante);
            if($this->db->execute()){ return $resultado = $this->db->registros(); }else{ return false;} 
        }

		public function ListarGavetas(){
			$this->db->query("SELECT t1.tbl_gaveta_ID ,  t1.tbl_estante_tbl_bodega_tbl_bodega_ID, t1.tbl_estante_tbl_estante_ID , t1.tbl_gaveta_NUMERO, t2.tbl_estante_NUMERO, t2.tbl_estante_DESCRIPCION, t3.tbl_bodega_NOMBRE FROM tbl_gaveta t1 LEFt JOIN tbl_estante t2 ON t2.tbl_estante_ID = tbl_estante_tbl_estante_ID INNER JOIN tbl_bodega t3 ON t3.tbl_bodega_ID = t1.tbl_estante_tbl_bodega_tbl_bodega_ID WHERE t1.tbl_gaveta_EStADO = 1 ORDER BY t1.tbl_estante_tbl_estante_ID, t1.tbl_gaveta_NUMERO  ASC");
			return $resultado = $this->db->registros();
		}

		public function InsertarGaveta($datos){
			$this->db->query("INSERT INtO tbl_gaveta (tbl_gaveta_ID, tbl_estante_tbl_bodega_tbl_bodega_ID, tbl_estante_tbl_estante_ID, tbl_gaveta_NUMERO, tbl_gaveta_EStADO) VALUES (null, :numBodega, :numEstante, :numGaveta , 1)");
			$this->db->bind(':numBodega', $datos['numBodega']);
			$this->db->bind(':numEstante', $datos['numEstante']);
			$this->db->bind(':numGaveta', $datos['numGaveta']);
			if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function ActualizarGaveta($datos){
			$this->db->query("UPDATE tbl_gaveta SET tbl_estante_tbl_estante_ID = :numEstante, tbl_gaveta_NUMERO = :numGaveta WHERE tbl_gaveta_ID = :idGaveta");
            $this->db->bind(':idGaveta', $datos['idGaveta']);
            $this->db->bind(':numEstante', $datos['numEstante']);
            $this->db->bind(':numGaveta', $datos['numGaveta']);
            if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function EliminarGaveta($datos){
			$this->db->query("UPDATE tbl_gaveta SEt tbl_gaveta_EStADO = 0 WHERE tbl_gaveta_ID = :id");
            $this->db->bind(':id', $datos['idGaveta']);
            if($this->db->execute()){ return true; }else{ return false;}  
		}
	}
?>