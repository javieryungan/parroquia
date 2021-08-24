<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['email']) || isset($_POST['usuariosDel']) || isset($_POST['emailup-usuario'])) {

    //insertar
    require_once '../controladores/usuario.controlador.php';

    if (isset($_POST['email'])) {
        $insUsuario = new usuarioControlador();
        echo $insUsuario->CtrInsertarUsuario();
    }

    //actualizar
    if (isset($_POST['emailup-usuario'])) {

        $upUsuarios = new usuarioControlador();
        echo $upUsuarios->CtrlActualizarUsuario();
    }

    //eliminar
    if (isset($_POST['usuariosDel'])) {
        $delUsuarios = new usuarioControlador();
        echo $delUsuarios->CtrlEliminarUsuario();

    }

} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
