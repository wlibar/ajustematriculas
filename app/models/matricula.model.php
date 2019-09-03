<?php

class Matricula{
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Category objects.
	*/
	
	public static function findTodosDatos(){
		global $db;
		

		$st = $db->prepare("SELECT m.codigo, m.nombre, m.semestre, m.cedula, m.tipo, 
			md.cod_asignatura, a.nombre as nom_asignatura, a.semestre as asig_semestre, md.programa, md.grupo, md.profesor, 
			md.horario, md.condicion, md.observacion, md.estado 
			FROM matriculas m, matriculas_detalle md, asignaturas a 
			WHERE m.codigo = md.codigo AND md.cod_asignatura=a.codigo
			ORDER BY m.codigo, a.semestre, a.nombre");
		$st->execute($arr);
		
		// Returns an array
		return $st->fetchAll(PDO::FETCH_CLASS, "Matricula");
	}

	public static function find($arr = array()){
		global $db;
		
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM matriculas");
		}
		else if($arr['codigo']){
			$st = $db->prepare("SELECT * FROM matriculas WHERE codigo=:codigo");
			$st->bindParam(':codigo', $arr['codigo']);
		}
		else{
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Matricula");
	}
	

	public static function getMatricula($arr = array()){
		global $db;
		
		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM matriculas");
		}
		else if($arr['codigo']){
			$st = $db->prepare("SELECT * FROM matriculas WHERE codigo=:codigo");
			$st->bindParam(':codigo', $arr['codigo']);
		}
		else{
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Matricula");
		
	}
	/**
	* Graba la matricula en las dos tablas: matriculas, matriculas_detalle
	*/
	public static function save($codigo, $nombre, $semestre, $cedula, $tipo, $estampa, $url, $datos){
		
		global $db;


		try {  
		  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  $db->beginTransaction();
		  $consulta = "INSERT INTO matriculas(codigo, nombre, semestre, cedula, tipo, estampa, url) VALUES 
			('$codigo', '$nombre', '$semestre', '$cedula', '$tipo','$estampa','$url')";

		  $db->exec($consulta);
		  

		  foreach($datos as $key=>$value){
		  	$consulta = "INSERT INTO matriculas_detalle(codigo, cod_asignatura, programa, grupo, profesor, horario, condicion, observacion) VALUES 
				('$codigo','$value->codigo', '$value->programa', '$value->grupo', '$value->profesor', '$value->horario',
				'$value->condicion','$value->observacion')";
		  	$db->exec($consulta);
		  }
		  
		  
		  $db->commit();
		  
		} catch (Exception $e) {
		  $db->rollBack();
		  return $e;
		}				
		return "1";
	}
	
	
}

?>