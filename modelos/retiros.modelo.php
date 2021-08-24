<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class retirosModelo extends mainModel
{

    protected function MdlInsertarRetiro($datos)
    {

        $fechaprogramada = $datos["fechaprogramada"];
        $fecharegistro   = $datos["fecharegistro"];
        $descripcion     = $datos["descripcion"];
        $tipoactividad   = $datos["tipoactividad"];
        $usuario         = $datos["usuario"];

        $sql = mainModel::conectar()->prepare("INSERT INTO datosactividad(act_fechacelebracion,act_fecharegistro,act_descripcion,id_tipoActividad,id_usuario)

          VALUES (:fechaprogramada, :fecharegistro, :descripcion, :tipoactividad,:usuario)");

        $sql->bindParam(":fechaprogramada", $fechaprogramada);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":usuario", $usuario);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlMostrarRetiro()
    {
        $sql = mainModel::conectar()->prepare("SELECT d.id_datosActividad,d.act_fecharegistro,d.act_fechacelebracion,d.act_descripcion, u.usu_cedula,u.usu_telefono, CONCAT(u.usu_nombres,' ',u.usu_apellidos) as nombres_apellidos from usuario as u inner join datosactividad as d on u.id_usuario=d.id_usuario INNER JOIN rol as r on r.id_rol=u.id_rol where r.rol_nombre='visitante'");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlEliminarRetiro($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM datosactividad where id_datosActividad=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarRetiro($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE datosactividad
           SET act_fecharegistro=:fecharegistro, act_fechacelebracion=:fechaprogramada, act_descripcion=:descripcion, id_usuario=:usuario where id_datosActividad=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);
        $sql->bindParam(":fechaprogramada", $datos["fechaprogramada"]);
        $sql->bindParam(":descripcion", $datos["descripcion"]);

        $sql->bindParam(":usuario", $datos["usuario"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
