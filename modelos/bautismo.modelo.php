<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class bautismoModelo extends mainModel
{

    protected function MdlInsertarBautismo($datos)
    {

        $fechainscripcion  = $datos["fechainscripcion"];
        $tomo              = $datos["tomo"];
        $pagina            = $datos["pagina"];
        $numero            = $datos["numero"];
        $nombres           = $datos["nombres"];
        $apellidos         = $datos["apellidos"];
        $nombrespadre      = $datos["nombrespadre"];
        $apellidospadre    = $datos["apellidospadre"];
        $telefonopadre     = $datos["telefonopadre"];
        $direccionpadre    = $datos["direccionpadre"];
        $nombresmadre      = $datos["nombresmadre"];
        $apellidosmadre    = $datos["apellidosmadre"];
        $telefonomadre     = $datos["telefonomadre"];
        $direccionmadre    = $datos["direccionmadre"];
        $nombrespadrino    = $datos["nombrespadrino"];
        $apellidospadrino  = $datos["apellidospadrino"];
        $civilpadrino      = $datos["civilpadrino"];
        $nombresmadrina    = $datos["nombresmadrina"];
        $apellidosmadrina  = $datos["apellidosmadrina"];
        $civilmadrina      = $datos["civilmadrina"];
        $fechacelebracion  = $datos["fechacelebracion"];
        $nombresministro   = $datos["nombresministro"];
        $apellidosministro = $datos["apellidosministro"];
        $actanacimiento    = $datos["actanacimiento"];
        $matrimoniopadrino = $datos["matrimoniopadrino"];
        $matrimoniomadrina = $datos["matrimoniomadrina"];
        $aporte            = $datos["aporte"];

        $sql = mainModel::conectar()->prepare("INSERT INTO bautizos(bau_fechainscripcion, bau_tomo, bau_pagina, bau_numero, bau_nombres, bau_apellidos, bau_nompadre,bau_apepadre, bau_telpadre, bau_dirpadre, bau_nommadre, bau_apemadre, bau_telmadre, bau_dirmadre, bau_nompadrino, bau_apepadrino, bau_estcivilpadrino, bau_nommadrina, bau_apemadrina, bau_estcivilmadrina, bau_fechacelebracion, bau_pdfactanacimiento, bau_pdffematrimoniopadrino, bau_pdffematrimoniomadrina, bau_nombresMinistro, bau_apellidosMinistro, id_aporte)

            VALUES (:fechainscripcion,:tomo,:pagina,:numero,:nombres,:apellidos,:nombrespadre,:apellidospadre,:telefonopadre,:direccionpadre,:nombresmadre,:apellidosmadre,:telefonomadre,:direccionmadre,:nombrespadrino,:apellidospadrino,:civilpadrino,:nombresmadrina,:apellidosmadrina,:civilmadrina,:fechacelebracion,:nombresministro,:apellidosministro,:actanacimiento,:matrimoniopadrino,:matrimoniomadrina,:aporte");

        $sql->bindParam(":fechainscripcion", $fechainscripcion);
        $sql->bindParam(":tomo", $tomo);
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":numero", $numero);
        $sql->bindParam(":nombres", $nombres);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":nombrespadre", $nombrespadre);
        $sql->bindParam(":apellidospadre", $apellidospadre);
        $sql->bindParam(":telefonopadre", $telefonopadre);
        $sql->bindParam(":direccionpadre", $direccionpadre);
        $sql->bindParam(":nombresmadre", $nombrespadre);
        $sql->bindParam(":apellidosmadre", $apellidosmadre);
        $sql->bindParam(":telefonomadre", $telefonomadre);
        $sql->bindParam(":direccionmadre", $direccionmadre);
        $sql->bindParam(":nombrespadrino", $nombrespadrino);
        $sql->bindParam(":apellidospadrino", $apellidospadrino);
        $sql->bindParam(":civilpadrino", $civilpadrino);
        $sql->bindParam(":nombresmadrina", $nombresmadrina);
        $sql->bindParam(":apellidosmadrina", $apellidosmadrina);
        $sql->bindParam(":civilmadrina", $civilmadrina);
        $sql->bindParam(":fechacelebracion", $fechacelebracion);
        $sql->bindParam(":nombresministro", $nombresministro);
        $sql->bindParam(":apellidosministro", $apellidosministro);
        $sql->bindParam(":actanacimiento", $actanacimiento);
        $sql->bindParam(":matrimoniopadrino", $matrimoniopadrino);
        $sql->bindParam(":matrimoniomadrina", $matrimoniomadrina);
        $sql->bindParam(":aporte", $aporte);

        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlMostrarbautismo()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM  bautizo");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;

    }
}
