<?php
require_once './controladores/misas.controlador.php';
$misas         = new misasControlador();
//$usuario       = $misas->CtrConsultarUsuarioActivo($_SESSION['usuario']);
$tipoactividad = $misas->CtrConsultarTipoactividadAll();
?>

<!-- Content page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Generar <small>CERTIFICADO MATRIMONIO</small></h1>
    </div>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>certificadomatrimonio/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CERTIFICADOS
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>certificadomatrimonionew/" class="btn btn-info" data-toggle="modal"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CERTIFICADO </a>
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
            <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/certificadoAjax.php" data-form="save" autocomplete="off">
                <fieldset>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA CELEBRACION: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" name="fechacelebracion" required>
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
                                    <input class="form-control" type="text" name="nombreparroco" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE NOVIO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombrenovio" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE NOVIA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="nombrenovia" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">PADRINOS: </label>
                                    <textarea name="padrinos" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOTA MARGINAL: </label>
                                    <textarea name="notamarginale" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">OBSERVACION:</label>
                                    <textarea name="observacion" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">CERTIFICA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="certifica" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">INTRO/EXTRA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="intro" required>
                                </div>
                            </div>
                            <!--Datos Registro civil -->

                            <div class="col-xs-12 badge bg-info text-wrap">
                                <h4 class="fw-bold">REGISTRO CIVIL.</h4>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">AÑO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="aniocivil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">TOMO: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="tomocivil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">PAGINA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="paginacivil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">ACTA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="actacivil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">LUGAR: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="text" name="lugarcivil" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA: <span style="color: red;">*</span></label>
                                    <input class="form-control" type="date" name="fechacivil" required>
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