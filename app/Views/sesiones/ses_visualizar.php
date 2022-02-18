
<!-- COMO PLANTILLA OJITO -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


<style>
    .container {
      max-width: 500px;
    }
    .is-invalid {
      display: block;
      padding-top: 5px;
      font-size: 14px !important;
      color: red !important;
	  font-weight: 400 !important;
    }
    input.error {
    border: 1px solid red;
    font-weight: 300;
    color: red;
    }    
</style>
<script src="<?php echo base_url('public/js/core/jquery-3.6.0.min.js')?>" ></script>

<div class="content">
	<!-- <?php echo session('usuario')?> -->
	<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Sesiones</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Sesiones</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Visualizar</a>
							</li>
						</ul>
					</div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                                    
                                    <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                <?php if($tratamiento) :?>
                                                                    <h4 class="card-title">Tratamiento #<?php echo $tratamiento[0]->id_tratamiento; ?></h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-5 col-md-4">
                                                                            <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Detalles del Tratamiento</a>
                                                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Detalles del Paciente</a>
                                                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Detalles del Odontólogo</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-7 col-md-8">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                                <dl class="row">
                                                                                    <dt class="col-sm-3">Servicio:</dt>
                                                                                    <dd class="col-sm-9"> <?php echo $tratamiento[0]->nombre_servicio;?></dd>

                                                                                    <dt class="col-sm-3">Descripcion : </dt>
                                                                                    <dd class="col-sm-9">
                                                                                        <?php echo $tratamiento[0]->descripcion_trata;?>
                                                                                    </dd> 
                                                                                </dl>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                                    <dl class="row">
                                                                                        <dt class="col-sm-3"> Paciente:</dt>
                                                                                        <dd class="col-sm-9"> <?php echo $tratamiento[0]->nombre_usuario;?></dd>

                                                                                        <dt class="col-sm-3">DNI: </dt>
                                                                                        <dd class="col-sm-9">
                                                                                            <?php echo $tratamiento[0]->DNI;?>  
                                                                                        </dd> 
                                                                                    </dl>                                      
                                                                                    
                                                                                </div>
                                                                                <div class="tab-pane fade active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                                    <dl class="row">
                                                                                        <dt class="col-sm-3"> Odontólogo:</dt>
                                                                                        <dd class="col-sm-9">  <?php echo $tratamiento[0]->nombre;?> </dd>
                                                                                    </dl>
                                                                                
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endif;?>                                              
                                                        </div>
                                                    </div>
                                        <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                                            <li class="nav-item submenu">
                                                <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Sesiones</a>
                                            </li>
                                            <li class="nav-item submenu">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pagos</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
                                                                Añadir Sesión
                                                            </button>      
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">                            
                                                        <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table  class="display table table-striped table-hover" id="users-list">
                                                                <thead>
                                                                    <tr>
                                                                    <tr>
                                                                        <th scope="col">Id</th>
                                                                        <th scope="col">Sesion</th>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Deuda</th>
                                                                        <th scope="col">Costo</th>		
                                                                        <th scope="col">Cobrado</th>
                                                                        <th scope="col">Acciones</th>
                                                                    </tr>
                                                                    </tr>
                                                                </thead>
                                                                
                                                                <tbody>
                                                                    <?php if($sesiones): ?>
                                                                    <?php foreach($sesiones as $user): ?>
                                                                    <tr>
                                                                        <td><?php echo $user-> id_sesion; ?></td>
                                                                        <td><?php echo $user-> nombre_se?></td>
                                                                        <td><?php echo $user-> fecha?></td>
                                                                        <td><?php echo $user-> deuda?></td>
                                                                        <td><?php echo $user-> costo?></td>
                                                                        <td><?php echo $user-> cobrado?></td>
                                                                        <td>
                                                                        <button type="button" class="editbtn btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                                    Editar
                                                                        </button>
                                                                        <a href="#delete_<?php echo $user->id_sesion; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                                                        
                                                                        <!-- MODAL ELIMINAR -->
                                                                        <div class="modal fade" id="delete_<?php echo $user->id_sesion ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <center><h4 class="modal-title" id="myModalLabel">Borrar Sesión</h4></center>

                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">	
                                                                                        <p class="text-center">¿Esta seguro de Borrar la sesion ?</p>
                                                                                        <h2 class="text-center"><?php echo $user-> nombre_se; ?></h2> <p class="text-center">del tratamiento</p> <h2 class="text-center"><?php echo $tratamiento[0]->descripcion_trata;?>  </h2>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                                                                        <a href="<?php echo base_url('/menu/sesiones/eliminar/'.$user->id_sesion);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Borrar</a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <!-- <a href="<?php echo base_url('/menu/sesiones/eliminar/'.$user->id_sesion);?>" class="btn btn-danger btn-sm">Eliminar</a> -->
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p>
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertarpago">
                                                                            Añadir Pago
                                                                        </button>      
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">                            
                                                                    <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table  class="display table table-striped table-hover" id="users-list">
                                                                            <thead>
                                                                                <tr>
                                                                                <tr>
                                                                                    <th scope="col">Id</th>
                                                                                    <th scope="col">Sesion</th>
                                                                                    <th scope="col">Tratamiento</th>
                                                                                    <th scope="col">Cuota</th>
                                                                                    <th scope="col">Fecha</th>		
                                                                                    <th scope="col">Tipo de pago</th>
                                                                                    <th scope="col">Acciones</th>
                                                                                </tr>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                                <?php if($pagos): ?>
                                                                                <?php foreach($pagos as $user): ?>
                                                                                <tr>
                                                                                    <td><?php echo $user-> id_pago; ?></td>
                                                                                    <td><?php echo $user-> nombre_se?></td>
                                                                                    <td><?php echo $user-> descripcion_trata?></td>
                                                                                    <td><?php echo $user-> cuota?></td>
                                                                                    <td><?php echo $user-> fecha_pago?></td>
                                                                                    <td><?php echo $user-> nombre_pago?></td>
                                                                                    <td>
                                                                                    <button type="button" class="editbtn btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                                                Editar
                                                                                    </button>
                                                                                    <a href="#borrar_<?php echo $user->id_pago; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                                                                    
                                                                                    <!-- MODAL ELIMINAR -->
                                                                                    <div class="modal fade" id="borrar_<?php echo $user->id_pago ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <center><h4 class="modal-title" id="myModalLabel">Borrar Sesión</h4></center>

                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                                </div>
                                                                                                <div class="modal-body">	
                                                                                                    <p class="text-center">¿Esta seguro de Borrar la sesion ?</p>
                                                                                                    <h2 class="text-center"><?php echo $user-> nombre_se; ?></h2> <p class="text-center">del tratamiento</p> <h2 class="text-center"><?php echo $tratamiento[0]->descripcion_trata;?>  </h2>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                                                                                    <a href="<?php echo base_url('/menu/sesiones/eliminarpago/'.$user->id_pago);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Borrar</a>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <!-- <a href="<?php echo base_url('/menu/sesiones/eliminar/'.$user->id_pago);?>" class="btn btn-danger btn-sm">Eliminar</a> -->
                                                                                    </td>
                                                                                </tr>
                                                                                <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    <!-- Contenido de pagos  -->
                                                    
                                                        <?php if($pagos):?>
                                                                <?php foreach($pagos as $pago):?>
                                                                    <?php echo $pago->fecha_pago?>
                                                                <?php endforeach;?>

                                                        <?php endif;?>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>			
                                
                            </div>
                    </div>
                </div>			
            </div>

