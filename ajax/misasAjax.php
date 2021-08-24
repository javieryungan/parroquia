<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['fechacelebracion']) || isset($_POST['misasDel']) || isset($_POST['fechacelebracionup-misa'])) {

    //insertar
    require_once '../controladores/misas.controlador.php';
    if (isset($_POST['fechacelebracion'])) {

        $insMisa = new misasControlador();
        echo $insMisa->CtrInsertarMisa();
    }

    //actualizar

    if (isset($_POST['fechacelebracionup-misa'])) {

        $upMisa = new misasControlador();
        echo $upMisa->CtrlActualizarMisa();
    }

    //eliminar
    if (isset($_POST['misasDel'])) {
        $delMisa = new misasControlador();
        echo $delMisa->CtrlEliminarMisa();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
