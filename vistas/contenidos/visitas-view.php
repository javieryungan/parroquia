 <!-- Content page -->

<?php
require_once './controladores/visitas.controlador.php';
$visitas = new visitasControlador();
$usuario = $visitas->CtrConsultarUsuario();
?>


<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>VISITAS</small></h1>
</div>

</div>

<div class="container-fluid">
  <ul class="breadcrumb breadcrumb-tabs">

    <li>
      <a href="<?php echo SERVERURL; ?>visitas/" class="btn btn-info">
        <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA VISITA
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>visitaslista/" class="btn btn-success">
        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE VISITAS
      </a>
    </li>
    <li>
      <a href="" class="btn btn-primary">
        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR VISITA
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
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA VISITA</h3>
    </div>
    <div class="panel-body">
     <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/visitasAjax.php" data-form = "save" autocomplete = "off" >
       <fieldset>
        <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la visita</legend>
        <div class="container-fluid">
          <div class="row">

           <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombres y apellidos persona a visitar *</label>
              <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresvisitado" required="" maxlength="30">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombres y apellidos persona que realiza petición *</label>
              <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombressolicitante" required="" maxlength="30">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Dirección de visita *</label>
              <textarea name="direccion" class="form-control" rows="2" maxlength="100" required=""></textarea>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Teléfono *</label>
              <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" maxlength="15" required="">
            </div>
          </div>

          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label"><br> Fecha y hora programada *</label>
              <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="datetime-local" name="fechacelebracion" required="" maxlength="30">
            </div>
          </div>


          <input type="hidden"  name="tipoactividad" value="5">


             <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombres ministro *</label>
              <select class="form-control" name="nombresministro" id="">
                <?php foreach ($usuario as $key => $value) {
    ?><option value="<?php echo $value['usu_nombres'] ?>"> <?php echo $value['usu_nombres'] ?> </option>
              <?php }?>
            </select>
          </div>
        </div>

       <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label class="control-label">Apellidos ministro *</label>
            <select class="form-control" name="apellidosministro" id="">
              <?php foreach ($usuario as $key => $value) {
    ?><option value="<?php echo $value['usu_apellidos'] ?>"> <?php echo $value['usu_apellidos'] ?> </option>
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
<div class= "RespuestaAjax"></div>
</form>
</div>
</div>
</div>
