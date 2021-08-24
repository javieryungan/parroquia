
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA<small> CÁRITAS</small></h1>
  </div>

  <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL; ?>caritas/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA CÁRITA
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>caritaslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CÁRITAS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CÁRITA
            </a>
          </li>
      </ul>
    </div>

<!-- Panel listado de caritas -->
  <div class="container-fluid">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MISAS</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <?php require_once './controladores/caritas.controlador.php';
$insCaritas = new caritasControlador();
$pagina     = explode("/", $_GET["views"]);
echo $insCaritas->CtrlPaginadorCaritas($pagina[1], 3);
?>


          </div>

        </div>
      </div>
    </div>



