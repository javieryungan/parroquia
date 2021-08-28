<!--Content page
misas-view.
-->
<?php
require_once './controladores/misas.controlador.php';
$misas         = new misasControlador();
$usuario       = $misas->CtrConsultarUsuario();
$tipoactividad = $misas->CtrConsultarTipoactividadAll();
?>

<!-- Content page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Generar <small>CERTIFICADO BAUTIZO</small></h1>
    </div>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>certificadobautizo/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CERTIFICADOS
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>certificadobautizonew/" class="btn btn-info" data-toggle="modal"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CERTIFICADO </a>
        </li>
    </ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO HORARIO</h3>
        </div>
        <div class="panel-body">
            <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/horarioAjax.php" data-form="save" autocomplete="off">
                <fieldset>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tipo Actividad *</label>
                                    <select class="form-control" name="tipoactividad" required>
                                        <option value=""></option>
                                        <?php foreach ($tipoactividad as $key => $value) {
                                        ?><option value="<?php echo $value['id_tipoActividad'] ?>"> <?php echo $value['tip_descripcion'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Hora inicio *</label>
                                    <input pattern="[0-9+]{1,15}" class="form-control" type="time" name="horainicio" maxlength="15" required="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Hora fin *</label>
                                    <input pattern="[0-9+]{1,15}" class="form-control" type="time" name="horafin" maxlength="15" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <br>

                <br>

                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> &nbsp; Guardar</button><br>
                    <br>
                </p>

                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>