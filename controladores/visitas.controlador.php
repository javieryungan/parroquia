<?php
if ($peticionAjax) {
    require_once "../modelos/visitas.modelo.php";
} else {
    require_once "./modelos/visitas.modelo.php";
}

/**
 * */
class visitasControlador extends visitasModelo
{
    //consultar usuario
    public function CtrConsultarUsuario()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT DISTINCT * FROM usuario as u INNER JOIN rol as r ON u.id_rol=r.id_rol WHERE r.rol_nombre = 'administrador'");
        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarVisita()
    {

        $fechacelebracion = $_POST['fechacelebracion'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM datosactividad WHERE act_fechacelebracion = '$fechacelebracion'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "La visita ya existe",
                "Tipo"   => "error"];
        } else {

            $hoy = date('Y-m-d');

            $fechacelebracion1  = mainModel::limpiar_cadena($fechacelebracion);
            $nombresvisitado    = mainModel::limpiar_cadena($_POST['nombresvisitado']);
            $nombressolicitante = mainModel::limpiar_cadena($_POST['nombressolicitante']);
            $direccion          = mainModel::limpiar_cadena($_POST['direccion']);
            $telefono           = mainModel::limpiar_cadena($_POST['telefono']);
            $tipoactividad      = mainModel::limpiar_cadena($_POST['tipoactividad']);
            $nombresministro    = mainModel::limpiar_cadena($_POST['nombresministro']);
            $apellidosministro  = mainModel::limpiar_cadena($_POST['apellidosministro']);

            $datos = [

                "nombresvisitado"    => $nombresvisitado,
                "nombressolicitante" => $nombressolicitante,
                "direccion"          => $direccion,
                "telefono"           => $telefono,
                "fecharegistro"      => $hoy,
                "fechacelebracion"   => $fechacelebracion1,
                "tipoactividad"      => $tipoactividad,
                "nombresministro"    => $nombresministro,
                "apellidosministro"  => $apellidosministro,

            ];

            $insertar = visitasModelo::MdlInsertarVisita($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar visita",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro la visita",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);

    }

    public function CtrlMostrarVisita()
    {

        $respuesta = visitasModelo::MdlMostrarVisita();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">FECHA REGISTRO</th>
      <th class="text-center">FECHA Y HORA PROGRAMADA</th>
      <th class="text-center">PERSONA A VISITAR</th>
      <th class="text-center">DIRECCION</th>
      <th class="text-center">TELEFONO</th>
      <th class="text-center">SOLICITANTE DE VISITA</th>
      <th class="text-center">TIPO DE ACTIVIDAD</th>
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
       <td>' . $value['act_nombres'] . '</td>
       <td>' . $value['act_direccion'] . '</td>
       <td>' . $value['act_telefono'] . '</td>
       <td>' . $value['act_nombressolicitante'] . '</td>
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

    public function CtrlEliminarVisita()
    {
        $idVisita = mainModel::decryption($_POST['visitasDel']);

        $idVisitallc = mainModel::limpiar_cadena($idVisita);
        $eliminar    = visitasModelo::MdlEliminarVisita($idVisitallc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Visita Eliminada Correctamente",
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

    public function CtrlEditarVisita()
    {
        $v         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($v[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM datosactividad as d, tipoactividad as t WHERE id_datosActividad='$id' AND d.id_tipoActividad = t.id_tipoActividad");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

//actualizar visita

    public function CtrlActualizarVisita()
    {

        $id                 = mainModel::decryption($_POST["idup-visita"]);
        $hoy                = date('Y-m-d');
        $fechacelebracion   = mainMOdel::limpiar_cadena($_POST["fechacelebracionup-visita"]);
        $nombresvisitado    = mainMOdel::limpiar_cadena($_POST["nombresvisitadoup-visita"]);
        $direccion          = mainMOdel::limpiar_cadena($_POST["direccionup-visita"]);
        $telefono           = mainMOdel::limpiar_cadena($_POST["telefonoup-visita"]);
        $nombressolicitante = mainMOdel::limpiar_cadena($_POST["nombressolicitanteup-visita"]);
        $tipoactividad      = mainModel::limpiar_cadena($_POST['tipoactividad']);
        $nombresministro    = mainMOdel::limpiar_cadena($_POST["nombresministroup-visita"]);
        $apellidosministro  = mainMOdel::limpiar_cadena($_POST["apellidosministroup-visita"]);
        $id1                = mainModel::limpiar_cadena($id);

        $datos = [
            "id"                 => $id1,
            "fecharegistro"      => $hoy,
            "fechacelebracion"   => $fechacelebracion,
            "nombresvisitado"    => $nombresvisitado,
            "direccion"          => $direccion,
            "telefono"           => $telefono,
            "nombressolicitante" => $nombressolicitante,
            "tipoactividad"      => $tipoactividad,
            "nombresministro"    => $nombresministro,
            "apellidosministro"  => $apellidosministro,
        ];
        $actualizar = visitasModelo::MdlActualizarVisita($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'visitaslista/';
            $alerta = [
                "Alerta"    => "dirigir",
                "Titulo"    => "Actualizar visita",
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

    /* paginador */
    public function CtrlPaginadorVisitas($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM datosactividad as d INNER JOIN tipoactividad as t ON d.id_tipoActividad=t.id_tipoActividad where t.tip_descripcion LIKE '%visita%' ORDER by d.id_datosActividad ASC LIMIT $inicio, $registros");
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
         <th class="text-center">FECHA Y HORA PROGRAMADA</th>
         <th class="text-center">PERSONA A VISITAR</th>
         <th class="text-center">DIRECCION</th>
         <th class="text-center">TELEFONO</th>
         <th class="text-center">SOLICITANTE DE VISITA</th>
         <th class="text-center">TIPO DE ACTIVIDAD</th>
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
           <td>' . $value['act_nombres'] . '</td>
           <td>' . $value['act_direccion'] . '</td>
           <td>' . $value['act_telefono'] . '</td>
           <td>' . $value['act_nombressolicitante'] . '</td>
           <td>' . $value['tip_descripcion'] . '</td>
           <td>' . $value['act_nombresministro'] . '</td>
           <td>' . $value['act_apellidosministro'] . '</td>



           <td>
           <a href="' . SERVERURL . 'visitasup/' . mainModel::encryption($value['id_datosActividad']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>

           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/visitasAjax.php">
           <input type="hidden" name="visitasDel" value="' . mainModel::encryption($value['id_datosActividad']) . '"> </input>
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
           <td><a href="' . SERVERURL . 'visitaslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'visitaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'visitaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'visitaslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'visitaslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion flecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'visitaslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'visitaslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }
}
