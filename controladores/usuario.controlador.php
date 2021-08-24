<?php

if ($peticionAjax) {
    require_once "../modelos/usuario.modelo.php";
} else {
    require_once "./modelos/usuario.modelo.php";
}

class usuarioControlador extends usuariosModelo
{
    //consultar rol
    public function CtrConsultarRol()
    {
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM rol");
        $respuesta = $consulta1->fetchAll();
        return $respuesta;
    }

    public function CtrInsertarUsuario()
    {
        $email     = $_POST['email'];
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT usu_correo FROM usuario WHERE usu_correo = '$email'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "El usuario ya existe",
                "Tipo"   => "error"];
        } else {

            $hoy             = date('Y-m-d ');
            $email1          = mainModel::limpiar_cadena($email);
            $nombres         = mainModel::limpiar_cadena($_POST['nombres']);
            $apellidos       = mainModel::limpiar_cadena($_POST['apellidos']);
            $cedula          = mainModel::limpiar_cadena($_POST['cedula']);
            $genero          = mainModel::limpiar_cadena($_POST['genero']);
            $fechanacimiento = mainModel::limpiar_cadena($_POST['fechanacimiento']);
            $telefono        = mainModel::limpiar_cadena($_POST['telefono']);
            $pass            = mainModel::limpiar_cadena($_POST['pass']);
            $direccion       = mainModel::limpiar_cadena($_POST['direccion']);
            $rol             = mainModel::limpiar_cadena($_POST['rol']);

            $datos = [

                "nombres"         => $nombres,
                "apellidos"       => $apellidos,
                "cedula"          => $cedula,
                "genero"          => $genero,
                "fechanacimiento" => $fechanacimiento,
                "telefono"        => $telefono,
                "email"           => $email1,
                "pass"            => $pass,
                "fecharegistro"   => $hoy,
                "direccion"       => $direccion,
                "rol"             => $rol,

            ];

            $insertar = usuariosModelo::MdlInsertarUsuario($datos);
            if ($insertar->rowCount() >= 1) {

                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Insertar usuario",
                    "Texto"  => "Registro Exitoso",
                    "Tipo"   => "success"];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto"  => "No se registro el usuario",
                    "Tipo"   => "error"];
            }
        }
        return mainModel::sweet_alert($alerta);
        //return var_dump($datos);
    }

    public function CtrlMostrarUsuario()
    {
        $respuesta = usuariosModelo::MdlMostrarUsuario();
        $respuesta = $respuesta->FetchAll();
        $tabla     = "";
        if (Count($respuesta)) {
            $tabla .= '<table class="table table-hover text-center">
      <thead>
      <tr>
      <th class="text-center">ID</th>
      <th class="text-center">NOMBRES</th>
      <th class="text-center">APELLIDOS</th>
      <th class="text-center">CEDULA</th>
      <th class="text-center">GENERO</th>
      <th class="text-center">FECHA DE NACIMIENTO</th>
      <th class="text-center">TELEFONO</th>
      <th class="text-center">CORREO</th>
      <th class="text-center">FECHA REGISTRO</th>
      <th class="text-center">DIRECCION</th>
      <th class="text-center">ROL</th>
      <th class="text-center">ACTUALIZAR</th>
      <th class="text-center">ELIMINAR</th>
      </tr>
      </thead>
      <tbody>';
            foreach ($respuesta as $key => $value) {
                $tabla .= '

       <tr>
       <td>' . $value['id_usuario'] . '</td>
       <td>' . $value['usu_nombres'] . '</td>
       <td>' . $value['usu_apellidos'] . '</td>
       <td>' . $value['usu_cedula'] . '</td>
       <td>' . $value['usu_genero'] . '</td>
       <td>' . $value['usu_fechaNacimiento'] . '</td>
       <td>' . $value['usu_telefono'] . '</td>
       <td>' . $value['usu_correo'] . '</td>
       <td>' . $value['usu_fechaRegistro'] . '</td>
       <td>' . $value['usu_direccion'] . '</td>
       <td>' . $value['rol_nombre'] . '</td>

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

    public function CtrlEliminarUsuario()
    {
        $idUsuario = mainModel::decryption($_POST['usuariosDel']);

        $idUsuariollc = mainModel::limpiar_cadena($idUsuario);
        $eliminar     = usuariosModelo::MdlEliminarUsuario($idUsuariollc);
        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Eliminar Datos",
                "Texto"  => "Usuario eliminado Correctamente",
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

    public function CtrlEditarUsuario()
    {
        $u         = explode("/", $_GET['views']);
        $id        = mainModel::decryption(($u[1]));
        $id        = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM usuario  WHERE id_usuario ='$id'");

        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    public function CtrlActualizarUsuario()
    {

        $hoy             = date('Y-m-d');
        $id              = mainModel::decryption($_POST["idup-usuario"]);
        $nombres         = mainModel::limpiar_cadena($_POST['nombresup-usuario']);
        $apellidos       = mainModel::limpiar_cadena($_POST['apellidosup-usuario']);
        $cedula          = mainModel::limpiar_cadena($_POST['cedulaup-usuario']);
        $genero          = mainModel::limpiar_cadena($_POST['generoup-usuario']);
        $fechanacimiento = mainModel::limpiar_cadena($_POST['fechanacimientoup-usuario']);
        $telefono        = mainModel::limpiar_cadena($_POST['telefonoup-usuario']);
        $email           = mainModel::limpiar_cadena($_POST['emailup-usuario']);
        $pass            = mainModel::limpiar_cadena($_POST['passup-usuario']);
        $direccion       = mainModel::limpiar_cadena($_POST['direccionup-usuario']);
        $id1             = mainModel::limpiar_cadena($id);

        $datos = [
            "id"              => $id1,
            "nombres"         => $nombres,
            "apellidos"       => $apellidos,
            "cedula"          => $cedula,
            "genero"          => $genero,
            "fechanacimiento" => $fechanacimiento,
            "telefono"        => $telefono,
            "email"           => $email,
            "pass"            => $pass,
            "fecharegistro"   => $hoy,
            "direccion"       => $direccion,

        ];
        $actualizar = usuariosModelo::MdlActualizarUsuario($datos);
        if ($actualizar->rowCount() >= 1) {
            $url    = SERVERURL . 'usuarioslista/';
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
    public function CtrlPaginadorUsuarios($pagina, $registros)
    {
        $pagina    = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $pagina    = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio    = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $conexion  = mainModel::conectar();

        $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM usuario as u inner join rol as r on u.id_rol=r.id_rol ORDER BY id_usuario asc LIMIT $inicio, $registros");

        $datos = $datos->fetchAll();

        $total    = $conexion->query("SELECT FOUND_ROWS()");
        $total    = (int) $total->fetchColumn();
        $Npaginas = ceil($total / $registros);

        $tabla = "";
        $tabla .= '<table class="table table-hover text-center">
         <thead>
         <tr>
         <th class="text-center">ID</th>
         <th class="text-center">NOMBRES</th>
         <th class="text-center">APELLIDOS</th>
         <th class="text-center">CEDULA</th>
         <th class="text-center">GENERO</th>
         <th class="text-center">FECHA DE NACIMIENTO</th>
         <th class="text-center">TELEFONO</th>
         <th class="text-center">CORREO</th>
         <th class="text-center">FECHA REGISTRO</th>
         <th class="text-center">DIRECCION</th>
         <th class="text-center">ROL</th>
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
           <td>' . $value['usu_nombres'] . '</td>
           <td>' . $value['usu_apellidos'] . '</td>
           <td>' . $value['usu_cedula'] . '</td>
           <td>' . $value['usu_genero'] . '</td>
           <td>' . $value['usu_fechaNacimiento'] . '</td>
           <td>' . $value['usu_telefono'] . '</td>
           <td>' . $value['usu_correo'] . '</td>
           <td>' . $value['usu_fechaRegistro'] . '</td>
           <td>' . $value['usu_direccion'] . '</td>
           <td>' . $value['rol_nombre'] . '</td>

           <td>
           <a href="' . SERVERURL . 'usuariosup/' . mainModel::encryption($value['id_usuario']) . '" class="btn btn-success btn-raised btn-xs">
           <i class="zmdi zmdi-refresh"></i>
           </a>

           </td>
           <td>
           <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/usuarioAjax.php">
           <input type="hidden" name="usuariosDel" value="' . mainModel::encryption($value['id_usuario']) . '"> </input>
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
           <td><a href="' . SERVERURL . 'usuarioslista/" class="btn btn-sm btn-info btn-raised"> Haga clic para regargar listado</a></td>
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
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'usuarioslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'usuarioslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-left "></i></a></li>';
            }

            for ($i = 1; $i <= $Npaginas; $i++) {
                if ($pagina == $i) {
                    $tabla .= '<li class="active page-item"><a href="' . SERVERURL . 'usuarioslista/' . $i . '">' . $i . '</a></li>';
                } else {
                    $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'usuarioslista/' . $i . '">' . $i . '</a></li>';
                }

            }

            //paginacion flecha derecha
            if ($pagina == $Npaginas) {
                $tabla .= '<li class="disabled page-item"><a href="' . SERVERURL . 'usuarioslista/' . ($pagina - 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            } else {
                $tabla .= '<li class="page-item"><a href="' . SERVERURL . 'usuarioslista/' . ($pagina + 1) . '"><i class="zmdi zmdi-arrow-right "></i></a></li>';
            }
            $tabla .= '</ul>
          </nav>';
        }

        return $tabla;
    }
}
