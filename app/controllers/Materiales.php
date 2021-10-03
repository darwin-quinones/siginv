<?php 

	Class Materiales Extends Controlador{

		public function __construct(){
			$this->MaterialesModel = $this->modelo('MaterialesModel');
		}

		public function ListarMateriales(){
			$ListarMateriales = $this->MaterialesModel->ListarMateriales();
			$datos =[
				'ListarMateriales' => $ListarMateriales
			];
			$this->vista('inventario/materiales/ListadoMateriales', $datos);
		}

		public function RegistrarMaterial(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'MaterialFecha' => trim($_POST['FECHA_INGRESO']),
					'MaterialCodigoSena' => trim($_POST['CODIGO_SENA']),
					'MaterialUnspsc' => trim($_POST['UNSPSC']),
					'MaterialDescripcion' => trim($_POST['DESCRIPCION']),
					'MaterialProgramaFormacion' => trim($_POST['PROGRAMA_FORMACION']),
					'MaterialCantidad' => trim($_POST['CANTIDAD_MATERIALES']),
					'MaterialTipoMaterial' => trim($_POST['TIPO_MATERIALES']),
					'MaterialUnidadMedida' => trim($_POST['UNIDAD_MEDIDA']),
					'MaterialDestino' => trim($_POST['DESTINO'])
				];
				if ($this->MaterialesModel->InsertarMaterial($datos)){
					header('location:' . URL_SISINV . 'Materiales/ListarMateriales');
				}else{
					['message' => 'HA OCURRIDO UN ERROR AL INSERTAR UN MATERIAL'];
				}
			}else{
				$datos = [
					'MaterialFecha' => '',
					'MaterialCodigoSena' => '',
					'MaterialUnspsc' => '',
					'MaterialDescripcion' => '',
					'MaterialProgramaFormacion' => '',
					'MaterialCantidad' =>'',
					'MaterialTipoMaterial' => '',
					'MaterialUnidadMedida' => '',
					'MaterialDestino' => ''
				];
			}
		}

		public function EditarMaterial($idMaterial){
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
	            $datos = [
	                'idMaterial' => $idMaterial,
	                'MaterialFecha' => trim($_POST['FECHA_INGRESO']),
					'MaterialCodigoSena' => trim($_POST['CODIGO_SENA']),
					'MaterialUnspsc' => trim($_POST['UNSPSC']),
					'MaterialDescripcion' => trim($_POST['DESCRIPCION']),
					'MaterialProgramaFormacion' => trim($_POST['PROGRAMA_FORMACION']),
					'MaterialCantidad' => trim($_POST['CANTIDAD_MATERIALES']),
					'MaterialTipoMaterial' => trim($_POST['TIPO_MATERIALES']),
					'MaterialUnidadMedida' => trim($_POST['UNIDAD_MEDIDA']),
					'MaterialDestino' => trim($_POST['DESTINO'])
	            ];
	            if ($this->MaterialesModel->ActualizarMaterial($datos)){
	                header('location:' . URL_SISINV . 'Materiales/ListarMateriales');
	            }else{
	                die('Algo salio mal');
	            }
	        }else{
	           	$ObtenerMaterialID = $this->MaterialesModel->ObtenerMaterialID($idMaterial);  
	            $datos = [
	                'idMaterial' => $idMaterial,
	                'MaterialFecha' => $ObtenerMaterialID->Tbl_materiales_FECHA,
					'MaterialCodigoSena' => $ObtenerMaterialID->Tbl_materiales_CODIGOSENA, 
					'MaterialUnspsc' => $ObtenerMaterialID->Tbl_materiales_UNSPSC,
					'MaterialDescripcion' => $ObtenerMaterialID->Tbl_materiales_DESCRIPCION,					
					'MaterialProgramaFormacion' => $ObtenerMaterialID->Tbl_materiales_PROGRAMAFORMACION,
					'MaterialCantidad' => $ObtenerMaterialID->Tbl_materiales_CANTIDAD,
					'MaterialTipoMaterial' => $ObtenerMaterialID->Tbl_materiales_TIPOMATERIAL,
					'MaterialUnidadMedida' => $ObtenerMaterialID->Tbl_materiales_UNIDADMEDIDA,
					'MaterialDestino' => $ObtenerMaterialID->Tbl_materiales_DESTINO        
				];	
	        }
	        $this->vista('inventario/materiales/EditarMateriales', $datos);
    	}

    	public function EliminarMaterial($idMaterial){
			$ObtenerMaterialID = $this->MaterialesModel->ObtenerMaterialID($idMaterial);  
            $datos = [
	                'idMaterial' => $idMaterial,
	                'MaterialFecha' => $ObtenerMaterialID->Tbl_materiales_FECHA,
					'MaterialCodigoSena' => $ObtenerMaterialID->Tbl_materiales_CODIGOSENA, 
					'MaterialUnspsc' => $ObtenerMaterialID->Tbl_materiales_UNSPSC,
					'MaterialDescripcion' => $ObtenerMaterialID->Tbl_materiales_DESCRIPCION,					
					'MaterialProgramaFormacion' => $ObtenerMaterialID->Tbl_materiales_PROGRAMAFORMACION,
					'MaterialCantidad' => $ObtenerMaterialID->Tbl_materiales_CANTIDAD,
					'MaterialTipoMaterial' => $ObtenerMaterialID->Tbl_materiales_TIPOMATERIAL,
					'MaterialUnidadMedida' => $ObtenerMaterialID->Tbl_materiales_UNIDADMEDIDA,
					'MaterialDestino' => $ObtenerMaterialID->Tbl_materiales_DESTINO    
	            ];	
	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	            $datos = [
	                'idMaterial' => $idMaterial
	            ];
	            if ($this->MaterialesModel->EliminarMaterial($datos)) {
	                header('location:' . URL_SISINV . 'Materiales/ListarMateriales');
	            }else{
	               die('Algo salio mal');
	            }
	        }
	        $this->vista('inventario/materiales/EliminarMateriales', $datos);
    	}
	}
?>