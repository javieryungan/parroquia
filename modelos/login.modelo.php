
<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class LoginModelo extends mainModel
{

    /*----- Modelo iniciar sesion-------*/
    protected function MdlIniciarSesion($datos)
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM usuario as u INNER JOIN rol as r
ON u.id_rol = r.id_rol where usu_nombres=:usuario  AND usu_pass=:password ");

        $sql->bindParam(":usuario", $datos['usuario']);
        $sql->bindParam(":password", $datos['password']);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
}
