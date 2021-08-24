<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class asistenciacaritaModelo extends mainModel
{

    protected function MdlInsertarAsistenciacarita($datos)
    {

        $fecharegistro = $datos["fecharegistro"];
        $beneficiario  = $datos["beneficiario"];
        $carita        = $datos["carita"];

        $sql = mainModel::conectar()->prepare("INSERT INTO usuariocarita (uc_fechaAsistencia, id_usuario, id_carita)

            VALUES ( :fecharegistro, :beneficiario, :carita)");

        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":beneficiario", $beneficiario);
        $sql->bindParam(":carita", $carita);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlMostrarAsistenciacarita()
    {
        $sql = mainModel::conectar()->prepare("SELECT uc.uc_fechaAsistencia, u.usu_nombres,u.usu_apellidos,u.usu_cedula,u.usu_genero,u.usu_telefono,u.usu_direccion,c.car_descripcion,c.car_tipobeneficio  FROM  usuario as u inner join usuariocarita as uc on u.id_usuario=uc.id_usuario inner join caritas as c on c.id_carita=uc.id_carita ");

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
    protected function MdlEliminarAsistenciacarita($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  usuariocarita where id_usuario=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    protected function MdlActualizarAsistenciacarita($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE usuariocarita
         SET  id_usuario=:beneficiario, id_carita=:carita, ac_fechaAsistencia=:fecharegistro where id_usuario=:id");

        $sql->bindParam(":id", $datos["id"]);
        $sql->bindParam(":beneficiario", $datos["beneficiario"]);
        $sql->bindParam(":carita", $datos["carita"]);
        $sql->bindParam(":fecharegistro", $datos["fecharegistro"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
