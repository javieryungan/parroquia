<!-- Content page
misas-view.
-->
<?php
require_once './controladores/misas.controlador.php';
$misas         = new misasControlador();
$usuario       = $misas->CtrConsultarUsuario();
$tipoactividad = $misas->CtrConsultarTipoactividad();
$editarmisa    = $misas->CtrlEditarMisa();
?>

<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>MISAS</small></h1>
 </div>

</div>

<div class="container-fluid">
 <ul class="breadcrumb breadcrumb-tabs">

  <li>
   <a href="<?php echo SERVERURL; ?>misas/" class="btn btn-info">
    <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA MISA
   </a>
  </li>
  <li>
   <a href="<?php echo SERVERURL; ?>misaslista/" class="btn btn-success">
    <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MISAS
   </a>
  </li>
  <li>
   <a href="" class="btn btn-primary">
    <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR MISA
   </a>
  </li>
 </ul>
</div>
<br>
<br>

<!-- Panel actualizar misa -->
<div class="container-fluid">
 <div class="panel panel-info">
  <div class="panel-heading">
   <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA MISA</h3>
  </div>
  <div class="panel-body">
   <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/misasAjax.php" data-form = "save" autocomplete = "off" >
    <fieldset>
     <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la Misa</legend>
     <div class="container-fluid">
      <div class="row">

       <div class="col-xs-12 col-sm-6">
        <div class="form-group label-floating">
         <label class="control-label"><br>Fecha y Hora programada *</label>

         <input type="hidden" name="idup-misa" value="<?php echo mainModel::encryption($editarmisa['id_datosActividad']) ?>">

         <input pattern="[0-9+]{1,15}" class="form-control" type="datetime-local" name="fechacelebracionup-misa" value="<?php echo $editarmisa['act_fechacelebracion'] ?>" required="" >
        </div>
       </div>


       <div class="col-xs-12 col-sm-6">
        <div class="form-group label-floating">
         <label class="control-label">Descripción </label>
         <input name="descripcionup-misa" class="form-control" rows="2" maxlength="100" value="<?php echo $editarmisa['act_descripcion'] ?>" ></input>
        </div>
       </div>

       <div class="col-xs-12 col-sm-6">
        <div class="form-group label-floating">
         <label class="control-label">Recolecta de misa *</label>
         <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="recolectamisaup-misa" maxlength="15" required="" value="<?php echo $editarmisa['act_aporte'] ?>" >
        </div>
       </div>


       <div class="col-xs-12 col-sm-6">
        <div class="form-group label-floating">
         <label class="control-label">Seleccione el Tipo de Misa *</label>
         <select class="form-control" name="tipoactividadup-misa" id="">
          <option value="<?php echo $editarmisa['id_tipoActividad'] ?>"> <?php echo $editarmisa['tip_descripcion'] ?> </option>
          <?php foreach ($tipoactividad as $key => $value) {?>
           <option value="<?php echo $value['id_tipoActividad'] ?>"> <?php echo $value['tip_descripcion'] ?> </option>
          <?php }?>
         </select>
        </div>
       </div>




      <div class="col-xs-12 col-sm-6">
       <div class="form-group label-floating">
        <label class="control-label">Nombres ministro *</label>
        <select class="form-control" name="nombresministroup-misa" id="">
         <?php foreach ($usuario as $key => $value) {
    ?><option value="<?php echo $value['usu_nombres'] ?>"> <?php echo $value['usu_nombres'] ?> </option>
        <?php }?>
       </select>
      </div>
     </div>


     <div class="col-xs-12 col-sm-6">
      <div class="form-group label-floating">
       <label class="control-label">Apellidos ministro *</label>
       <select class="form-control" name="apellidosministroup-misa" id="">
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
  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button><br>
  <br>
 </p>

 <div class= "RespuestaAjax"></div>
</form>
</div>
</div>
</div>
