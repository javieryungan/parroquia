<!--Content page
misas-view.
-->
<?php
require_once './controladores/horarios.controlador.php';
$misas         = new horariosControlador();
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
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA HORARIO
            </a>
        </li>
    </ul>
</div>
<!-- Panel listado de misas -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE HORARIOS</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <?php require_once './controladores/horarios.controlador.php';
                $insMisas = new horariosControlador();
                $pagina   = explode("/", $_GET["views"]);
                echo $insMisas->CtrlPaginadorHorarios($pagina[1], 3);
                ?>
            </div>
        </div>
    </div>
</div>