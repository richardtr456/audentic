<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?php echo base_url('public/js/core/jquery-3.6.0.min.js')?>" ></script>

<div class="content">
	<!-- <?php echo session('usuario')?> -->
	<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Pacientes</h4>
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
								<a href="#">Pacientes</a>
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
									<div class="card-title">Lista de pacientes</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertar">
                                                Nuevo
                                            </button>   
                                            <a class="btn btn-light " href="<?php echo base_url('menu/pacientes/reporte')?>" role="button">Export</a>
                                                 
                        <!-- <p><a href="<?php echo base_url('menu/usuarios/crear_usuario') ?>" class="btn btn-primary">Añadir administrador</a></p> -->
												</div>
											</div>
											<div class="row">                            
												<div class="col-md-12">
												<div class="table-responsive">
										<table  class="display table table-striped table-hover" id="users-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Sexo</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Editar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($pacientes as $paciente) { ?>

                                                    <tr>
                                                        <td><?php echo $paciente->id_usuario; ?></td>
                                                        <td><?php echo $paciente->DNI; ?></td>
                                                        <td><?php echo $paciente->nombre_usu; ?></td>
                                                        <td><?php echo $paciente->apellido_usu; ?></td>
                                                        <td><?php echo $paciente->sexo; ?></td>
                                                        <td><?php echo $paciente->telefono; ?></td>
                                                        <td><?php echo $paciente->correo; ?></td>
                                                        <td><?php echo $paciente->fecha; ?></td>
                                                        <td>
                                                            <button type="button" class="editbtn btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                Editar
                                                            </button>
                                                        </td>
                                                    </tr>

                                            <?php }  ?>                
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
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Formulario de registro de nuevo paciente -->
                    <form action="<?php echo base_url('menu/pacientes/registrar')?>" method="POST" autocomplete="off">
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
                <!--Formulario de registro de nuevo paciente -->
                <form action="<?php echo base_url('menu/pacientes/actualizar')?>" method="POST" >
                    <input type="hidden" name="id" id="update_id">

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
            $('#dni').val(datos[1]);
            $('#nombre').val(datos[2]);
            $('#apellido').val(datos[3]);
            $('#sexo').val(datos[4]);
            $('#telefono').val(datos[5]);
            $('#correo').val(datos[6]);
            
        });
        //console.log("hola afuera");
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
