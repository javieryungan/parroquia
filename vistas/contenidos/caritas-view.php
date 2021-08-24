<?php
require_once './controladores/caritas.controlador.php';
$caritas = new caritasControlador();

?>

<!-- Content page -->
    <div class="container-fluid">
       <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>CÁRITAS</small></h1>
    </div>

    </div>

    <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL; ?>caritas/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA CÁRITA
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>caritaslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CÁRITAS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CÁRITA
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
          <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CÁRITA</h3>
        </div>
        <div class="panel-body">
     <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/caritasAjax.php" data-form = "save" autocomplete = "off" >
         <fieldset>
            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de beneficios de cáritas </legend>
            <div class="container-fluid">
              <div class="row">

                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Descripción *</label>
                    <textarea name="descripcion" class="form-control" rows="2" maxlength="100"></textarea>
                  </div>
                </div>

                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Tipo de beneficio *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="tipobeneficio" required="" maxlength="30">
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
