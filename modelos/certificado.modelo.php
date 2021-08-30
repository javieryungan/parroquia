<!-- misas.modelo-->

<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class certificadoModelo extends mainModel
{

    protected function MdlInsertarBautizo($datos)
    {

        $fecharegistro = $datos["fecharegistro"];
        $fechacelebracion = $datos['fechacelebracion'];
        $pagina = $datos['pagina'];
        $tomo = $datos['tomo'];
        $numero = $datos['numero'];
        $nombreparroco = $datos['nombreparroco'];
        $nombrebautizado = $datos['nombrebautizado'];
        $fechanacimiento = $datos['fechanacimiento'];
        $lugarnacimiento = $datos['lugarnacimiento'];
        $nombrepadre = $datos['nombrepadre'];
        $nombremadre = $datos['nombremadre'];
        $padrinos = $datos['padrinos'];
        $notamarginal = $datos['notamarginal'];
        $aniocivil = $datos['aniocivil'];
        $tomocivil = $datos['tomocivil'];
        $paginacivil = $datos['paginacivil'];
        $actacivil = $datos['actacivil'];
        $lugarcivil = $datos['lugarcivil'];
        $fechacivil = $datos['fechacivil'];
        $observacion = $datos['observacion'];
        $certifica = $datos['certifica'];
        $tipoactividad = 3;
        $usuario = 1;


        $sql = mainModel::conectar()->prepare("INSERT INTO certificados 
        (
        ide_tipoActividad,id_usuario, ce_fecha_registro, ce_fecha_celebracion, ce_pagina, 
        ce_tomo,ce_numero,ce_nombre_bautizado, ce_nombre_padre, ce_nombre_madre, 
        ce_testigos_padrinos,ce_fecha_nacimiento,ce_lugar_nacimiento,ce_anio_civil,ce_tomo_civil,
        ce_pagina_civil,ce_acta_civil,ce_lugar_civil,ce_fecha_civil,ce_certifica,
        ce_observacion,ce_nombre_parroco,ce_nota_marginal
        )
        VALUES ( 
        :tipoactividad, :usuario,:fecharegistro, :fechacelebracion, :pagina, 
        :tomo, :numero, :nombrebautizado, :nombrepadre, :nombremadre, 
        :padrinos, :fechanacimiento, :lugarnacimiento, :aniocivil, :tomocivil, 
        :paginacivil, :actacivil, :lugarcivil,:fechacivil, :certifica, 
        :observacion, :nombreparroco, :notamarginal
        )");

        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":tomo", $tomo);
        $sql->bindParam(":numero", $numero);
        $sql->bindParam(":nombrebautizado", $nombrebautizado);
        $sql->bindParam(":nombrepadre", $nombrepadre);
        $sql->bindParam(":nombremadre", $nombremadre);
        $sql->bindParam(":padrinos", $padrinos);
        $sql->bindParam(":fechanacimiento", $fechanacimiento);
        $sql->bindParam(":lugarnacimiento", $lugarnacimiento);
        $sql->bindParam(":aniocivil", $aniocivil);
        $sql->bindParam(":tomocivil", $tomocivil);
        $sql->bindParam(":paginacivil", $paginacivil);
        $sql->bindParam(":actacivil", $actacivil);
        $sql->bindParam(":lugarcivil", $lugarcivil);
        $sql->bindParam(":fechacivil", $fechacivil);
        $sql->bindParam(":certifica", $certifica);
        $sql->bindParam(":observacion", $observacion);
        $sql->bindParam(":nombreparroco", $nombreparroco);
        $sql->bindParam(":notamarginal", $notamarginal);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    // eliminar
    protected function MdlEliminarCertificado($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  horario_actividad where ide_horario=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
}
