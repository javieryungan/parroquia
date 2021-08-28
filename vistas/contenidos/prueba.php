<?php
if ($_SESSION['rol'] != 1) {
    $cerrar->CtrlCerrarSesion();
}
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
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CERTIFICADO</h3>
        </div>
        <div class="panel-body">
            <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/misasAjax.php" data-form="save" autocomplete="off">
                <fieldset>
                    <span><i class="zmdi zmdi-account-box"></i> &nbsp; Registre la información solicitada</span>
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA CELEBRACION: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" name="fecha_registro" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">PAGINA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="pagina" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">TOMO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="tomo" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nª: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="numero" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE DEL PARROCO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombre_parroco" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE BAUTIZADO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombre_bautizado" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA NACIMIENTO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" name="fecha_nacimiento" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">LUGAR NACIMIENTO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="lugar_nacimiento" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE PADRE: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombre_padre" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE MADRE: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombre_madre" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">PADRINOS: <span style="color: red;">*</span> </label>
                                    <textarea name="padrinos" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOTA MARGINAL: <span style="color: red;">*</span></label>
                                    <textarea name="nota_marginal" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                            <!--Datos Registro civil -->

                            <div class="col-xs-12 badge bg-info text-wrap">
                                <h4 class="fw-bold">REGISTRO CIVIL.</h4>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">AÑO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="anio_civil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">TOMO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="tomo_civil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">PAGINA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="pagina_civil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">ACTA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="acta_civil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">LUGAR: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="lugar_civil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" name="fecha_civil" required>
                                </div>
                            </div>
                        </div>
                    </div>

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