<!-- recibo.modelo-->

<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class reciboModelo extends mainModel
{

    protected function MdlInsertarRecibo($datos)
    {

        $fecha    = $datos["fecha"];
        $nombre   = $datos['nombre'];
        $concepto = $datos['concepto'];
        $cantidad = $datos['cantidad'];

        $sql = mainModel::conectar()->prepare("INSERT INTO `recibo` (
           rec_fecha,  rec_nombre, rec_concepto, rec_cantidad
            )
            VALUES (
                :fecha, :nombre,:concepto, :cantidad)");

        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":concepto", $concepto);
        $sql->bindParam(":cantidad", $cantidad);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // actualizar
    protected function MdlActualizarRecibo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE recibo
           SET
           rec_fecha=:fecha,
           rec_nombre=:nombre,
           rec_concepto=:concepto,
           rec_cantidad=:cantidad,

           where id_recibo=:id");

        $sql->bindParam(":fecha", $datos['fecha']);
        $sql->bindParam(":nombre", $datos['nombre']);
        $sql->bindParam(":concepto", $datos['concepto']);
        $sql->bindParam(":cantidad", $datos['cantidad']);
        $sql->bindParam(":id", $datos["id"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // eliminar
    protected function MdlEliminarRecibo($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  recibo where id_recibo=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

}
