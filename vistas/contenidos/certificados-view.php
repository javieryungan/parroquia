
<?php
if ($_SESSION['rol'] != 1) {
    $cerrar->CtrlCerrarSesion();
}
?>

  <!-- Content page -->
  <div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Generar <small>CERTIFICADOS</small></h1>
    </div>

  </div>

  <div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">

      <li>
           <a id="modal-905954" href="#modal-container-905954" role="button" class="btn btn-info" data-toggle="modal" ><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CERTIFICADO </a>

      </li>


       <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="modal fade" id="modal-container-905954" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">
                Título modal
              </h5>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-primary">
                Guardar cambios
              </button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>








      <li>
        <a href="<?php echo SERVERURL; ?>certificadoslista/" class="btn btn-success">
          <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CERTIFICADOS
        </a>
      </li>
      <li>
        <a href="<?php echo SERVERURL; ?>adminsearch/" class="btn btn-primary">
          <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CERTIFICADO
        </a>
      </li>
    </ul>
  </div>







  <!-- Panel nuevo administrador -->
  <div class="container-fluid">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CERTIFICADO</h3>
      </div>
      <div class="panel-body">
        <form>
          <fieldset>
            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de certificado</legend>
            <div class="container-fluid">
              <div class="row">

                <div class="col-xs-12">
                  <div class="form-group label-floating">
                    <label class="control-label">DNI/CEDULA *</label>
                    <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Teléfono</label>
                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="form-group label-floating">
                    <label class="control-label">Dirección</label>
                    <textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
                  </div>
                </div>
              </div>
            </div>

          <br>

          <p class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
          </p>
        </form>
      </div>
    </div>
  </div>