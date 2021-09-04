<!-- Content page -->
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Registro <small>NUEVO USUARIO</small></h1>
  </div>

</div>


<!-- Panel nuevo administrador <-->
</-->
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; REGISTRATE</h3>
    </div>
    <div class="panel-body">
      <form>
        <fieldset>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label" for="UserName">Nombres</label>
                  <input class="form-control" id="UserName" type="text" name="">
                  <p class="help-block">Escribe tú nombre de usuario</p>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label" for="UserName">Apellidos</label>
                  <input class="form-control" id="UserName" type="text" name="">
                  <p class="help-block">Escribe tú Apellido</p>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label" for="UserName">Genero</label>
                  <select class="form-control">
                    <option>Femenino</option>
                    <option>Masculino</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label">Fecha de nacimiento</label>
                  <input pattern="[0-9+]{1,15}" class="form-control" type="date" name="telef" maxlength="15">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label">Fecha de registro</label>
                  <input pattern="[0-9+]{1,15}" class="form-control" type="date" name="" maxlength="15">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label" for="UserName">Correo</label>
                  <input class="form-control" id="UserName" type="email" name="">
                  <p class="help-block">Escribe tú Correo electronico</p>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group label-floating">
                  <label class="control-label" for="UserPass">Contraseña</label>
                  <input class="form-control" id="UserPass" type="password" name="">
                  <p class="help-block">Escribe tú contraseña</p>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group text-center">
            <input type="submit" value="Registar" class="btn btn-info btn-raised btn-sm" style="color: #FFF;">
          </div>

          <br>
          <a href="<?php echo SERVERURL; ?>login/" style="align-items: center;">Ya tengo una cuenta</a>

        </fieldset>
        <br>

        <br>

      </form>
    </div>
  </div>
</div>