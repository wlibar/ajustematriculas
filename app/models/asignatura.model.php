<?php

class Asignatura{
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Asignatura objects.
	*/
	
	
	public static function find($arr = array()){
		global $db;
		
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM asignaturas ORDER BY semestre, nombre");
		}
		else if($arr['id']){
			$st = $db->prepare("SELECT * FROM asignaturas WHERE codigo=:codigo");
			$st->bindParam(':codigo', $arr['codigo']);
		}
		else{
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Asignatura");
	}
	
}

?>