<?php

/* This controller renders the home page */

class HomeController{
	public function handleRequest(){

		if(!isset($_GET['action'])){
			$this->index();
			return;
		}
		//$this->$_GET['action'](); //no me funciono tuve que hacer switch
		switch ($_GET['action']) {
			case 'index':
				$this->index();
				break;
			default:
				echo "Error en la acción del controlador";
				return;
				break;
		}
		
	}

	public function index(){
		render('home/index');

	}
}

?>