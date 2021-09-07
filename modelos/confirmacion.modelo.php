<!-- confirmacion.modelo-->

<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class confirmacionModelo extends mainModel
{

    protected function MdlInsertarConfirmacion($datos)
    {

        $fecharegistro    = $datos['fecharegistro'];
        $fechacelebracion = $datos['fechacelebracion'];
        $nombres           = $datos['nombres'];
        $apellidos             = $datos['apellidos'];
        $nombrepadre           = $datos['nombrepadre'];
        $apellidopadre    = $datos['apellidopadre'];
        $telefonopadre  = $datos['telefonopadre'];
        $nombremadre  = $datos['nombremadre'];
        $apellidomadre  = $datos['apellidomadre'];
        $telefonomadre         = $datos['telefonomadre'];
        $nombrepadrino     = $datos['nombrepadrino'];
        $apellidopadrino        = $datos['apellidopadrino'];
        $nombremadrina        = $datos['nombremadrina'];
        $apellidomadrina      = $datos['apellidomadrina'];
        $nombreministro        = $datos['nombreministro'];
        $apellidoministro       = $datos['apellidoministro'];
        $pdf       = $datos['pdf'];
        $fechanacimiento = $datos['fechanacimiento'];
        $tipoactividad = 4;
        $usuario = $datos['usuario'];

        // echo $pdf;

        $sql = mainModel::conectar()->prepare("INSERT INTO datosactividad (
            id_tipoActividad , id_usuario, act_fecharegistro, act_fechacelebracion, act_nombres, 
            act_apellidos, act_fechanacimiento, act_nombrespadre, act_apellidospadre,
            act_telefonopadre, act_nombresmadre, act_apellidosmadre, act_telefonomadre, act_nombrespadrino, 
           act_apellidospadrino, act_nombresmadrina, act_apellidosmadrina, act_nombresministro, 
            act_apellidosministro, act_pdfceertificadobautizo
            ) 
            VALUES (
                :tipoactividad, :usuario,:fecharegistro, :fechacelebracion, :nombres,
                :apellidos, :fechanacimiento, :nombrepadre, :apellidopadre, :telefonopadre, 
                :nombremadre,:apellidomadre, :telefonomadre, :nombrepadrino, :apellidopadrino, 
                :nombremadrina, :apellidomadrina, :nombreministro,:apellidoministro,  :pdf
            )");

        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":nombres", $nombres);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":nombrepadre", $nombrepadre);
        $sql->bindParam(":apellidopadre", $apellidopadre);
        $sql->bindParam(":telefonopadre", $telefonopadre);
        $sql->bindParam(":nombremadre", $nombremadre);
        $sql->bindParam(":apellidomadre", $apellidomadre);
        $sql->bindParam(":telefonomadre", $telefonomadre);
        $sql->bindParam(":nombrepadrino", $nombrepadrino);
        $sql->bindParam(":apellidopadrino", $apellidopadrino);
        $sql->bindParam(":nombremadrina", $nombremadrina);
        $sql->bindParam(":apellidomadrina", $apellidomadrina);
        $sql->bindParam(":nombreministro", $nombreministro);
        $sql->bindParam(":apellidoministro", $apellidoministro);
        $sql->bindParam(":pdf", $pdf);
        $sql->bindParam(":fechanacimiento", $fechanacimiento);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // actualizar
    protected function MdlActualizarCertificadoBautizo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE certificados
           SET  
           ce_fecha_celebracion=:fechacelebracion, 
           ce_pagina=:pagina, 
           ce_tomo=:tomo, 
           ce_nombre_bautizado=:nombrebautizado, 
           ce_nombre_padre=:nombrepadre, 
           ce_nombre_madre=:nombremadre, 
           ce_testigos_padrinos=:padrinos,
           ce_certifica=:certifica, 
           ce_fecha_nacimiento=:fechanacimiento, 
           ce_lugar_nacimiento=:lugarnacimiento, 
           ce_anio_civil=:aniocivil, 
           ce_tomo_civil=:tomocivil, 
           ce_pagina_civil=:paginacivil, 
           ce_acta_civil=:actacivil, 
           ce_lugar_civil=:lugarcivil, 
           ce_fecha_civil=:fechacivil, 
           ce_numero=:numero, 
           ce_nombre_parroco=:nombreparroco, 
           ce_observacion=:observacion, 
           ce_nota_marginal=:notamarginal 
           where id_certificado=:id");

        $sql->bindParam(":fechacelebracion", $datos['fechacelebracion']);
        $sql->bindParam(":pagina", $datos['pagina']);
        $sql->bindParam(":tomo",  $datos['tomo']);
        $sql->bindParam(":nombrebautizado", $datos['nombrebautizado']);
        $sql->bindParam(":nombrepadre", $datos['nombrepadre']);
        $sql->bindParam(":nombremadre", $datos['nombremadre']);
        $sql->bindParam(":padrinos", $datos['padrinos']);
        $sql->bindParam(":certifica", $datos['certifica']);
        $sql->bindParam(":fechanacimiento", $datos['fechanacimiento']);
        $sql->bindParam(":lugarnacimiento",  $datos['lugarnacimiento']);
        $sql->bindParam(":aniocivil",  $datos['aniocivil']);
        $sql->bindParam(":tomocivil", $datos['tomocivil']);
        $sql->bindParam(":paginacivil", $datos['paginacivil']);
        $sql->bindParam(":actacivil", $datos['actacivil']);
        $sql->bindParam(":lugarcivil", $datos['lugarcivil']);
        $sql->bindParam(":fechacivil", $datos['fechacivil']);
        $sql->bindParam(":numero", $datos['numero']);
        $sql->bindParam(":nombreparroco", $datos['nombreparroco']);
        $sql->bindParam(":observacion",  $datos['observacion']);
        $sql->bindParam(":notamarginal",  $datos['notamarginal']);
        $sql->bindParam(":id", $datos["id"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlInsertarMatrimonio($datos)
    {

        $fecharegistro = $datos["fecharegistro"];
        $fechacelebracion = $datos['fechacelebracion'];
        $pagina = $datos['pagina'];
        $tomo = $datos['tomo'];
        $numero = $datos['numero'];
        $nombreparroco = $datos['nombreparroco'];
        $intro = $datos['intro'];
        $nombrepadre = $datos['nombrenovio'];
        $nombremadre = $datos['nombrenovia'];
        $padrinos = $datos['padrinos'];
        $notamarginal = $datos['notamarginal'];
        /*$aniocivil = $datos['aniocivil'];
        $tomocivil = $datos['tomocivil'];
        $paginacivil = $datos['paginacivil'];
        $actacivil = $datos['actacivil'];
        $lugarcivil = $datos['lugarcivil'];
        $fechacivil = $datos['fechacivil'];*/
        $observacion = $datos['observacion'];
        $certifica = $datos['certifica'];
        $tipoactividad = 10;
        $usuario = $datos['usuario'];

        $sql = mainModel::conectar()->prepare("INSERT INTO `certificados` (
            id_tipoActividad, id_usuario, ce_fecha_registro, ce_fecha_celebracion, ce_pagina, 
            ce_tomo, ce_intro_extra ,ce_nombre_padre, ce_nombre_madre, ce_testigos_padrinos,
            ce_certifica, /*ce_anio_civil, ce_tomo_civil, 
            ce_pagina_civil, ce_acta_civil, ce_lugar_civil, ce_fecha_civil,*/ ce_numero, 
            ce_nombre_parroco, ce_observacion, ce_nota_marginal
            ) 
            VALUES (
                :tipoactividad, :usuario,:fecharegistro, :fechacelebracion, :pagina,
                :tomo, :intro ,:nombrepadre, :nombremadre, :padrinos, 
                :certifica,/* :aniocivil, :tomocivil, 
                :paginacivil, :actacivil, :lugarcivil,:fechacivil,  */:numero,
                :nombreparroco,:observacion, :notamarginal
            )");

        $sql->bindParam(":tipoactividad", $tipoactividad);
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":fecharegistro", $fecharegistro);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":tomo", $tomo);
        $sql->bindParam(":intro", $intro);
        $sql->bindParam(":numero", $numero);
        $sql->bindParam(":nombrepadre", $nombrepadre);
        $sql->bindParam(":nombremadre", $nombremadre);
        $sql->bindParam(":padrinos", $padrinos);
        /* $sql->bindParam(":aniocivil", $aniocivil);
        $sql->bindParam(":tomocivil", $tomocivil);
        $sql->bindParam(":paginacivil", $paginacivil);
        $sql->bindParam(":actacivil", $actacivil);
        $sql->bindParam(":lugarcivil", $lugarcivil);
        $sql->bindParam(":fechacivil", $fechacivil);*/
        $sql->bindParam(":certifica", $certifica);
        $sql->bindParam(":observacion", $observacion);
        $sql->bindParam(":nombreparroco", $nombreparroco);
        $sql->bindParam(":notamarginal", $notamarginal);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    /**
     * actualizar  certificado matrimonio
     */
    // actualizar
    protected function MdlActualizarCertificadoMatrimonio($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE certificados
            SET  
            ce_fecha_celebracion=:fechacelebracion, 
            ce_pagina=:pagina, 
            ce_tomo=:tomo, 
            ce_nombre_padre=:nombrepadre, 
            ce_nombre_madre=:nombremadre, 
            ce_testigos_padrinos=:padrinos,
            ce_certifica=:certifica, 
            ce_intro_extra=:intra,
            /*ce_anio_civil=:aniocivil, 
            ce_tomo_civil=:tomocivil, 
            ce_pagina_civil=:paginacivil, 
            ce_acta_civil=:actacivil, 
            ce_lugar_civil=:lugarcivil, 
            ce_fecha_civil=:fechacivil, */
            ce_numero=:numero, 
            ce_nombre_parroco=:nombreparroco, 
            ce_observacion=:observacion, 
            ce_nota_marginal=:notamarginal 
            where id_certificado=:id");

        $sql->bindParam(":fechacelebracion", $datos['fechacelebracion']);
        $sql->bindParam(":pagina", $datos['pagina']);
        $sql->bindParam(":tomo",  $datos['tomo']);
        $sql->bindParam(":nombrepadre", $datos['nombrepadre']);
        $sql->bindParam(":nombremadre", $datos['nombremadre']);
        $sql->bindParam(":padrinos", $datos['padrinos']);
        $sql->bindParam(":certifica", $datos['certifica']);
        $sql->bindParam(":intra", $datos['intra']);
        /*$sql->bindParam(":aniocivil",  $datos['aniocivil']);
         $sql->bindParam(":tomocivil", $datos['tomocivil']);
         $sql->bindParam(":paginacivil", $datos['paginacivil']);
         $sql->bindParam(":actacivil", $datos['actacivil']);
         $sql->bindParam(":lugarcivil", $datos['lugarcivil']);
         $sql->bindParam(":fechacivil", $datos['fechacivil']);*/
        $sql->bindParam(":numero", $datos['numero']);
        $sql->bindParam(":nombreparroco", $datos['nombreparroco']);
        $sql->bindParam(":observacion",  $datos['observacion']);
        $sql->bindParam(":notamarginal",  $datos['notamarginal']);
        $sql->bindParam(":id", $datos["id"]);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // eliminar
    protected function MdlEliminarCertificado($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE  FROM  certificados where id_certificado=:dato");
        $sql->bindParam(":dato", $dato);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
}
