<?php

session_start(['name' => 'UIC']);
require_once '../core/configGeneral.php';

if (isset($_POST['busqueda_inicial']) || isset($_POST['eliminar_busqueda'])) {

    $data_url = [
        "misas" => "buscarmisa"
    ];

    if (isset($_POST['modulo'])) {

        $modulo = $_POST['modulo'];
        if (!isset($data_url[$modulo])) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "NO podemos continuar con la busqueda error ",
                "Tipo"   => "error"];
            echo json_encode($alerta);
            exit();
        }

    } else {
        $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto"  => "NO podemos continuar con la busqueda error de configuracion",
            "Tipo"   => "error"];
        echo json_encode($alerta);
        exit();


    }

$name_var="busqueda_".$modulo;
// inicial busqueda
if(isset($_POST['busqueda_inicial'])){
	if(isset($_POST['busqueda_inicial']==""){


		 $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto"  => "por favor introduce un termino de busqueda para empezar ",
                "Tipo"   => "error"];
            echo json_encode($alerta);
            exit();


	}
	$_SESSION[$name_var]=$_POST['[busqueda_inicial'];

}

//eliminar busqueda

if(isset($_POST['eliminar_busqueda'])){
	unset($_SESSION[$name_var]);
}
//redireccionar
$url=$data_url[$modulo];
$alerta=[

	"Alerta"=>"redireccionar",
	"URL"=> SERVERURL.$url."/";

];
echo json_encode($alerta);


} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';

}
