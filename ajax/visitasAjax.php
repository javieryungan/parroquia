<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['fechacelebracion']) || isset($_POST['visitasDel']) || isset($_POST['fechacelebracionup-visita'])) {

    //insertar
    require_once '../controladores/visitas.controlador.php';
    if (isset($_POST['fechacelebracion'])) {

        $insVisitas = new visitasControlador();
        echo $insVisitas->CtrInsertarVisita();
    }

    //actualizar

    if (isset($_POST['fechacelebracionup-visita'])) {

        $upvisitas = new visitasControlador();
        echo $upvisitas->CtrlActualizarVisita();
    }

    //eliminar
    if (isset($_POST['visitasDel'])) {
        $delVisitas = new visitasControlador();
        echo $delVisitas->CtrlEliminarVisita();

    }} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
