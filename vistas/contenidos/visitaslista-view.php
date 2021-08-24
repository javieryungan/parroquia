
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA<small> VISITAS</small></h1>
  </div>
  <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL; ?>visitas/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA VISITA
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>visitaslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE VISITAS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR VISITA
            </a>
          </li>
      </ul>
    </div>


    <!-- Panel listado de visitas -->
    <div class="container-fluid">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE VISITAS</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <?php require_once './controladores/visitas.controlador.php';
$insVisitas = new visitasControlador();
$pagina     = explode("/", $_GET["views"]);
echo $insVisitas->CtrlPaginadorVisitas($pagina[1], 3);
?>


          </div>

        </div>
      </div>
    </div>












