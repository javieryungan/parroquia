<!-- misas.modelo-->

<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class misasModelo extends mainModel
{

    protected function MdlInsertarMisa($datos)
    {

        $fecharegistro     = $datos["fecharegistro"];
        $fechacelebracion  = $datos["fechacelebracion"];
        $descripcion       = $datos["descripcion"];
        $recolectamisa     = $datos["recolectamisa"];
        $tipoactividad     = $datos["tipoactividad"];
        $nombresministro   = $datos["nombresministro"];
        $apellidosministro = $datos["apellidosministro"];

        $sql = mainModel::conectar()->prepare("INSERT INTO datosactividad (act_fecharegistro, act_fechacelebracion, act_descripcion, act_aporte, id_tipoActividad, act_nombresministro, act_apellidosministro )

            VALUES ( :fecharegistro, :fechacelebracion, :descripcion, :recolectamisa, :tipoactividad, :nombresministro, :apellidosministro)");

        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":descripcion", $descripcion);
        $sql->bindParam(":recolectamisa", $recolectamisa);
        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":nombresministro", $nombresministro);
        $sql->bindParam(":apellidosministro", $apellidosministro);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlMostrarMisa()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  datosactividad as d INNER JOIN tipoactividad as t ON d.id_tipoActividad=t.id_tipoActividad WHERE t.tip_descripcion like '%misa%' ORDER BY d.id_tipoActividad");

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlEliminarMisa($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  datosactividad where id_datosActividad=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarMisa($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE datosactividad
         SET  act_fecharegistro=:fecharegistro, act_fechacelebracion=:fechacelebracion, act_descripcion=:descripcion, act_aporte=:recolectamisa,id_tipoActividad=:tipoactividad, act_nombresministro=:nombresministro, act_apellidosministro=:apellidosministro  where id_datosActividad=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);
        $sql->bindParam(":fechacelebracion", $datos["fechacelebracion"]);
        $sql->bindParam(":descripcion", $datos["descripcion"]);
        $sql->bindParam(":recolectamisa", $datos["recolectamisa"]);
        $sql->bindParam(":tipoactividad", $datos["tipoactividad"]);
        $sql->bindParam(":nombresministro", $datos["nombresministro"]);
        $sql->bindParam(":apellidosministro", $datos["apellidosministro"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
