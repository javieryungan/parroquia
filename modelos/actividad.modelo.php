<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class actividadModelo extends mainModel
{

    //insertar actividad
    protected function MdlInsertarActividad($datos)
    {

        $descripcion = $datos["descripcion"];
        $valor       = $datos["valor"];

        $sql = mainModel::conectar()->prepare("INSERT INTO tipoactividad (tip_descripcion,tip_valor)
         VALUES ( :descripcion, :valor)");

        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":valor", $valor);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlMostrarActividad()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  tipoactividad ORDER BY id_tipoActividad");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlActualizarActividad($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tipoactividad
     SET tip_descripcion = :descripcion, tip_valor = :valor WHERE id_tipoActividad = :id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":descripcion", $datos["descripcion"]);
        $sql->bindParam(":valor", $datos["valor"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlEliminarActividad($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  tipoactividad where id_tipoActividad=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

}
