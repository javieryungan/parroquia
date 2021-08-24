<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class asistenciasModelo extends mainModel
{

    protected function MdlInsertarAsistencia($datos)
    {

        $estado        = $datos["estado"];
        $descripcion   = $datos["descripcion"];
        $nhoras        = $datos["nhoras"];
        $fecharegistro = $datos["fecharegistro"];
        $fechainicio   = $datos["fechainicio"];
        $fechafin      = $datos["fechafin"];
        $nombres       = $datos["nombres"];

        $sql = mainModel::conectar()->prepare("INSERT INTO asistencia (asi_estado, asi_descripcion, asi_nhoras, asi_fecharegistro, asi_fechainicio, asi_fechafin, id_datosActividad)
         VALUES ( :estado, :descripcion, :nhoras, :fecharegistro, :fechainicio, :fechafin, :nombres)");

        $sql->bindParam(":estado", $estado);
        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":nhoras", $nhoras);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechainicio", $fechainicio);
        $sql->bindParam(":fechafin", $fechafin);
        $sql->bindParam(":nombres", $nombres);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlMostrarAsistencia()
    {
        $sql = mainModel::conectar()->prepare("SELECT a.*, t.tip_descripcion,d.act_nombres, d.act_apellidos, d.act_nombresministro, d.act_apellidosministro FROM asistencia as a INNER JOIN datosactividad as d on d.id_datosActividad = a.id_datosActividad INNER JOIN tipoactividad as t on t.id_tipoActividad =d.id_tipoActividad");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    protected function MdlEliminarAsistencia($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  asistencia where id_asistencia=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarAsistencia($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE asistencia
         SET  asi_estado=:estado, asi_descripcion=:descripcion, asi_nhoras=:nhoras, asi_fecharegistro=:fecharegistro, asi_fechainicio=:fechainicio, asi_fechafin=:fechafin, id_datosActividad=:nombres where id_asistencia=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":estado", $datos["estado"]);
        $sql->bindParam(":descripcion", $datos["descripcion"]);
        $sql->bindParam(":nhoras", $datos["nhoras"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);
        $sql->bindParam(":fechainicio", $datos["fechainicio"]);
        $sql->bindParam(":fechafin", $datos["fechafin"]);
        $sql->bindParam(":nombres", $datos["nombres"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

}
