<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['consulta']) || isset($_POST['concepto']) || isset($_POST['reciboDelete']) || isset($_POST['idreciboup'])) {
    require_once '../controladores/recibo.controlador.php';

    //insertar
    if (isset($_POST['concepto'])) {
        //echo ('ingreso a insertar baut');
        $insMisa = new reciboControlador();
        echo $insMisa->CtrInsertarCertificadoBautizo();
    }
    // actualizar
    if (isset($_POST['idreciboup'])) {
        $insMisa = new reciboControlador();
        echo $insMisa->CtrlActualizarCertificadoBautizo();
    }

    //eliminar
    if (isset($_POST['reciboDelete'])) {
        $delMisa = new reciboControlador();
        echo $delMisa->CtrlEliminarCertificadoBautizo();
    }

    // buscar
    if (isset($_POST['consulta'])) {
        $delMisa = new reciboControlador();
        echo $delMisa->CtrlPaginadorCertificadoBautizo(1, 10, $_POST['consulta']);
    } else {
        session_start();
        session_destroy();
        echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
    }
