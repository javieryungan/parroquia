<?php
if ($peticionAjax) {
    require_once "../modelos/login.modelo.php";
} else {
    require_once "./modelos/login.modelo.php";
}

class LoginControlador extends LoginModelo
{
    public function CrtlIniciarSesion()
    {
        $usuario    = mainModel::limpiar_cadena($_POST["usuario"]);
        $password   = mainModel::limpiar_cadena($_POST["password"]);
        $datoslogin = ["usuario" => $usuario, "password" => $password];

        $respuesta = LoginModelo::MdlIniciarSesion($datoslogin);

        if ($respuesta->rowCount() == 1) {
            $row = $respuesta->fetch();
            session_start(['name' => 'UIC']);
            $_SESSION['usuario']   = $row['usu_nombres'];
            $_SESSION['password']  = $row['usu_pass'];
            $_SESSION['rol']       = $row['id_rol'];
            $_SESSION['rolnombre'] = $row['rol_nombre'];

            $url                = SERVERURL . "dashboard/";
            return $urllocation = '<script> window.location="' . $url . '"</script>';
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "error del sistema",
                "Texto"  => "Usuario o contraseña incorrectos",
                "Tipo"   => "error"];

            return mainModel::sweet_alert($alerta);
        }
    }
    public function CtrlCerrarSesion()
    {
        session_destroy();
        return header("location:" . SERVERURL . "login/");
    }

}
