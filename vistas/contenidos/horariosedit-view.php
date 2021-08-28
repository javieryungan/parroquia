<!-- Content page
misas-view.
-->
<?php
require_once './controladores/misas.controlador.php';
require_once './controladores/horarios.controlador.php';
$misas         = new misasControlador();
$horario = new horariosControlador();
$usuario       = $misas->CtrConsultarUsuario();
$tipoactividad = $misas->CtrConsultarTipoactividadAll();
$editarmisa    = $horario->CtrlMostrarEditarHorario();
?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>Horarios de atención</small></h1>
    </div>
</div>
<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>horarios/" class="btn btn-secondary">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE HORARRIOS
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>horariosnew/" class="btn btn-secondary">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO HORARIO
            </a>
        </li>
    </ul>
</div>
<!-- Panel actualizar misa -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; EDITAR HORARIO</h3>
        </div>
        <div class="panel-body">
            <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/horarioAjax.php" data-form="save" autocomplete="off">
                <fieldset>
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tipo Actividad *</label>
                                    <select class="form-control" name="tipoactividadedit" required>
                                    <option value="<?php echo $editarmisa['id_tipoActividad'] ?>"> <?php echo $editarmisa['tip_descripcion'] ?> </option>
                                        <?php foreach ($tipoactividad as $key => $value) {
                                        ?><option value="<?php echo $value['id_tipoActividad'] ?>"> <?php echo $value['tip_descripcion'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Hora inicio *</label>
                                    <input type="hidden" name="idup" value="<?php echo mainModel::encryption($editarmisa['ide_horario']) ?>">
                                    <input pattern="[0-9+]{1,15}" value="<?php echo $editarmisa['hora_inicio'] ?>" class="form-control" type="time" name="horainicioedit" maxlength="15" required="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Hora fin *</label>
                                    <input pattern="[0-9+]{1,15}" value="<?php echo $editarmisa['hora_fin'] ?>" class="form-control" type="time" name="horafinedit" maxlength="15" required="">
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

                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>