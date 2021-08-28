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
        $fechacelebracion = $datos['fecha_celebracion'];
        $pagina = $datos['pagina'];
        $tomo = $datos['tomo'];
        $numero = $datos['numero'];
        $nombreparroco = $datos['nombre_parroco'];
        $nombrebautizado = $datos['nombre_bautizado'];
        $fechanacimiento = $datos['fecha_nacimiento'];
        $lugarnacimiento = $datos['lugar_nacimiento'];
        $nombrepadre = $datos['nombre_padre'];
        $nombremadre = $datos['nombre_madre'];
        $padrinos = $datos['padrinos'];
        $notamarginal = $datos['nota_marginal'];
        $aniocivil = $datos['anio_civil'];
        $tomocivil = $datos['tomo_civil'];
        $paginacivil = $datos['pagina_civil'];
        $actacivil = $datos['acta_civil'];
        $lugarcivil = $datos['lugar_civil'];
        $fechacivil = $datos['fecha_civil'];
       

        $sql = mainModel::conectar()->prepare("INSERT INTO certificados 
        (ide_tipoActividad, ce_fecha_registro, ce_fecha_celebracion, ce_pagina, ce_tomo,ce_numero, 
        ce_nombre_bautizado, ce_nombre_padre, ce_nombre_madre, ce_testigos_padrinos,ce_fecha_nacimiento,
        ce_lugar_nacimiento,ce_anio_civil,ce_tomo_civil,ce_pagina_civil,ce_acta_civil,ce_lugar_civil,
        ce_fecha_civil,ce_certifica)
        VALUES ( 3,:fecharegistro, :fechacelebracion, :pagina, :tomo, :numero, 
        :nombrebautizado, :nombrepadre, :nombremadre, :padrinos, :fechanacimiento,
        :lugarnacimiento, :aniocivil, :tomocivil, :paginacivil, :actacivil, :lugarcivil,
        :fechacivil, :nombreparroco)");

        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":tomo", $tomo);
        $sql->bindParam(":numero", $numero);
        $sql->bindParam(":nombrebautizado", $nombrebautizado);
        $sql->bindParam(":nombreparroco", $nombreparroco);
        $sql->bindParam(":fechanacimiento", $fechanacimiento);
        $sql->bindParam(":lugarnacimiento", $lugarnacimiento);
        $sql->bindParam(":nombrepadre", $nombrepadre);
        $sql->bindParam(":nombremadre", $nombremadre);
        $sql->bindParam(":padrinos", $padrinos);
        $sql->bindParam(":notamarginal", $notamarginal);
        $sql->bindParam(":aniocivil", $aniocivil);
        $sql->bindParam(":tomocivil", $tomocivil);
        $sql->bindParam(":paginacivil", $paginacivil);
        $sql->bindParam(":actacivil", $actacivil);
        $sql->bindParam(":lugarcivil", $lugarcivil);
        $sql->bindParam(":fechacivil", $fechacivil);

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
