<?php
    
    class Equipo extends Controlador{

        public function __construct(){
			$this->EquipoModel = $this->modelo('EquipoModel');
        }
        
        public function ListarEquipo(){
        	$ListarEquipos = $this->EquipoModel->ListarEquipos();
			$datos = [
				'ListarEquipos' => $ListarEquipos
			];
			$this->vista('inventario/Equipos/ListadoEquipo', $datos);
		}

		public function RegistrarEquipo(){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'EquipoModelo' => trim($_POST['MODELO']),
					'EquipoConsecutivo' => trim($_POST['CONSECUTIVO']),
					'EquipoDescripcion' => trim($_POST['DESCRIPCION']),
					'EquipoDescripcionActual' => trim($_POST['DESCRIPCION_ACTUAL']),
					'EquipoTipo' => trim($_POST['TIPO']),
					'EquipoPlaca' => trim($_POST['PLACA']),
					'EquipoSerial' => trim($_POST['SERIAL']),
					'EquipoFechaIngreso' => trim($_POST['FECHA_INGRESO']),
					'EquipoValorIngreso' => trim($_POST['VALOR_INGRESO'])
				];
				if ($this->EquipoModel->InsertarEquipo($datos)){
					header('location:' . URL_SISINV . 'Equipo/ListarEquipo');
				}else{
					['message' => 'HA OCURRIDO UN ERROR AL INSERTAR EL USUARIO'];
				}
			}else{
				$datos = [
					'numEstante' => '',
					'numGaveta' => ''
				];
			}
		}

		public function EditarEquipo($idEquipo){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
	            $datos = [
					'idEquipo' => $idEquipo,
	                'EquipoModelo' => trim($_POST['MODELO']),
					'EquipoConsecutivo' => trim($_POST['CONSECUTIVO']),
					'EquipoDescripcion' => trim($_POST['DESCRIPCION']),
					'EquipoDescripcionActual' => trim($_POST['DESCRIPCION_ACTUAL']),
					'EquipoTipo' => trim($_POST['TIPO']),
					'EquipoPlaca' => trim($_POST['PLACA']),
					'EquipoSerial' => trim($_POST['SERIAL']),
					'EquipoFechaIngreso' => trim($_POST['FECHA_INGRESO']),
					'EquipoValorIngreso' => trim($_POST['VALOR_INGRESO'])
				];
	            if ($this->EquipoModel->ActualizarEquipo($datos)){
	                header('location:' . URL_SISINV . 'Equipo/ListarEquipo');
	            }else{
	                die('Algo salio mal');
	            }
	        }else{
	            	$ObtenerEquipoID = $this->EquipoModel->ObtenerEquipoID($idEquipo);  
	            $datos = [
	                'idEquipo' => $ObtenerEquipoID->Tbl_equipo_ID,
	             	'EquipoModelo' => $ObtenerEquipoID->Tbl_equipo_MODELO,
	                'EquipoConsecutivo' => $ObtenerEquipoID->Tbl_equipo_CONSECUTIVO,
	                'EquipoDescripcion' => $ObtenerEquipoID->Tbl_equipo_DESCRIPCION,
	                'EquipoDescripcionActual' => $ObtenerEquipoID->Tbl_equipo_DESCRIPCION_ACTUAL,
	             	'EquipoTipo' => $ObtenerEquipoID->Tbl_equipo_TIPO,
					'EquipoPlaca' => $ObtenerEquipoID->Tbl_equipo_PLACA,
					'EquipoSerial' => $ObtenerEquipoID->Tbl_equipo_SERIAL,
					'EquipoFechaIngreso' => $ObtenerEquipoID->Tbl_equipo_FECHA_ADQUISICION,
					'EquipoValorIngreso' => $ObtenerEquipoID->Tbl_equipo_VALOR_INGRESO
	             ];	
	         }
	        	$this->vista('inventario/Equipos/EditarEquipo', $datos);
		}

		public function EliminarEquipo($idEquipo){
			$ObtenerEquipoID = $this->EquipoModel->ObtenerEquipoID($idEquipo);  
            $datos = [
					'idEquipo' => $ObtenerEquipoID->Tbl_equipo_ID,
	             	'EquipoModelo' => $ObtenerEquipoID->Tbl_equipo_MODELO,
	                'EquipoConsecutivo' => $ObtenerEquipoID->Tbl_equipo_CONSECUTIVO,
	                'EquipoDescripcion' => $ObtenerEquipoID->Tbl_equipo_DESCRIPCION,
	                'EquipoDescripcionActual' => $ObtenerEquipoID->Tbl_equipo_DESCRIPCION_ACTUAL,
	             	'EquipoTipo' => $ObtenerEquipoID->Tbl_equipo_TIPO,
					'EquipoPlaca' => $ObtenerEquipoID->Tbl_equipo_PLACA,
					'EquipoSerial' => $ObtenerEquipoID->Tbl_equipo_SERIAL,
					'EquipoFechaIngreso' => $ObtenerEquipoID->Tbl_equipo_FECHA_ADQUISICION,
					'EquipoValorIngreso' => $ObtenerEquipoID->Tbl_equipo_VALOR_INGRESO
				];
	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	            $datos = [
	                'idEquipo' => $idEquipo
	            ];
	            if ($this->EquipoModel->EliminarEquipo($datos)) {
	                header('location:' . URL_SISINV . 'Equipo/ListarEquipo');
	            }else{
	               die('Algo salio mal');
	            }
	        }
	        $this->vista('inventario/Equipos/EliminarEquipo', $datos);
    	}
	}
?>