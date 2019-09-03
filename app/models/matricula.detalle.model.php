<?php

class MatriculaDetalle{

	public static function findDetalles($codigo){
		global $db;
		
		if($codigo){
			$st = $db->prepare("SELECT md.cod_asignatura, a.nombre, programa, grupo, profesor, horario, condicion, observacion, md.estado   FROM matriculas_detalle md, asignaturas a WHERE md.codigo=:codigo and md.cod_asignatura = a.codigo");
			$st->bindParam(':codigo', $codigo);
		}
		else{
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "MatriculaDetalle");
	}
	public static function calcularTotales(){
		global $db;
		$sql = "SELECT cod_asignatura, a.nombre, count(*) as total FROM matriculas_detalle md, asignaturas a  WHERE md.cod_asignatura = a.codigo GROUP BY cod_asignatura, a.nombre ORDER BY total DESC";
		$st = $db->prepare($sql);
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "MatriculaDetalle");		
	}
	
}

?>