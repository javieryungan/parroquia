<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['tipobeneficio']) || isset($_POST['caritasDel']) || isset($_POST['tipobeneficioup-carita'])) {

    //insertar
    require_once '../controladores/caritas.controlador.php';
    if (isset($_POST['tipobeneficio'])) {

        $insCarita = new caritasControlador();
        echo $insCarita->CtrInsertarCarita();
    }

    //actualizar

    if (isset($_POST['tipobeneficioup-carita'])) {

        $upCarita = new caritasControlador();
        echo $upCarita->CtrlActualizarCarita();
    }

    //eliminar
    if (isset($_POST['caritasDel'])) {
        $delCarita = new caritasControlador();
        echo $delCarita->CtrlEliminarCarita();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
