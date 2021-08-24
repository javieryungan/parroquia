<!-- Content page -->
<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>APORTES</small></h1>
</div>

</div>

<div class="container-fluid">
  <ul class="breadcrumb breadcrumb-tabs">

    <li>
      <a href="<?php echo SERVERURL; ?>aportes/" class="btn btn-info">
        <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ACTIVIDAD Y APORTE
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>aporteslista/" class="btn btn-success">
        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ACTIVIDADES Y APORTES
      </li>
      <li>
        <a href="" class="btn btn-primary">
          <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ACTIVIDAD Y APORTE
        </a>
      </li>
    </ul>
  </div>
  <br>
  <br>

  <!-- Panel listado de actividads y aportes -->
  <div class="container-fluid">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ACTIVIDADES Y APORTES</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <?php require_once './controladores/actividad.controlador.php';
$insActividad = new actividadControlador();
$pagina       = explode("/", $_GET["views"]);
echo $insActividad->CtrlPaginadorActividad($pagina[1], 3);
?>
        </div>

      </div>
    </div>
  </div>