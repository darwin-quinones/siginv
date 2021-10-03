<?php

    Class Solicitud Extends Controlador{
        
        public function __construct(){
            $this->SolicitudModel = $this->modelo('SolicitudModel');
            $this->HerramientaModel = $this->modelo('HerramientaModel');
            if(!isset($_SESSION['sesion_active'])):
                header('location:' . URL_SEE . 'Login/Logout');
            endif; 
        }
        
        function generarCodigo(){
            $key = date('m/d/Y g:ia');
            return $key;
        }
        
        public function SolicitarHerramientas(){
            
            $ListarHerramientas = $this->HerramientaModel->ListarHerramientas();
            $idSolicitud = $this->generarCodigo();
            $datos = [
                'idSolicitud' => $idSolicitud,
                'ListarHerramientas' => $ListarHerramientas
            ];
            $this->vista('solicitud/herramienta/SolicitarHerramienta', $datos);
            
        }
    }
?>