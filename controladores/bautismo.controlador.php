<?php
if ($peticionAjax) {
    require_once "../modelos/bautismo.modelo.php";
} else {
    require_once "./modelos/bautismo.modelo.php";
}

/**
 *
 */
class bautismoControlador extends bautismoModelo
{

    public function CtrInsertarBautismo()
    {

        $numero    = $_POST['numero'];
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT bau_numero FROM bautizo WHERE bau_numero='$numero'");

        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error",
                "Texto"  => "El usuario ya existe",
                "Tipo"   => "error"];
        } else {

            $numero1 = mainModel::limpiar_cadena($numero);

            $fechainscripcion  = mainModel::limpiar_cadena($_POST['fechainscripcion']);
            $tomo              = mainModel::limpiar_cadena($_POST['tomo']);
            $pagina            = mainModel::limpiar_cadena($_POST['pagina']);
            $nombres           = mainModel::limpiar_cadena($_POST['nombres']);
            $apellidos         = mainModel::limpiar_cadena($_POST['apellidos']);
            $nombrespadre      = mainModel::limpiar_cadena($_POST['nombrespadre']);
            $apellidospadre    = mainModel::limpiar_cadena($_POST['apellidospadre']);
            $telefonopadre     = mainModel::limpiar_cadena($_POST['telefonopadre']);
            $direccionpadre    = mainModel::limpiar_cadena($_POST['direccionpadre']);
            $nombresmadre      = mainModel::limpiar_cadena($_POST['nombresmadre']);
            $apellidosmadre    = mainModel::limpiar_cadena($_POST['apellidosmadre']);
            $telefonomadre     = mainModel::limpiar_cadena($_POST['telefonomadre']);
            $direccionmadre    = mainModel::limpiar_cadena($_POST['direccionmadre']);
            $nombrespadrino    = mainModel::limpiar_cadena($_POST['nombrespadrino']);
            $apellidospadrino  = mainModel::limpiar_cadena($_POST['apellidospadrino']);
            $civilpadrino      = mainModel::limpiar_cadena($_POST['civilpadrino']);
            $nombresmadrina    = mainModel::limpiar_cadena($_POST['nombresmadrina']);
            $apellidosmadrina  = mainModel::limpiar_cadena($_POST['apellidosmadrina']);
            $civilmadrina      = mainModel::limpiar_cadena($_POST['civilmadrina']);
            $fechacelebracion  = mainModel::limpiar_cadena($_POST['fechacelebracion']);
            $nombresministro   = mainModel::limpiar_cadena($_POST['nombresministro']);
            $apellidosministro = mainModel::limpiar_cadena($_POST['apellidosministro']);
            $actanacimiento    = mainModel::limpiar_cadena($_FILES['actanacimiento']);
            $matrimoniopadrino = mainModel::limpiar_cadena($_FILES['matrimoniopadrino']);
            $matrimoniomadrina = mainModel::limpiar_cadena($_FILES['matrimoniomadrina']);
            $aporte            = mainModel::limpiar_cadena($_POST['aporte']);

            $datos = [

                "fechainscripcion"  => $fechainscripcion,
                "tomo"              => $tomo,
                "pagina"            => $pagina,
                "numero"            => $numero,
                "nombres"           => $nombres,
                "apellidos"         => $apellidos,
                "nombrespadre"      => $nombrespadre,
                "apellidospadre"    => $apellidospadre,
                "telefonopadre"     => $telefonopadre,
                "direccionpadre"    => $direccionpadre,
                "nombresmadre"      => $nombresmadre,
                "apellidosmadre"    => $apellidosmadre,
                "telefonomadre"     => $telefonomadre,
                "direccionmadre"    => $direccionmadre,
                "nombrespadrino"    => $nombrespadrino,
                "apellidospadrino"  => $apellidospadrino,
                "civilpadrino"      => $civilpadrino,
                "nombresmadrina"    => $nombresmadrina,
                "apellidosmadrina"  => $apellidosmadrina,
                "civilmadrina"      => $civilmadrina,
                "fechacelebracion"  => $fechacelebracion,
                "nombresministro"   => $nombresministro,
                "apellidosministro" => $apellidosministro,
                "actanacimiento"    => $actanacimiento,
                "matrimoniopadrino" => $matrimoniopadrino,
                "matrimoniomadrina" => $matrimoniomadrina,
                "aporte"            => $aporte,
            ];

            $insertar = bautismoModelo::MdlInsertarBautismo($datos);
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
                    "Texto"  => "No se registro usuario",
                    "Tipo"   => "error"];
            }
        }
        // return mainModel::sweet_alert($alerta);
        return var_dump($datos);
    }

    /* public function CtrlMostrarBautismo()
{
$respuesta = bautismoModelo::MdlMostrarBautismos();
$respuesta = $respuesta->FetchAll();
$tabla     = "";
if (Count($respuesta)) {
$tabla .= '<table class="table table-hover text-center">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">ROL NOMBRE</th>
<th class="text-center">ACTUALIZAR</th>
<th class="text-center">ELIMINAR</th>
</tr>
</thead>
<tbody>';

foreach ($respuesta as $key => $value) {
$tabla .= '

<tr>
<td>' . $value['id_rol'] . '</td>
<td>' . $value['rol_nombre'] . '</td>
<td>
<a href="' . SERVERURL . 'bautismoUp/' . mainModel::encryption($value['id_rol']) . '" class="btn btn-success btn-raised btn-xs">
<i class="zmdi zmdi-refresh"></i>
</a>
</td>
<td>
<form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/rol.ajax.php">
<input type="hidden" name="rolDel" value="' . mainModel::encryption($value['id_rol']) . '"> </input>
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
return $tabla;*/

}
