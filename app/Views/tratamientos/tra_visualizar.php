
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
						<h4 class="page-title">Tratamientos</h4>
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
								<a href="#">Tratamientos</a>
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
									<div class="card-title">Lista de Tratamientos</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
                                                    <p>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
                                                        Añadir Tratamiento
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
													<th scope="col">Servicio</th>
													<th scope="col">Usuario</th>
                                                    <th scope="col">DNI</th>		
                                                    <th scope="col">Profesional</th>												
													<th scope="col">Costo inicial</th>                                                    
                                                    <th scope="col">Descripcion</th>
													<th scope="col">Tiempo</th>
													<th scope="col">Acciones</th>
												</tr>
												</tr>
											</thead>
											
											<tbody>
												<?php if($tratamientos): ?>
												<?php foreach($tratamientos as $user): ?>
												<tr>
													<td><?php echo $user-> id_tratamiento; ?></td>
													<td><input type="hidden" id="id_servicio" value="<?php echo $user->id_servicio?>" name="id_servicio"> <?php echo $user-> nombre_servicio; ?></td>
                                                    <!-- en el cv debe redireccionar a un enlace al pdf para ver su cv -->
													<td><input type="hidden" id="id_usuario" value="<?php echo $user->id_usuario?>" name="id_usuario"><?php echo $user-> nombre_usuario; ?></td>
													<td><?php echo $user-> DNI; ?></td>
													<td><input type="hidden" id="id_profesional" value="<?php echo $user->id_profesional?>" name="id_profesional"><?php echo $user-> nombre?></td>
                                                    <td><?php echo $user-> costo_inicial?></td>
													<td><?php echo $user-> descripcion_trata?></td>
													<td><?php echo $user-> tiempo?></td>
                                                    
													<td>
                                                    <a href="<?php echo base_url('/menu/sesiones/cargar/'.$user->id_tratamiento)?>">Sesiones</a>
                                                    <button type="button" class="editbtn btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                Editar
                                                    </button>
													<a href="#delete_<?php echo $user->id_tratamiento; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                                    
                                                    <!-- MODAL ELIMINAR -->
													<div class="modal fade" id="delete_<?php echo $user->id_tratamiento ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<center><h4 class="modal-title" id="myModalLabel">Borrar Profesional</h4></center>

																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body">	
																	<p class="text-center">¿Esta seguro de Borrar el tratamiento de ?</p>
																	<h2 class="text-center"><?php echo $user-> nombre_usuario; ?></h2>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
																	<a href="<?php echo base_url('/menu/tratamientos/eliminar/'.$user->id_tratamiento);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Borrar</a>
																</div>

															</div>
														</div>
													</div>


													<!-- <a href="<?php echo base_url('/menu/tratamientos/eliminar/'.$user->id_tratamiento);?>" class="btn btn-danger btn-sm">Eliminar</a> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Tratamiento</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form id="add_create" action="<?php echo base_url('menu/tratamientos/registrar')?>" method="POST" autocomplete="off">
                          <div class="form-group">
                            <label>Paciente</label><br>                            
                            <select name="paciente"  class="form-select form-control" aria-label="Default select example">
                                <option disabled selected>Paciente</option>
                                <?php foreach($pacientes as $paciente): ?>
                                    <?php echo '<option attribute="'.$paciente->DNI.'" value="'.$paciente->id_usuario.'">'.$paciente->DNI.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>     
                          <div class="form-group">
                            <label>Profesional</label><br>                            
                            <select name="profesional"  class="form-select form-control" aria-label="Default select example">
                                <option disabled selected>Selecciona el Profesional</option>
                                <?php foreach($profesionales as $profesional): ?>
                                    <?php echo '<option attribute="'.$profesional->nombre.'" value="'.$profesional->id_profesional.'">'.$profesional->nombre.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>   
                          <div class="form-group">
                            <label>Servicios</label><br>                            
                            <select name="servicio"  class="form-select form-control" aria-label="Default select example">
                                <option disabled selected>Selecciona el servicio</option>
                                <?php foreach($servicios as $servicio): ?>
                                    <?php echo '<option attribute="'.$servicio->nombre_servicio.'" value="'.$servicio->id_servicio.'">'.$servicio->nombre_servicio.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
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
                                    <span class="input-group-text">$</span>
                                </div>
                                <input name="costo" placeholder="Costo inicial" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                                  

                        <!--footer de tabla-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir Tratamiento</button>
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
                <form action="<?php echo base_url('menu/tratamientos/actualizar')?>" method="POST" >
                    <input type="hidden" name="id_tratamiento" id="update_id">
                    <div class="form-group">
                            <label>Paciente</label><br>                            
                            <select id="paciente" name="paciente"  class="form-select form-control" aria-label="Default select example">
                                <option disabled >Paciente</option>
                                                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>     
                          <div class="form-group">
                            <label>Profesional</label><br>                            
                            <select id="profesional" name="profesional"  class="form-select form-control" aria-label="Default select example">
                                <option disabled >Selecciona el Profesional</option>
                                <?php foreach($profesionales as $profesional): ?>
                                    <?php echo '<option attribute="'.$profesional->nombre.'" value="'.$profesional->id_profesional.'">'.$profesional->nombre.'</option>';?> 
                                <?php endforeach; ?>                                
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>   
                          <div class="form-group">
                            <label>Servicios</label><br>                            
                            <select id="serviciomango" name="servicio"  class="form-select form-control" aria-label="Default select example">
                                <option disabled >Selecciona el servicio</option>
                                                              
                            </select>   
                                <div class="mostrarmensaje"></div>
                          </div>  
                          
                          <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea  id="descripcion" class="form-control" name="descripcion" rows="3"></textarea>
                                <div class="mostrarmensaje"></div>    
                        </div>      
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input id="costo" name="costo" placeholder="Costo inicial" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
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
            $('#serviciomango').empty();
            <?php foreach($servicios as $servicio): ?>
                    if('<?php echo $servicio->id_servicio ;?>'==$tr.children("td")[1].childNodes[0].value){
                        $('#serviciomango').append(`<?php echo '<option selected attribute="'.$servicio->nombre_servicio.'" value="'.$servicio->id_servicio.'">'.$servicio->nombre_servicio.'</option>';?>`);
                        
                    }
                    else{
                        $('#serviciomango').append(`<?php echo '<option attribute="'.$servicio->nombre_servicio.'" value="'.$servicio->id_servicio.'">'.$servicio->nombre_servicio.'</option>';?>`);
                    }
            <?php endforeach; ?>   

            $('#paciente').empty();
            <?php foreach($pacientes as $paciente): ?>
                if('<?php echo $paciente->id_usuario ;?>'==$tr.children("td")[2].childNodes[0].value){
                        $('#paciente').append(`<?php echo '<option selected attribute="'.$paciente->DNI.'" value="'.$paciente->id_usuario.'">'.$paciente->DNI.'</option>';?>`);
                        console.log('es verdad');
                        console.log('<?php echo $paciente->nombre_usu ;?>');
                        console.log($tr.children("td")[1].childNodes[0].value);
                    }
                    else{
                        $('#paciente').append(`<?php echo '<option attribute="'.$paciente->DNI.'" value="'.$paciente->id_usuario.'">'.$paciente->DNI.'</option>';?>`);
                    }
            <?php endforeach; ?>

            $('#profesional').empty();
            <?php foreach($profesionales as $profesional): ?>
                if('<?php echo $profesional->id_profesional ;?>'==$tr.children("td")[4].childNodes[0].value){
                        $('#profesional').append(`<?php echo '<option selected attribute="'.$profesional->nombre.'" value="'.$profesional->id_profesional.'">'.$profesional->nombre.'</option>';?>`);
                        console.log('es verdad');
                        console.log('<?php echo $profesional->nombre ;?>');
                        console.log($tr.children("td")[4].childNodes[0].value);
                    }
                    else{
                        $('#profesional').append(`<?php echo '<option attribute="'.$profesional->nombre.'" value="'.$profesional->id_profesional.'">'.$profesional->nombre.'</option>';?>`);
                    }      
            <?php endforeach; ?>  
            
            

            $('#descripcion').val(datos[6]);
            $('#costo').val(datos[5]);
            
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

