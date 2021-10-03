<?php 

Class Estante Extends Controlador{
		
    public function __construct(){
        $this->EstanteModel = $this->modelo('EstanteModel');
        $this->BodegaModel = $this->modelo('BodegaModel');
    }

    public function ListarEstante(){
        $ListarEstantes = $this->EstanteModel->ListarEstantes();
        $ListarBodegas = $this->BodegaModel->ListarBodegas();
        $datos = [
            'ListarEstantes' => $ListarEstantes,
            'ListarBodegas' => $ListarBodegas
        ];
        $this->vista('configuracion/Estante/RegistrarEstante', $datos);
    }

    public function RegistrarEstante(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'idBodega' => trim($_POST['ID_BODEGA']),
                'numero_estante' => trim($_POST['NUM_ESTANTE']),
                'descripcion' => trim($_POST['DESCRIPCION'])
            ];
            if($this->EstanteModel->InsertarEstante($datos)){
                header('location:' . URL_SISINV . 'Estante/ListarEstante');
            }else{
                ['message' => 'HA OCURRIDO UN ERROR AL INSERTAR EL USUARIO'];
            }
        }else{
            $datos = [
                'numero_estante' => '',
                'descripcion' => ''
            ];
        }
    }

    public function EditarEstante($idEstante){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ListarEstantes = $this->EstanteModel->ListarEstantes();
            $datos = [
                'idEstante' => $idEstante,
                'idBodega' => trim($_POST['NUM_BODEGA']),
                'numEstante' => trim($_POST['NUM_ESTANTE']),
                'descEstante' => trim($_POST['DESCRIPCION']),
                'ListarEstantes' => $ListarEstantes
            ];
            if ($this->EstanteModel->ActualizarEstantes($datos)){
                header('location:' . URL_SISINV . 'Estante/ListarEstante');
            }else{
                die('Algo salio mal');
            }
        }else{
            $ObtenerEstantesID = $this->EstanteModel->ObtenerEstantesID($idEstante);  
            $ListarEstantes = $this->EstanteModel->ListarEstantes();   
            $datos = [
                'idEstante' => $ObtenerEstantesID->Tbl_estante_ID,
                //'idBodega' => $ListarEstantes->Tbl_bodega_NOMBRE,
                'numEstante' => $ObtenerEstantesID->Tbl_estante_NUMERO,
                'descripcionEstante' => $ObtenerEstantesID->Tbl_estante_DESCRIPCION,
                'ListarEstantes' => $ListarEstantes
            ];
        }
        $this->vista('configuracion/Estante/EditarEstante', $datos);
    }

    public function EliminarEstante($idEstante){
        $ObtenerEstantesID = $this->EstanteModel->ObtenerEstantesID($idEstante);  
        $ListarEstantes = $this->EstanteModel->ListarEstantes();
        $datos = [
            'idEstante' => $ObtenerEstantesID->Tbl_estante_ID,
            'numEstante' => $ObtenerEstantesID->Tbl_estante_NUMERO,
            'descripcionEstante' => $ObtenerEstantesID->Tbl_estante_DESCRIPCION,
            'ListarEstantes' => $ListarEstantes,
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ListarEstantes = $this->EstanteModel->ListarEstantes();
            $datos = [
                'idEstante' => $idEstante,
                'ListarEstantes' => $ListarEstantes,
            ];
            if ($this->EstanteModel->BorrarEstante($datos)) {
                header('location:' . URL_SISINV . 'Estante/ListarEstante');
            }else{
               die('Algo salio mal');
            }
        }
        $this->vista('configuracion/Estante/BorrarEstante', $datos);
    }
}
?>