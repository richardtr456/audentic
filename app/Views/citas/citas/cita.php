<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <div class="container"><br>
        <h1 class="text-center">Citas Consulta </h1> <br><br>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
            Nuevo
        </button>
        <br><br>
        <a class="btn btn-light " href="ExcelPacientes.php" role="button">Export</a>
        <br><br>
        <table class="table table-striped" id="cita">
            <thead>
                <tr>
                    <th scope="col">#C</th>
                    <th scope="col" style="visibility:hidden;display:none;" >#U</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Descrpción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php include_once("ListaCitasConsulta.php"); ?>
                <?php foreach($citas as $cita) { ?>

                        <tr>
                            <td><?php echo $cita->id_cita; ?></td>
                            <td style="visibility:hidden;display:none;"><?php echo $cita->id_usuario; ?></td>
                            <td><?php echo $cita->DNI; ?></td>
                            <td><?php echo $cita->nombre_usu; ?></td>
                            <td><?php echo $cita->apellido_usu; ?></td>
                            <td><?php echo $cita->sexo; ?></td>
                            <td><?php echo $cita->telefono; ?></td>
                            <td><?php echo $cita->correo; ?></td>
                            <td><?php echo $cita->descripcion_cita; ?></td>
                            <td><?php echo $cita->fecha_ini; ?></td>
                            <td>
                                <button type="button" class="btn btn-link editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>
                            </td>
                            <td>
                                <form method="GET" action="<?php echo base_url('menu/citas/estado')?>">
                                    <input type="hidden" name="id" id="update_id" value="<?php echo $cita->id_cita; ?>">
                                    <input type="hidden" name="estado" value="<?php echo $cita->estado_cita; ?>">
                                    <input type="hidden" name="estado_cancel" value="0">
                                    <button type="submit" class="btn <?php echo $cita->btn; ?> btnes" > <?php echo $cita->estado_cita; ?> </button> <!--<a class="texto grado" onClick="enviar(this.innerHTML);"></a> -->
                                </form>    
                            </td>

                            <td>
                            <form method="GET" action="<?php echo base_url('menu/citas/estado')?>">
                                    <input type="hidden" name="id" id="update_id" value="<?php echo $cita->id_cita; ?>">
                                    <input type="hidden" name="estado" value="<?php echo $cita->estado_cita; ?>">
                                    <input type="hidden" name="estado_cancel" value="1">
                                    <button type="submit" class="btn btn-danger btnes" ><ion-icon name="trash-outline"></ion-icon></button> <!--<a class="texto grado" onClick="enviar(this.innerHTML);"></a> -->
                                </form>    
                            </td>                          

                        </tr>

                <?php }  ?>                
            </tbody>
        </table>
    </div>
    <br><br><br><br>

    <!-- Modal insertar nuevo registro-->
    <div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form action="RegistrarCita.php" method="POST" autocomplete="off">
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">DNI</label>
                            <input type="text" name="dni" class="form-control">
                        </div>
                        
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>
                        <br>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Sexo</label>
                            <select name="sexo" id="" class="form-control">
                                <option value="H">Masculino</option>
                                <option value="M">Femenino</option>                                
                            </select>
                        </div>
                        <br>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Correo</label>
                            <input type="text" name="correo" class="form-control">
                        </div>   
                        
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Descripción</label>
                            <input type="text" name="descripcion" class="form-control">
                        </div>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Fecha</label>
                            <input type="datetime-local" name="fecha_ini" class="form-control form-control-sm rounded-0" require> 
                        </div> 

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Registro</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal editar registro existente-->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Formulario de editar -->
                    <form action="EditarCita.php" method="POST" >
                        <input type="hidden" name="id" id="update_id">
                        <input type="hidden" name="id_usu" id="update_id_usu">

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control">
                        </div>
                        
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control">
                        </div>
                        <br>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="H">Masculino</option>
                                <option value="M">Femenino</option>                                
                            </select>
                        </div>
                        <br>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Teléfono</label>
                            <input type="text" name="telefono"  id="telefono" class="form-control">
                        </div>

                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Correo</label>
                            <input type="text" name="correo" id="correo" class="form-control">
                        </div>   
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                        </div>
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Hora</label>
                            <input type="time" name="hora" id="hora" class="form-control">
                        </div>    
                        <div class="form-group"> <!-- -------------------------------- -->
                            <label for="">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>               

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
    




    <!--<script type="text/javaScript">
        throw "Hola throw";
        console.log("ssera");
    </script> -->

    <!-- JAVA SCRIPT -->
    <script>
        $('.editbtn').on('click', function(){
            //console.log("hola");
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function(){
                return $(this).text();
            });

            $('#update_id').val(datos[0]);
            $('#update_id_usu').val(datos[1]);
            $('#dni').val(datos[2]);
            $('#nombre').val(datos[3]);
            $('#apellido').val(datos[4]);
            $('#sexo').val(datos[5]);
            $('#telefono').val(datos[6]);
            $('#correo').val(datos[7]);
            $('#descripcion').val(datos[8]);
            $('#hora').val(datos[9]);
            $('#fecha').val(datos[10]);
            
        });
        //console.log("hola afuera");
    </script>

<script>
        

	
        //function enviar(valor){
        //    console.log(valor);
        //    if(valor == 'pendiente'){
        //        ("#btn-color").removeClass("btn-success");
        //        ("#btn-color").addClass("btn-danger");
        //        //$(this).addClass('active');
        //        //$(this).removeClass('')
        //    }
        //    if(valor == 'confirmado'){
        //        (".btnes").removeClass("btn-danger");
        //        (".btnes").addClass("btn-success");
        //        //$(this).removeClass('active');
        //    }
        //}
        //$('.btnes').on('click',function(){
        //    $(this)
        //})
        //console.log("hola afuera");
</script>
<style>
    /*.btnes {
        background: #C70039!important;
        
    } 
    .btnes:active{
        
        background: #239B56!important;
    }*/
</style>


    
    
    
    <!-- DATA TABLES -->
        <!-- jQuery, Popper.js, Bootstrap JS 
        <script src="datatables_intro/jquery/jquery-3.3.1.min.js"></script>
        <script src="datatables_intro/popper/popper.min.js"></script>--><!-- Esto si deseas lo comentas o borras xq en el head toy llamando un popper también-->
        <!--<script src="datatables_intro/bootstrap/js/bootstrap.min.js"></script>-->
        
        <!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>    

<script type="text/javascript" src="main.js"></script> 
