<?php
require_once './controladores/aporte.controlador.php';
$bautismo = new AporteControlador();

?>

<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>BAUTISMO</small></h1>
	</div>

</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">

		<li>
			<a href="<?php echo SERVERURL ?>bautismos/" class="btn btn-info">
				<i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO BAUTISMO
			</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL; ?>bautismoslista/" class="btn btn-success">
				<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE BAUTISMOS
			</a>
		</li>
		<li>
			<a href="" class="btn btn-primary">
				<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR BAUTISMO
			</a>
		</li>
	</ul>
</div>
<br>
<br>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO BAUTISMO</h3>
		</div>
		<div class="panel-body">


			<form class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/bautismo.ajax.php" data-form = "save" autocomplete = "off">


				<fieldset>
					<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de Bautismo</legend>
					<div class="container-fluid">
						<div class="row">

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label"><br>Fecha de inscripción *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="datetime-local" name="fechainscripcionUp" required="" maxlength="30">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Tomo</label>
									<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="tomoUp" maxlength="15" value="<?php echo $bautismo['bau_tomo'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Página</label>
									<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="paginaUp" maxlength="15" value="<?php echo $usuario['bau_pagina'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Número</label>
									<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="numeroUp" maxlength="15" value="<?php echo $usuario['bau_numero'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresUp" required="" maxlength="30" value="<?php echo $usuario['bau_nombres'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosUp" required="" maxlength="30"value="<?php echo $usuario['bau_apellidos'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres padre *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombrespadreUp" required="" maxlength="30" value="<?php echo $usuario['bau_nompadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos padre *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidospadreUp" required="" maxlength="30" value="<?php echo $usuario['bau_apepadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Teléfono padre</label>
									<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefonopadreUp" maxlength="15"value="<?php echo $usuario['bau_telpadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Dirección padre</label>
									<textarea name="direccionpadreUp" class="form-control" rows="2" maxlength="100" value="<?php echo $usuario['bau_dirpadre'] ?>"></textarea>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres madre*</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresmadreUp" required="" maxlength="30" value="<?php echo $usuario['bau_nommadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos madre *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidomadreUp" required="" maxlength="30" value="<?php echo $usuario['bau_apemadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Teléfono madre</label>
									<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefonomadreUp" maxlength="15" value="<?php echo $usuario['bau_telmadre'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Dirección madre</label>
									<textarea name="direccionmadreUp" class="form-control" rows="2" maxlength="100" value="<?php echo $usuario['bau_dirmadre'] ?>"></textarea>
								</div>
							</div>


							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres padrino*</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombrespadrinoUp" required="" maxlength="30" value="<?php echo $usuario['bau_nompadrino'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos padrino *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidospadrinoUp" required="" maxlength="30" value="<?php echo $usuario['bau_apepadrino'] ?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Estado civil padrino</label>
									<select name="civilpadrinoUp" class="form-control" value="<?php echo $usuario['bau_estcivilpadrino'] ?>">
										<option value="estadocivil">Soltero</option>
										<option value="estadocivil">Casado</option>
										<option value="estadocivil">Divorsiado</option>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres madrina*</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresmadrinaUp" required="" maxlength="30" value="<?php echo $usuario['bau_nommadrina'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos madrina *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosmadrinaUp" required="" maxlength="30" value="<?php echo $usuario['bau_apemadrina'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Estado civil madrina</label>
									<select name="civilmadrinaUp" class="form-control" value="<?php echo $usuario['bau_estcivilmadrina'] ?>">
										<option value="estadocivil">Soltera</option>
										<option value="estadocivil">Casada</option>
										<option value="estadocivil">Divorsiada</option>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label"><br>Fecha de celebración *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="date" name="fechacelebracionUp" required="" maxlength="30" value="<?php echo $usuario['bau_fechaceelebracion'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombres ministro *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresministroUp" required="" maxlength="30"value="<?php echo $usuario['bau_nombresMinistro'] ?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Apellidos ministro *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosministroUp" required="" maxlength="30"value="<?php echo $usuario['bau_apellidosMinistro'] ?>">
								</div>
							</div>


							<div class="col-xs-12">
								<div class="form-group">
									<label class="control-label">Aporte</label>
									<select name="aporteUp"  class=" form-control-lg form-select"  required>
										<option selected disabled value="<?php echo $bautizo['id_aporte'] ?> "><?php echo $bautizo["apo_nombre"] ?></option>
										<?php require_once './controladores/aporte.controlador.php';

$aporte = new AporteControlador();
$aporte = $aporte->CtrlMostrarAporte();
foreach ($aporte as $key => $value) {?>


											<option value=" <?php echo $value['id_aporte'] ?> "><?php echo $value["rol_nombre"] ?></option>

										<?php }?>
									</select>
								</div>
							</div>


							<div class="col-xs-12">
								<div class="form-group">
									<span class="control-label">Acta de nacimiento </span>
									<input type="file" name="actanacimientoUp" accept=".pdf">
									<div class="input-group">
										<input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
										<span class="input-group-btn input-group-sm">
											<button type="button" class="btn btn-fab btn-fab-mini">
												<i class="zmdi zmdi-attachment-alt"></i>
											</button>
										</span>
									</div>
									<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<span class="control-label">Certificado matrimonio padrino </span>
									<input type="file" name="matrimoniopadrinoUp" accept=".pdf">
									<div class="input-group">
										<input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
										<span class="input-group-btn input-group-sm">
											<button type="button" class="btn btn-fab btn-fab-mini">
												<i class="zmdi zmdi-attachment-alt"></i>
											</button>
										</span>
									</div>
									<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<span class="control-label">Certificado matrimonio madrina </span>
									<input type="file" name="matrimoniomadrinaUp" accept=".pdf">
									<div class="input-group">
										<input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
										<span class="input-group-btn input-group-sm">
											<button type="button" class="btn btn-fab btn-fab-mini">
												<i class="zmdi zmdi-attachment-alt"></i>
											</button>
										</span>
									</div>
									<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
								</div>
							</div>



						</div>
					</div>
				</fieldset>



				<br>

				<br>

				<p class="text-center" style="margin-top: 20px;">
					<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
				</p>
				<div class="RespuestaAjax"></div>
			</form>
		</div>
	</div>
</div>
