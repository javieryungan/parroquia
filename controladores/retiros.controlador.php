<?php
if ($peticionAjax) {
    require_once "../modelos/retiros.modelo.php";
} else {
    require_once "./modelos/retiros.modelo.php";
}

/**
 *
 */
class retirosControlador extends retirosModelo
{

    public function CtrConsultarUsuario()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT u.*, CONCAT (usu_nombres,' ',usu_apellidos) AS Nombres_apellidos FROM usuario as u INNER JOIN rol as r on u.id_rol=r.id_rol WHERE r.rol_nombre='visitante'");
        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarRetiro()
    {

        $fechaprogramada = $_POST['fechaprogramada'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT ret_fechaHora FROM retiros WHERE ret_fechaHora = '$fechaprogramada'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "El retiro ya existe",
                "Tipo"   => "error"];
        } else {

            $hoy = date('Y-m-d');

            $fechaprogramada1 = mainModel::limpiar_cadena($fechaprogramada);
            $descripcion      = mainModel::limpiar_cadena($_POST['descripcion']);
            $tipoactividad    = mainModel::limpiar_cadena($_POST['tipoactividad']);
            $usuario          = mainModel::limpiar_cadena($_POST['usuario']);

            $datos = [

                "fechaprogramada" => $fechaprogramada1,
                "fecharegistro"   => $hoy,
                "descripcion"     => $descripcion,
                "tipoactividad"   => $tipoactividad,
                "usuario"         => $usuario,

            ];

            $insertar = retirosModelo::MdlInsertarRetiro($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar retiro",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro el retiro",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);
        // return var_dump($datos);
    }

    public function CtrlMostrarRetiro()
    {
        $respuesta = retirosModelo::MdlMostrarRetiro();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">FECHA PROGRAMADA</th>
      <th class="text-center">FECHA DE REGISTRO</th>
      <th class="text-center">DESCRIPCION</th>
      <th class="text-center">NOMBRES</th>
      <th class="text-center">APELLIDOS</th>
      <th class="text-center">CEDULA ASISTENTE</th>
      <th class="text-center">TELEFONO ASISTENTE</th>
      <th class="text-center">ACTUALIZAR</th>
      <th class="text-center">ELIMINAR</th>
      </tr>
      </thead>
      <tbody>';
            foreach ($respuesta as $key => $value) {
                $tabla .= '

       <tr>
       <td>' . $value['id_datosActividad'] . '</td>
       <td>' . $value['act_fechacelebracion'] . '</td>
       <td>' . $value['act_fecharegistro'] . '</td>
       <td>' . $value['act_descripcion'] . '</td>
       <td>' . $value['usu_nombres'] . '</td>
       <td>' . $value['usu_apellidos'] . '</td>
       <td>' . $value['usu_cedula'] . '</td>
       <td>' . $value['usu_telefono'] . '</td>

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
    public function CtrlEliminarRetiro()
    {
        $idRetiro = mainModel::decryption($_POST['retirosDel']);

        $idRetirollc = mainModel::limpiar_cadena($idRetiro);
        $eliminar    = retirosModelo::MdlEliminarRetiro($idRetirollc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Retiro Eliminado Correctamente",
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

    public function CtrlEditarRetiro()
    {
        $r         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($r[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM rol as r INNER JOIN usuario as u on r.id_rol=u.id_rol INNER JOIN datosactividad as d ON u.id_usuario=d.id_usuario INNER JOIN tipoactividad as t on t.id_tipoActividad=d.id_tipoActividad WHERE d.id_datosActividad='$id'");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

//actualizar retiro

    public function CtrlActualizarRetiro()
    {

        $id  = mainModel::decryption($_POST["idup-retiro"]);
        $hoy = date('Y-m-d');

        $fechaprogramada = mainModel::limpiar_cadena($_POST["fechaprogramadaup-retiro"]);
        $descripcion     = mainModel::limpiar_cadena($_POST["descripcionup-retiro"]);
        $usuario         = mainModel::limpiar_cadena($_POST["usuarioup-retiro"]);
        $id1             = mainModel::limpiar_cadena($id);

        $datos = [
            "id"              => $id1,
            "fecharegistro"   => $hoy,
            "fechaprogramada" => $fechaprogramada,
            "descripcion"     => $descripcion,
            "usuario"         => $usuario,
        ];
        $actualizar = retirosModelo::MdlActualizarRetiro($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'retiroslista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar retiro",
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
        // var_dump($datos);
    }

    /* paginador */
    public function CtrlPaginadorRetiros($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * from usuario as u inner join datosactividad as d on u.id_usuario=d.id_usuario INNER JOIN rol as r on r.id_rol=u.id_rol order by id_datosActividad asc LIMIT $inicio, $registros");
        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">FECHA PROGRAMADA</th>
         <th class="text-center">FECHA DE REGISTRO</th>
         <th class="text-center">DESCRIPCION</th>
         <th class="text-center">NOMBRES</th>
         <th class="text-center">APELLIDOS</th>
         <th class="text-center">CEDULA ASISTENTE</th>
         <th class="text-center">TELEFONO ASISTENTE</th>
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
           <td>' . $value['act_fechacelebracion'] . '</td>
           <td>' . $value['act_fecharegistro'] . '</td>
           <td>' . $value['act_descripcion'] . '</td>
           <td>' . $value['usu_nombres'] . '</td>
           <td>' . $value['usu_apellidos'] . '</td>
           <td>' . $value['usu_cedula'] . '</td>
           <td>' . $value['usu_telefono'] . '</td>
           <td>
           <a href="' . SERVERURL . 'retirosup/' . mainModel::encryption($value['id_datosActividad']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>

           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/retirosAjax.php">
           <input type="hidden" name="retirosDel" value="' . mainModel::encryption($value['id_datosActividad']) . '"> </input>
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
           <td><a href="' . SERVERURL . 'retiroslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'retiroslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'retiroslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'restiroslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'restiroslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion flecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'restiroslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'restiroslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }
}
