<!-- Content page -->

<?php
require_once './controladores/retiros.controlador.php';
$retiro  = new retirosControlador();
$usuario = $retiro->CtrConsultarUsuario();
?>


<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>RETIROS</small></h1>
</div>

</div>

<div class="container-fluid">
 <ul class="breadcrumb breadcrumb-tabs">

  <li>
   <a href="<?php echo SERVERURL; ?>retiros/" class="btn btn-info">
    <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO RETIRO
  </a>
</li>
<li>
 <a href="<?php echo SERVERURL; ?>retiroslista/" class="btn btn-success">
  <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RETIROS
</a>
</li>
<li>
 <a href="" class="btn btn-primary">
  <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR RETIRO
</a>
</li>
</ul>
</div>
<br>
<br>

<!-- Panel nuevo retiro -->
<div class="container-fluid">
 <div class="panel panel-info">
  <div class="panel-heading">
   <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RETIRO</h3>
 </div>
 <div class="panel-body">
   <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/retirosAjax.php" data-form = "save" autocomplete = "off" >
    <fieldset>
     <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de asistencia a retiros</legend>
     <div class="container-fluid">
      <div class="row">

        <div class="col-md-8">
          <div class="form-group label-floating">
           <label class="control-label"><br> Fecha y hora estimada * <br></label>
           <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="datetime-local" name="fechaprogramada" required="" maxlength="30">
         </div>
       </div>

       <div class="col-md-8">
        <div class="form-group label-floating">
         <label class="control-label">Descripción</label>
         <textarea name="descripcion" class="form-control" rows="2" maxlength="100" required=""></textarea>
       </div>
     </div>


     <div class="col-md-8">
      <div class="form-group label-floating">
        <label class="control-label">Nombres y apellidos de asistente *</label>
        <select class="form-control" name="usuario" id="" required="">
          <?php foreach ($usuario as $key => $value) {
    ?><option value="<?php echo $value['id_usuario'] ?>"> <?php echo $value['Nombres_apellidos'] ?> </option>
        <?php }?>
      </select>
    </div>
  </div>


  <input type="hidden"  name="tipoactividad" value="9">
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
