<?php

/* These are helper functions */

// This function takes the name of a template and
// a list of variables, and renders it.
function render($template,$vars = array()){	
	
	// This will create variables from the array:
	extract($vars);
	//include "app/views/template.php"
	$vista = "app/views/$template.php"; 
	include "app/views/template.php";
}

// Helper que formatea el titulo
function formatTitle($title = ''){
	if($title){
		$title.= ' | ';
	}
	
	$title .= $GLOBALS['defaultTitle'];
	
	return $title;
}

?>