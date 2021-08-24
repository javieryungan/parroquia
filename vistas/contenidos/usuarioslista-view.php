
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA<small> USUARIOS</small></h1>
  </div>

<div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">

          <li>
            <a href="<?php echo SERVERURL ?>ajax/usuarioAjax.php" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO USUARIO
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>usuarioslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE USUARIOS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIO
            </a>
          </li>
      </ul>
    </div>

<!-- Panel listado de administradores -->
 <div class="container-fluid">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE USUARIOS</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <?php require_once './controladores/usuario.controlador.php';
$insUsuario = new usuarioControlador();
$pagina     = explode("/", $_GET["views"]);
echo $insUsuario->CtrlPaginadorUsuarios($pagina[1], 3);
?>


          </div>

        </div>
      </div>
    </div>























