
<div class="row">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Consulta de adición de asignaturas</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h2>Período 2019.2</h2>
                    </div>
                    <?php  
                        if($matricula[0]){
                    ?>
		            <div class="form-group row">
		                <label for="inputCodigo" class="col-sm-2 col-form-label">Código</label>
		                <div class="col-sm-10">
		                    <input type="text" class="form-control"  readonly="readonly" value="<?= $matricula[0]->codigo ?>">
		                </div>
		            </div>

                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly="readonly" value="<?= $matricula[0]->nombre ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-2 col-form-label">Fecha Hora de la solicitud</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly="readonly" value="<?= date('Y-m-d H:i:s',$matricula[0]->estampa) ?>">
                        </div>
                    </div>       
                         
                    <!--TABLA DE ASIGNATURAS -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Cod.Asig</th>
                                <th scope="col">Nom.Asig</th>
                                <th scope="col">Programa</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Condición</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Observa</th>
                            </tr>
                        </thead>
                        <tbody id="tabla1">
                            <?php for($i=0; $i < count($matriculaDetalles); $i++) {?>
                            <tr>
                                <td>
                                    <?= $matriculaDetalles[$i]->cod_asignatura ?>
                                </td>
                                <td>
                                    <?= $matriculaDetalles[$i]->nombre ?>
                                </td>                                
                                <td>
                                    <?= $matriculaDetalles[$i]->programa ?>
                                </td> 
                                <td>
                                    <?= $matriculaDetalles[$i]->grupo ?>
                                </td>                                
                                <td>
                                    <?= $matriculaDetalles[$i]->profesor ?>
                                </td>                                  
                                <td>
                                    <?= $matriculaDetalles[$i]->horario ?>
                                </td>                                 
                                <td>
                                    <?= $matriculaDetalles[$i]->condicion ?>
                                </td>    
                                <td>
                                    <?= $matriculaDetalles[$i]->estado ?>
                                </td>                                                               
                                <td>
                                    <?= $matriculaDetalles[$i]->observacion ?>
                                </td>                                 
                            </tr>
                        <?php } ?>

                        </tbody>

                    </table>
                    <a href="index.php">Continuar</a>


                    <?php
                    }else{
                        echo "<p>Este código no tiene ninguna solicitud de adición de asignaturas</p>";
                        echo "<p><a href='index.php'>Continuar</a></p>";
                    }
                    ?>		            
			    </div>
			</div>
		</div>
    </div>
</div>