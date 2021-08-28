 <!-- misas.controlador.-->

 <?php
    if ($peticionAjax) {
        require_once "../modelos/misas.modelo.php";
    } else {
        require_once "./modelos/misas.modelo.php";
    }

    /**
     *
     */
    class misasControlador extends misasModelo
    {

        //consultar usuario
        public function CtrConsultarUsuario()
        {
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT * FROM usuario as u INNER JOIN rol as r ON u.id_rol=r.id_rol WHERE r.rol_nombre = 'administrador'");

            $respuesta = $consulta1->fetchAll();
            return $respuesta;
        }
        //Consultar Tipo de actividad
        public function CtrConsultarTipoactividad()
        {
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT * FROM tipoactividad WHERE tip_descripcion LIKE '%misa%' ORDER BY id_tipoActividad");

            $respuesta = $consulta1->fetchAll();
            return $respuesta;
        }

        // consultar todo tipo de actividad
        public function CtrConsultarTipoactividadAll()
        {
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT * FROM tipoactividad ORDER BY id_tipoActividad");

            $respuesta = $consulta1->fetchAll();
            return $respuesta;
        }

        //public function CtrConsultarTipoactividad()
        public function CtrConsultarHorario($actividad)
        {
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT * FROM horario_actividad where ide_tipoActividad=$actividad");

            $respuesta = $consulta1->fetchAll();
            return $respuesta;
        }

        public function CtrInsertarMisa()
        {

            $fechacelebracion = $_POST['fechacelebracion'];
            $horario = $_POST['horario'];
            // valido que el horario no venga null
            if (empty($horario)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Advertencia",
                    "Texto"  => "El campo horario es hobligatorio.",
                    "Tipo"   => "warning"
                ];
            }
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT act_fechacelebracion FROM datosactividad WHERE act_fechacelebracion = '$fechacelebracion' AND ide_horario=$horario");

            if ($consulta1->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error",
                    "Texto"  => "La Misa ya existe",
                    "Tipo"   => "error"
                ];
            } else {

                $hoy               = date('Y-m-d');
                $fechacelebracion1 = mainModel::limpiar_cadena($fechacelebracion);
                $descripcion       = mainModel::limpiar_cadena($_POST['descripcion']);
                $recolectamisa     = mainModel::limpiar_cadena($_POST['recolectamisa']);
                $tipoactividad     = mainModel::limpiar_cadena($_POST['tipoactividad']);
                $nombresministro   = mainModel::limpiar_cadena($_POST['nombresministro']);
                $apellidosministro = mainModel::limpiar_cadena($_POST['apellidosministro']);
                $horario1 = mainModel::limpiar_cadena($horario);

                $datos = [

                    "fecharegistro"     => $hoy,
                    "fechacelebracion"  => $fechacelebracion1,
                    "descripcion"       => $descripcion,
                    "recolectamisa"     => $recolectamisa,
                    "tipoactividad"     => $tipoactividad,
                    "nombresministro"   => $nombresministro,
                    "apellidosministro" => $apellidosministro,
                    "horario" => $horario1
                ];

                $insertar = misasModelo::MdlInsertarMisa($datos);
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
                        "Texto"  => "No se registro la misa",
                        "Tipo"   => "error"
                    ];
                }
            }
            return mainModel::sweet_alert($alerta);
            // return var_dump($datos);
        }

        public function CtrlMostrarMisa()
        {
            $respuesta = misasModelo::MdlMostrarMisa();
            $respuesta = $respuesta->FetchAll();
            $tabla     = "";
            if (Count($respuesta)) {
                $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">FECHA REGISTRO</th>
      <th class="text-center">FECHA Y HORA PROGRAMADA</th>
      <th class="text-center">DESCRIPCION</th>
      <th class="text-center">APORTE</th>
      <th class="text-center">TIPO DE MISA</th>
      <th class="text-center">NOMBRES MINISTRO</th>
      <th class="text-center">APELLIDOS MINISTRO</th>
      <th class="text-center">ACTUALIZAR</th>
      <th class="text-center">ELIMINAR</th>
      </tr>
      </thead>
      <tbody>';
                foreach ($respuesta as $key => $value) {
                    $tabla .= '

       <tr>
       <td>' . $value['id_datosActividad'] . '</td>
       <td>' . $value['act_fecharegistro'] . '</td>
       <td>' . $value['act_fechacelebracion'] . '</td>
       <td>' . $value['act_descripcion'] . '</td>
       <td>' . $value['act_aporte'] . '</td>
       <td>' . $value['tip_descripcion'] . '</td>
       <td>' . $value['act_nombresministro'] . '</td>
       <td>' . $value['act_apellidosministro'] . '</td>

       <td>

       <button type="submit" class="btn btn-danger btn-raised btn-xs">
       <i class="zmdi zmdi-delete"></i>
       </button>
       <div class="RespuestaAjax"></div>
       </form>
       </td>
       </tr>';
                }
            } else {
                $tabla .= '<tr>
      <td>no se encontraron archivos</td>
      <tr>';
            }

            $tabla .= '   </tbody>
     </table>';
            return $tabla;
        }

        public function CtrlEliminarMisa()
        {
            $idMisa = mainModel::decryption($_POST['misasDel']);

            $idMisallc = mainModel::limpiar_cadena($idMisa);
            $eliminar  = misasModelo::MdlEliminarMisa($idMisallc);
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

        public function CtrlEditarMisa()
        {
            $v         = explode("/", $_GET['views']);
            $id        = mainModel::decryption(($v[1]));
            $id        = mainModel::limpiar_cadena($id);
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM datosactividad as d, tipoactividad as t, horario_actividad as h WHERE id_datosActividad='$id' AND d.id_tipoActividad = t.id_tipoActividad and d.ide_horario=h.ide_horario ");

            $respuesta = $consulta1->fetch();
            return $respuesta;
        }

        // Actualizar misa

        public function CtrlActualizarMisa()
        {

            $id                = mainModel::decryption($_POST["idup-misa"]);
            $hoy               = date('Y-m-d');
            $fechacelebracion  = mainMOdel::limpiar_cadena($_POST["fechacelebracionup-misa"]);
            $descripcion       = mainMOdel::limpiar_cadena($_POST["descripcionup-misa"]);
            $recolectamisa     = mainMOdel::limpiar_cadena($_POST["recolectamisaup-misa"]);
            $tipoactividad     = mainMOdel::limpiar_cadena($_POST["tipoactividadup-misa"]);
            $nombresministro   = mainMOdel::limpiar_cadena($_POST["nombresministroup-misa"]);
            $apellidosministro = mainMOdel::limpiar_cadena($_POST["apellidosministroup-misa"]);
            $id1               = mainModel::limpiar_cadena($id);

            $datos = [
                "id"                => $id1,
                "fecharegistro"     => $hoy,
                "fechacelebracion"  => $fechacelebracion,
                "descripcion"       => $descripcion,
                "recolectamisa"     => $recolectamisa,
                "tipoactividad"     => $tipoactividad,
                "nombresministro"   => $nombresministro,
                "apellidosministro" => $apellidosministro,

            ];
            $actualizar = misasModelo::MdlActualizarMisa($datos);
            if ($actualizar->rowCount() >= 1) {
                $url    = SERVERURL . 'misaslista/';
                $alerta = [
                    "Alerta"    => "dirigir",
                    "Titulo"    => "Actualizar misa",
                    "Texto"     => "Actualizacion Exitosa",
                    "Tipo"      => "success",
                    "direccion" => $url
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se pudo actualizar la misa",
                    "Tipo"   => "error"
                ];
            }
            return mainModel::sweet_alert($alerta);
        }

        /* paginador */
        public function CtrlPaginadorMisas($pagina, $registros)
        {
            $pagina    = mainModel::limpiar_cadena($pagina);
            $registros = mainModel::limpiar_cadena($registros);
            $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
            $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
            $conexion  = mainModel::conectar();

            $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM datosactividad as d INNER JOIN tipoactividad as t ON d.id_tipoActividad=t.id_tipoActividad INNER JOIN horario_actividad as h ON d.ide_horario=h.ide_horario where t.tip_descripcion LIKE '%misa%' ORDER by d.id_datosActividad ASC LIMIT $inicio, $registros");

            $datos    = $datos->fetchAll();
            $total    = $conexion->query("SELECT FOUND_ROWS()");
            $total    = (int) $total->fetchColumn();
            $Npaginas = ceil($total / $registros);

            $tabla = "";
            $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">FECHA REGISTRO</th>
         <th class="text-center">FECHA PROGRAMADA</th>
        <th class="text-center">HORA PROGRAMADA</th>
         <th class="text-center">DESCRIPCION</th>
         <th class="text-center">APORTE</th>
         <th class="text-center">TIPO DE MISA</th>
         <th class="text-center">NOMBRES MINISTRO</th>
         <th class="text-center">APELLIDOS MINISTRO</th>
         <th class="text-center">ACTUALIZAR</th>
         <th class="text-center">ELIMINAR</th>
         </tr>
         </thead>
         <tbody>';
            if ($total >= 1 && $pagina <= $Npaginas) {
                foreach ($datos as $key => $value) {
                    $tabla .= '

           <tr>
           <td>' . $value['id_datosActividad'] . '</td>
           <td>' . $value['act_fecharegistro'] . '</td>
           <td>' . $value['act_fechacelebracion'] . '</td>
           <td>' . $value['hora_inicio'] . ' - ' . $value['hora_fin'] . '</td>
           <td>' . $value['act_descripcion'] . '</td>
           <td>' . $value['act_aporte'] . '</td>
           <td>' . $value['tip_descripcion'] . '</td>
           <td>' . $value['act_nombresministro'] . '</td>
           <td>' . $value['act_apellidosministro'] . '</td>

           <td>
           <a href="' . SERVERURL . 'misasup/' . mainModel::encryption($value['id_datosActividad']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>

           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/misasAjax.php">
           <input type="hidden" name="misasDel" value="' . mainModel::encryption($value['id_datosActividad']) . '"> </input>
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
                    $tabla .= '<tr>
           <td><a href="' . SERVERURL . 'misaslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
           <tr>';
                } else {
                    $tabla .= '<tr>
           <td>no se encontraron archivos</td>
           <tr>';
                }
            }
            $tabla .= '   </tbody>
         </table>';
            //paginacion fecha izquierda
            if ($total >= 1 && $pagina <= $Npaginas) {
                $tabla .= '<nav class="text-center">
          <ul class="pagination pagination-sm">';
                if ($pagina == 1) {
                    $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'misaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'misaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
                }

                for ($i = 1; $i <= $Npaginas; $i++) {
                    if ($pagina == $i) {
                        $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'misaslista/' . $i . '">' . $i . '</a></li>';
                    } else {
                        $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'misaslista/' . $i . '">' . $i . '</a></li>';
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
    }
