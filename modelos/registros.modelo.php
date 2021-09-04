
<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class registrosModelo extends mainModel
{

    protected function MdlInsertarUsuarios($datoss)
    {

        $nombres         = $datoss["nombres"];
        $apellidos       = $datoss["apellidos"];
        $genero          = $datoss["genero"];
        $fechanacimiento = $datoss["fechanacimiento"];
        $email           = $datoss["email"];
        $pass            = $datoss["pass"];
        $fecharegistro   = $datoss["fecharegistro"];
        $idrol           = $datoss["idrol"];

        $sql = mainModel::conectar()->prepare("INSERT INTO usuario (usu_nombres, usu_apellidos, usu_genero, usu_fechaNacimiento, usu_correo, usu_pass, usu_fechaRegistro, id_rol)

   VALUES (:nombres,:apellidos,:genero,:fechanacimiento,:email,:pass,:fecharegistro, :idrol)");

        $sql->bindParam(":nombres", $nombres);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":genero", $genero);
        $sql->bindParam(":fechanacimiento", $fechanacimiento);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":idrol", $idrol);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    /*----- Modelo iniciar sesion
protected function MdlRegistrosIniciarSesion($datos)
{

$sql = mainModel::conectar()->prepare("SELECT * FROM usuario as u INNER JOIN rol as r
ON u.id_rol = r.id_rol where usu_nombres=:usuario  AND usu_pass=:password ");

$sql->bindParam(":usuario", $datos['usuario']);
$sql->bindParam(":password", $datos['password']);
$sql->execute();
return $sql;
$sql->close();
$sql = null;
}-------*/
}
