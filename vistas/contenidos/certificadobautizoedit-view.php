<!-- Content page
misas-view.
-->
<?php
require_once './controladores/misas.controlador.php';
require_once './controladores/certificado.controlador.php';
$misas         = new misasControlador();
$horario        = new certificadosControlador();
$usuario       = $misas->CtrConsultarUsuario();
$editarmisa    = $horario->CtrlEditarCertificadoBautizo();
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
<!-- Panel actualizar misa -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; EDITAR CERTIFICADO DE BAUTIZO</h3>
        </div>
        <div class="panel-body">
            <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/certificadoAjax.php" data-form="save" autocomplete="off">
                <fieldset>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA CELEBRACION: <span style="color: red;">*</span></label>
                                    <input type="hidden" name="idbautizoe" value="<?php echo mainModel::encryption($editarmisa['id_certificado']) ?>">
                                    <input class="form-control" type="date" value="<?php echo $editarmisa['ce_fecha_celebracion'] ?>" name="fechacelebracione" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">PAGINA: <span style="color: red;">*</span></label>
                                    <input class="form-control" value="<?php echo $editarmisa['ce_pagina'] ?>" type="text" name="paginae" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">TOMO: <span style="color: red;">*</span></label>
                                    <input class="form-control" value="<?php echo $editarmisa['ce_tomo'] ?>" type="text" name="tomoe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nª: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_numero'] ?>" name="numeroe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE DEL PARROCO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_nombre_parroco'] ?>" name="nombreparrocoe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE BAUTIZADO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_nombre_bautizado'] ?>" name="nombrebautizadoe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA NACIMIENTO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" value="<?php echo $editarmisa['ce_fecha_nacimiento'] ?>" name="fechanacimientoe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">LUGAR NACIMIENTO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_lugar_nacimiento'] ?>" name="lugarnacimientoe" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE PADRE: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_nombre_padre'] ?>" name="nombrepadree" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE MADRE: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_nombre_madre'] ?>" name="nombremadree" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">PADRINOS: </label>
                                    <textarea name="padrinose" class="form-control" rows="2" maxlength="100"><?php echo $editarmisa['ce_testigos_padrinos'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOTA MARGINAL: </label>
                                    <textarea name="notamarginale" class="form-control" rows="2" maxlength="100"><?php echo $editarmisa['ce_nota_marginal'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">OBSERVACION:</label>
                                    <textarea name="observacione" class="form-control"  rows="2" maxlength="100"><?php echo $editarmisa['ce_observacion'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">CERTIFICA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_certifica'] ?>" name="certificae" required>
                                </div>
                            </div>
                            <!--Datos Registro civil -->

                            <div class="col-xs-12 badge bg-info text-wrap">
                                <h4 class="fw-bold">REGISTRO CIVIL.</h4>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">AÑO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_anio_civil'] ?>" name="aniocivile" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">TOMO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_tomo_civil'] ?>" name="tomocivile" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">PAGINA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_pagina_civil'] ?>" name="paginacivile" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">ACTA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_acta_civil'] ?>" name="actacivile" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">LUGAR: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $editarmisa['ce_lugar_civil'] ?>" name="lugarcivile" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" value="<?php echo $editarmisa['ce_fecha_civil'] ?>" name="fechacivile" required>
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