<!-- misasAjax.php -->

<?php
$peticionAjax = true;
require_once '../core/configGeneral.php';

if (isset($_POST['fechacelebracion']) || isset($_POST['misasDel']) || isset($_POST['fechacelebracionup-misa']) || isset($_POST['id']) ) {

    //insertar
    require_once '../controladores/misas.controlador.php';
    if (isset($_POST['fechacelebracion'])) {

        $insMisa = new misasControlador();
        echo $insMisa->CtrInsertarMisa();
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

    // consulta horario
    if (isset($_POST['id'])) {

        $misas = new misasControlador();
        $horario = $misas->CtrConsultarHorario($_POST['id']);
        $data =json_encode($horario);
        if(count($horario)> 0 ){
            echo '<option value=""></option>';
            foreach ($horario as $key => $value) {
                echo '<option value="' . $value["ide_horario"] . '">' . $value["hora_inicio"] . ' - ' . $value["hora_fin"] . '</option>';
            }
        }else{
            echo '<option value=""></option>';
            echo '<option value="">-- No tiene horarios --</option>';
        }
    }
} else {
    session_start();
    session_destroy();
    echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
}
