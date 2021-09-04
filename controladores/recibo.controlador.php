 <!-- recibo.controlador.-->

 <?php
if ($peticionAjax) {
    require_once "../modelos/recibo.modelo.php";
} else {
    require_once "./modelos/recibo.modelo.php";
}

/**
 *
 */
class reciboControlador extends reciboModelo
{

    // insertar
    public function CtrInsertarRecibo()
    {

        $hoy      = date('Y-m-d');
        $nombre   = $_POST['nombre'];
        $concepto = $_POST['concepto'];
        $cantidad = $_POST['cantidad'];

        $datos = [

            "fecha"    => $hoy,
            "nombre"   => $nombre,
            "concepto" => $concepto,
            "cantidad" => $cantidad,

        ];
        $insertar = reciboModelo::MdlInsertarRecibo($datos);
        if ($insertar->rowCount() >= 1) {

            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Insertar recibo",
                "Texto"  => "Registro Exitoso",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se registro el recibo",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlEditarRecibo()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM `recibo` WHERE  id_recibo= $id ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    /* paginador */
    public function CtrlPaginadorRecibo($pagina, $registros, $consulta)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();
        $query     = '';
        // echo ($consulta != "");
        if ($consulta != "") {
            $query = "SELECT * FROM recibo  LIMIT $inicio, $registros";
        }

        // echo ($query);
        $datos    = $conexion->query($query);
        $datos    = $datos->fetchAll();
        $total    = $conexion->query("SELECT COUNT(*) FROM recibo");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '
                <table class="table table-hover text-center">
                   <thead>
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">FECHA REGISTRO</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">CONCEPTO</th>
                         <th class="text-center">CANTIDAD</th>
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
                            <td>' . $value['id_recibo'] . '</td>
                            <td>' . $value['rec_fecha'] . '</td>
                            <td>' . $value['rec_nombres'] . '</td>
                            <td>' . $value['rec_concepto'] . '</td>
                            <td>' . $value['rec_cantidad'] . '</td>

                            <td>
                                <a href="' . SERVERURL . 'reciboup/' . mainModel::encryption($value['id_recibo']) . '" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/reciboAjax.php">
                                <input type="hidden" name="reciboDelete" value="' . mainModel::encryption($value['id_recibo']) . '"> </input>
                                <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                <i class="zmdi zmdi-delete"></i>
                                </button>
                                <div class="RespuestaAjax"></div>
                                </form>
                            </td>
                            <td>
                                <a target="_blank" href="' . SERVERURL . 'reporterecibo/' . mainModel::encryption($value['id_recibo']) . '" class="btn btn-info btn-raised btn-xs">
                                    <i class="zmdi zmdi-print"></i>
                                </a>
                            </td>
                        </tr>';
            }
        } else {
            if ($total >= 1) {
                $tabla .= '
                    <tr>
                        <td><a href="' . SERVERURL . 'recibolista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'recibolista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'recibolista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'recibolista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'recibolista/' . $i . '">' . $i . '</a></li>';
                }
            }
            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'recibolista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'recibolista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
                </nav>';
        }
        return $tabla;
    }

    /**
     * Eliminar
     */
    public function CtrlEliminarRecibo()
    {
        $idRecibo = mainModel::decryption($_POST['reciboDelete']);

        $idRecibollc = mainModel::limpiar_cadena($idRecibo);
        $eliminar    = certificadoModelo::MdlEliminarCertificado($idRecibollc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Recibo Eliminado Correctamente",
                "Tipo"   => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar el recibo",
                "Tipo"   => "error",
            ];
        }
        return mainModel::sweet_alert($alerta);
    }

    /**
     * Actualizar
     */

    public function CtrlActualizarRecibo()
    {
        $id       = mainModel::decryption($_POST['idreciboup']);
        $nombre   = mainModel::limpiar_cadena($_POST['nombreup-recibo']);
        $concepto = mainModel::limpiar_cadena($_POST['conceptoup-recibo']);
        $cantidad = mainModel::limpiar_cadena($_POST['cantidadup-recibo']);

        $id1   = mainModel::limpiar_cadena($id);
        $datos = [
            "id"       => $id1,
            "nombre"   => $nombre,
            "concepto" => $concepto,
            "cantidad" => $cantidad,

        ];
        $actualizar = reciboModelo::MdlActualizarRecibo($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'recibolista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Recibo Actualizado",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url,
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar el recibo",
                "Tipo"   => "error",
            ];
        }

        return mainModel::sweet_alert($alerta);
    }

}