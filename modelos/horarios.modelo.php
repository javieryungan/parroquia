<!-- misas.modelo-->

<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class horariosModelo extends mainModel
{

    // Mostrar
    protected function MdlMostrarHorario()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  horario_actividad");

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // insertar
    protected function MdlInsertarMisa($datos)
    {

        $horastart     = $datos["horastart"];
        $horaend  = $datos["horaend"];
        $tipoactividad       = $datos["tipoactividad"];

        $sql = mainModel::conectar()->prepare("INSERT INTO horario_actividad  (ide_tipoActividad, hora_inicio, hora_fin )

            VALUES ( :tipoactividad, :horastart, :horaend)");

        $sql->bindParam(":horastart", $horastart);
        $sql->bindParam(":horaend", $horaend);
        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // actualizar
    protected function MdlActualizarHorario($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE horario_actividad
         SET  ide_tipoActividad=:tipoactividad, hora_inicio=:horainicio, hora_fin=:horafin where ide_horario=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":tipoactividad", $datos["tipoactividad"]);
        $sql->bindParam(":horainicio", $datos["horainicio"]);
        $sql->bindParam(":horafin", $datos["horafin"]);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }

    // eventos
    protected function MdlMostrarEventos()
    {
        $sql = mainModel::conectar()->prepare("SELECT concat(act_fechacelebracion,'T',hora_inicio) as inicio,act_descripcion as descripcion, concat(act_fechacelebracion,'T',hora_fin) as fin, tip_descripcion as title
        FROM datosactividad a, horario_actividad b, tipoactividad c
        WHERE a.ide_horario=b.ide_horario and a.id_tipoActividad=c.id_tipoActividad");

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // eliminar
    protected function MdlEliminarHorario($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  horario_actividad where ide_horario=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
}
