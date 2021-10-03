<?php
    class InstructorModel{
        private $db;

        public function __construct(){
            $this->db = new Base ();
        }
        
        public function ListarInstructor(){
            $this->db->query("SELECT tbl_sede.tbl_sede_NOMBRE, tbl_instructor.tbl_instructor_ID, tbl_instructor.tbl_instructor_NOMBRES, tbl_instructor.tbl_instructor_APELLIDOS, tbl_instructor.tbl_instructor_TIPODOCUMENTO, tbl_instructor.tbl_instructor_NUMDECUMENTO, tbl_instructor.tbl_instructor_TELEFONO, tbl_instructor.tbl_instructor_CORREO, tbl_instructor.tbl_instructor_DIRECION, tbl_instructor.tbl_sede_tbl_sede_ID FROM tbl_instructor INNER JOIN tbl_sede ON tbl_instructor.tbl_sede_tbl_sede_ID = tbl_sede.tbl_sede_ID WHERE tbl_instructor.tbl_instructor_ESTADO = 1 ");
            return $resultados = $this->db->registros();
        }
        
        public function RegistrarInstructor($datos){
            $this->db->query("INSERT INTO tbl_instructor (tbl_instructor_ID, tbl_instructor_NOMBRES, tbl_instructor_APELLIDOS, tbl_instructor_TIPODOCUMENTO, tbl_instructor_NUMDECUMENTO, tbl_instructor_TELEFONO, tbl_instructor_CORREO, tbl_instructor_DIRECION, tbl_sede_tbl_sede_ID, tbl_instructor_ESTADO) VALUES (NULL, :instructorNombre, :instructorApellido, :instructorTipoDocumento, :instructorNumeroDocumento, :instructorNumeroTelefono, :instructorDirecionCorreo, :instructorDirecion, :instructorSedeID, 1)");
            $this->db->bind(':instructorSedeID', $datos['instructorSedeID']);
            $this->db->bind(':instructorNombre', $datos['instructorNombre']);
            $this->db->bind(':instructorApellido', $datos['instructorApellido']);
            $this->db->bind(':instructorTipoDocumento', $datos['instructorTipoDocumento']);
            $this->db->bind(':instructorNumeroDocumento', $datos['instructorNumeroDocumento']);
            $this->db->bind(':instructorNumeroTelefono', $datos['instructorNumeroTelefono']);
            $this->db->bind(':instructorDirecionCorreo', $datos['instructorDirecionCorreo']);
            $this->db->bind(':instructorDirecion', $datos['instructorDirecion']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function ObtenerInstructorId($idInstructor) {
          $this->db->query("SELECT * FROM tbl_instructor  WHERE tbl_instructor_ID = :idInstructor");
          $this->db->bind(':idInstructor',$idInstructor);
          $row = $this->db->registro();
          return $row;
        }

        public function EditarInstructor($datos) {
            $this->db->query("UPDATE tbl_instructor SET tbl_instructor_NOMBRES = :instructorNombre, tbl_instructor_APELLIDOS = :instructorApellido, tbl_instructor_TIPODOCUMENTO = :instructorTipoDocumento, tbl_instructor_NUMDECUMENTO = :instructorNumeroDocumento, tbl_instructor_TELEFONO = :instructorNumeroTelefono, tbl_instructor_CORREO = :instructorDirecionCorreo, tbl_instructor_DIRECION =  :instructorDirecion, tbl_sede_tbl_sede_ID =:instructorSedeID WHERE tbl_instructor_ID = :idInstructor");
            $this->db->bind(':idInstructor', $datos['idInstructor']);
            $this->db->bind(':instructorSedeID', $datos['instructorSedeID']);
            $this->db->bind(':instructorNombre', $datos['instructorNombre']);
            $this->db->bind(':instructorApellido', $datos['instructorApellido']);
            $this->db->bind(':instructorTipoDocumento', $datos['instructorTipoDocumento']);
            $this->db->bind(':instructorNumeroDocumento', $datos['instructorNumeroDocumento']);
            $this->db->bind(':instructorNumeroTelefono', $datos['instructorNumeroTelefono']);
            $this->db->bind(':instructorDirecionCorreo', $datos['instructorDirecionCorreo']);
            $this->db->bind(':instructorDirecion', $datos['instructorDirecion']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function EliminarInstructor($idInstructor){
            $this->db->query("UPDATE tbl_instructor SET tbl_instructor_ESTADO = 0 WHERE tbl_instructor_ID = :idInstructor");
            $this->db->bind(':idInstructor', $idInstructor);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function CompararInstructor($instructorNombre){
            $this->db->query("SELECT * FROM tbl_instructor WHERE tbl_instructor_NOMBRES = '$instructorNombre' AND tbl_instructor_ESTADO = 1");
            $result = $this->db->registro();
            return $result ;
        }
    }

?>