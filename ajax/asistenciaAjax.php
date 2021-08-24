<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['descripcion']) || isset($_POST['asistenciasDel']) || isset($_POST['descripcionup-asistencia'])) {

    //insertar
    require_once '../controladores/asistencias.controlador.php';
    if (isset($_POST['descripcion'])) {

        $insAsistencia = new asistenciasControlador();
        echo $insAsistencia->CtrInsertarAsistencia();
    }

    //actualizar

    if (isset($_POST['descripcionup-asistencia'])) {

        $upAsistencia = new asistenciasControlador();
        echo $upAsistencia->CtrlActualizarAsistencia();
    }

    //eliminar
    if (isset($_POST['asistenciasDel'])) {
        $delAsistencia = new asistenciasControlador();
        echo $delAsistencia->CtrlEliminarAsistencia();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
