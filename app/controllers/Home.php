<?php 

	class Home extends Controlador{

		public function __construct(){

		}

		public function index(){ 
			if(isset($_SESSION['sesion_active'])):		
				$this->vista('home/index');
			else:
				$this->vista('login/index');
			endif;
		}

	}
?>