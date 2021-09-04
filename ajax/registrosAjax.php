<?php

$peticionAjax = true;
require_once "../core/configAPP.php";

if (isset($_POST['email'])) {

//insertar
    require_once '../controladores/registros.controlador.php';

    if (isset($_POST['email'])) {

        $insUsuario = new registrosControlador();
        echo $insUsuario->CtrInsertarUsuarios();
    }

} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
