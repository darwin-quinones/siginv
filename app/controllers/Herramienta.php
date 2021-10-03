<?php 

	Class Herramienta Extends Controlador{

		public function __construct(){
			$this->HerramientaModel = $this->modelo('HerramientaModel');

		}

		public function ListarHerramienta(){
			$ListarHerramientas = $this->HerramientaModel->ListarHerramientas();
			$datos=[
				'ListarHerramientas' => $ListarHerramientas
			];
			$this->vista('inventario/herramientas/ListadoHerramientas', $datos);
		}

		public function RegistrarHerramienta(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'HerramientaFecha' => trim($_POST['FECHA_INGRESO']),
					'HerramientaDescripcion' => trim($_POST['DESCRIPCION_HERRAMIENTA']),
					'numBodega' => trim($_POST['NUM_BODEGA']),
					'numEstante' => trim($_POST['NUM_ESTANTE']),
					'numGaveta' => trim($_POST['NUM_GAVETA']),
					'HerramientaCantidad' => trim($_POST['CANTIDAD_HERRAMIENTA'])
				];
				if ($this->HerramientaModel->InsertarHerramienta($datos)){
					header('location:' . URL_SISINV . 'Herramienta/ListarHerramienta');
				}else{
					['message' => 'HA OCURRIDO UN ERROR AL INSERTAR EL USUARIO'];
				}
			}else{
				$datos = [
					'HerramientaFecha' => '',
					'HerramientaDescripcion' => '',
					'numBodega' => '',
					'numEstante' => '',
					'numGaveta' => '',
					'HerramientaCantidad' => ''
				];
			}
		}

		public function EditarHerramienta($idHerramienta){
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
	            $datos = [
	                'idHerramienta' => $idHerramienta,
	                'HerramientaFecha' => trim($_POST['FECHA_INGRESO']),
	                'HerramientaDescripcion' => trim($_POST['DESCRIPCION_HERRAMIENTA']),
	                'NumBodega' => trim($_POST['NUM_BODEGA']),
	                'NumGaveta' => trim($_POST['NUM_GAVETA']),
	                'NumEstante' => trim($_POST['NUM_ESTANTE']),
	                'HerramientaCantidad' => trim($_POST['CANTIDAD_HERRAMIENTA'])
	            ];
	            if ($this->HerramientaModel->ActualizarHerramienta($datos)){
	                header('location:' . URL_SISINV . 'Herramienta/ListarHerramienta');
	            }else{
	                die('Algo salio mal');
	            }
	        }else{
	           	$ObtenerHerramientaID = $this->HerramientaModel->ObtenerHerramientaID($idHerramienta);  
	            $datos = [
	                'idHerramienta' => $ObtenerHerramientaID->Tbl_herramienta_ID,
	                'HerramientaFecha' => $ObtenerHerramientaID->Tbl_herramienta_FECHA,
	                'HerramientaDescripcion' => $ObtenerHerramientaID->Tbl_herramienta_DESCRIPCION,
	                'NumBodega' => $ObtenerHerramientaID->tbl_gaveta_tbl_estante_tbl_bodega_Tbl_bodega_ID,
	                'NumGaveta' => $ObtenerHerramientaID->tbl_gaveta_tbl_estante_Tbl_estante_ID,
	                'NumEstante' => $ObtenerHerramientaID->tbl_gaveta_Tbl_gaveta_ID,
	                'HerramientaCantidad' => $ObtenerHerramientaID->Tbl_herramienta_CANTIDAD
	            ];	
	        }
	        $this->vista('inventario/herramientas/EditarHerramienta', $datos);
    	}

    	public function EliminarHerramienta($idHerramienta){
			$ObtenerHerramientaID = $this->HerramientaModel->ObtenerHerramientaID($idHerramienta);  
            $datos = [
	                'idHerramienta' => $ObtenerHerramientaID->Tbl_herramienta_ID,
	                'HerramientaFecha' => $ObtenerHerramientaID->Tbl_herramienta_FECHA,
	                'HerramientaDescripcion' => $ObtenerHerramientaID->Tbl_herramienta_DESCRIPCION,
	                'NumBodega' => $ObtenerHerramientaID->tbl_gaveta_tbl_estante_tbl_bodega_Tbl_bodega_ID,
	                'NumGaveta' => $ObtenerHerramientaID->tbl_gaveta_tbl_estante_Tbl_estante_ID,
	                'NumEstante' => $ObtenerHerramientaID->tbl_gaveta_Tbl_gaveta_ID,
	                'HerramientaCantidad' => $ObtenerHerramientaID->Tbl_herramienta_CANTIDAD
	            ];	
	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	            $datos = [
	                'idHerramienta' => $idHerramienta
	            ];
	            if ($this->HerramientaModel->EliminarHerramienta($datos)) {
	                header('location:' . URL_SISINV . 'Herramienta/ListarHerramienta');
	            }else{
	               die('Algo salio mal');
	            }
	        }
	        $this->vista('inventario/herramientas/EliminarHerramienta', $datos);
    	}
	}
?>