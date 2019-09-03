<?php

/**
*  Logica asociada a la adicion de asignaturas a la Matrícula de SIMCA
*/

class MatriculasController{

	/**
	* Decodifica la URL
	*/
	public function handleRequest(){
		
		switch ($_GET['action']) {
			case 'adicionasignaturas':
				$this->adicionAsignaturas();
				break;
			case 'grabar':
				$this->grabarMatricula();
				break;		
			case 'consultar':
				$this->consultarMatricula();
				break;			
			case 'consultarProcesar':
				$this->consultarMatriculaProcesar();
				break;
			case 'exportar':
				$this->exportarDatos();
				break;		
			case 'graficar':
				$this->graficarDatos();
				break;	
			default:
				echo "Error en la acción del controlador";
				return;
		}
		
		
	}

	public function graficarDatos(){
		$datos = MatriculaDetalle::calcularTotales();
		render('matriculas/grafica', array(
			'datos' => $datos
		));
	}
	
	public function exportarDatos(){
		
		$delimiter = ",";
	    $filename = "Solicitudes_" . date('Y-m-d') . ".csv";
	    
	    //create a file pointer
	    $f = fopen('php://output', 'w');
	    
	    //set column headers
	    $fields = array('Codigo', 'Nombres', 'Semestre', 'Cedula', 'Tipo', 
	    	'CodAsignaura','NomAsignatura','SemAsignatura','Programa','Grupo','Profesor',
	    	'Horario','Condicion','Observacion','Estado');
	    fputcsv($f, $fields, $delimiter);
	    
	    $m = Matricula::findTodosDatos();
	    //var_dump($m);
	    //output each row of the data, format line as csv and write to file pointer
	    for($i=0; $i < count($m); $i++){
	        $lineData = array($m[$i]->codigo, $m[$i]->nombre, $m[$i]->semestre,
	        	$m[$i]->cedula,$m[$i]->tipo,$m[$i]->cod_asignatura,
	        	$m[$i]->nom_asignatura, $m[$i]->asig_semestre, $m[$i]->programa,
	        	$m[$i]->grupo, $m[$i]->profesor,$m[$i]->horario,
	        	$m[$i]->condicion, $m[$i]->observacion,
	        	$m[$i]->estado);
	        fputcsv($f, $lineData, $delimiter);
	    }
	    
	    //move back to beginning of file
	    fseek($f, 0);
	    
	    //set headers to download file rather than displayed
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="' . $filename . '";');
	    
	    //output all remaining data on a file pointer
	    fpassthru($f);
	    fclose($f);
	    exit;
	    
	}


	/**
	* Carga el formulario de adición de asignaturas
	*/
	public function adicionAsignaturas(){
		$asignaturas = Asignatura::find();
		render('matriculas/adicionasignaturas', array(
			'asignaturas' => $asignaturas
		));

	}

	/**
	* Carga el formulario de consulta de asignaturas adicionadas
	*/
	public function consultarMatricula(){
		render('matriculas/consultamatricula', array(
			'matricula' => $matricula
		));

	}	
	/**
	* Procesa la consulta de asignaturas adicionadas
	*/
	public function consultarMatriculaProcesar(){
		$codigo = $_POST['inputCodigo'];
		$codigo = filter_var( $codigo, FILTER_SANITIZE_STRING); 
		$matricula = Matricula::find(array('codigo' => $codigo));
		$matricula_det = MatriculaDetalle::findDetalles($codigo);

		render('matriculas/consulta_matricula_resultado', array(
			'matricula' => $matricula,
			'matriculaDetalles' => $matricula_det
		));

	}		
	
	/**
	* graba los datos de la adicioin de materias
	* en la bd
	*/
	public function grabarMatricula(){

		//Datos del estudiante
		$codigo = $_POST['inputCodigo'];
		$codigo = filter_var( $codigo, FILTER_SANITIZE_STRING); 
		$nombre = $_POST['inputNombre'];
		$nombre = filter_var( $nombre, FILTER_SANITIZE_STRING); 
		$semestre = $_POST['selectSemestre'];
		$cedula = $_POST['inputCedula'];
		$cedula = filter_var( $cedula, FILTER_SANITIZE_STRING); 
		$tipo = $_POST['selectTipo'];

		$datos = $_POST['textareaDatos'];
		$datos = "[".$datos."]";

		$datos = json_decode($datos);
		$estampa = time();
		$url = $_SERVER["REQUEST_URI"];

		//Validar que no haya otra matricula grabada
		$res = Matricula::getMatricula(array('codigo' => $codigo));

		if($res){
			render('matriculas/mensaje', array('msg' => 'Error, ya existe una solicitud de adición de asignaturas en la fecha '.date('Y-m-d H:i:s',$res[0]->estampa), 'err' => 'Consulte con su coordinador de programa coordsistemas@unicauca.edu.co.' ));
			return;	
		}

		//Grabar el registro en la bd. Si lo agrega devuelve 1, de lo contrario, el error.
		$res = Matricula::save($codigo, $nombre, $semestre, $cedula, $tipo, $estampa, $url, $datos);

		if ($res == '1'){
			//Renderizar ventana
			render('matriculas/mensaje', array('msg' => 'Registro grabado con éxito. Se estará procesando su solicitud.', 'err' => ''));
			
		}else{
			render('matriculas/mensaje', array('msg' => 'Error al grabar registro', 'err' => $res ));
			

		}		
         
	}

}

?>