<?php defined('BASEPATH') or exit('No se permite acceso directo');

	class Login extends Controlador {
		
		public function __construct(){
			$this->LoginModel = $this->modelo("LoginModel");
		}

		public function index(){
			$datos = [];
			$this->vista('login/index', $datos);
		}

		public function SignIn(){
			if (!isset($_SESSION['sesion_active'])):
				if ($_SERVER['REQUEST_METHOD'] == 'POST'): 
					$username = trim($_POST['USERNAME']);
					$password = trim($_POST['PASSWORD']);
					$resulset = $this->LoginModel->Autenticacion($username);
					if (isset($resulset)):
						if(password_verify($password, $resulset->PASSWORD)):
							$datos = [
								'cod' => $resulset->IDPERSONA,
								'username' => $resulset->Tbl_usuario_USERNAME,
								'tipo_usuario' => $resulset->CARGO,
								'nombre' => $resulset->Tbl_persona_NOMBRES,
								'numero_documento' => $resulset->Tbl_persona_NUMDOCUMENTO,
								'p_apellido' => $resulset->Tbl_persona_PRIMERAPELLIDO,
								's_apellido' => $resulset->Tbl_persona_SEGUNDOAPELLIDO,
								'correo' => $resulset->Tbl_persona_CORREO,
								'tipo_documento' => $resulset->TIPO_DOCUMENTO,
								'estado' => $resulset->Tbl_usuario_ESTADO
							];
							$_SESSION['sesion_active'] = $datos;
							$this->vista('home/index',$_SESSION['sesion_active']);
						else:
							$this->vista('login/index', ['message' => 'LA CONTRASEÑA QUE INGRESO ES INCORRECTA']);
						endif;
					endif;
				endif;	
			else:
				$this->vista('home/index');
			endif;					
		}

		public function Logout(){
			unset($_SESSION['sesion_active']);
			$this->vista('login/index');
		}
	
	}