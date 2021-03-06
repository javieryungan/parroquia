<?php
require_once "core/configGeneral.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>vistas/css/main.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>vistas/css/sweetalert2.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>vistas/lib/main.css">
    <script type="text/javascript" src="<?php echo SERVERURL ?>vistas/js/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    $peticionAjax = false;
    require_once "./controladores/vistasControlador.php";
    $vt     = new vistasControlador();
    $vistas = $vt->obtener_vistas_controlador();
    if (
        $vistas == "home" || $vistas == "login" || $vistas == "reportebautiso"
        || $vistas == "reportematrimonio" || $vistas == "404" || $vistas == "registro"
    ) :
        if ($vistas == "home") {
            require_once "./vistas/contenidos/home-view.php";
        } else if ($vistas == "login") {
            require_once "./vistas/contenidos/login-view.php";
        } else if ($vistas == "reportebautiso") {
            require_once "./vistas/contenidos/reportebautiso-view.php";
        } else if ($vistas == "reportematrimonio") {
            require_once "./vistas/contenidos/reportematrimonio-view.php";
        } else if ($vistas == "registro") {
            require_once "./vistas/contenidos/registros-view.php";
        } else {
            require_once "./vistas/contenidos/404-view.php";
        }
    else :

        session_start(["name" => "UIC"]);
        require_once "./controladores/login.controlador.php";
        $cerrar = new LoginControlador();
        if (!isset($_SESSION["usuario"]) || !isset($_SESSION["password"])) {
            $cerrar->CtrlCerrarSesion();
        }

    ?>
        <?php include 'vistas/modulos/navlateral.php'; ?>
        <!-- Content page-->
        <section class="full-box dashboard-contentPage">
            <!-- NavBar -->

            <?php include 'vistas/modulos/navbar.php'; ?>

            <!-- Content page -->
            <?php
            require_once $vistas;
            ?>
        </section>
    <?php endif; ?>
    <?php include 'vistas/modulos/scripts.php'; ?>

    <!--====== Scripts -->

</body>

</html>