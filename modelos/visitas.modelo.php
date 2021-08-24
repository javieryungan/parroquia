<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class visitasModelo extends mainModel
{

    protected function MdlInsertarVisita($datos)
    {

        $fecharegistro      = $datos["fecharegistro"];
        $fechacelebracion   = $datos["fechacelebracion"];
        $nombresvisitado    = $datos["nombresvisitado"];
        $direccion          = $datos["direccion"];
        $telefono           = $datos["telefono"];
        $nombressolicitante = $datos["nombressolicitante"];
        $tipoactividad      = $datos["tipoactividad"];
        $nombresministro    = $datos["nombresministro"];
        $apellidosministro  = $datos["apellidosministro"];

        $sql = mainModel::conectar()->prepare("INSERT INTO datosactividad (act_fecharegistro, act_fechacelebracion,act_nombres,act_direccion, act_telefono, act_nombressolicitante,id_tipoActividad, act_nombresministro, act_apellidosministro) VALUES (:fecharegistro,:fechacelebracion, :nombresvisitado,:direccion, :telefono, :nombressolicitante, :tipoactividad, :nombresministro,:apellidosministro)");

        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":nombresvisitado", $nombresvisitado);
        $sql->bindParam(":direccion", $direccion);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":nombressolicitante", $nombressolicitante);
        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":nombresministro", $nombresministro);
        $sql->bindParam(":apellidosministro", $apellidosministro);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlMostrarVisita()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  datosactividad as d INNER JOIN tipoactividad as t ON d.id_tipoActividad=t.id_tipoActividad WHERE t.tip_descripcion like '%visita%' ORDER BY d.id_datosActividad");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlEliminarVisita($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  datosactividad where id_datosActividad=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarVisita($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE datosactividad
     SET act_fecharegistro = :fecharegistro, act_fechacelebracion = :fechacelebracion, act_nombres = :nombresvisitado, act_direccion = :direccion, act_telefono = :telefono, act_nombressolicitante = :nombressolicitante, id_tipoActividad = :tipoactividad, act_nombresministro = :nombresministro, act_apellidosministro = :apellidosministro WHERE id_datosActividad = :id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);
        $sql->bindParam(":fechacelebracion", $datos["fechacelebracion"]);
        $sql->bindParam(":nombresvisitado", $datos["nombresvisitado"]);
        $sql->bindParam(":direccion", $datos["direccion"]);
        $sql->bindParam(":telefono", $datos["telefono"]);
        $sql->bindParam(":nombressolicitante", $datos["nombressolicitante"]);
        $sql->bindParam(":tipoactividad", $datos["tipoactividad"]);
        $sql->bindParam(":nombresministro", $datos["nombresministro"]);
        $sql->bindParam(":apellidosministro", $datos["apellidosministro"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