<!-- SESIONES -->
<!-- Modal insertar nuevo registro-->
<div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Sesión</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form id="add_create" action="<?php echo base_url('menu/sesiones/registrar')?>" method="POST" autocomplete="off">
                        <input type="hidden" name="id_tratamiento" value="<?php echo $tratamiento[0]->id_tratamiento;?>">
                          <div class="form-group">
                            <label>Sesion</label><br>                            
                                <input class="form-control" type="text" name="sesion">
                                <div class="mostrarmensaje"></div>
                          </div>     
                          <div class="form-group">
                            <label>Fecha y Hora</label><br>                            
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fecha" required="">
                                <div class="mostrarmensaje"></div>
                          </div>    
                          <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                <div class="mostrarmensaje"></div>    
                          </div>      
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">S/.</span>
                                </div>
                                <input name="costo" placeholder="Costo" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                                  

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir Sesión</button>
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
                <!--Formulario de registro de nuevo paciente -->
                <form action="<?php echo base_url('menu/sesiones/actualizar')?>" method="POST" >
                <input type="hidden" name="id_tratamiento" value="<?php echo $tratamiento[0]->id_tratamiento;?>">

                    <input type="hidden" name="id_sesion" id="update_id">
                    <div class="form-group">
                            <label>Sesion</label><br>                            
                                <input id="sesion" class="form-control" type="text" name="sesion">
                                <div class="mostrarmensaje"></div>
                          </div>     
                          <div class="form-group">
                            <label>Fecha y Hora</label><br>                            
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fecha" id="fecha" required="">
                                <div class="mostrarmensaje"></div>
                          </div>    
                          <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" rows="3"></textarea>
                                <div class="mostrarmensaje"></div>    
                          </div>      
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">S/.</span>
                                </div>
                                <input id="costo" name="costo" placeholder="Costo" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
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



<!-- PAGOS -->

