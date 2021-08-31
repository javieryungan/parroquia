<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';


if (isset($_POST['notamarginal']) || isset($_POST['certificadobautizoDelete']) || isset($_POST['idbautizoe'])) {
    require_once '../controladores/certificado.controlador.php';
    
    //insertar
    if (isset($_POST['notamarginal'])) {
        // echo ('ingreso a insertar');
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrInsertarCertificadoBautizo();
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
} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
