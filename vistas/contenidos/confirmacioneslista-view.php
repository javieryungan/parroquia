<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA <small>CONFIRMACIÓN</small></h1>
	</div>

	<div class="container-fluid">
		<ul class="breadcrumb breadcrumb-tabs">

			<li>
				<a href="<?php echo SERVERURL; ?>confirmacion/" class="btn btn-info">
					<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CONFIRMACIÓN
				</a>
			</li>
			<li>
				<a href="<?php echo SERVERURL; ?>confirmacioneslista/" class="btn btn-success">
					<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CONFIRMACIONES
				</a>
			</li>
			<li>
				<a href="" class="btn btn-primary">
					<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CONFIRMACIÓN
				</a>
			</li>
		</ul>
	</div>

	<!-- Panel listado de administradores -->
	<div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CONFIRMAACIONES</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?php require_once './controladores/confirmacion.controlador.php';
					$certificado = new confirmacionControlador();
					$pagina   = explode("/", $_GET["views"]);
					echo $certificado->CtrlPaginadorConfirmaciones($pagina[1], 5, '');
					?>
				</div>
			</div>
		</div>
	</div>