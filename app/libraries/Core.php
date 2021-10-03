<?php
	defined('BASEPATH') or exit('No se permite acceso directo');
	/*
	Mapear la url ingresa en el navegador
	Ejemplo:
	www.app.com/controller/metodo/variables
	*/
	class Core {
		protected $controladorActual = 'Login';
		protected $metodoActual = 'index';
		protected $parametros = [];

		public function __construct(){
			$url = $this->getUrl();
			
			// Buscar en controladores si el archivo solicitado en la URL existe
			if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
				
				// Asignando al controlador actual el nuevo valor, una vez comprobada su existencia
				$this->controladorActual = ucwords($url[0]);
				
				// Liberar la variable
				unset($url[0]);

			}

			// Requerir el controlador
			require_once '../app/controllers/' . $this->controladorActual . '.php';
			$this->controladorActual = new $this->controladorActual;
			//var_dump($this->controladorActual);

			// Extraer el método 
			if(isset($url[1])) {
				if (method_exists($this->controladorActual, $url[1])) {
					$this->metodoActual = $url[1];
					unset($url[1]);
				}
			}

			//echo $this->metodoActual;
			$this->parametros = $url ? array_values($url) : [];

			// Llamar al callback del parametro
			call_user_func_array([$this->controladorActual,  $this->metodoActual], $this->parametros);

		}
		public function getUrl() {
			// echo $_GET['url'];
			if(isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}
