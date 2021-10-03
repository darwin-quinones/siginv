<?php 

	Class EquipoModel{
		private $db;

		public function __construct(){
			$this->db = new Base();
		}

		public function ListarEquipos(){
			$this->db->query("SELECT * FROM tbl_equipo WHERE Tbl_equipo_ESTADO = 1 ");
        	return $resultado = $this->db->registros();
		}
		
		public function InsertarEquipo($datos){
			$this->db->query("INSERT INTO Tbl_equipo (Tbl_equipo_MODELO, Tbl_equipo_CONSECUTIVO, Tbl_equipo_DESCRIPCION,
			Tbl_equipo_DESCRIPCION_ACTUAL, Tbl_equipo_TIPO, Tbl_equipo_PLACA, Tbl_equipo_SERIAL, Tbl_equipo_FECHA_ADQUISICION, Tbl_equipo_VALOR_INGRESO) VALUES (:EquipoModelo,
			:EquipoConsecutivo, :EquipoDescripcion, :EquipoDescripcionActual , :EquipoTipo, :EquipoPlaca, :EquipoSerial, :EquipoFechaIngreso, :EquipoValorIngreso)");

			$this->db->bind(':EquipoModelo', $datos['EquipoModelo']);
			$this->db->bind(':EquipoConsecutivo', $datos['EquipoConsecutivo']);
			$this->db->bind(':EquipoDescripcion', $datos['EquipoDescripcion']);
			$this->db->bind(':EquipoDescripcionActual', $datos['EquipoDescripcionActual']);
			$this->db->bind(':EquipoTipo', $datos['EquipoTipo']);
			$this->db->bind(':EquipoPlaca', $datos['EquipoPlaca']);
			$this->db->bind(':EquipoSerial', $datos['EquipoSerial']);
			$this->db->bind(':EquipoFechaIngreso', $datos['EquipoFechaIngreso']);
			$this->db->bind(':EquipoValorIngreso', $datos['EquipoValorIngreso']);

			 if($this->db->execute()){ return true; }else{ return false;}  
		}

		public function ObtenerEquipoID($idEquipo){
			$this->db->query('SELECT * FROM tbl_equipo WHERE Tbl_equipo_ID = :idEquipo');
            $this->db->bind(':idEquipo' , $idEquipo);
            $row = $this->db->registro();
            return $row;
		}

		public function ActualizarEquipo($datos){
			$this->db->query("UPDATE Tbl_equipo SET Tbl_equipo_MODELO = :EquipoModelo, Tbl_equipo_CONSECUTIVO = :EquipoConsecutivo, Tbl_equipo_DESCRIPCION = :EquipoDescripcion,
			Tbl_equipo_DESCRIPCION_ACTUAL = :EquipoDescripcionActual, Tbl_equipo_TIPO = :EquipoTipo, Tbl_equipo_PLACA = :EquipoPlaca, Tbl_equipo_SERIAL = :EquipoSerial, Tbl_equipo_FECHA_ADQUISICION = :EquipoFechaIngreso, Tbl_equipo_VALOR_INGRESO = :EquipoValorIngreso  WHERE Tbl_equipo_ID = :idEquipo");
			$this->db->bind(':idEquipo', $datos['idEquipo']);
			$this->db->bind(':EquipoModelo', $datos['EquipoModelo']);
			$this->db->bind(':EquipoConsecutivo', $datos['EquipoConsecutivo']);
			$this->db->bind(':EquipoDescripcion', $datos['EquipoDescripcion']);
			$this->db->bind(':EquipoDescripcionActual', $datos['EquipoDescripcionActual']);
			$this->db->bind(':EquipoTipo', $datos['EquipoTipo']);
			$this->db->bind(':EquipoPlaca', $datos['EquipoPlaca']);
			$this->db->bind(':EquipoSerial', $datos['EquipoSerial']);
			$this->db->bind(':EquipoFechaIngreso', $datos['EquipoFechaIngreso']);
			$this->db->bind(':EquipoValorIngreso', $datos['EquipoValorIngreso']);

		 	if($this->db->execute()){ return true; }else{ return false;} 
		}

		public function EliminarEquipo($datos){
			$this->db->query("UPDATE tbl_equipo SET Tbl_equipo_ESTADO = 0 WHERE Tbl_equipo_ID = :idEquipo");
            $this->db->bind(':idEquipo', $datos['idEquipo']);
            if($this->db->execute()){ return true; }else{ return false;} 
		}
	}

?>