<?php 

	Class Persona Extends Controlador{
		
		public function __construct(){
			$this->PersonaModel = $this->modelo('PersonaModel');
			$this->CargoModel = $this->modelo('CargoModel');
			$this->TipoDocumentoModel = $this->modelo('TipoDocumentoModel');
		}

		public function ListadoPersona(){
			$ListarPersonas = $this->PersonaModel->ListarPersonas();
			$ListarCargos = $this->CargoModel->ListarCargos();
			$ListarTipoDocumentos = $this->TipoDocumentoModel->ListarTipoDocumentos();
			$datos = [
				'ListarCargos' => $ListarCargos,
				'ListarPersonas' => $ListarPersonas,
				'ListarTipoDocumentos' => $ListarTipoDocumentos
			];
			$this->vista('advance/persona/ListadoPersona', $datos);
		}

		public function RegistrarPersona(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
					$TipoDocumento=PersonaModel::limpiar_cadena($_POST['TIPO_DOCUMENTO']);
					$NumDocumento=PersonaModel::limpiar_cadena($_POST['NUM_DOCUMENTO']);
					$Nombres=PersonaModel::limpiar_cadena($_POST['NOMBRES']);
					$PrimerApellido=PersonaModel::limpiar_cadena($_POST['PRIMER_APELLIDO']);
					$SegundoApellido=PersonaModel::limpiar_cadena($_POST['SEGUNDO_APELLIDO']);
					$FechaNac=PersonaModel::limpiar_cadena($_POST['FECHA']);
					$Telefono=PersonaModel::limpiar_cadena($_POST['TELEFONO']);
					$Correo=PersonaModel::limpiar_cadena($_POST['CORREO']);
					$Cargo=PersonaModel::limpiar_cadena($_POST['CARGO']);

					 /*--------- COMPROBAR CAMPOS VACIOS ---------*/
					 if ($TipoDocumento =="" || $NumDocumento == "" || $Nombres == "" || $PrimerApellido == "" || $SegundoApellido == "" || $FechaNac == "" ||
            			$Correo == "" || $Cargo == "") {
            			$alerta = [
                			"Alerta" => "simple",
                			"Titulo" => "Ocurrio un error inesperado",
                			"Texto" => "No has llenado todos los campos obligatorios",
                			"Tipo" => "error"
            			];
            			echo json_encode($alerta);
            			exit();
        			}

						/*== Verificando integridad de los datos ==*/
					if(PersonaModel::verificar_datos("[0-9]{10,20}",$NumDocumento)){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El numero de documento no coincide con el formato solicitado",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}

					if(PersonaModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}",$Nombres)){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El NOMBRE no coincide con el formato solicitado",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}

					if(PersonaModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}",$PrimerApellido)){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El PRIMER APELLIDO no coincide con el formato solicitado",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}

					if(PersonaModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}",$SegundoApellido)){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El SEGUNDO APELLIDO no coincide con el formato solicitado",
							"Tipo"=>"error"
						];
						echo json_encode($alerta);
						exit();
					}

					if($Telefono!=""){
						if(PersonaModel::verificar_datos("[0-9()+]{6,20}",$Telefono)){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"El TELEFONO no coincide con el formato solicitado B1",
								"Tipo"=>"error"
							];
							echo json_encode($alerta);
							exit();
						}
					}

					
					$datos = [
						"TipoDocumento"=>$TipoDocumento,
						"NumDocumento" => $NumDocumento,
						"Nombres" => $Nombres,
						"PrimerApellido" => $PrimerApellido,
						"SegundoApellido" => $SegundoApellido,
						"FechaNac" => $FechaNac,
						"Telefono" => $Telefono,
						"Correo" => $Correo,
						"Cargo" => $Cargo
					];

					

					if ($this->PersonaModel->InsertarPersona($datos)) {
						$alerta = [
							"Alerta" => "limpiar",
							"Titulo" => "Usuario Registrado",
							"Texto" => "Los datos del usuario han sido registrado con exito.",
							"Tipo" => "success",
						];
						echo json_encode($alerta);
						 exit();
					
					} else {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Ocurrió un error inesperado",
							"Texto" => "No hemos podido registrar el usuario.",
							"Tipo" => "error",
						];
						echo json_encode($alerta);
					}
					
					
		
			}
			$this->vista('advance/persona/RegistrarPersona', $datos);
		}

			public function EditarPersona($idPersona){
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
	            $datos = [
	            	'idPersona' => $idPersona,
	                'TipoDocumento' => trim($_POST['TIPO_DOCUMENTO']),
					'NumDocumento' =>  trim($_POST['NUM_DOCUMENTO']),
					'Nombres' => trim($_POST['NOMBRES']),
					'PrimerApellido' => trim($_POST['PRIMER_APELLIDO']),
					'SegundoApellido' => trim($_POST['SEGUNDO_APELLIDO']),
					'Fecha' => trim($_POST['FECHA']),
					'Telefono' => trim($_POST['TELEFONO']),
					'Correo' => trim($_POST['CORREO']),
					'Cargo' => trim($_POST['CARGO'])
	            ];
	            if ($this->PersonaModel->ActualizarPersona($datos)){
	                header('location:' . URL_SISINV . 'Persona/ListadoPersona');
	            }else{
	                die('Algo salio mal');
	            }
	        }else{
	           	$ObtenerPersonasID = $this->PersonaModel->ObtenerPersonasID($idPersona);  
	            $datos =[
	                'idPersona' => $ObtenerPersonasID->Tbl_persona_ID,
	                'idTipoDocumento' => $ObtenerPersonasID->Tbl_tipodocumento_ID,
	                'idTipoCargo' => $ObtenerPersonasID->Tbl_cargo_ID,
	                'TipoDocumento' => $ObtenerPersonasID->Tbl_tipodocumento_NOMBRE,
					'NumDocumento' =>  $ObtenerPersonasID->Tbl_persona_NUMDOCUMENTO,
					'Nombres' => $ObtenerPersonasID->Tbl_persona_NOMBRES,
					'PrimerApellido' => $ObtenerPersonasID->Tbl_persona_PRIMERAPELLIDO,
					'SegundoApellido' => $ObtenerPersonasID->Tbl_persona_SEGUNDOAPELLIDO,
					'Fecha' => $ObtenerPersonasID->Tbl_persona_FECHANAC,
					'Telefono' => $ObtenerPersonasID->Tbl_persona_TELEFONO,
					'Correo' => $ObtenerPersonasID->Tbl_persona_CORREO,
					'Cargo' => $ObtenerPersonasID->Tbl_cargo_TIPO
	            ];	
				
	        }

	        $this->vista('advance/persona/EditarPersona', $datos);
    	}

    	public function EliminarPersona($idPersona){
			$ObtenerPersonasID = $this->PersonaModel->ObtenerPersonasID($idPersona);  
	        $datos = [
	        	'idPersona' => $ObtenerPersonasID->Tbl_persona_ID,
	            'TipoDocumento' => $ObtenerPersonasID->Tbl_tipodocumento_Tbl_tipodocumento_ID ,
				'NumDocumento' =>  $ObtenerPersonasID->Tbl_persona_NUMDOCUMENTO,
				'Nombres' => $ObtenerPersonasID->Tbl_persona_NOMBRES,
				'PrimerApellido' => $ObtenerPersonasID->Tbl_persona_PRIMERAPELLIDO,
				'SegundoApellido' => $ObtenerPersonasID->Tbl_persona_SEGUNDOAPELLIDO,
				'FechaNac' => $ObtenerPersonasID->Tbl_persona_FECHANAC,
				'Telefono' => $ObtenerPersonasID->Tbl_persona_TELEFONO,
				'Correo' => $ObtenerPersonasID->Tbl_persona_CORREO,
				'Cargo' => $ObtenerPersonasID->Tbl_cargo_Tbl_cargo_ID 
	       	];	
	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	            $datos = [
	                'idPersona' => $idPersona
	            ];
	            if ($this->PersonaModel->EliminarPersona($datos)) {
	                header('location:' . URL_SISINV . 'Persona/ListadoPersona');
	            }else{
	               die('Algo salio mal');
	            }
	        }
	        $this->vista('advance/persona/EliminarPersona', $datos);
    	}
	}

?>