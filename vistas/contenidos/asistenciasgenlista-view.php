
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA<small> MISAS</small></h1>
  </div>
    <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL; ?>asistenciasgen/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA ASISTENCIA GENERAL
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>asistenciasgenlista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ASISTENCIAS GENERALES
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ASISTENCIA GENERAL
            </a>
          </li>
      </ul>
    </div>

<!-- Panel listado de administradores -->
<div class="container-fluid">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ASISTENCIAS GENERALES</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
          <?php require_once './controladores/asistencias.controlador.php';
$insAsistencia = new asistenciasControlador();
$pagina        = explode("/", $_GET["views"]);
echo $insAsistencia->CtrlPaginadorAsistencias($pagina[1], 3);?>
      </div>

    </div>
  </div>
</div>























