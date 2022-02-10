<!-- COMO PLANTILLA OJITO -->
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
								<a href="#">Crear Administrador</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Crear administrador</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
                      <div class="container mt-2">
                        <form method="post" id="add_create" name="add_create" 
                        action="<?php echo base_url('menu/usuarios/registrar')?>">
                          <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" id="usuario" name="usuario" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>
                          <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>
                          <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>
                          <div class="form-group">
                            <label>Dni</label>
                            <input type="text" id="dni" name="dni" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>
                          <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="contrasena" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="rol">Rol</label>
                              <select id="rol" class="form-control" name="rol">
                                  <option value="default" selected disabled>Seleccionar</option>
                                  <option value="admin">admin</option>
                                  <option value="secretary">secretary</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" >
                            <div class="mostrarmensaje"></div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Insertar Usuario</button>
                          </div>
                        </form>
                      </div>
										</div>
								    </div>
								</div>
								
							</div>
						</div>
					</div>
				</div>			
</div>





<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
  
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
                usuario: {
                    required: true,
                },
                nombres: {
                    required: true,
                },
                apellidos: {
                    required: true,
                },
                dni: {
                    required: true,
                },
                contrasena: {
                    required: true,
                    maxlength: 60,
                    minlength:5,
                },
                telefono: {
                    required: true,
                },
                rol:{
                    required:true,
                }
                },
                messages: {
                    usuario: {
                    required: "Se requiere el usuario",
                },
                    nombres: {
                    required: "Se requiere el nombre",
                },
                    apellidos: {
                    required: "Se requiere los apellidos",
                },
                    dni: {
                    required: "Se requiere los apellidos",
                },
                    telefono: {
                    required: "Se requiere el numero de telefono",
                },
                contrasena: {
                    required: "Se requiere una contraseña",
                    maxlength: "The email should be or equal to 60 chars.",
                    minlength: "Contraseña pequeña",
                },
                rol:{
                    required:"Especifique el tipo de usuario",
                }
                
                },
            })
            }
  </script>
  