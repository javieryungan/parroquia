<?php
require_once './controladores/asistencias.controlador.php';
$asistencias    = new asistenciasControlador();
$datosactividad = $asistencias->CtrConsultarDatosactividad();
$actividad      = $asistencias->CtrConsultarActividad();

?>

<!-- Content page -->
<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>ASISTENCIAS GENERALES</small></h1>
</div>

</div>

<div class="container-fluid">
  <ul class="breadcrumb breadcrumb-tabs">

    <li>
      <a href="<?php echo SERVERURL; ?>asistenciasgen/" class="btn btn-info">
        <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA ASISTENCIA GENERAL
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>asistenciasgenlista/" class="btn btn-success">
        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ASISTENCIAS GENERALES
      </a>
    </li>
    <li>
      <a href="" class="btn btn-primary">
        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ASISTENCIA GENERAL
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
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ASISTENCIA GENERAL</h3>
    </div>
    <div class="panel-body">
      <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/asistenciaAjax.php" data-form = "save" autocomplete = "off" >
       <fieldset>
        <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información asistencia general </legend>
        <div class="container-fluid">
          <div class="row">

    <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Nombres y apellidos *</label>
            <select class="form-control" name="nombres" id="nombres">
              <?php foreach ($datosactividad as $key => $value) {
    ?><option value="<?php echo $value['id_datosActividad'] ?>"> <?php echo $value['nombres_apellidos'] ?> </option>
            <?php }?>
          </select>
        </div>
      </div>

           <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Seleccione el Tipo de Actividad *</label>
              <select class="form-control" name="tipoactividad" id="tipoactividad">
                <?php foreach ($actividad as $key => $value) {
    ?><option value="<?php echo $value['tip_descripcion'] ?>"> <?php echo $value['tip_descripcion'] ?> </option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Estado </label>
            <select name="estado" class="form-control">
              <option value="En curso">En curso</option>
              <option value="En espera">En espera</option>
              <option value="Retirado">Retirado</option>
              <option value="Finalizado">Finalizado</option>
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Descripcion *</label>
            <textarea name="descripcion" class="form-control" rows="2" maxlength="100" required=""></textarea>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Numero de horas totales *</label>
            <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="nhoras" maxlength="15" required="">
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label"><br>Fecha y hora de inicio*</label>
            <input pattern="[0-9+]{1,15}" class="form-control" type="datetime-local" name="fechainicio" required="" maxlength="30">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label"><br>Fecha y hora de finalización *</label>
            <input pattern="[0-9+]{1,15}" class="form-control" type="datetime-local" name="fechafin" required="" maxlength="30">
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
<div class= "RespuestaAjax"></div>
</form>
</div>
</div>
</div>





