  <?php
require_once './controladores/actividad.controlador.php';
$actividad = new actividadControlador();
$actividad = $actividad->CtrlEditarActividad();
?>

  <!-- Content page -->
  <div class="container-fluid">
   <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>APORTES</small></h1>
   </div>

  </div>

  <div class="container-fluid">
   <ul class="breadcrumb breadcrumb-tabs">

    <li>
     <a href="<?php echo SERVERURL; ?>aportes/" class="btn btn-info">
      <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ACTIVIDAD Y APORTE
     </a>
    </li>
    <li>
     <a href="<?php echo SERVERURL; ?>aporteslista/" class="btn btn-success">
      <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ACTIVIDADES Y APORTES
     </li>
     <li>
      <a href="" class="btn btn-primary">
       <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ACTIVIDAD Y APORTE
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
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ACTIVIDAD Y APORTE</h3>
     </div>
     <div class="panel-body">

      <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/aportesAjax.php" data-form = "save" autocomplete = "off">
       <fieldset>
        <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Agregar Nueva Actividad y aporte</legend>
        <div class="container-fluid">
         <div class="row">

          <div class="col-xs-12 col-sm-6">
           <div class="form-group label-floating">
            <label class="control-label">Escriba el nombre de la actividad *</label>
 <input class="form-control" type="hidden" name="idup-actividad" maxlength="50" value="<?php echo mainModel::encryption($actividad['id_tipoActividad']) ?>">


            <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="descripcionup-actividad" required="" maxlength="70" value="<?php echo ($actividad['tip_descripcion']) ?>">
           </div>
          </div>

          <div class="col-xs-12 col-sm-6">
           <div class="form-group label-floating">
            <label class="control-label">Ingrese un valor *</label>
            <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="valorup-actividad" required="" maxlength="30" value="<?php echo ($actividad['tip_valor']) ?>">
           </div>
          </div>
         </fieldset>

         <p class="text-center" style="margin-top: 20px;">
          <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
         </p>

         <div class= "RespuestaAjax"></div>
        </form>

       </div>
      </div>
     </div>
