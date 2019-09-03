<?php

/*
	This is the index file of our simple website.
	It routes requets to the appropriate controllers
*/

//echo "Hola";

require_once "core/main.php";


try {

	if(empty($_GET)){

		$c = new HomeController();
		
	}
	else 
	{
		switch ($_GET['ctrl']) {
			case 'home':
				$c = new HomeController();
				break;
			case 'matriculas':
				$c = new MatriculasController();
				break;					
			default:
				throw new Exception('Error en el controlador');

				break;
		}
	}

	$c->handleRequest();
	
}
catch(Exception $e) {
	// Visualiza la página de error usando el helper "render()"
	//render('error',array('message'=>$e->getMessage()));
	echo "Error: " . $e->getMessage();
}

?>