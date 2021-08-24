<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class caritasModelo extends mainModel
{

    protected function MdlInsertarCarita($datos)
    {

        $fecha         = $datos["fecha"];
        $descripcion   = $datos["descripcion"];
        $tipobeneficio = $datos["tipobeneficio"];

        $sql = mainModel::conectar()->prepare("INSERT INTO caritas (car_fecha, car_descripcion,car_tipobeneficio)

            VALUES (:fecha,:descripcion,:tipobeneficio)");

        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":tipobeneficio", $tipobeneficio);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlMostrarCarita()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM caritas");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlEliminarCarita($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM caritas where id_carita=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarCarita($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE caritas
         SET car_fecha=:fecha, car_descripcion=:descripcion, car_tipobeneficio=:tipobeneficio where id_carita=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":fecha", $datos["fecha"]);
        $sql->bindParam(":descripcion", $datos["descripcion"]);
        $sql->bindParam(":tipobeneficio", $datos["tipobeneficio"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
