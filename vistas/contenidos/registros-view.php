<!-- Content page -->
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Registro <small>NUEVO USUARIO</small></h1>
  </div>

</div>


<!-- Panel nuevo administrador <--></-->
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; REGISTRATE</h3>
    </div>
    <div class="panel-body">
      <form>
        <fieldset>

<div class="form-group label-floating">
      <label class="control-label" for="UserName">Nombres</label>
      <input class="form-control" id="UserName" type="text" name="">
      <p class="help-block">Escribe tú nombre de usuario</p>
    </div>
    <div class="form-group label-floating">
      <label class="control-label" for="UserName">Apellidos</label>
      <input class="form-control" id="UserName" type="text" name="">
      <p class="help-block">Escribe tú Apellido</p>
    </div>

    <div class="form-group label-floating">
      <label class="control-label" for="UserName">Genero</label>
      <label>Seleccione</label>
      <select class="form-control">
        <option>Femenino</option>
        <option>Masculino</option>
      </select>
    </div>

    <div class="col-xs-12 col-sm-6">
      <div class="form-group label-floating">
        <label class="control-label">Fecha de nacimiento</label>
        <input pattern="[0-9+]{1,15}" class="form-control" type="date" name="telef" maxlength="15">
      </div>
    </div>
    <div class="form-group label-floating">
      <label class="control-label" for="UserName">Correo</label>
      <input class="form-control" id="UserName" type="email" name="">
      <p class="help-block">Escribe tú Correo electronico</p>
    </div>

    <div class="form-group label-floating">
      <label class="control-label" for="UserPass">Contraseña</label>
      <input class="form-control" id="UserPass" type="password" name="">
      <p class="help-block">Escribe tú contraseña</p>
    </div>
    <div class="form-group text-center">
      <input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
    </div>


    <div class="col-xs-12 col-sm-6">
      <div class="form-group label-floating">
        <label class="control-label">Fecha de registro</label>
        <input pattern="[0-9+]{1,15}" class="form-control" type="date" name="" maxlength="15">
      </div>
    </div>

    <br>
    <a href="<?php echo SERVERURL; ?>login/" class="text-center">Ya tengo una cuenta</a>



        </fieldset>
        <br>

        <br>

      </form>
    </div>
  </div>
</div>

