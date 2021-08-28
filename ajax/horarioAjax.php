<!-- horariosAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['horarioDelete']) || isset($_POST['horainicio']) || isset($_POST['horainicioedit'])) {

    require_once '../controladores/horarios.controlador.php';

    // insertar
    if (isset($_POST['horainicio'])) {
        $insMisa = new horariosControlador();
        echo $insMisa->CtrInsertarHorario();
    }
    // actualizar
    if (isset($_POST['horainicioedit'])) {
        $insMisa = new horariosControlador();
        echo $insMisa->CtrlActualizarHorario();
    }
    //eliminar
    if (isset($_POST['horarioDelete'])) {
        $delMisa = new horariosControlador();
        echo $delMisa->CtrlEliminarHorario();
    }
} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
