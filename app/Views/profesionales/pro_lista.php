
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
						<h4 class="page-title">Profesionales</h4>
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
								<a href="#">Profesional</a>
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
								<div class="card-header">
									<div class="card-title">Lista de Profesionales</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
                                                    <p>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
                                                        Añadir Profesional
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
													<th scope="col">Nombres</th>
													<th scope="col">Curriculum</th>													
													<th scope="col">Telefono</th>
													<th scope="col">Acciones</th>
												</tr>
												</tr>
											</thead>
											
											<tbody>
												<?php if($profesionales): ?>
												<?php foreach($profesionales as $user): ?>
												<tr>
													<td><?php echo $user-> id_profesional; ?></td>
													<td><?php echo $user-> nombre; ?></td>
                                                    <!-- en el cv debe redireccionar a un enlace al pdf para ver su cv -->
													<td><?php echo $user-> cv; ?></td>
													<td><?php echo $user-> telefono?></td>
													<td>
                                                    <button type="button" class="editbtn btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                Editar
                                                    </button>
													<a href="#delete_<?php echo $user->id_profesional; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                                    
                                                    <!-- MODAL ELIMINAR -->
													<div class="modal fade" id="delete_<?php echo $user->id_profesional ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<center><h4 class="modal-title" id="myModalLabel">Borrar Profesional</h4></center>

																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body">	
																	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
																	<h2 class="text-center"><?php echo $user-> nombre; ?></h2>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
																	<a href="<?php echo base_url('/menu/profesionales/eliminar/'.$user->id_profesional);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Borrar</a>
																</div>

															</div>
														</div>
													</div>


													<!-- <a href="<?php echo base_url('/menu/usuarios/eliminar/'.$user->id_profesional);?>" class="btn btn-danger btn-sm">Eliminar</a> -->
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
					
				</div>
			</div>
		</div>
	</div>			
</div>


<!-- Modal insertar nuevo registro-->
<div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Profesional</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form id="add_create" action="<?php echo base_url('menu/profesionales/registrar')?>" method="POST" autocomplete="off">
                          <div class="form-group">
                            <label>Nombres</label>
                            <input type="text"  name="nombres" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>  
                          <div class="form-group">
                            <label>Telefono</label>
                            <input type="text"  name="telefono" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>  
                          <div class="form-group">
                            <label>CV</label>
                            <input type="text"  name="cv" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>   
                          <div class="form-group">
                            <label>CV</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Especialidad
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php foreach($especialidades as $especialidad): ?>
                                        <?php echo '<li><a class="dropdown-item" href="#">'.$especialidad->nombre_esp.'</a><button id=agregarespecialidad>+</button></li>';?> 
                                    <?php endforeach; ?>
                                </ul>
                            </div>         
                                <div class="mostrarmensaje"></div>
                          </div>   
                          <div class="form-group">
                              <div class="new_especialidades">

                              </div>
                          </div>
                                  

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir Profesional</button>
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
                <form action="<?php echo base_url('menu/profesionales/actualizar')?>" method="POST" >
                    <input type="hidden" name="id_profesional" id="update_id">
                     <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" >
                            <div class="mostrarmensaje"></div>
                    </div>  
                    <div class="form-group">
                            <label>CV</label>
                            <input type="text" id="cv" name="cv" class="form-control" >
                            <div class="mostrarmensaje"></div>
                    </div>   
                    <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" >
                            <div class="mostrarmensaje"></div>
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
            $('#nombres').val(datos[1]);
            $('#cv').val(datos[2]);
            $('#telefono').val(datos[3]);            
        });
        //console.log("hola afuera");
</script>

