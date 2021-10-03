<?php 
	
	Class PersonaModel{

		private $db;	
		public function __construct(){
			$this->db = new Base();
		}

		public function ListarPersonas(){
			$this->db->query('SELECT T1.Tbl_persona_ID, T1.Tbl_tipodocumento_Tbl_tipodocumento_ID, T1.Tbl_persona_NUMDOCUMENTO, T1.Tbl_persona_NOMBRES, T1.Tbl_persona_PRIMERAPELLIDO, T1.Tbl_persona_SEGUNDOAPELLIDO,T1.Tbl_persona_FECHANAC, T1.Tbl_persona_TELEFONO,T1.Tbl_persona_CORREO, T1.Tbl_cargo_Tbl_cargo_ID, T1.Tbl_persona_ESTADO, T2.Tbl_tipodocumento_ID, T2.Tbl_tipodocumento_NOMBRE, T3.Tbl_cargo_ID, T3.Tbl_cargo_TIPO FROM tbl_persona T1 INNER JOIN tbl_tipodocumento T2 ON T2.Tbl_tipodocumento_ID = T1.Tbl_tipodocumento_Tbl_tipodocumento_ID INNER JOIN tbl_cargo T3 ON T3.Tbl_cargo_ID = T1.Tbl_cargo_Tbl_cargo_ID WHERE T1.Tbl_persona_ESTADO = 1 ');
			return $resultado = $this->db->registros();
		}

		public function ObtenerPersonasID($idPersona){
			$this->db->query('SELECT T1.Tbl_persona_ID, T1.Tbl_tipodocumento_Tbl_tipodocumento_ID, T1.Tbl_persona_NUMDOCUMENTO, T1.Tbl_persona_NOMBRES, T1.Tbl_persona_PRIMERAPELLIDO, T1.Tbl_persona_SEGUNDOAPELLIDO,T1.Tbl_persona_FECHANAC, T1.Tbl_persona_TELEFONO,T1.Tbl_persona_CORREO, T1.Tbl_cargo_Tbl_cargo_ID, T1.Tbl_persona_ESTADO, T2.Tbl_tipodocumento_ID, T2.Tbl_tipodocumento_NOMBRE, T3.Tbl_cargo_ID, T3.Tbl_cargo_TIPO FROM tbl_persona T1 INNER JOIN tbl_tipodocumento T2 ON T2.Tbl_tipodocumento_ID = T1.Tbl_tipodocumento_Tbl_tipodocumento_ID INNER JOIN tbl_cargo T3 ON T3.Tbl_cargo_ID = T1.Tbl_cargo_Tbl_cargo_ID WHERE T1.Tbl_persona_ID = :idPersona');
            $this->db->bind(':idPersona' , $idPersona);
            return $row = $this->db->registro();
		}

		public function IdPersona(){
            $this->db->query('SELECT MAX(Tbl_persona_ID) AS MAXIdPersona FROM tbl_persona WHERE Tbl_persona_ESTADO = 1');
            $row = $this->db->registro();
            $IdPersona = $row->MAXIdPersona;
            return $IdPersona;
		}

		public function InsertarPersona($datos){
			$this->db->query('INSERT INTO tbl_persona (Tbl_tipodocumento_Tbl_tipodocumento_ID, Tbl_persona_NUMDOCUMENTO, Tbl_persona_NOMBRES, Tbl_persona_PRIMERAPELLIDO, Tbl_persona_SEGUNDOAPELLIDO, Tbl_persona_FECHANAC, Tbl_persona_TELEFONO, Tbl_persona_CORREO, Tbl_cargo_Tbl_cargo_ID ) VALUES (:TipoDocumento, :NumDocumento, :Nombres, :PrimerApellido, :SegundoApellido, :FechaNac, :Telefono, :Correo, :Cargo)');
			$this->db->bind(':TipoDocumento', $datos['TipoDocumento']);
			$this->db->bind(':NumDocumento', $datos['NumDocumento']);
			$this->db->bind(':Nombres', $datos['Nombres']);
			$this->db->bind(':PrimerApellido', $datos['PrimerApellido']);
			$this->db->bind(':SegundoApellido', $datos['SegundoApellido']);
			$this->db->bind(':FechaNac', $datos['FechaNac']);
			$this->db->bind(':Telefono', $datos['Telefono']);
			$this->db->bind(':Correo', $datos['Correo']);
			$this->db->bind(':Cargo', $datos['Cargo']);
			if($this->db->execute()){
				$IdPersona = $this->IdPersona(); 
				$Password = password_hash($datos['NumDocumento'], PASSWORD_DEFAULT);
				$this->db->query("INSERT INTO Tbl_usuario (Tbl_usuario_USERNAME, Tbl_usuario_PASSWORD, Tbl_usuario_IDPERSONA) VALUES (:Username, :Password, :IdPersona)");
				$this->db->bind(':Username' , $datos['Correo']);
				$this->db->bind(':Password' , $Password);
				$this->db->bind(':IdPersona', $IdPersona);
				if($this->db->execute()){ return true; }else{ return false;} 
			}else{ 
				return false;
			}
		}

		public function ActualizarPersona($datos){
			$this->db->query('UPDATE tbl_persona SET ');
			$this->db->bind(':TipoDocumento', $datos['TipoDocumento']);
			$this->db->bind(':NumDocumento', $datos['NumDocumento']);
			$this->db->bind(':Nombres', $datos['Nombres']);
			$this->db->bind(':PrimerApellido', $datos['PrimerApellido']);
			$this->db->bind(':SegundoApellido', $datos['SegundoApellido']);
			$this->db->bind(':FechaNac', $datos['Fecha']);
			$this->db->bind(':Telefono', $datos['Telefono']);
			$this->db->bind(':Correo', $datos['Correo']);
			$this->db->bind(':Cargo', $datos['Cargo']);
			if($this->db->execute()){ return true; }else{ return false;} 
		}
		
		public function EliminarPersona($datos){

		}


		 /*--------- Funcion limpiar cadenas ---------*/
		 public static function limpiar_cadena($cadena){
            $cadena=trim($cadena);
            $cadena=stripslashes($cadena);
            $cadena=str_ireplace("<script>", "", $cadena);
            $cadena=str_ireplace("</script>", "", $cadena);
            $cadena=str_ireplace("<script src", "", $cadena);
            $cadena=str_ireplace("<script type=", "", $cadena);
            $cadena=str_ireplace("SELECT * FROM", "", $cadena);
            $cadena=str_ireplace("DELETE FROM", "", $cadena);
            $cadena=str_ireplace("INSERT INTO", "", $cadena);
            $cadena=str_ireplace("DROP TABLE", "", $cadena);
            $cadena=str_ireplace("DROP DATABASE", "", $cadena);
            $cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
            $cadena=str_ireplace("SHOW TABLES", "", $cadena);
            $cadena=str_ireplace("SHOW DATABASES", "", $cadena);
            $cadena=str_ireplace("<?php", "", $cadena);
            $cadena=str_ireplace("?>", "", $cadena);
            $cadena=str_ireplace("--", "", $cadena);
            $cadena=str_ireplace(">", "", $cadena);
            $cadena=str_ireplace("<", "", $cadena);
            $cadena=str_ireplace("[", "", $cadena);
            $cadena=str_ireplace("]", "", $cadena);
            $cadena=str_ireplace("^", "", $cadena);
            $cadena=str_ireplace("==", "", $cadena);
            $cadena=str_ireplace(";", "", $cadena);
            $cadena=str_ireplace("::", "", $cadena);
            $cadena=stripslashes($cadena);
            $cadena=trim($cadena);
            return $cadena;
        }

		/*--------- Funcion verificar datos ---------*/
        public static function verificar_datos($filtro,$cadena){
            if(preg_match("/^".$filtro."$/", $cadena)){
                return false;
            }else{
                return true;
            }
        }
	}

?>