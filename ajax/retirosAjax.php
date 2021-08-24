<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['fechaprogramada']) || isset($_POST['retirosDel']) || isset($_POST['fechaprogramadaup-retiro'])) {

    //insertar
    require_once '../controladores/retiros.controlador.php';
    if (isset($_POST['fechaprogramada'])) {

        $insRetiro = new retirosControlador();
        echo $insRetiro->CtrInsertarRetiro();
    }

    //actualizar

    if (isset($_POST['fechaprogramadaup-retiro'])) {

        $upRetiro = new retirosControlador();
        echo $upRetiro->CtrlActualizarRetiro();
    }

    //eliminar
    if (isset($_POST['retirosDel'])) {
        $delRetiro = new retirosControlador();
        echo $delRetiro->CtrlEliminarRetiro();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
