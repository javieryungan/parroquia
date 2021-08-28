 <!-- misas.controlador.-->

 <?php
    if ($peticionAjax) {
        require_once "../modelos/horarios.modelo.php";
    } else {
        require_once "./modelos/horarios.modelo.php";
    }

    /**
     *
     */
    class horariosControlador extends horariosModelo
    {

        /* paginador */
        public function CtrlPaginadorHorarios($pagina, $registros)
        {
            $pagina    = mainModel::limpiar_cadena($pagina);
            $registros = mainModel::limpiar_cadena($registros);
            $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
            $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
            $conexion  = mainModel::conectar();

            $datos = $conexion->query("SELECT ide_horario,b.tip_descripcion,hora_inicio,hora_fin FROM horario_actividad a, tipoactividad b WHERE a.ide_tipoActividad=b.id_tipoActividad ORDER by ide_horario ASC LIMIT $inicio, $registros");

            $datos    = $datos->fetchAll();
            $total    = $conexion->query("SELECT COUNT(*) FROM horario_actividad");
            $total    = (int) $total->fetchColumn();
            $Npaginas = ceil($total / $registros);

            $tabla = "";
            $tabla .= '
                <table class="table table-hover text-center">
                   <thead>
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">ACTIVIDAD</th>
                        <th class="text-center">HORA INICIO</th>
                        <th class="text-center">HORA FIN</th>
                        <th class="text-center">ACTUALIZAR</th>
                        <th class="text-center">ELIMINAR</th>
                        </tr>
                    </thead>
                <tbody>';
            if ($total >= 1 && $pagina <= $Npaginas) {
                foreach ($datos as $key => $value) {
                    $tabla .= '
                        <tr>
                            <td>' . $value['ide_horario'] . '</td>
                            <td>' . $value['tip_descripcion'] . '</td>
                            <td>' . $value['hora_inicio'] . '</td>
                            <td>' . $value['hora_fin'] . '</td>
                            <td>
                                <a href="' . SERVERURL . 'horariosedit/' . mainModel::encryption($value['ide_horario']) . '" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/horarioAjax.php">
                                <input type="hidden" name="horarioDelete" value="' . mainModel::encryption($value['ide_horario']) . '"> </input>
                                <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                <i class="zmdi zmdi-delete"></i>
                                </button>
                                <div class="RespuestaAjax"></div>
                                </form>
                            </td>
                        </tr>';
                }
            } else {
                if ($total >= 1) {
                    $tabla .= '
                    <tr>
                        <td><a href="' . SERVERURL . 'horarios/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                    $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'horarios/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'horarios/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
                }

                for ($i = 1; $i <= $Npaginas; $i++) {
                    if ($pagina == $i) {
                        $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'horarios/' . $i . '">' . $i . '</a></li>';
                    } else {
                        $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'horarios/' . $i . '">' . $i . '</a></li>';
                    }
                }
                //paginacion fecha derecha
                if ($pagina == $Npaginas) {
                    $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'misaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'misaslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
                }
                $tabla .= '</ul>
                </nav>';
            }
            return $tabla;
        }

        /* insertar */
        public function CtrInsertarHorario()
        {

            $horainicio = $_POST['horainicio'];
            $horafin = $_POST['horafin'];
            $tipoactividad = $_POST['tipoactividad'];
            $hora1 = strtotime($horainicio);
            $hora2 = strtotime($horafin);
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM horario_actividad WHERE ide_tipoActividad = $tipoactividad and hora_inicio='$horainicio' and hora_fin='$horafin'");


            // valido que no ingrese hora fin menor a hora inicio

            if ($hora2 <= $hora1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Advertencia",
                    "Texto"  => "La hora fin $horafin no puede ser menor a la hora inicial $horainicio",
                    "Tipo"   => "warning"
                ];
            } else if ($consulta1->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Advertencia",
                    "Texto"  => "El horario $horainicio - $horafin y la actividad seleccionado ya existe.",
                    "Tipo"   => "warning"
                ];
            } else {
                $hoy               = date('Y-m-d');
                $horastart = mainModel::limpiar_cadena($horainicio);
                $horaend = mainModel::limpiar_cadena($horafin);
                $tipoactividad1 = mainModel::limpiar_cadena($tipoactividad);

                $datos = [

                    "horastart"     => $horastart,
                    "horaend"  => $horaend,
                    "tipoactividad"       => $tipoactividad1,
                ];

                $insertar = horariosModelo::MdlInsertarMisa($datos);
                if ($insertar->rowCount() >= 1) {

                    $alerta = [
                        "Alerta" => "limpiar",
                        "Titulo" => "Horario registatrado",
                        "Texto"  => "Registro Exitoso",
                        "Tipo"   => "success"
                    ];
                } else {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrio un error inesperado",
                        "Texto"  => "No se registro la misa",
                        "Tipo"   => "error"
                    ];
                }
            }

            return mainModel::sweet_alert($alerta);
        }

        /**
         * Mostrar Editar
         */

        public function CtrlMostrarEditarHorario()
        {
            $v         = explode("/", $_GET['views']);
            $id        = mainModel::decryption(($v[1]));
            $id        = mainModel::limpiar_cadena($id);
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM horario_actividad a,  tipoactividad b where a.ide_tipoActividad=b.id_tipoActividad and ide_horario='$id'");

            $respuesta = $consulta1->fetch();
            return $respuesta;
        }

        /**
         * Actualizar
         */

        public function CtrlActualizarHorario()
        {
            $id = mainModel::decryption($_POST['idup']);
            $horainicio = $_POST['horainicioedit'];
            $horafin = $_POST['horafinedit'];
            $tipoactividad = $_POST['tipoactividadedit'];
            $hora1 = strtotime($horainicio);
            $hora2 = strtotime($horafin);
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM horario_actividad WHERE ide_tipoActividad = $tipoactividad and hora_inicio='$horainicio' and hora_fin='$horafin'");


            // valido que no ingrese hora fin menor a hora inicio

            if ($hora2 <= $hora1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Advertencia",
                    "Texto"  => "La hora fin $horafin no puede ser menor a la hora inicial $horainicio",
                    "Tipo"   => "warning"
                ];
            } else if ($consulta1->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Advertencia",
                    "Texto"  => "El horario $horainicio - $horafin y la actividad seleccionado ya existe.",
                    "Tipo"   => "warning"
                ];
            } else {
                $horastart = mainModel::limpiar_cadena($horainicio);
                $horaend = mainModel::limpiar_cadena($horafin);
                $tipoactividad1 = mainModel::limpiar_cadena($tipoactividad);
                $id1               = mainModel::limpiar_cadena($id);
                $datos = [
                    "id"                => $id1,
                    "horainicio"     => $horastart,
                    "horafin"  => $horaend,
                    "tipoactividad"       => $tipoactividad1,
                ];
                $actualizar = horariosModelo::MdlActualizarHorario($datos);
                if ($actualizar->rowCount() >= 1) {
                    $url    = SERVERURL . 'horarios/';
                    $alerta = [
                        "Alerta"    => "dirigir",
                        "Titulo"    => "Horario Actualizado",
                        "Texto"     => "Actualizacion Exitosa",
                        "Tipo"      => "success",
                        "direccion" => $url
                    ];
                } else {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Ocurrio un error inesperado",
                        "Texto"  => "No se pudo actualizar el horario",
                        "Tipo"   => "error"
                    ];
                }
            }
            return mainModel::sweet_alert($alerta);
        }

        /* Eliminar */
        public function CtrlEliminarHorario()
        {
            $idMisa = mainModel::decryption($_POST['horarioDelete']);

            $idMisallc = mainModel::limpiar_cadena($idMisa);
            $eliminar  = horariosModelo::MdlEliminarHorario($idMisallc);
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

        // eventos
        public function CtrConsultarEventos()
        {
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT id_datosActividad,concat(act_fechacelebracion,'T',hora_inicio) as inicio,act_descripcion as descripcion, concat(act_fechacelebracion,'T',hora_fin) as fin, tip_descripcion as title,
            CASE WHEN a.id_tipoActividad = 1 THEN 'amber' ELSE CASE WHEN a.id_tipoActividad = 2 THEN 'teal' ELSE '#001f3f' END END as color
            FROM datosactividad a, horario_actividad b, tipoactividad c
            WHERE a.ide_horario=b.ide_horario and a.id_tipoActividad=c.id_tipoActividad");
            $respuesta = $consulta1->fetchAll();
            return $respuesta;
        }
    }
