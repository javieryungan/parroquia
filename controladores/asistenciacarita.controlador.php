 <!-- asistencia carita.controlador.-->

 <?php
if ($peticionAjax) {
    require_once "../modelos/asistenciacarita.modelo.php";
} else {
    require_once "./modelos/asistenciacarita.modelo.php";
}

/**
 *
 */
class asistenciacaritaControlador extends asistenciacaritaModelo
{

    //consultar usuario
    public function CtrConsultarUsuario()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT *, CONCAT(usu_nombres,' ', usu_apellidos) as 'nombres_apellidos' FROM usuario as u INNER JOIN rol as r ON u.id_rol=r.id_rol WHERE r.rol_nombre = 'visitante'");

        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }
    //Consultar Tipo de actividad
    public function CtrConsultarCarita()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT  * FROM caritas");

        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarAsistenciacarita()
    {

        $beneficiario = $_POST['beneficiario'];
        $consulta1    = mainModel::ejecutar_consulta_simple("SELECT id_usuario FROM usuariocarita WHERE id_usuario = '$beneficiario'");
        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "La asistencia a carita ya existe",
                "Tipo"   => "error"];
        } else {
            $hoy           = date('Y-m-d H:i:s');
            $beneficiario1 = mainModel::limpiar_cadena($beneficiario);
            $carita        = mainModel::limpiar_cadena($_POST['carita']);
            $datos         = [
                "fecharegistro" => $hoy,
                "beneficiario"  => $beneficiario1,
                "carita"        => $carita,
            ];
            $insertar = asistenciacaritaModelo::MdlInsertarAsistenciacarita($datos);
            if ($insertar->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar asistencia a carita",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro la asistencia a carita",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);

        // return var_dump($datos);
    }

    public function CtrlMostrarAsistenciacarita()
    {
        $respuesta = asistenciacaritaModelo::MdlMostrarAsistenciacarita();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">FECHA ASISTENCIA</th>
      <th class="text-center">NOMBRES</th>
      <th class="text-center">APELLIDOS</th>
      <th class="text-center">CEDULA</th>
      <th class="text-center">GENERO</th>
      <th class="text-center">TELEFONO</th>
      <th class="text-center">DIRECCION</th>
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
       <td>' . $value['id_usuario'] . '</td>
       <td>' . $value['uc_fechaAsistencia'] . '</td>
       <td>' . $value['usu_nombres'] . '</td>
       <td>' . $value['usu_apellidos'] . '</td>
       <td>' . $value['usu_cedula'] . '</td>
       <td>' . $value['usu_genero'] . '</td>
       <td>' . $value['usu_telefono'] . '</td>
       <td>' . $value['usu_direccion'] . '</td>
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

    public function CtrlEliminarAsistenciacarita()
    {
        $idAsistenciacarita = mainModel::decryption($_POST['asistenciacaritaDel']);

        $idAsistenciacaritallc = mainModel::limpiar_cadena($idAsistenciacarita);
        $eliminar              = asistenciacaritaModelo::MdlEliminarAsistenciacarita($idAsistenciacaritallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Asistencia de carita Eliminada Correctamente",
                "Tipo"   => "success"];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo eliminar la asistencia de carita",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    public function CtrlEditarAsistenciacarita()
    {
        $ac        = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($ac[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM usuariocarita WHERE id_usuario='$id' ");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

// Actualizar misa

    public function CtrlActualizarAsistenciacarita()
    {

        $id           = mainModel::decryption($_POST["idup-asistenciacar"]);
        $hoy          = date('Y-m-d H:i:s');
        $beneficiario = mainModel::limpiar_cadena($_POST['caritaup-asistenciacar']);
        $carita       = mainModel::limpiar_cadena($_POST['beneficiarioup-asistenciacar']);
        $id1          = mainModel::limpiar_cadena($id);

        $datos = [

            "id"            => $id1,
            "beneficiario"  => $beneficiario,
            "carita"        => $carita,
            "fecharegistro" => $hoy,

        ];
        $actualizar = asistenciacaritaModelo::MdlActualizarAsistenciacarita($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'asistenciacarlista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar asistensias de caritas",
                "Texto"     => "Actualizacion Exitosa",
                "Tipo"      => "success",
                "direccion" => $url];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "No se pudo actualizar la asistencia de caritas",
                "Tipo"   => "error"];
        }
        return mainModel::sweet_alert($alerta);

    }

    //paginador

    public function CtrlPaginadorAsistenciacaritas($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS uc.uc_fechaAsistencia, uc.id_usuario, u.usu_nombres,u.usu_apellidos,u.usu_cedula,u.usu_genero, u.usu_telefono,u.usu_direccion,c.car_descripcion,c.car_tipobeneficio FROM usuario as u inner join usuariocarita as uc on u.id_usuario=uc.id_usuario inner join caritas as c on c.id_carita=uc.id_carita ORDER BY uc.id_usuario ASC LIMIT $inicio, $registros");

        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">FECHA ASISTENCIA</th>
         <th class="text-center">NOMBRES</th>
         <th class="text-center">APELLIDOS</th>
         <th class="text-center">CEDULA</th>
         <th class="text-center">GENERO</th>
         <th class="text-center">TELEFONO</th>
         <th class="text-center">DIRECCION</th>
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
           <td>' . $value['id_usuario'] . '</td>
           <td>' . $value['uc_fechaAsistencia'] . '</td>
           <td>' . $value['usu_nombres'] . '</td>
           <td>' . $value['usu_apellidos'] . '</td>
           <td>' . $value['usu_cedula'] . '</td>
           <td>' . $value['usu_genero'] . '</td>
           <td>' . $value['usu_telefono'] . '</td>
           <td>' . $value['usu_direccion'] . '</td>
           <td>' . $value['car_descripcion'] . '</td>
           <td>' . $value['car_tipobeneficio'] . '</td>

           <td>
           <a href="' . SERVERURL . 'asistenciascarup/' . mainModel::encryption($value['id_usuario']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>
           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/asistenciacaritaAjax.php">
           <input type="hidden" name="asistenciacaritaDel" value="' . mainModel::encryption($value['id_usuario']) . '"> </input>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion fecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'asistenciascarlista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }
}
