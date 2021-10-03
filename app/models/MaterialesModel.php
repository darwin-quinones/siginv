<?php 

	Class MaterialesModel{
		private $db;

		public function __construct(){
			$this->db = new Base();
		}

		public function ObtenerMaterialID($idMaterial){
			$this->db->query('SELECT * FROM Tbl_materiales WHERE Tbl_materiales_ID = :idMaterial');
            $this->db->bind(':idMaterial' , $idMaterial);
            $row = $this->db->registro();
            return $row;
		}

		public function ListarMateriales(){
			$this->db->query("SELECT * FROM tbl_materiales WHERE Tbl_materiales_ESTADO = 1 ");
			return $resultado = $this->db->registros();
		}

		public function InsertarMaterial($datos){
			$this->db->query("INSERT INTO Tbl_materiales (Tbl_materiales_FECHA, Tbl_materiales_CODIGOSENA, Tbl_materiales_UNSPSC, Tbl_materiales_DESCRIPCION, Tbl_materiales_PROGRAMAFORMACION, Tbl_materiales_CANTIDAD, Tbl_materiales_TIPOMATERIAL, Tbl_materiales_UNIDADMEDIDA, Tbl_materiales_DESTINO) VALUES (:MaterialFecha, :MaterialCodigoSena, :MaterialUnspsc, :MaterialDescripcion, :MaterialProgramaFormacion, :MaterialCantidad, :MaterialTipoMaterial, :MaterialUnidadMedida, :MaterialDestino)");
			$this->db->bind(':MaterialFecha', $datos['MaterialFecha']);
			$this->db->bind(':MaterialCodigoSena', $datos['MaterialCodigoSena']);
			$this->db->bind(':MaterialUnspsc', $datos['MaterialUnspsc']);
			$this->db->bind(':MaterialDescripcion' ,$datos['MaterialDescripcion']);
			$this->db->bind(':MaterialProgramaFormacion', $datos['MaterialProgramaFormacion']);
			$this->db->bind(':MaterialCantidad', $datos['MaterialCantidad']);
			$this->db->bind(':MaterialTipoMaterial' , $datos['MaterialTipoMaterial']);
			$this->db->bind(':MaterialUnidadMedida', $datos['MaterialUnidadMedida']);
			$this->db->bind(':MaterialDestino' , $datos['MaterialDestino']);
			if($this->db->execute()){ return true; }else{ return false;}
		}

		public function ActualizarMaterial($datos){
			$this->db->query("UPDATE Tbl_materiales SET Tbl_materiales_FECHA = :MaterialFecha, Tbl_materiales_CODIGOSENA = :MaterialCodigoSena, Tbl_materiales_UNSPSC = :MaterialUnspsc, Tbl_materiales_DESCRIPCION = :MaterialDescripcion , Tbl_materiales_PROGRAMAFORMACION = :MaterialProgramaFormacion, Tbl_materiales_CANTIDAD = :MaterialCantidad, Tbl_materiales_TIPOMATERIAL = :MaterialTipoMaterial, Tbl_materiales_UNIDADMEDIDA = :MaterialUnidadMedida, Tbl_materiales_DESTINO = :MaterialDestino  WHERE Tbl_materiales_ID = :idMaterial");
			$this->db->bind(':idMaterial', $datos['idMaterial']);
			$this->db->bind(':MaterialFecha', $datos['MaterialFecha']);
			$this->db->bind(':MaterialCodigoSena', $datos['MaterialCodigoSena']);
			$this->db->bind(':MaterialUnspsc', $datos['MaterialUnspsc']);
			$this->db->bind(':MaterialDescripcion' ,$datos['MaterialDescripcion']);
			$this->db->bind(':MaterialProgramaFormacion', $datos['MaterialProgramaFormacion']);
			$this->db->bind(':MaterialCantidad', $datos['MaterialCantidad']);
			$this->db->bind(':MaterialTipoMaterial' , $datos['MaterialTipoMaterial']);
			$this->db->bind(':MaterialUnidadMedida', $datos['MaterialUnidadMedida']);
			$this->db->bind(':MaterialDestino' , $datos['MaterialDestino']);
			if($this->db->execute()){ return true; }else{ return false;}
		}

		public function EliminarMaterial($datos){
			$this->db->query("UPDATE Tbl_materiales SET Tbl_materiales_ESTADO = 0 WHERE Tbl_materiales_ID = :idMaterial");
            $this->db->bind(':idMaterial', $datos['idMaterial']);
            if($this->db->execute()){ return true; }else{ return false;} 
		}
	}
?>