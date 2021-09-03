<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';


if (isset($_POST['consulta']) || isset($_POST['notamarginal']) || isset($_POST['certificadobautizoDelete']) || isset($_POST['idbautizoe'])) {
    require_once '../controladores/certificado.controlador.php';
    
    //insertar
    if (isset($_POST['notamarginal'])) {
        //echo ('ingreso a insertar baut');
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrInsertarCertificadoBautizo();
    }
    // actualizar
    if (isset($_POST['idbautizoe'])) {
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrlActualizarCertificadoBautizo();
    }

    //eliminar
    if (isset($_POST['certificadobautizoDelete'])) {
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlEliminarCertificadoBautizo();
    }

     // buscar
     if(isset($_POST['consulta'])){
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlPaginadorCertificadoBautizo(1,10,$_POST['consulta']);
    }
    
}else if (isset($_POST['searchmatrimonio']) || isset($_POST['nombrenovio'])||isset($_POST['certificadomatrimonioDelete'])|| isset($_POST['idmatrimonioe'])) {
    require_once '../controladores/certificado.controlador.php';
    
    //insertar
    if (isset($_POST['nombrenovio'])) {
        //echo ('ingreso a insertar matri');
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrInsertarCertificadoMatrimonio();
    }
    // actualizar
    if (isset($_POST['idmatrimonioe'])) {
        //echo('ingreso act matri');
        $insMisa = new certificadosControlador();
        echo $insMisa->CtrlActualizarCertificadoMatrimonio();
    }

    //eliminar
    if (isset($_POST['certificadomatrimonioDelete'])) {
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlEliminarCertificadoMatrimonio();
    }

    // buscar
    if(isset($_POST['searchmatrimonio'])){
        $delMisa = new certificadosControlador();
        echo $delMisa->CtrlPaginadorCertificadoMatrimonio(1,10,$_POST['searchmatrimonio']);
    }
    
} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
