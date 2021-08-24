<?php
if ($peticionAjax) {
    require_once "../modelos/actividad.modelo.php";
} else {
    require_once "./modelos/actividad.modelo.php";
}
class actividadControlador extends actividadModelo
{

    public function CtrInsertarActividad()
    {

        $descripcion = $_POST['descripcion'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tipoactividad WHERE tip_descripcion = '$descripcion'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "La actividad ya existe",
                "Tipo"   => "error"];
        } else {

            $descripcion1 = mainModel::limpiar_cadena($descripcion);
            $valor        = mainModel::limpiar_cadena($_POST['valor']);

            $datos = [

                "descripcion" => $descripcion1,
                "valor"       => $valor,

            ];

            $insertar = actividadModelo::MdlInsertarActividad($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Registrar actividad",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro la actividad",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlMostrarActividad()
    {

        $respuesta = actividadModelo::MdlMostrarActividad();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">DESCRIPCION/th>
      <th class="text-center">VALOR</th>
      <th class="text-center">ACTUALIZAR</th>
      <th class="text-center">ELIMINAR</th>
      </tr>
      </thead>
      <tbody>';
            foreach ($respuesta as $key => $value) {
                $tabla .= '

       <tr>
       <td>' . $value['id_tipoActividad'] . '</td>
       <td>' . $value['tip_descripcion'] . '</td>
       <td>' . $value['tip_valor'] . '</td>
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

    public function CtrlEditarActividad()
    {
        $A         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($A[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tipoactividad WHERE id_tipoActividad='$id' ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }
    public function CtrlActualizarActividad()
    {

        $id          = mainModel::decryption($_POST["idup-actividad"]);
        $descripcion = mainMOdel::limpiar_cadena($_POST["descripcionup-actividad"]);
        $valor       = mainMOdel::limpiar_cadena($_POST["valorup-actividad"]);

        $id1 = mainModel::limpiar_cadena($id);

        $datos = [
            "id"          => $id1,
            "descripcion" => $descripcion,
            "valor"       => $valor,

        ];
        $actualizar = actividadModelo::MdlActualizarActividad($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'aporteslista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar actividad",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar el registro",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    public function CtrlEliminarActividad()
    {
        $idActividad = mainModel::decryption($_POST['actividadDel']);

        $idActividadllc = mainModel::limpiar_cadena($idActividad);
        $eliminar       = actividadModelo::MdlEliminarActividad($idActividadllc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Actividad Eliminada Correctamente",
                "Tipo"   => "success"];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar la actividad",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    /* paginador */
    public function CtrlPaginadorActividad($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM tipoactividad LIMIT $inicio, $registros");
        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">DESCRIPCION</th>
         <th class="text-center">VALOR</th>
         <th class="text-center">ACTUALIZAR</th>
         <th class="text-center">ELIMINAR</th>
         </tr>
         </thead>
         <tbody>';

        if ($total >= 1 && $pagina <= $Npaginas) {
            foreach ($datos as $key => $value) {
                $tabla .= '

           <tr>
           <td>' . $value['id_tipoActividad'] . '</td>
           <td>' . $value['tip_descripcion'] . '</td>
           <td>' . $value['tip_valor'] . '</td>


           <td>
           <a href="' . SERVERURL . 'aportesup/' . mainModel::encryption($value['id_tipoActividad']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>
           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/aportesAjax.php">
           <input type="hidden" name="actividadDel" value="' . mainModel::encryption($value['id_tipoActividad']) . '"> </input>
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
           <td><a href="' . SERVERURL . 'aporteslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'aporteslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'aporteslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'aporteslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'aporteslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion flecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . ' /' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'aporteslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }}