<div class="modal fade" id="insertarpago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Pago</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form id="add_create" action="<?php echo base_url('menu/sesiones/registrarpago')?>" method="POST" autocomplete="off">
                        <input type="hidden" name="id_tratamiento" value="<?php echo $tratamiento[0]->id_tratamiento;?>">
                          <div class="form-group">
                            <label>Sesión</label><br>                            
                            <select name="pa_sesion"  class="form-select form-control" aria-label="Default select example">
                                <option disabled selected>Seleccione la sesión</option>
                                <?php foreach($sesiones as $sesion): ?>
                                    <?php echo '<option attribute="'.$sesion->nombre_se.'" value="'.$sesion->id_sesion.'">'.$sesion->nombre_se.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>  
                          <div class="form-group">
                            <label>Tipo de pago</label><br>                            
                            <select name="pa_pago"  class="form-select form-control" aria-label="Default select example">
                                <option disabled selected>Seleccione el tipo de pago</option>
                                <?php foreach($tipopagos as $tipopago): ?>
                                    <?php echo '<option attribute="'.$tipopago->nombre_pago.'" value="'.$tipopago->id_tipoPago.'">'.$tipopago->nombre_pago.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>       
                          <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input name="pa_cuota" placeholder="Cuota" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>  
                          <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                <div class="mostrarmensaje"></div>    
                          </div>      
                       
                                  

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir Pago</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
</div>


<script src="<?php echo base_url('public/js/pro_lista.js');?>"></script>

 <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="<?php echo base_url('public/js/plugin/jquery.validate/jquery.validate.js');?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()


            if ($("#add_create").length > 0) {
            $("#add_create").validate({
                rules: {
                nombres: {
                    required: true,
                },
                telefono: {
                    required: true,
                },
                cv:{
                    required:true,
                }
                },
                messages: {
                    
                nombres: {
                    required: "Se requiere el nombre",
                },
                telefono: {
                    required: "Se requiere el numero de telefono",
                },
                cv:{
                    required:"Se necesita el pdf",
                }                
                },
            })
          }
  </script>
  
  

<!-- script para alertas -->
<script src="<?php echo base_url('public/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

<script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            Swal.fire(':D','Agregado con exito!','success');
        } else if (mensaje == '0'){
            Swal.fire(':(','Fallo al agregar!','error');
        } else if (mensaje == '2'){
            Swal.fire(':D','Actualizado con exito!','success');
        } else if (mensaje == '3'){
            Swal.fire(':(','Fallo al Actualizar!','error');
        } else if (mensaje == '4'){
            Swal.fire(':D','Eliminado con exito!','success');
        } else if (mensaje == '5'){
            Swal.fire(':(','Fallo al eliminar!','error');
        }
</script>

<script>
        $('.editbtn').on('click', function(){
            //console.log("hola");
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function(){
                return $(this).text();
            });
            $('#update_id').val(datos[0]);
            // $('#servicio').val(datos[1]);
            // console.log($tr.children("td")[1].childNodes[0].value); 
            $('#sesion').val(datos[1]);
            $('#fecha').val(datos[2]);
            $('#costo').val(datos[4]);
        });
        $(function () {
    $(document).on('click', '.restar-especialidad', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        });
    });
        //console.log("hola afuera");
</script>
<script>
    
//esta funcion es para añadir
function edmostrar() {
  speciality = document.getElementById("select-edit-especialidad");
  //   console.log(speciality.value);
  //   console.log(speciality.selectedOptions[0].innerText);
  let bandera = edverificar(parseInt(speciality.value));
  if (bandera) {
    let registro =
      '<tr><th  value="' +
      speciality.value +
      '" scope="row">' +
      speciality.selectedOptions[0].innerText +
      "</th>" +
      '<input type="hidden" name="pro_ed_especialidad[]" value="' +
      speciality.value +
      '">' +
      "<td><button type='button' class=" +
      '"restar-especialidad"' +
      ">-</button></td></tr>";

    $("#edit-especialidades").append(registro);
  } else {
    console.log("YA EXISTE");
  }
}

function edverificar(nuevovalor) {
  const tabla = document.getElementById("edit-especialidades").children;
  let arreglo = [];
  for (let i = 0; i < tabla.length; i++) {
    const element = parseInt(tabla[i].childNodes[0].attributes[0].value);
    console.log(element);
    arreglo.push(element);
    // console.log(element.childNodes[0].attributes);
  }
  if (arreglo.length > 0) {
    let valor = arreglo.filter((numero) => numero == nuevovalor);
    console.log(valor);
    if (valor.length == 0) {
      console.log("noexistey lo agrego");
      return true;
    } else {
      return false;
    }
  } else {
    return true;
  }
  //   console.log(tabla[0].childNodes[0]);
}
</script>

