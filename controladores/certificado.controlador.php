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

        public function CtrlEditarMisa()
        {
            $v         = explode("/", $_GET['views']);
            $id        = mainModel::decryption(($v[1]));
            $id        = mainModel::limpiar_cadena($id);
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM certificados WHERE id_certificado= $id ");

            $respuesta = $consulta1->fetch();
            return $respuesta;
        }

        // insertar
        public function CtrInsertarCertificadoBautizo()
        {
            /* $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Advertencia",
                "Texto"  => "El campo horario es hobligatorio.",
                "Tipo"   => "warning"
            ]; */
            $hoy               = date('Y-m-d');
            $fechacelebracion = $_POST['fechacelebracion'];
            $pagina = $_POST['pagina'];
            $tomo = $_POST['tomo'];
            $numero = $_POST['numero'];
            $nombreparroco = $_POST['nombreparroco'];
            $nombrebautizado = $_POST['nombrebautizado'];
            $fechanacimiento = $_POST['fechanacimiento'];
            $lugarnacimiento = $_POST['lugarnacimiento'];
            $nombrepadre = $_POST['nombrepadre'];
            $nombremadre = $_POST['nombremadre'];
            $padrinos = $_POST['padrinos'];
            $notamarginal = $_POST['notamarginal'];
            $aniocivil = $_POST['aniocivil'];
            $tomocivil = $_POST['tomocivil'];
            $paginacivil = $_POST['paginacivil'];
            $actacivil = $_POST['actacivil'];
            $lugarcivil = $_POST['lugarcivil'];
            $fechacivil = $_POST['fechacivil'];
            $observacion = $_POST['observacion'];
            $certifica = $_POST['certifica'];

            $datos = [

                "fecharegistro"     => $hoy,
                "fechacelebracion"  => $fechacelebracion,
                "pagina"       => $pagina,
                "tomo"     => $tomo,
                "numero"     => $numero,
                "nombreparroco"   => $nombreparroco,
                "nombrebautizado" => $nombrebautizado,
                "fechanacimiento" => $fechanacimiento,
                "lugarnacimiento" => $lugarnacimiento,
                "nombrepadre" => $nombrepadre,
                "nombremadre" => $nombremadre,
                "padrinos" => $padrinos,
                "notamarginal" => $notamarginal,
                "aniocivil" => $aniocivil,
                "tomocivil" => $tomocivil,
                "paginacivil" => $paginacivil,
                "actacivil" => $actacivil,
                "lugarcivil" => $lugarcivil,
                "fechacivil" => $fechacivil,
                "observacion" => $observacion,
                "certifica" => $certifica
            ];

            $insertar = certificadoModelo::MdlInsertarBautizo($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar misa",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro el certificado de bautizo",
                    "Tipo"   => "error"
                ];
            }
            return mainModel::sweet_alert($alerta);
            // return var_dump($datos);
        }

        /* paginador */
        public function CtrlPaginadorCertificadoBautizo($pagina, $registros)
        {
            $pagina    = mainModel::limpiar_cadena($pagina);
            $registros = mainModel::limpiar_cadena($registros);
            $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
            $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
            $conexion  = mainModel::conectar();

            $datos = $conexion->query("SELECT * FROM certificados where id_tipoActividad =3 ORDER by id_certificado ASC LIMIT $inicio, $registros");

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
                                <a href="' . SERVERURL . 'misasup/' . mainModel::encryption($value['id_certificado']) . '" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/horarioAjax.php">
                                <input type="hidden" name="horarioDelete" value="' . mainModel::encryption($value['id_certificado']) . '"> </input>
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

        public function CtrlEliminarHorario()
        {
            $idMisa = mainModel::decryption($_POST['horarioDelete']);

            $idMisallc = mainModel::limpiar_cadena($idMisa);
            $eliminar  = certificadoModelo::MdlEliminarCertificado($idMisallc);
            if ($eliminar->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Eliminar Datos",
                    "Texto"  => "Misa Eliminada Correctamente",
                    "Tipo"   => "success"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se pudo eliminar la misa",
                    "Tipo"   => "error"
                ];
            }
            return mainModel::sweet_alert($alerta);
        }
    }
