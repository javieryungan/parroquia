<?php
if ($peticionAjax) {
    require_once "../modelos/registros.modelo.php";
} else {
    require_once "./modelos/registros.modelo.php";
}

class registrosControlador extends registrosModelo
{

    public function CtrInsertarUsuarios()
    {

        $email = $_POST['email'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM usuario WHERE usu_correo = '$email'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "El usuario ya existe",
                "Tipo"   => "error"];
        } else {

            $hoy = date('Y-m-d H:i:s');

            $email1          = mainModel::limpiar_cadena($email);
            $nombres         = mainModel::limpiar_cadena($_POST['nombres']);
            $apellidos       = mainModel::limpiar_cadena($_POST['apellidos']);
            $genero          = mainModel::limpiar_cadena($_POST['genero']);
            $fechanacimiento = mainModel::limpiar_cadena($_POST['fechanacimiento']);
            $pass            = mainModel::limpiar_cadena($_POST['pass']);
            $idrol           = mainModel::limpiar_cadena($_POST['idrol']);

            $datos = [

                "nombres"         => $nombres,
                "apellidos"       => $apellidos,
                "genero"          => $genero,
                "fechanacimiento" => $fechanacimiento,
                "email"           => $email1,
                "pass"            => $pass,
                "fecharegistro"   => $hoy,
                "idrol"           => $idrol,

            ];

            $insertar = registrosModelo::MdlInsertarUsuarios($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar usuario",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro el usuario",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);

    }
}
/*

function CrtlRegistrosIniciarSesion()
{
$usuario    = mainModel::limpiar_cadena($_POST["usuario"]);
$password   = mainModel::limpiar_cadena($_POST["password"]);
$datosregistros = ["usuario" => $usuario, "password" => $password];

$respuesta = LoginModelo::MdlRegistrosIniciarSesion($datoslogin);

if ($respuesta->rowCount() == 1) {
$row = $respuesta->fetch();
session_start(['name' => 'UIC']);
$_SESSION['usuario']   = $row['usu_nombres'];
$_SESSION['password']  = $row['usu_pass'];
$_SESSION['rol']       = $row['id_rol'];
$_SESSION['rolnombre'] = $row['rol_nombre'];

$url                = SERVERURL . "home/";
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
function CtrlRegistrosCerrarSesion()
{
session_destroy();
return header("location:" . SERVERURL . "login/");
}
 */
