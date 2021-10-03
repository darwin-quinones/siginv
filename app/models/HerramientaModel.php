<?php 

	Class HerramientaModel{
		private $db;

		public function __construct(){
			$this->db = new Base();
		}

		public function ObtenerHerramientaID($idHerramienta){
			$this->db->query('SELECT * FROM tbl_herramienta WHERE Tbl_herramienta_ID = :idHerramienta');
            $this->db->bind(':idHerramienta' , $idHerramienta);
            $row = $this->db->registro();
            return $row;
		}

		public function ListarHerramientas(){
			$this->db->query("SELECT * FROM tbl_herramienta WHERE Tbl_herramienta_ESTADO = 1 ");
			return $resultado = $this->db->registros();
		}

		public function InsertarHerramienta($datos){
			$this->db->query("INSERT INTO Tbl_herramienta (Tbl_herramienta_FECHA, Tbl_herramienta_DESCRIPCION, tbl_gaveta_tbl_estante_tbl_bodega_Tbl_bodega_ID,
			tbl_gaveta_tbl_estante_Tbl_estante_ID, tbl_gaveta_Tbl_gaveta_ID, Tbl_herramienta_CANTIDAD) VALUES (:HerramientaFecha, :HerramientaDescripcion, :numBodega, :numEstante , :numGaveta, :HerramientaCantidad)");
			$this->db->bind(':HerramientaFecha', $datos['HerramientaFecha']);
			$this->db->bind(':HerramientaDescripcion', $datos['HerramientaDescripcion']);
			$this->db->bind(':numBodega', $datos['numBodega']);
			$this->db->bind(':numEstante', $datos['numEstante']);
			$this->db->bind(':numGaveta', $datos['numGaveta']);
			$this->db->bind(':HerramientaCantidad', $datos['HerramientaCantidad']);
			if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function ActualizarHerramienta($datos){
			$this->db->query("UPDATE Tbl_herramienta SET Tbl_herramienta_FECHA = :HerramientaFecha, Tbl_herramienta_DESCRIPCION = :HerramientaDescripcion, tbl_gaveta_tbl_estante_tbl_bodega_Tbl_bodega_ID = :numBodega, tbl_gaveta_tbl_estante_Tbl_estante_ID = :numEstante, tbl_gaveta_Tbl_gaveta_ID = :numGaveta, 	Tbl_herramienta_CANTIDAD = :HerramientaCantidad WHERE Tbl_herramienta_ID = :idHerramienta");
			$this->db->bind(':idHerramienta', $datos['idHerramienta']);
            $this->db->bind(':HerramientaFecha', $datos['HerramientaFecha']);
			$this->db->bind(':HerramientaDescripcion', $datos['HerramientaDescripcion']);
			$this->db->bind(':numBodega', $datos['NumBodega']);
			$this->db->bind(':numEstante', $datos['NumEstante']);
			$this->db->bind(':numGaveta', $datos['NumGaveta']);
			$this->db->bind(':HerramientaCantidad', $datos['HerramientaCantidad']);
            if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function EliminarHerramienta($datos){
			$this->db->query("UPDATE tbl_herramienta SET Tbl_herramienta_ESTADO = 0 WHERE Tbl_herramienta_ID = :idHerramienta");
            $this->db->bind(':idHerramienta', $datos['idHerramienta']);
            if($this->db->execute()){ return true; }else{ return false;} 
		}
	}
?>