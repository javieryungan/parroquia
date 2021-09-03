<?php
require_once './controladores/certificado.controlador.php';
$certificado = new certificadosControlador();
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
            
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">BUSCAR: </label>
                    <input class="form-control" type="text" onkeyup="buscardatos('<?php echo SERVERURL ?>ajax/certificadoAjax.php', 'texto_busqueda',1)" name="texto_busqueda" id=texto_busqueda>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="table-responsive" id="tabla_bautizo">
                    <?php require_once './controladores/certificado.controlador.php';
                    $certificado = new certificadosControlador();
                    $pagina   = explode("/", $_GET["views"]);
                    echo $certificado->CtrlPaginadorCertificadoBautizo($pagina[1], 5,'');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>