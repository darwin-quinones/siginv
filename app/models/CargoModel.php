<?php 
	
	Class CargoModel{

		private $db;
		public function __construct(){
			$this->db = new Base();
		}

		public function ListarCargos(){
			$this->db->query("SELECT * FROM tbl_cargo WHERE Tbl_cargo_ESTADO = 1");
			return $resultado = $this->db->registros();
		}
	}

?>