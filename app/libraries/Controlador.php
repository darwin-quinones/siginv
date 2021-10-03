<?php
	defined('BASEPATH') or exit('No se permite acceso directo');
	/**
	 * clase controlador
	 */
	class Controlador {
		
		public function __construct() {

		}

		/**
		 * iniciamos el modelo
		 */
		public function modelo($modelo) {
			require_once '../app/models/' . $modelo . '.php';
			return new $modelo();
		}

		/**
		 * iniciamos una vista y enviamos parametros
		 */
		public function vista($vista, $datos = []) {
			if(file_exists('../app/views/' . $vista . '.php')) {
				require_once '../app/views/' . $vista . '.php';
			} else {
				require_once '../app/views/Error/Error404.php';
			}
		}
	}
