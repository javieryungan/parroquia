<!-- Content page -->

<?php
require_once './controladores/usuario.controlador.php';
$usuario = new usuarioControlador();
$usuario = $usuario->CtrlEditarUsuario();
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
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresup-usuario" required="" maxlength="30" value="<?php echo $usuario['usu_nombres'] ?>">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Apellidos *</label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosup-usuario" required="" maxlength="30" value="<?php echo $usuario['usu_apellidos'] ?>">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label"><br>Fecha de nacimiento *</label>
                <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="date" name="fechanacimientoup-usuario" required="" maxlength="30" value="<?php echo $usuario['usu_fechaNacimiento'] ?>">
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Género *</label>
                <select name="generoup-usuario" class="form-control" required="">
                  <option value="<?php echo $usuario['usu_genero'] ?>">Masculino</option>
                  <option value="<?php echo $usuario['usu_genero'] ?>">Femenino</option>

                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Correo *</label>

                  <input class="form-control" type="hidden" name="idup-usuario" maxlength="50" value="<?php echo mainModel::encryption($usuario['id_usuario']) ?>">

                  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ@. ]{1,30}" class="form-control" type="email" name="emailup-usuario" required="" maxlength="30" value="<?php echo $usuario['usu_correo'] ?>">

                </div>
              </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Contraseña *</label>
                <input class="form-control" type="password" name="passup-usuario" maxlength="50" value="" required="" value="<?php echo $usuario['usu_pass'] ?>">
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
              <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="cedulaup-usuario" maxlength="15" required="" value="<?php echo $usuario['usu_cedula'] ?>">
            </div>
          </div>

          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Teléfono *</label>
              <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefonoup-usuario" maxlength="15" required="" value="<?php echo $usuario['usu_telefono'] ?>">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Direccion </label>
              <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="direccionup-usuario"  maxlength="30" value="<?php echo $usuario['usu_direccion'] ?>">
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







