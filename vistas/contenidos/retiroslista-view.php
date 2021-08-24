
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA<small> RETIROS</small></h1>
  </div>

  <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL; ?>retiros/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO RETIRO
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>retiroslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RETIROS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR RETIRO
            </a>
          </li>
      </ul>
    </div>



  <!-- Panel listado de retiros -->
    <div class="container-fluid">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RETIROS</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <?php require_once './controladores/retiros.controlador.php';
$insRetiros = new retirosControlador();
$pagina     = explode("/", $_GET["views"]);
echo $insRetiros->CtrlPaginadorRetiros($pagina[1], 3);
?>


          </div>

        </div>
      </div>
    </div>





















