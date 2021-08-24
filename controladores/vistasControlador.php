<?php
//el controlador depende del modelo, es decir hereda del modelo. el controlador enva los datos al modelo

require_once "./modelos/vistasModelo.php";
class vistasControlador extends vistasModelo
{

    public function
//obtiene la plantilla y la muestra
    obtener_plantilla_controlador() {
        require_once "./vistas/plantilla.php";
    }

    public function obtener_vistas_controlador()
    {

        if (isset($_GET['views'])) {
            $ruta = explode("/", $_GET['views']);
            //self hace referencia o seleccion de los metodos heredados

            $respuesta = vistasModelo::obtener_vistas_modelo($ruta[0]);
        } else {
            $respuesta = "login";
        }

        return $respuesta;

    }
}
