<?php
    class LoginModel {
      
        private $db;

        function __construct(){
           
          $this->db = new Base;
        }

        public function Autenticacion($username = ''){
          $sql = "SELECT T1.Tbl_usuario_ID, T1.Tbl_usuario_USERNAME, T1.Tbl_usuario_PASSWORD AS PASSWORD, T1.Tbl_usuario_IDPERSONA, T2.Tbl_persona_ID AS IDPERSONA, T2.Tbl_tipodocumento_Tbl_tipodocumento_ID AS TIPO_DOCUMENTO, T2.Tbl_persona_NUMDOCUMENTO, T2.Tbl_persona_NOMBRES, T2.Tbl_persona_PRIMERAPELLIDO, T2.Tbl_persona_SEGUNDOAPELLIDO, T2.Tbl_persona_FECHANAC, T2.Tbl_persona_TELEFONO, T2.Tbl_persona_CORREO, T3.Tbl_cargo_TIPO AS CARGO, T1.Tbl_usuario_ESTADO FROM tbl_usuario T1 INNER JOIN tbl_persona T2 ON T1.Tbl_usuario_IDPERSONA = T2.Tbl_persona_Id LEFT JOIN tbl_cargo T3 ON T2.Tbl_cargo_Tbl_cargo_ID = T3.Tbl_cargo_ID WHERE T1.Tbl_usuario_USERNAME = :username";
          $this->db->query($sql);
          $this->db->bind(':username', $username);
          return $this->db->registro();
        }
    }

    