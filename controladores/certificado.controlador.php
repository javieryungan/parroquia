 <!-- misas.controlador.-->

 <?php
if ($peticionAjax) {
    require_once "../modelos/certificado.modelo.php";
} else {
    require_once "./modelos/certificado.modelo.php";
}

/**
 *
 */
class certificadosControlador extends certificadoModelo
{

    // insertar
    public function CtrInsertarCertificadoBautizo()
    {

        $hoy              = date('Y-m-d');
        $fechacelebracion = $_POST['fechacelebracion'];
        $pagina           = $_POST['pagina'];
        $tomo             = $_POST['tomo'];
        $numero           = $_POST['numero'];
        $nombreparroco    = $_POST['nombreparroco'];
        $nombrebautizado  = $_POST['nombrebautizado'];
        $fechanacimiento  = $_POST['fechanacimiento'];
        $lugarnacimiento  = $_POST['lugarnacimiento'];
        $nombrepadre      = $_POST['nombrepadre'];
        $nombremadre      = $_POST['nombremadre'];
        $padrinos         = $_POST['padrinos'];
        $notamarginal     = $_POST['notamarginal'];
        $aniocivil        = $_POST['aniocivil'];
        $tomocivil        = $_POST['tomocivil'];
        $paginacivil      = $_POST['paginacivil'];
        $actacivil        = $_POST['actacivil'];
        $lugarcivil       = $_POST['lugarcivil'];
        $fechacivil       = $_POST['fechacivil'];
        $observacion      = $_POST['observacion'];
        $certifica        = $_POST['certifica'];
        $usuario          = 1;

        // echo($usuario);

        $datos = [

            "fecharegistro"    => $hoy,
            "fechacelebracion" => $fechacelebracion,
            "pagina"           => $pagina,
            "tomo"             => $tomo,
            "numero"           => $numero,
            "nombreparroco"    => $nombreparroco,
            "nombrebautizado"  => $nombrebautizado,
            "fechanacimiento"  => $fechanacimiento,
            "lugarnacimiento"  => $lugarnacimiento,
            "nombrepadre"      => $nombrepadre,
            "nombremadre"      => $nombremadre,
            "padrinos"         => $padrinos,
            "notamarginal"     => $notamarginal,
            "aniocivil"        => $aniocivil,
            "tomocivil"        => $tomocivil,
            "paginacivil"      => $paginacivil,
            "actacivil"        => $actacivil,
            "lugarcivil"       => $lugarcivil,
            "fechacivil"       => $fechacivil,
            "observacion"      => $observacion,
            "certifica"        => $certifica,
            "usuario"          => $usuario,
        ];
        $insertar = certificadoModelo::MdlInsertarBautizo($datos);
        if ($insertar->rowCount() >= 1) {

            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Insertar misa",
                "Texto"  => "Registro Exitoso",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se registro el certificado de bautizo",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlEditarCertificadoBautizo()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM `certificados` WHERE id_tipoActividad=3 and id_certificado= $id ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    /* paginador */
    public function CtrlPaginadorCertificadoBautizo($pagina, $registros, $consulta)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();
        $query     = '';
        // echo ($consulta != "");
        if ($consulta != "") {
            $query = "SELECT * FROM certificados where ce_nombre_bautizado LIKE '%$consulta%' or ce_fecha_celebracion LIKE '%$consulta%' AND id_tipoActividad =3  ORDER by id_certificado ASC LIMIT $inicio, $registros";
        } else {
            $query = "SELECT * FROM certificados where id_tipoActividad =3 ORDER by id_certificado ASC LIMIT $inicio, $registros";
        }

        // echo ($query);
        $datos    = $conexion->query($query);
        $datos    = $datos->fetchAll();
        $total    = $conexion->query("SELECT COUNT(*) FROM certificados");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '
                <table class="table table-hover text-center">
                   <thead>
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">FECHA REGISTRO</th>
                        <th class="text-center">FECHA CELEBRACION</th>
                        <th class="text-center">NOMBRE BAUTIZADO</th>
                        <th class="text-center">ACTUALIZAR</th>
                        <th class="text-center">ELIMINAR</th>
                        <th class="text-center">IMPRIMIR</th>
                        </tr>
                    </thead>
                <tbody>';
        if ($total >= 1 && $pagina <= $Npaginas) {
            foreach ($datos as $key => $value) {
                $tabla .= '
                        <tr>
                            <td>' . $value['id_certificado'] . '</td>
                            <td>' . $value['ce_fecha_registro'] . '</td>
                            <td>' . $value['ce_fecha_celebracion'] . '</td>
                            <td>' . $value['ce_nombre_bautizado'] . '</td>
                            <td>
                                <a href="' . SERVERURL . 'certificadobautizoedit/' . mainModel::encryption($value['id_certificado']) . '" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/certificadoAjax.php">
                                <input type="hidden" name="certificadobautizoDelete" value="' . mainModel::encryption($value['id_certificado']) . '"> </input>
                                <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                <i class="zmdi zmdi-delete"></i>
                                </button>
                                <div class="RespuestaAjax"></div>
                                </form>
                            </td>
                            <td>
                                <a target="_blank" href="' . SERVERURL . 'reportebautiso/' . mainModel::encryption($value['id_certificado']) . '" class="btn btn-info btn-raised btn-xs">
                                    <i class="zmdi zmdi-print"></i>
                                </a>
                            </td>
                        </tr>';
            }
        } else {
            if ($total >= 1) {
                $tabla .= '
                    <tr>
                        <td><a href="' . SERVERURL . 'certificadobautizo/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
                    </tr>';
            } else {
                $tabla .= '
                    <tr>
                        <td>no se encontraron archivos</td>
                    </tr>';
            }
        }
        $tabla .= '
            </tbody>
            </table>';
        //paginacion fecha izquierda
        if ($total >= 1 && $pagina <= $Npaginas) {
            $tabla .= '<nav class="text-center">
                    <ul class="pagination pagination-sm">';
            if ($pagina == 1) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'certificadobautizo/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadobautizo/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'certificadobautizo/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadobautizo/' . $i . '">' . $i . '</a></li>';
                }
            }
            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'certificadobautizo/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadobautizo/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
                </nav>';
        }
        return $tabla;
    }

    /**
     * Eliminar
     */
    public function CtrlEliminarCertificadoBautizo()
    {
        $idMisa = mainModel::decryption($_POST['certificadobautizoDelete']);

        $idMisallc = mainModel::limpiar_cadena($idMisa);
        $eliminar  = certificadoModelo::MdlEliminarCertificado($idMisallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Misa Eliminada Correctamente",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar la misa",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
    }

    /**
     * Actualizar
     */

    public function CtrlActualizarCertificadoBautizo()
    {
        $id               = mainModel::decryption($_POST['idbautizoe']);
        $fechacelebracion = mainModel::limpiar_cadena($_POST['fechacelebracione']);
        $pagina           = mainModel::limpiar_cadena($_POST['paginae']);
        $tomo             = mainModel::limpiar_cadena($_POST['tomoe']);
        $numero           = mainModel::limpiar_cadena($_POST['numeroe']);
        $nombreparroco    = mainModel::limpiar_cadena($_POST['nombreparrocoe']);
        $nombrebautizado  = mainModel::limpiar_cadena($_POST['nombrebautizadoe']);
        $fechanacimiento  = mainModel::limpiar_cadena($_POST['fechanacimientoe']);
        $lugarnacimiento  = mainModel::limpiar_cadena($_POST['lugarnacimientoe']);
        $nombrepadre      = mainModel::limpiar_cadena($_POST['nombrepadree']);
        $nombremadre      = mainModel::limpiar_cadena($_POST['nombremadree']);
        $padrinos         = mainModel::limpiar_cadena($_POST['padrinose']);
        $notamarginal     = mainModel::limpiar_cadena($_POST['notamarginale']);
        $aniocivil        = mainModel::limpiar_cadena($_POST['aniocivile']);
        $tomocivil        = mainModel::limpiar_cadena($_POST['tomocivile']);
        $paginacivil      = mainModel::limpiar_cadena($_POST['paginacivile']);
        $actacivil        = mainModel::limpiar_cadena($_POST['actacivile']);
        $lugarcivil       = mainModel::limpiar_cadena($_POST['lugarcivile']);
        $fechacivil       = mainModel::limpiar_cadena($_POST['fechacivile']);
        $observacion      = mainModel::limpiar_cadena($_POST['observacione']);
        $certifica        = mainModel::limpiar_cadena($_POST['certificae']);

        $id1   = mainModel::limpiar_cadena($id);
        $datos = [
            "id"               => $id1,
            "fechacelebracion" => $fechacelebracion,
            "pagina"           => $pagina,
            "tomo"             => $tomo,
            "numero"           => $numero,
            "nombreparroco"    => $nombreparroco,
            "nombrebautizado"  => $nombrebautizado,
            "fechanacimiento"  => $fechanacimiento,
            "lugarnacimiento"  => $lugarnacimiento,
            "nombrepadre"      => $nombrepadre,
            "nombremadre"      => $nombremadre,
            "padrinos"         => $padrinos,
            "notamarginal"     => $notamarginal,
            "aniocivil"        => $aniocivil,
            "tomocivil"        => $tomocivil,
            "paginacivil"      => $paginacivil,
            "actacivil"        => $actacivil,
            "lugarcivil"       => $lugarcivil,
            "fechacivil"       => $fechacivil,
            "observacion"      => $observacion,
            "certifica"        => $certifica,
        ];
        $actualizar = certificadoModelo::MdlActualizarCertificadoBautizo($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'certificadobautizo/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Certificado Actualizado",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url,
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar el certificado",
                "Tipo"   => "error",
            ];
        }

        return mainModel::sweet_alert($alerta);
    }

    //paginador matrimonio
    public function CtrlPaginadorCertificadoMatrimonio($pagina, $registros, $consulta)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();
        $query     = '';
        //echo ($consulta != "");
        if ($consulta != "") {
            $query = "SELECT * FROM certificados where id_tipoActividad not in (3)  AND ce_nombre_padre LIKE '%$consulta%' OR ce_nombre_madre LIKE '%$consulta%' OR ce_fecha_celebracion LIKE '%$consulta%' AND ce_nombre_bautizado is null AND  id_tipoActividad =10  ORDER by id_certificado ASC LIMIT $inicio, $registros";
        } else {
            $query = "SELECT * FROM certificados where id_tipoActividad =10 ORDER by id_certificado ASC LIMIT $inicio, $registros";
        }

        // echo ($query);
        $datos = $conexion->query($query);

        $datos    = $datos->fetchAll();
        $total    = $conexion->query("SELECT COUNT(*) FROM certificados");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '
                <table class="table table-hover text-center">
                   <thead>
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">FECHA CELEBRACION</th>
                        <th class="text-center">NOMBRE NOVIO</th>
                        <th class="text-center">NOMBRE NOVIA</th>
                        <th class="text-center">ACTUALIZAR</th>
                        <th class="text-center">ELIMINAR</th>
                        <th class="text-center">IMPRIMIR</th>
                        </tr>
                    </thead>
                <tbody>';
        if ($total >= 1 && $pagina <= $Npaginas) {
            foreach ($datos as $key => $value) {
                $tabla .= '
                        <tr>
                            <td>' . $value['id_certificado'] . '</td>
                            <td>' . $value['ce_fecha_celebracion'] . '</td>
                            <td>' . $value['ce_nombre_padre'] . '</td>
                            <td>' . $value['ce_nombre_madre'] . '</td>
                            <td>
                            <a href="' . SERVERURL . 'certificadomatrimonioedit/' . mainModel::encryption($value['id_certificado']) . '" class="btn btn-success btn-raised btn-xs">
                                <i class="zmdi zmdi-refresh"></i>
                            </a>
                        </td>
                        <td>
                            <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/certificadoAjax.php">
                            <input type="hidden" name="certificadomatrimonioDelete" value="' . mainModel::encryption($value['id_certificado']) . '"> </input>
                            <button type="submit" class="btn btn-danger btn-raised btn-xs">
                            <i class="zmdi zmdi-delete"></i>
                            </button>
                            <div class="RespuestaAjax"></div>
                            </form>
                        </td>
                        <td>
                            <a target="_blank" href="' . SERVERURL . 'reportematrimonio/' . mainModel::encryption($value['id_certificado']) . '" class="btn btn-info btn-raised btn-xs">
                                <i class="zmdi zmdi-print"></i>
                            </a>
                        </td>
                    </tr>';
            }
        } else {
            if ($total >= 1) {
                $tabla .= '
                    <tr>
                        <td><a href="' . SERVERURL . 'certificadomatrimonio/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
                    </tr>';
            } else {
                $tabla .= '
                    <tr>
                        <td>no se encontraron archivos</td>
                    </tr>';
            }
        }
        $tabla .= '
            </tbody>
            </table>';
        //paginacion fecha izquierda
        if ($total >= 1 && $pagina <= $Npaginas) {
            $tabla .= '<nav class="text-center">
                    <ul class="pagination pagination-sm">';
            if ($pagina == 1) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . $i . '">' . $i . '</a></li>';
                }
            }
            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'certificadomatrimonio/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
                </nav>';
        }
        return $tabla;
    }
    //mostrar
    public function CtrlEditarCertificadoMatrimonio()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM `certificados` WHERE id_tipoActividad=10 and id_certificado= $id ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }
    /**
     * Actualizar certificado matrimonio
     */
    public function CtrlActualizarCertificadoMatrimonio()
    {
        $id               = mainModel::decryption($_POST['idmatrimonioe']);
        $fechacelebracion = mainModel::limpiar_cadena($_POST['fechacelebracione']);
        $pagina           = mainModel::limpiar_cadena($_POST['paginae']);
        $tomo             = mainModel::limpiar_cadena($_POST['tomoe']);
        $numero           = mainModel::limpiar_cadena($_POST['numeroe']);
        $nombreparroco    = mainModel::limpiar_cadena($_POST['nombreparrocoe']);
        $nombrepadre      = mainModel::limpiar_cadena($_POST['nombrenovioe']);
        $nombremadre      = mainModel::limpiar_cadena($_POST['nombrenoviae']);
        $padrinos         = mainModel::limpiar_cadena($_POST['padrinose']);
        $notamarginal     = mainModel::limpiar_cadena($_POST['notamarginale']);
        $intra            = mainModel::limpiar_cadena($_POST['introe']);
        /*$aniocivil = mainModel::limpiar_cadena($_POST['aniocivile']);
        $tomocivil = mainModel::limpiar_cadena($_POST['tomocivile']);
        $paginacivil = mainModel::limpiar_cadena($_POST['paginacivile']);
        $actacivil = mainModel::limpiar_cadena($_POST['actacivile']);
        $lugarcivil = mainModel::limpiar_cadena($_POST['lugarcivile']);
        $fechacivil = mainModel::limpiar_cadena($_POST['fechacivile']);*/
        $observacion = mainModel::limpiar_cadena($_POST['observacione']);
        $certifica   = mainModel::limpiar_cadena($_POST['certificae']);

        $id1   = mainModel::limpiar_cadena($id);
        $datos = [
            "id"               => $id1,
            "fechacelebracion" => $fechacelebracion,
            "pagina"           => $pagina,
            "tomo"             => $tomo,
            "numero"           => $numero,
            "nombreparroco"    => $nombreparroco,
            "nombrepadre"      => $nombrepadre,
            "nombremadre"      => $nombremadre,
            "padrinos"         => $padrinos,
            "notamarginal"     => $notamarginal,
            "intra"            => $intra,
            /*"aniocivil" => $aniocivil,
            "tomocivil" => $tomocivil,
            "paginacivil" => $paginacivil,
            "actacivil" => $actacivil,
            "lugarcivil" => $lugarcivil,
            "fechacivil" => $fechacivil,*/
            "observacion"      => $observacion,
            "certifica"        => $certifica,
        ];
        $actualizar = certificadoModelo::MdlActualizarCertificadoMatrimonio($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'certificadomatrimonio/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Certificado Actualizado",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url,
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar el certificado",
                "Tipo"   => "error",
            ];
        }

        return mainModel::sweet_alert($alerta);
    }

    /**
     * Eliminar
     */
    public function CtrlEliminarCertificadoMatrimonio()
    {
        $idMisa = mainModel::decryption($_POST['certificadomatrimonioDelete']);

        $idMisallc = mainModel::limpiar_cadena($idMisa);
        $eliminar  = certificadoModelo::MdlEliminarCertificado($idMisallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Certificado Eliminada Correctamente",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar la misa",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
    }

    public function CtrInsertarCertificadoMatrimonio()
    {

        $hoy              = date('Y-m-d');
        $fechacelebracion = $_POST['fechacelebracion'];
        $pagina           = $_POST['pagina'];
        $tomo             = $_POST['tomo'];
        $numero           = $_POST['numero'];
        $nombreparroco    = $_POST['nombreparroco'];
        $nombrenovio      = $_POST['nombrenovio'];
        $nombrenovia      = $_POST['nombrenovia'];
        $padrinos         = $_POST['padrinos'];
        $intro            = $_POST['intro'];
        $notamarginal     = $_POST['notamarginale'];
        /*$aniocivil = $_POST['aniocivil'];
        $tomocivil = $_POST['tomocivil'];
        $paginacivil = $_POST['paginacivil'];
        $actacivil = $_POST['actacivil'];
        $lugarcivil = $_POST['lugarcivil'];
        $fechacivil = $_POST['fechacivil'];*/
        $observacion = $_POST['observacion'];
        $certifica   = $_POST['certifica'];
        $usuario     = 1;

        // echo($usuario);

        $datos = [

            "fecharegistro"    => $hoy,
            "fechacelebracion" => $fechacelebracion,
            "pagina"           => $pagina,
            "tomo"             => $tomo,
            "numero"           => $numero,
            "nombreparroco"    => $nombreparroco,
            "nombrenovio"      => $nombrenovio,
            "nombrenovia"      => $nombrenovia,
            "padrinos"         => $padrinos,
            "intro"            => $intro,
            "notamarginal"     => $notamarginal,
            /*"aniocivil" => $aniocivil,
            "tomocivil" => $tomocivil,
            "paginacivil" => $paginacivil,
            "actacivil" => $actacivil,
            "lugarcivil" => $lugarcivil,
            "fechacivil" => $fechacivil,*/
            "observacion"      => $observacion,
            "certifica"        => $certifica,
            "usuario"          => $usuario,
        ];
        $insertar = certificadoModelo::MdlInsertarMatrimonio($datos);
        if ($insertar->rowCount() >= 1) {

            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Insertar misa",
                "Texto"  => "Registro Exitoso",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se registro el certificado de bautizo",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }
}