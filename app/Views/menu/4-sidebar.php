<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('public/img/profile.jpg');?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo session('usuario')?> 
									<span class="user-level"><?php echo session('rol')?> </span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">Mi perfil</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Editar perfil</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Preferencias</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="<?php echo base_url('menu')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/especialidades">
								<i class="fas fa-layer-group"></i>
								<p>Especialidades</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/profesionales">
								<i class="fas fa-layer-group"></i>
								<p>Profesionales</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/usuarios">
								<i class="fas fa-layer-group"></i>
								<p>Administradores</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/pacientes">
								<i class="fas fa-layer-group"></i>
								<p>Pacientes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/servicios">
								<i class="fas fa-layer-group"></i>
								<p>Servicios</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/tratamientos">
								<i class="fas fa-layer-group"></i>
								<p>Tratamientos</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/pacientes">
								<i class="fas fa-layer-group"></i>
								<p>Pagos</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>/menu/pacientes">
								<i class="fas fa-layer-group"></i>
								<p>Tipos de pago</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">