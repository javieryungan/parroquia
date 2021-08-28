<?php
$peticionAjax = true;
// header('Content-Type: application/json');
header('Content-Type: application/json');
require_once '../core/configGeneral.php';
require_once '../controladores/horarios.controlador.php';
$delMisa = new horariosControlador();
$data = $delMisa->CtrConsultarEventos();
echo $data;
