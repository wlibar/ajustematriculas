<!-- Formato adición de asignaturas -->

<div class="row">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Adición de asignaturas</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <?php global $globalPeriodo ?>
                        <h2>Solicitud de Adición de Asignaturas período <?= $globalPeriodo ?></h2>
                    </div>
                    <p>
                        Acuerdo No. 055 de 1991, Literal 15. Un estudiante podrá cancelar o adicionar asignaturas, rotaciones o seminarios, previo estudio del Secretario Académico, durante los plazos acordados para ello por la respectiva Facultad
                    </p>
                    <p>
                        El estudiante podrá cursar asignaturas adicionales que no figuren en el Plan de Estudios en el cual se encuentra matriculado, que sean ofrecidas por los diferentes programas de la Universidad, siempre y cuando haya cupo y no exceda en más de una (1) al
                        número de asignaturas para cada período Acuerdo No. 055 de 1991, Literal 11.
                    </p>

                    <p>
                        Si ya hiciste una solicitud, puedes consultarla <a href="index.php?ctrl=matriculas&action=consultar">aquí.</a>
                    </p>
                    <p>
                        Si desea descargar en CSV todos los datos haga clic <a href="index.php?ctrl=matriculas&action=exportar">aquí.</a>
                    </p>      
                    <p>
                        Si desea ver la gráfica de los datos haga clic <a href="index.php?ctrl=matriculas&action=graficar">aquí.</a>
                    </p>        
                    <?php global $globalAdicionAsignaturas;  if (!$globalAdicionAsignaturas) { ?>
                        <div class="alert alert-warning">
                        <p>Lo siento el formulario para adición de adición de asignaturas no está habilitado por el coordinador
                        de programa.
                        </p>
                        </div>
                    <?php } else { ?>
                    <!-- FORMULARIO -->
                    <form method="post" action="index.php?ctrl=matriculas&action=grabar" onsubmit="return comprobarFormulario();">
                        <h4>Datos del estudiante</h4>
                        <div class="form-group row">
                            <label for="inputCodigo" class="col-sm-2 col-form-label">Código*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" placeholder="Código" required="required" minlength="5" maxlength="12" pattern="\d*" title="Sólo dígitos de tamaño entre 5 y 12">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputNombre" class="col-sm-2 col-form-label">Nombres*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Nombres y apellidos completos" required="required" pattern="[A-Za-z ]{5,50}" title="Sólo letras y espacios, entre 5 y 50 caracteres">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPrograma" class="col-sm-2 col-form-label">Programa*</label>
                            <div class="col-sm-10">
                                <?php global $globalPrograma; ?>
                                <input type="text" class="form-control" id="inputPrograma" name="inputPrograma" value="<?= $globalPrograma;?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputFacultad" class="col-sm-2 col-form-label">Facultad*</label>
                            <div class="col-sm-10">
                                <?php global $globalFacultad; ?>
                                <input type="text" class="form-control" id="inputFacultad" name="inputFacultad" value="<?= $globalFacultad;?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selectSemestre" class="col-sm-2 col-form-label">Semestre*</label>
                            <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="selectSemestre" name="selectSemestre">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>                                
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputCedula" class="col-sm-2 col-form-label">Cédula*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCedula" name="inputCedula" required="required" minlength="5" maxlength="15" pattern="\d*" title="Sólo dígitos de tamaño entre 5 y 15">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selectTipo" class="col-sm-2 col-form-label">Tipo*</label>
                            <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="selectTipo" name="selectTipo">
                                <option value="NOR">Normal</option>
                                <option value="PP">Ser pilo paga</option>
                                <option value="REGSQ">Regionalización Santander de Quilichao</option>
                                <option value="REGSU">Regionalización Sur</option>
                                <option value="REING">Reingreso</option>
                            </select>
                            </div>
                        </div>

                        <hr>


                        <!-- TABLA DE ASIGNATURAS -->
                        <h4>Datos de las asignaturas</h4>
                        <div class="form-group row">
                            <label for="selectAsignatura" class="col-sm-2 col-form-label">Asignatura*</label>
                            <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="selectAsignatura">
                                    <?php 
                                    for ($i=0; $i<count($asignaturas); $i++){
                                        echo "<option value=".$asignaturas[$i]->codigo.">".$asignaturas[$i]->semestre.". ".$asignaturas[$i]->nombre."</option>";
                                    }
                                    ?>                                
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputProgramaAsignatura" class="col-sm-2 col-form-label">Programa*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputProgramaAsignatura" value="Ingeniería de Sistemas" placeholder="Ej. Ingeniería de Sistemas, Ingeniería Civil, etc.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputGrupo" class="col-sm-2 col-form-label">Grupo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputGrupo" placeholder="Ej: A, B..." minlength="1" maxlength="3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputProfesor" class="col-sm-2 col-form-label">Nombre Profesor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputProfesor" placeholder="Ej. Julio Hurtado">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputHorario" class="col-sm-2 col-form-label">Horario*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputHorario" placeholder="Ej. Martes y Jueves 9-11 am." maxlength="50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selectCondicion" class="col-sm-2 col-form-label">Condición*</label>
                            <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="selectCondicion">
                                <option value="R0">Primera vez (R0)</option>
                                <option value="R1">Repetida por primera vez (R1)</option>
                                <option value="R2">Repetida por segunda vez (R2)</option>
                                <option value="R3">Repetida por tercera vez (R3)</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputObservacion" class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="inputObservacion" placeholder="Ejs. La llevo atrasada dos semestres, necesito adelantar, es la última que me falta por ver,  etc."> </input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-secondary" onclick="agregar()" title="Agregar asignatura">Agregar asignatura</button>
                            </div>
                        </div>

                        <div>
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
                                        <th scope="col">Observa</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla1">

                                </tbody>
                                <textarea id="textareaDatos" name="textareaDatos" hidden="hidden"></textarea>
                            </table>


                            <div class="form-group row">
                                <div class="col-sm-10">

                                    <button type="submit" class="btn btn-primary" title="Grabar cambios y enviar solicitud"></span> Grabar</button>
                                </div>
                            </div>
                    </form>
                    <?php } ?>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script type="text/javascript">

        /**
        * Comprueba que al menos haya una materia seleccionada
        */
        function comprobarFormulario(formulario) 
        {
            var tot = document.getElementById("tabla1").rows.length;

            if(!tot){
                tot = 0;
            }
            if (tot == 0){
                alert('Debe agregar al menos una asignatura');
                return false;
            }
            return true;
            

        }  
       
        // Agrega un nuevo item
        function agregar() {

            // Recoger variables

            var asignaturaItem = document.getElementById("selectAsignatura");

            var programaItem = document.getElementById("inputProgramaAsignatura");
            var grupoItem = document.getElementById("inputGrupo");
            var profesor = document.getElementById("inputProfesor").value;
            var horarioItem = document.getElementById("inputHorario");

            var condicionItem = document.getElementById("selectCondicion");
            var condicion = condicionItem.options[condicionItem.selectedIndex].value;


            var codAsignatura = asignaturaItem.options[asignaturaItem.selectedIndex].value;
            var nomAsignatura = asignaturaItem.options[asignaturaItem.selectedIndex].text;

            var observacion = document.getElementById("inputObservacion").value;
            nodoTabla = document.getElementById("tabla1");

            //Validaciones
            if (!programaItem.value) {
                alert('Digite el programa');
                programaItem.focus();
                return false;
            }
            if (!grupoItem.value) {
                alert('Digite el grupo');
                grupoItem.focus();
                return false;
            }

            if (!horarioItem.value) {
                alert('Digite el horario');
                horarioItem.focus();
                return false;
            }            

            if (estaRepetida(codAsignatura)){
                alert('La asignatura ya está agregada. Elija otra');
                return;
            }

            


            // Agregar nodos
            nodoFila = document.createElement("tr");
            nodoTabla.appendChild(nodoFila);
            ///
            nodoCelda = document.createElement("th");
            nodoCelda.setAttribute("scope", "row");
            nodoFila.appendChild(nodoCelda);
            nodoCelda.appendChild(document.createTextNode(codAsignatura));
            ///
            nodoCelda2 = document.createElement("td");
            nodoFila.appendChild(nodoCelda2);
            nodoCelda2.appendChild(document.createTextNode(nomAsignatura));
            ///
            nodoCelda3 = document.createElement("td");
            nodoFila.appendChild(nodoCelda3);
            nodoCelda3.appendChild(document.createTextNode(programaItem.value));
            ///
            nodoCelda4 = document.createElement("td");
            nodoFila.appendChild(nodoCelda4);
            nodoCelda4.appendChild(document.createTextNode(grupoItem.value));

            nodoCelda5 = document.createElement("td");
            nodoFila.appendChild(nodoCelda5);
            nodoCelda5.appendChild(document.createTextNode(profesor));
            ///
            nodoCelda6 = document.createElement("td");
            nodoFila.appendChild(nodoCelda6);
            nodoCelda6.appendChild(document.createTextNode(horarioItem.value));

            nodoCelda7 = document.createElement("td");
            nodoFila.appendChild(nodoCelda7);
            nodoCelda7.appendChild(document.createTextNode(condicion));

            nodoCelda8 = document.createElement("td");
            nodoFila.appendChild(nodoCelda8);
            nodoCelda8.appendChild(document.createTextNode(observacion));


            nodoCelda9 = document.createElement("td");
            nodoFila.appendChild(nodoCelda9);
            nodoCelda9.appendChild(document.createTextNode(""));

            var btn = document.createElement("button");
            btn.setAttribute("class", "btn btn-primary");
            var txt = document.createTextNode("Eliminar");
            btn.appendChild(txt);

            nodoCelda9.appendChild(btn);
            btn.onclick = function() {
                eliminar(this.parentNode.parentNode.rowIndex);
            };
            crearJson();
        }

        function crearJson(){
            //Crear el Json
            var datosItem = document.getElementById("textareaDatos");
            //Limpiar la caja
            datosItem.value='';

            //Recorrerse la tabla y armar el json

            var tot = document.getElementById("tabla1").rows.length;

            if(!tot){
                tot = 0;
            }
            
            for(i=0; i<tot; i++){ // i recorre filas
                var fila = document.getElementById("tabla1").rows[i].cells
                var codAsignatura =fila[0].innerHTML;
                var nomAsignatura =fila[1].innerHTML;
                var programa =fila[2].innerHTML;
                var grupo =fila[3].innerHTML;
                var profesor =fila[4].innerHTML;
                var horario =fila[5].innerHTML;
                var condicion =fila[6].innerHTML;
                var observacion =fila[7].innerHTML;

                var myJSON = { "codigo": codAsignatura, "nombre": nomAsignatura, "programa": programa, "grupo": grupo, 
                "profesor": profesor, "horario": horario, "condicion": condicion, "observacion": observacion };

                var myString = JSON.stringify(myJSON);
                var separador = '';
                if (!datosItem.value == ''){
                    separador = ',';
                }
                datosItem.value = datosItem.value + separador + myString;

            }

        }

        // Valida que la asignatura no esté repetida.
        function estaRepetida(codigo){
            var tot = document.getElementById("tabla1").rows.length;

            if(!tot){
                tot = 0;
            }
            

            for(i=0; i<tot; i++){
                var fila = document.getElementById("tabla1").rows[i].cells
                var col0 =fila[0].innerHTML;
                if (col0 === codigo){
                    return true;
                }

            }
            return false;
        }
           

        // Elimina una fila
        function eliminar(i) {
            document.getElementsByTagName("table")[0].setAttribute("id", "tableid");
            document.getElementById("tableid").deleteRow(i);
            crearJson();
        }



        function justNumbers(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;
            return /\d/.test(String.fromCharCode(keynum));
        }
    </script>