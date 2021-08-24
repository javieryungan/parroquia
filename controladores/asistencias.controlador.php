<?php
if ($peticionAjax) {
    require_once "../modelos/asistencias.modelo.php";
} else {
    require_once "./modelos/asistencias.modelo.php";
}

class asistenciasControlador extends asistenciasModelo
{

    //consultar tabla datos actividad
    public function CtrConsultarDatosactividad()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT *, CONCAT(d.act_nombres,' ', d.act_apellidos) AS nombres_apellidos FROM datosactividad as d INNER join tipoactividad as t on t.id_tipoActividad =d.id_tipoActividad ");
        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    //consultar actividad
    public function CtrConsultarActividad()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT t.tip_descripcion FROM tipoactividad as t INNER JOIN datosactividad as d ON t.id_tipoActividad=d.id_tipoActividad");
        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarAsistencia()
    {

        $descripcion = $_POST['descripcion'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT asi_descripcion  FROM asistencia WHERE asi_descripcion = '$descripcion'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "La asistencia ya existe",
                "Tipo"   => "error"];
        } else {

            $hoy          = date('Y-m-d');
            $descripcion1 = mainModel::limpiar_cadena($descripcion);
            $estado       = mainModel::limpiar_cadena($_POST['estado']);
            $nhoras       = mainModel::limpiar_cadena($_POST['nhoras']);
            $fechainicio  = mainModel::limpiar_cadena($_POST['fechainicio']);
            $fechafin     = mainModel::limpiar_cadena($_POST['fechafin']);
            $nombres      = mainModel::limpiar_cadena($_POST['nombres']);

            $datos = [

                "estado"        => $estado,
                "descripcion"   => $descripcion1,
                "nhoras"        => $nhoras,
                "fecharegistro" => $hoy,
                "fechainicio"   => $fechainicio,
                "fechafin"      => $fechafin,
                "nombres"       => $nombres,

            ];

            $insertar = asistenciasModelo::MdlInsertarAsistencia($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Registrar asistencia",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro la asistencia",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlMostrarAsistencia()
    {
        $respuesta = asistenciasModelo::MdlMostrarAsistencia();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">

      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">FECHA REGISTRO</th>
      <th class="text-center">DESCRIPCION</th>
      <th class="text-center">ESTADO</th>
      <th class="text-center"># DE HORAS</th>
      <th class="text-center">FECHA DE REGISTRO</th>
      <th class="text-center">FECHA INICIAL</th>
      <th class="text-center">FECHA FINAL</th>
      <th class="text-center">NOMBRES</th>
      <th class="text-center">APELLIDOS</th>
      <th class="text-center">TIPO DE ACTIVIDAD</th>
      <th class="text-center">ACTUALIZAR</th>
      <th class="text-center">ELIMINAR</th>
      </tr>
      </thead>
      <tbody>';
            foreach ($respuesta as $key => $value) {
                $tabla .= '

       <tr>
       <td>' . $value['id_asistencia'] . '</td>
       <td>' . $value['asi_fecharegistro'] . '</td>
       <td>' . $value['asi_descripcion'] . '</td>
       <td>' . $value['asi_estado'] . '</td>
       <td>' . $value['asi_nhoras'] . '</td>
       <td>' . $value['asi_fecharegistro'] . '</td>
       <td>' . $value['asi_fechainicio'] . '</td>
       <td>' . $value['asi_fechafin'] . '</td>
       <td>' . $value['act_nombres'] . '</td>
       <td>' . $value['act_apellidos'] . '</td>
       <td>' . $value['tip_descripcion'] . '</td>

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

    public function CtrlEliminarAsistencia()
    {
        $idAsistencia = mainModel::decryption($_POST['asistenciasDel']);

        $idAsistenciallc = mainModel::limpiar_cadena($idAsistencia);
        $eliminar        = asistenciasModelo::MdlEliminarAsistencia($idAsistenciallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Asistencia Eliminada Correctamente",
                "Tipo"   => "success"];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar la asistencia",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    public function CtrlEditarAsistencia()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM asistencia as a , datosactividad as d WHERE id_asistencia='$id' AND d.id_datosActividad=a.id_datosActividad ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    public function CtrlActualizarAsistencia()
    {

        $id          = mainModel::decryption($_POST["idup-asistencia"]);
        $hoy         = date('Y-m-d');
        $descripcion = mainModel::limpiar_cadena($_POST['descripcionup-asistencia']);
        $estado      = mainModel::limpiar_cadena($_POST['estadoup-asistencia']);
        $nhoras      = mainModel::limpiar_cadena($_POST['nhorasup-asistencia']);
        $fechainicio = mainModel::limpiar_cadena($_POST['fechainicioup-asistencia']);
        $fechafin    = mainModel::limpiar_cadena($_POST['fechafinup-asistencia']);
        $nombres     = mainModel::limpiar_cadena($_POST['nombresup-asistencia']);
        $id1         = mainModel::limpiar_cadena($id);

        $datos = [

            "id"            => $id1,
            "nombres"       => $nombres,
            "estado"        => $estado,
            "descripcion"   => $descripcion,
            "nhoras"        => $nhoras,
            "fecharegistro" => $hoy,
            "fechainicio"   => $fechainicio,
            "fechafin"      => $fechafin,

        ];
        $actualizar = asistenciasModelo::MdlActualizarAsistencia($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'asistenciasgenlista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar asistencia",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar la asistencia",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);
        //  return var_dump($datos);

    }

    /* paginador */
    public function CtrlPaginadorAsistencias($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS a.*,t.tip_descripcion,d.act_nombres,d.act_apellidos FROM asistencia as a INNER JOIN datosactividad as d ON a.id_datosActividad=d.id_datosActividad INNER JOIN tipoactividad as t ON d.id_tipoActividad=t.id_tipoActividad ORDER BY act_nombres asc LIMIT $inicio, $registros");

        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">FECHA REGISTRO</th>
         <th class="text-center">DESCRIPCION</th>
         <th class="text-center">ESTADO</th>
         <th class="text-center"># DE HORAS</th>
         <th class="text-center">FECHA DE REGISTRO</th>
         <th class="text-center">FECHA INICIAL</th>
         <th class="text-center">FECHA FINAL</th>
         <th class="text-center">NOMBRES</th>
         <th class="text-center">APELLIDOS</th>
         <th class="text-center">TIPO DE ACTIVIDAD</th>
         <th class="text-center">ACTUALIZAR</th>
         <th class="text-center">ELIMINAR</th>

         </tr>
         </thead>
         <tbody>';
        if ($total >= 1 && $pagina <= $Npaginas) {
            foreach ($datos as $key => $value) {
                $tabla .= '

           <tr>
           <td>' . $value['id_asistencia'] . '</td>
           <td>' . $value['asi_fecharegistro'] . '</td>
           <td>' . $value['asi_descripcion'] . '</td>
           <td>' . $value['asi_estado'] . '</td>
           <td>' . $value['asi_nhoras'] . '</td>
           <td>' . $value['asi_fecharegistro'] . '</td>
           <td>' . $value['asi_fechainicio'] . '</td>
           <td>' . $value['asi_fechafin'] . '</td>
           <td>' . $value['act_nombres'] . '</td>
           <td>' . $value['act_apellidos'] . '</td>
           <td>' . $value['tip_descripcion'] . '</td>


           <td>
           <a href="' . SERVERURL . 'asistenciasgenup/' . mainModel::encryption($value['id_asistencia']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>
           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/asistenciaAjax.php">
           <input type="hidden" name="asistenciasDel" value="' . mainModel::encryption($value['id_asistencia']) . '"> </input>
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
           <td><a href="' . SERVERURL . 'asistenciaslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'asistenciaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'asistenciaslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciaslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'asistenciaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciaslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }
}
