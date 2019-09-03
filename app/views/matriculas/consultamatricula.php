
<div class="row">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Consulta de adición de asignaturas</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h2>Período 2019.2</h2>
                    </div>
                    <p>
                    	Si ya tiene una solicitud de asignación de asignaturas, digite su código de estudiante
                    	y presione consultar.
                    </p>
			        <!-- FORMULARIO -->
			        <form method="post" action="index.php?ctrl=matriculas&action=consultarProcesar">
			            <h4>Datos del estudiante</h4>
			            <div class="form-group row">
			                <label for="inputCodigo"  class="col-sm-2 col-form-label">Código*</label>
			                <div class="col-sm-10">
			                    <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" placeholder="Código" required="required" minlength="5" maxlength="12" pattern="\d*" title="Sólo dígitos de tamaño entre 5 y 12">
			                </div>
			            </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Consultar</button>
                            </div>
                        </div>			            
			        </form> 
			    </div>
			</div>
		</div>
    </div>
</div>