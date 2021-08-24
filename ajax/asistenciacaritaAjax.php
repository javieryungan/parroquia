<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['beneficiario']) || isset($_POST['asistenciacaritaDel']) || isset($_POST['beneficiarioup-asistenciacar'])) {

    //insertar
    require_once '../controladores/asistenciacarita.controlador.php';
    if (isset($_POST['beneficiario'])) {

        $insAsistenciacar = new asistenciacaritaControlador();
        echo $insAsistenciacar->CtrInsertarAsistenciacarita();
    }

    //actualizar

    if (isset($_POST['beneficiarioup-asistenciacar'])) {

        $upAsistenciacar = new asistenciacaritaControlador();
        echo $upAsistenciacar->CtrlActualizarAsistenciacarita();
    }

    //eliminar
    if (isset($_POST['asistenciacaritaDel'])) {
        $delAsistenciacar = new asistenciacaritaControlador();
        echo $delAsistenciacar->CtrlEliminarAsistenciacarita();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
