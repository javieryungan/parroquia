<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

require_once '../controladores/certificado.controlador.php';
$insMisa = new certificadosControlador();
echo $insMisa->CtrInsertarCertificadoBautizo();

if(isset($_POST['notamarginal'])){
    //insertar
   
    if (isset($_POST['notamarginal'])) {
        // console.log('hola mundo');
        print_r('ingrese al metodo');
        echo 'inserto';
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrInsertarCertificadoBautizo();
    }
}

/* if (isset($_POST['nombre_bautizado']) || isset($_POST['certificadoDelete']) ) {

    //insertar
   
    if (isset($_POST['nombre_bautizado'])) {
        // console.log('hola mundo');
        print_r('ingrese al metodo');
        echo 'inserto';
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrInsertarCertificadoBautizo();
    }

    //actualizar

    if (isset($_POST['fechacelebracionup-misa'])) {

        $upMisa = new misasControlador();
        echo $upMisa->CtrlActualizarMisa();
    }

    //eliminar
    if (isset($_POST['misasDel'])) {
        $delMisa = new misasControlador();
        echo $delMisa->CtrlEliminarMisa();
    }

    
} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
 */