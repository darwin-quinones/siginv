<?php 
    class AmbienteModel{
        private $db;

        public function __construct(){
            $this->db = new Base();
        }
        // List ambiente
        public function ListarAmbiente(){
            $this->db->query("SELECT tbl_instructor.tbl_instructor_NOMBRES, tbl_instructor.tbl_instructor_ID, tbl_instructor.tbl_instructor_APELLIDOS, tbl_regional.tbl_regional_NOMBRE, tbl_regional.tbl_regional_ID, tbl_centro.tbl_centro_ID, tbl_centro.tbl_centro_NOMBRE, tbl_sede.tbl_sede_ID,tbl_sede.tbl_sede_NOMBRE, tbl_ambiente.tbl_amb_ID, tbl_ambiente.tbl_amb_NOMBRE FROM tbl_centro INNER JOIN tbl_regional ON tbl_centro.tbl_regional_tbl_regional_ID = tbl_regional.tbl_regional_ID INNER JOIN tbl_sede ON tbl_centro.tbl_centro_ID = tbl_sede.tbl_centro_tbl_centro_ID INNER JOIN tbl_ambiente ON tbl_sede.tbl_sede_ID = tbl_ambiente.tbl_sede_tbl_sede_ID INNER JOIN tbl_instructor ON tbl_instructor.tbl_instructor_ID = tbl_ambiente.tbl_amb_tbl_instructor_ID WHERE tbl_amb_ESTADO = 1;");
            return $result = $this->db->registros();
        }

        /* function to load centros */
        public function LoadCentros($idRegional) {
            $this->db->query("SELECT * FROM tbl_centro WHERE tbl_regional_tbl_regional_ID = '$idRegional' AND tbl_centro_ESTADO = 1");
            return $result = $this->db->registros();
        }

        /* function to load sedes */
        public function LoadSedes($idCentro) {
            $this->db->query("SELECT * FROM tbl_sede WHERE tbl_centro_tbl_centro_ID = '$idCentro' AND tbl_sede_ESTADO = 1");
            return $result= $this->db->registros();
        }

        /*Function to register centros */
        public function RegistrarAmbiente($datos){
            $this->db->query("INSERT INTO tbl_ambiente (tbl_amb_ID, tbl_amb_NOMBRE,  tbl_amb_tbl_instructor_ID,  tbl_sede_tbl_sede_ID,  tbl_sede_tbl_centro_tbl_centro_ID,  tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID, tbl_amb_ESTADO) VALUES (NULL, :ambienteNombre, :ambienteInstructor, :ambienteSede, :ambienteCentro, :ambienteRegional, 1)");
            $this->db->bind(':ambienteNombre', $datos['ambienteNombre']);
            $this->db->bind(':ambienteSede', $datos['ambienteSede']);
            $this->db->bind(':ambienteCentro', $datos['ambienteCentro']);
            $this->db->bind(':ambienteRegional', $datos['ambienteRegional']);
            $this->db->bind(':ambienteInstructor', $datos['ambienteInstructor']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        /*Compare ambiente so that you cannot register another with the same name */
        public function CompararAmbiente(){
            $ambienteNombre = $_POST['ambienteNombre'];
            $this->db->query("SELECT * FROM tbl_ambiente WHERE tbl_amb_NOMBRE = '$ambienteNombre' AND tbl_amb_ESTADO = 1");
            $result= $this->db->registros();
            return $result;
        }

        /*get ambiente */
        public function ObtenerAmbiente($idAmbiente){
            $this->db->query("SELECT tbl_instructor.tbl_instructor_NOMBRES, tbl_instructor.tbl_instructor_ID, tbl_instructor.tbl_instructor_APELLIDOS, tbl_ambiente.tbl_amb_ID, tbl_ambiente.tbl_amb_NOMBRE, tbl_ambiente.tbl_amb_tbl_instructor_ID, tbl_ambiente.tbl_sede_tbl_sede_ID, tbl_ambiente.tbl_sede_tbl_centro_tbl_centro_ID, tbl_ambiente.tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID, tbl_ambiente.tbl_amb_ESTADO FROM tbl_ambiente INNER JOIN tbl_instructor ON tbl_instructor.tbl_instructor_ID =tbl_ambiente.tbl_amb_tbl_instructor_ID  WHERE tbl_ambiente.tbl_amb_ID = :idAmbiente;");
            $this->db->bind(':idAmbiente', $idAmbiente);
            $row = $this->db->registro();
            return $row;
        }
        /*Function to edit */
        public function EditarAmbiente($datos) {
            $this->db->query("UPDATE tbl_ambiente SET tbl_amb_NOMBRE=:ambienteNombre, tbl_amb_tbl_instructor_ID=:ambienteInstructor, tbl_sede_tbl_sede_ID=:ambienteSede, tbl_sede_tbl_centro_tbl_centro_ID=:ambienteCentro, tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID=:ambienteRegional WHERE tbl_amb_ID=:idAmbiente");
            $this->db->bind(':idAmbiente', $datos['idAmbiente']);
            $this->db->bind(':ambienteNombre', $datos['ambienteNombre']);
            $this->db->bind(':ambienteInstructor', $datos['ambienteInstructor']);
            $this->db->bind(':ambienteRegional', $datos['ambienteRegional']);
            $this->db->bind(':ambienteCentro', $datos['ambienteCentro']);
            $this->db->bind(':ambienteSede', $datos['ambienteSede']);
            if($this->db->execute()){
				return true;
			}else{
			   return false;
			}
        }

        // Delete ambiente
        public function DeleteAmbiente($idAmbiente) {
            $this->db->query("UPDATE tbl_ambiente SET tbl_amb_ESTADO = 0 WHERE tbl_amb_ID = '$idAmbiente'");
            ($this->db->execute()) ? true : false;
        }

        public function LoadInstructores($idSede){
            $this->db->query("SELECT tbl_instructor.tbl_instructor_ID, tbl_instructor.tbl_instructor_NOMBRES, tbl_instructor.tbl_instructor_APELLIDOS, tbl_sede.tbl_sede_nombre FROM tbl_instructor JOIN tbl_sede on tbl_sede_ID =  tbl_instructor.tbl_sede_tbl_sede_ID WHERE tbl_instructor.tbl_sede_tbl_sede_ID = :idSede AND  tbl_instructor_ESTADO = 1");
            $this->db->bind(':idSede', $idSede);
            return $result = $this->db->registros();
        }
    } 

?>