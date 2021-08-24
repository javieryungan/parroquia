<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['descripcion']) || isset($_POST['descripcionup-actividad']) || isset($_POST['actividadDel'])) {

    //insertar
    require_once '../controladores/actividad.controlador.php';
    if (isset($_POST['descripcion'])) {

        $insActividad = new actividadControlador();
        echo $insActividad->CtrInsertarActividad();
    }
    //actualizar

    if (isset($_POST['descripcionup-actividad'])) {

        $upactividad = new actividadControlador();
        echo $upactividad->CtrlActualizarActividad();
    }

    //eliminar
    if (isset($_POST['actividadDel'])) {
        $delActividad = new actividadControlador();
        echo $delActividad->CtrlEliminarActividad();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
