<?php $rol = $_SESSION['rol']?>

<section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<!--SideBar Title -->
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			<?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
			<figure class="full-box">
				<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/usuario2.png" alt="UserIcon">
				<figcaption class="text-center text-titles"> <br> <?php echo $_SESSION['usuario']; ?> <br> <small class="text-center text-titles"> <?php echo $_SESSION['rolnombre']; ?></small> </figcaption>
			</figure>
			<ul class="full-box list-unstyled text-center">

				<li>
					<a href="<?php echo SERVERURL; ?>myaccount/" title="Mi cuenta">
						<i class="zmdi zmdi-account-circle "></i>
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>password/" title="Cambiar contraseña">
						<i class="fas fa-key"></i>
					</a>
				</li>
				<li>
					<a href="#!" title="Salir del sistema" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- SideBar Menu -->
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>home/">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
			<?php }?>



			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="fas fa-certificate"></i> Certificados <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL; ?>certificadobautizo/"><i class="fas fa-file-contract"></i> Certificado de bautismo</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>certificadomatrimonio/"><i class="fas fa-file-contract"></i> Certificado de matrimonio</a>
						</li>
					</ul>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>horarios/"><i class="fas fa-calendar"></i> Horarios</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>calendario/"><i class="fas fa-calendar"></i> Calendario eventos</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="fas fa-church"></i> Sacramentos <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>

					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL; ?>reqbautismo/"><i class="fas fa-tasks"></i> Requisitos</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>bautismo/"><i class="fas fa-cross"></i> Bautismo</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>confirmacion/"><i class="fas fa-cross"></i> Confirmación</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>matrimonio/"><i class="fas fa-cross"></i> Matrimonio</a>
						</li>

					</ul>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="fas fa-address-book"></i> Agenda <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL; ?>misas/"><i class="fas fa-bible"></i> Misas</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>visitas/"><i class="fas fa-route"></i> Visitas</a>
						</li>

					</ul>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="fas fa-user-check"></i> Asistencias <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL; ?>asistenciasgen/"><i class="fas fa-id-badge"></i> Asistencias generales</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL; ?>asistenciascar/"><i class="fas fa-id-badge"></i> Asistencias Cáritas</a>
						</li>
					</ul>
				</li>

			<?php }?>



			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="fas fa-envelope"></i> Solicitudes <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL; ?>solicitudes/"><i class="fas fa-envelope-open-text"></i> Envio de solicitudes</a>
						</li>

					</ul>
				</li>
			<?php }?>
			<?php if ($_SESSION['rol'] == 1) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>recibo/">
						<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> C..omprobantes de pago
					</a>
				</li>


				<li>
					<a href="<?php echo SERVERURL; ?>aportes/">
						<i class="fas fa-dollar-sign"></i> Aportes y Actividades
					</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>retiros/">
						<i class="fas fa-campground"></i> Retiros
					</a>
				</li>


				<li>
					<a href="<?php echo SERVERURL; ?>caritas/">
						<i class="fas fa-hand-holding-water"></i> Cáritas
					</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>usuarios/">
						<i class="fas fa-users"></i> Usuarios
					</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {?>
				<li>
					<a href="<?php echo SERVERURL; ?>donaciones/">
						<i class="fas fa-donate"></i> Donaciones y pagos<br>
					</a>
				</li>
			<?php }?>

			<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
				<li>
					<a href="">
						<i class="fas fa-stream"></i> Reportes
					</a>
				</li>
			<?php }?>

		</ul>
		<br>
		<br>
	</div>
</section>