<?php 

	Class TipoDocumentoModel{

		private $db;
		public function __construct(){
			$this->db = new Base();
		}

		public function ListarTipoDocumentos(){
			$this->db->query("SELECT * FROM tbl_tipodocumento WHERE tbl_tipodocumento_ESTADO =1");
			return $resultado = $this->db->registros();
		}
	}
?>