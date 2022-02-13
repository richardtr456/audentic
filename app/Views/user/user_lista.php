<div class="content">
	<!-- <?php echo session('usuario')?> -->
	<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Administradores</h4>
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
								<a href="#">Administrador</a>
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
									<div class="card-title">Lista de administradores</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
                        <p><a href="<?php echo base_url('menu/usuarios/crear_usuario') ?>" class="btn btn-primary">Añadir administrador</a></p>
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
													<th scope="col">Usuario</th>
													<th scope="col">Apellidos y Nombres</th>
													<th scope="col">Dni</th>
													<th scope="col">Telefono</th>
													<th scope="col">Rol</th>
													<th scope="col">Acciones</th>
												</tr>
												</tr>
											</thead>
											
											<tbody>
												<?php if($datos): ?>
												<?php foreach($datos as $user): ?>
												<tr>
													<td><?php echo $user-> idLogin; ?></td>
													<td><?php echo $user-> usuario; ?></td>
													<td><?php echo $user-> apellidos_log." ".$user->nombres_log; ?></td>
													<td><?php echo $user-> dni_log?></td>
													<td><?php echo $user-> telefono_log?></td>
													<td><?php echo $user-> rol; ?></td>
													<td>
													<a href="<?php echo base_url('/menu/usuarios/editar/'.$user->idLogin);?>" class="btn btn-primary btn-sm">Editar</a>
													<a href="#delete_<?php echo $user->idLogin; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>

													<div class="modal fade" id="delete_<?php echo $user->idLogin ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<center><h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4></center>

																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body">	
																	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
																	<h2 class="text-center"><?php echo $user-> apellidos_log." ".$user->nombres_log; ?></h2>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
																	<a href="<?php echo base_url('/menu/usuarios/eliminar/'.$user->idLogin);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Borrar</a>
																</div>

															</div>
														</div>
													</div>


													<!-- <a href="<?php echo base_url('/menu/usuarios/eliminar/'.$user->idLogin);?>" class="btn btn-danger btn-sm">Eliminar</a> -->
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
