<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';
if (isset($_POST['nombres'])) {
    //insertar
    require_once '../controladores/bautismo.controlador.php';
    if (isset($_POST['nombres'])) {

        $insBautismo = new bautismoControlador();
        echo $insBautismo->CtrInsertarBautismo();
    }

} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
