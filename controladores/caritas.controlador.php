<?php
if ($peticionAjax) {
    require_once "../modelos/caritas.modelo.php";
} else {
    require_once "./modelos/caritas.modelo.php";
}

/**
 *
 */

class caritasControlador extends caritasModelo
{

    public function CtrConsultarUsuariocarita()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM usuario as u INNER JOIN usuariocarita as uc on u.id_usuario=uc.id_usuario INNER JOIN caritas as c on uc.id_carita=c.id_carita ");

        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarCarita()
    {

        $tipobeneficio = $_POST['tipobeneficio'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT car_tipobeneficio FROM caritas WHERE car_tipobeneficio = '$tipobeneficio'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "La Carita ya existe",
                "Tipo"   => "error"];
        } else {

            $date           = date('Y-m-d');
            $tipobeneficio1 = mainModel::limpiar_cadena($tipobeneficio);
            $descripcion    = mainModel::limpiar_cadena($_POST['descripcion']);

            $datos = [

                "fecha"         => $date,
                "tipobeneficio" => $tipobeneficio1,
                "descripcion"   => $descripcion,

            ];

            $insertar = caritasModelo::MdlInsertarCarita($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar carita",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro la carita",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlMostrarCarita()
    {
        $respuesta = caritasModelo::MdlMostrarCarita();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
            <thead>
            <tr>
            <th class="text-center">ID</th>
            <th class="text-center">FECHA</th>
            <th class="text-center">DESCRIPCION</th>
            <th class="text-center">BENEFICIO</th>
            <th class="text-center">ACTUALIZAR</th>
            <th class="text-center">ELIMINAR</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($respuesta as $key => $value) {
                $tabla .= '

              <tr>
              <td>' . $value['id_carita'] . '</td>
              <td>' . $value['car_fecha'] . '</td>
              <td>' . $value['car_descripcion'] . '</td>
              <td>' . $value['car_tipobeneficio'] . '</td>

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

    public function CtrlEliminarCarita()
    {
        $idCarita = mainModel::decryption($_POST['caritasDel']);

        $idCaritallc = mainModel::limpiar_cadena($idCarita);
        $eliminar    = caritasModelo::MdlEliminarCarita($idCaritallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Carita Eliminada Correctamente",
                "Tipo"   => "success"];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar el registro",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    public function CtrlEditarCarita()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT *FROM caritas WHERE id_carita='$id'");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

//actualizar carita

    public function CtrlActualizarCarita()
    {

        $date          = date('Y-m-d');
        $id            = mainModel::decryption($_POST["idup-carita"]);
        $descripcion   = mainMOdel::limpiar_cadena($_POST["descripcionup-carita"]);
        $tipobeneficio = mainMOdel::limpiar_cadena($_POST["tipobeneficioup-carita"]);

        $id1 = mainModel::limpiar_cadena($id);

        $datos = [
            "id"            => $id1,
            "fecha"         => $date,
            "descripcion"   => $descripcion,
            "tipobeneficio" => $tipobeneficio,

        ];
        $actualizar = caritasModelo::MdlActualizarCarita($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'caritaslista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar usuario",
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
        // return var_dump($datos);
    }

/* paginador */
    public function CtrlPaginadorCaritas($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM caritas ORDER BY id_carita asc LIMIT $inicio, $registros");
        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
                  <thead>
                  <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">FECHA</th>
                  <th class="text-center">DESCRIPCION</th>
                  <th class="text-center">BENEFICIO</th>
                  <th class="text-center">ACTUALIZAR</th>
                  <th class="text-center">ELIMINAR</th>
                  </tr>
                  </thead>
                  <tbody>';
        if ($total >= 1 && $pagina <= $Npaginas) {
            foreach ($datos as $key => $value) {
                $tabla .= '

                      <tr>
                      <td>' . $value['id_carita'] . '</td>
                      <td>' . $value['car_fecha'] . '</td>
                      <td>' . $value['car_descripcion'] . '</td>
                      <td>' . $value['car_tipobeneficio'] . '</td>
                      <td>
                      <a href="' . SERVERURL . 'caritasup/' . mainModel::encryption($value['id_carita']) . '" class="btn btn-success btn-raised btn-xs">
                      <i class="zmdi zmdi-refresh"></i>
                      </a>

                      </td>
                      <td>
                      <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/caritasAjax.php">
                      <input type="hidden" name="caritasDel" value="' . mainModel::encryption($value['id_carita']) . '"> </input>
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
                      <td><a href="' . SERVERURL . 'caritaslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'caritaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'caritaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'caritaslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'caritaslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'caritaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'caritaslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
                    </nav>';
        }

        return $tabla;
    }}
