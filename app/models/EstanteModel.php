<?php

    class EstanteModel{
        private $db;

        public function __construct(){
            $this->db = new Base();
        }

        public function ObtenerEstantesID($idEstante){
            $this->db->query('SELECT * FROM tbl_estante  WHERE Tbl_estante_ID = :idEstante');
            $this->db->bind(':idEstante' , $idEstante);
            $row = $this->db->registro();
            return $row;
        }

        public function ObtenerEstante($IdBodega){
            $this->db->query("SELECT Tbl_estante_ID, Tbl_estante_NUMERO, Tbl_estante_DESCRIPCION, Tbl_estante_ESTADO FROM tbl_estante WHERE Tbl_estante_ESTADO = 1 AND tbl_bodega_Tbl_bodega_ID = :IdBodega");
            $this->db->bind(':IdBodega', $IdBodega);
            if($this->db->execute()){ return $resultado = $this->db->registros(); }else{ return false;}  
        }

        public function ListarEstantes(){
            $this->db->query("SELECT T1.Tbl_estante_ID, T1.Tbl_estante_NUMERO, T1.Tbl_estante_DESCRIPCION, T1.Tbl_estante_ESTADO, T2.Tbl_bodega_ID, T2.Tbl_bodega_NOMBRE FROM tbl_estante T1 INNER JOIN tbl_bodega T2 ON T1.tbl_bodega_Tbl_bodega_ID = T2.Tbl_bodega_ID WHERE  T1.Tbl_estante_ESTADO = 1 ORDER BY T2.Tbl_bodega_NOMBRE , T1.Tbl_estante_NUMERO");
            return $resultado = $this->db->registros();
        }

        public function InsertarEstante($datos){
            $this->db->query("INSERT INTO tbl_estante (Tbl_estante_ID, Tbl_estante_NUMERO, Tbl_estante_DESCRIPCION,  tbl_bodega_Tbl_bodega_ID) VALUES (null , :estante, :descripcion, :idBodega)");
            $this->db->bind(':estante' , $datos['numero_estante']);
            $this->db->bind(':descripcion', $datos['descripcion']);
            $this->db->bind(':idBodega', $datos['idBodega']);
            if($this->db->execute()){ return true; }else{ return false;}  
        }

        public function ActualizarEstantes($datos){
            $this->db->query("UPDATE tbl_estante SET Tbl_estante_NUMERO = :numeroEstante, Tbl_estante_DESCRIPCION = :descEstante, tbl_bodega_Tbl_bodega_ID = :idBodega WHERE Tbl_estante_ID = :idEstante");
            $this->db->bind(':idEstante', $datos['idEstante']);
            $this->db->bind(':numeroEstante', $datos['numEstante']);
            $this->db->bind(':descEstante', $datos['descEstante']);
            $this->db->bind(':idBodega', $datos['idBodega']);
            if($this->db->execute()){ return true; }else{ return false;}  
        }


        public function BorrarEstante($datos){
            $this->db->query("UPDATE tbl_estante SET Tbl_estante_ESTADO = 0 WHERE Tbl_estante_ID = :id");
            $this->db->bind(':id', $datos['idEstante']);
            if($this->db->execute()){ return true; }else{ return false;}  
        }
    }

?>