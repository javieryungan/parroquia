<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['confechanacimiento'])) {
    require_once '../controladores/confirmacion.controlador.php';

    //insertar
    if (isset($_POST['confechanacimiento'])) {
        echo ('ingreso a insertar baut');
        $insMisa = new confirmacionControlador();
        echo $insMisa->CtrInsertarConfirmacion();
    }
    // actualizar
    if (isset($_POST['idbautizoe'])) {
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrlActualizarCertificadoBautizo();
    }

    //eliminar
    if (isset($_POST['certificadobautizoDelete'])) {
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlEliminarCertificadoBautizo();
    }

    // buscar
    if (isset($_POST['consulta'])) {
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlPaginadorCertificadoBautizo(1, 10, $_POST['consulta']);
    }

}else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}