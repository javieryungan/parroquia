<?php

if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class usuariosModelo extends mainModel
{
    protected function MdlInsertarUsuario($datos)
    {
        $nombres         = $datos["nombres"];
        $apellidos       = $datos["apellidos"];
        $cedula          = $datos["cedula"];
        $genero          = $datos["genero"];
        $fechanacimiento = $datos["fechanacimiento"];
        $telefono        = $datos["telefono"];
        $email           = $datos["email"];
        $pass            = $datos["pass"];
        $fecharegistro   = $datos["fecharegistro"];
        $direccion       = $datos["direccion"];
        $rol             = $datos["rol"];

        $sql = mainModel::conectar()->prepare("INSERT INTO usuario (usu_nombres, usu_apellidos, usu_cedula, usu_genero, usu_fechaNacimiento, usu_telefono, usu_correo, usu_pass, usu_fechaRegistro, usu_direccion, id_rol)

          VALUES (:nombres, :apellidos, :cedula, :genero, :fechanacimiento, :telefono, :email, :pass, :fecharegistro, :direccion, :rol)");

        $sql->bindParam(":nombres", $nombres);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":cedula", $cedula);
        $sql->bindParam(":genero", $genero);
        $sql->bindParam(":fechanacimiento", $fechanacimiento);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":direccion", $direccion);
        $sql->bindParam(":rol", $rol);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlMostrarUsuario()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  usuario");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlEliminarUsuario($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM usuario where id_usuario=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarUsuario($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE usuario
         SET usu_nombres=:nombres, usu_apellidos=:apellidos, usu_cedula=:cedula, usu_genero=:genero, usu_fechaNacimiento=:fechanacimiento, usu_telefono=:telefono, usu_correo=:email, usu_pass=:pass, usu_fechaRegistro=:fecharegistro, usu_direccion=:direccion where id_usuario=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":nombres", $datos["nombres"]);
        $sql->bindParam(":apellidos", $datos["apellidos"]);
        $sql->bindParam(":cedula", $datos["cedula"]);
        $sql->bindParam(":genero", $datos["genero"]);
        $sql->bindParam(":fechanacimiento", $datos["fechanacimiento"]);
        $sql->bindParam(":telefono", $datos["telefono"]);
        $sql->bindParam(":email", $datos["email"]);
        $sql->bindParam(":pass", $datos["pass"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);
        $sql->bindParam(":direccion", $datos["direccion"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

}
