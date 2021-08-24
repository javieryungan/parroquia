<!-- Content page -->

<?php
require_once './controladores/usuario.controlador.php';
$usuario = new usuarioControlador();
$rol     = $usuario->CtrConsultarRol();
?>



<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>USUARIOS</small></h1>
</div>

</div>

<div class="container-fluid">
  <ul class="breadcrumb breadcrumb-tabs">

    <li>
      <a href="<?php echo SERVERURL; ?>usuarios/" class="btn btn-info">
        <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO USUARIO
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>usuarioslista/" class="btn btn-success">
        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE USUARIOS
      </a>
    </li>
    <li>
      <a href="" class="btn btn-primary">
        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIO
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
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO</h3>
    </div>
    <div class="panel-body">
      <form action="<?php echo SERVERURL ?>ajax/usuarioAjax.php" data-form="" class="FormularioAjax" method="POST"  data-form = "save" autocomplete = "off" enctype="multipart/form-data">
       <fieldset>
        <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos personales </legend>
        <div class="container-fluid">
          <div class="row">


            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Nombres *</label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombres" required="" maxlength="30">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Apellidos *</label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidos" required="" maxlength="30">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label"><br>Fecha de nacimiento *</label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="date" name="fechanacimiento" required="" maxlength="30">
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Género *</label>
                <select name="genero" class="form-control" required="">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>

                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Correo *</label>
                  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ@. ]{1,30}" class="form-control" type="email" name="email" required="" maxlength="30">
                </div>
              </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Contraseña *</label>
                <input class="form-control" type="password" name="pass" maxlength="50" value="" required="">
              </div>
            </div>



          </div>
        </div>
      </fieldset>




      <fieldset>
        <legend><i class=""></i> <br><br>&nbsp; Información de usuario </legend>
        <div class="container-fluid">
          <div class="row">


           <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Cédula *</label>
              <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="cedula" maxlength="15" required="">
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
              <label class="control-label">Direccion </label>
              <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="direccion"  maxlength="30">
            </div>
          </div>


          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Rol *</label>
              <select class="form-control" name="rol" id="">
                <?php foreach ($rol as $key => $value) {
    ?><option value="<?php echo $value['id_rol'] ?>"> <?php echo $value['rol_nombre'] ?> </option>
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







