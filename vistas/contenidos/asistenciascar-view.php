<?php
require_once './controladores/asistenciacarita.controlador.php';
$asistenciacarita = new asistenciacaritaControlador();
$usuario          = $asistenciacarita->CtrConsultarUsuario();
$carita           = $asistenciacarita->CtrConsultarCarita();
?>

<!-- Content page -->
<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>ASISTENCIAS CÁRITAS</small></h1>
</div>
</div>

<div class="container-fluid">
  <ul class="breadcrumb breadcrumb-tabs">

    <li>
      <a href="<?php echo SERVERURL; ?>asistenciascar/" class="btn btn-info">
        <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA ASISTENCIA CÁRITA
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>asistenciascarlista/" class="btn btn-success">
        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ASISTENCIAS CÁRITAS
      </a>
    </li>
    <li>
      <a href="" class="btn btn-primary">
        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ASISTENCIA CÁRITA
      </a>
    </li>
  </ul>
</div>

<br>
<br>

<!-- Panel nueva asistencia carita -->
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ASISTENCIA CÁRITA</h3>
    </div>
    <div class="panel-body">

      <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/asistenciacaritaAjax.php" data-form = "save" autocomplete = "off" >
       <fieldset>
        <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información asistencia cárita</legend>
        <div class="container-fluid">
          <div class="row">

  <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Seleccione el beneficiario*</label>
            <select class="form-control" name="beneficiario" id="">
              <?php foreach ($usuario as $key => $value) {
    ?><option value="<?php echo $value['id_usuario'] ?>"> <?php echo $value['nombres_apellidos'] ?> </option>
            <?php }?>
          </select>
        </div>
      </div>

           <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Seleccione el tipo de beneficio*</label>
              <select class="form-control" name="carita" id="">
                <?php foreach ($carita as $key => $value) {
    ?><option value="<?php echo $value['id_carita'] ?>"> <?php echo $value['car_tipobeneficio'] ?> </option>
              <?php }?>
            </select>
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
