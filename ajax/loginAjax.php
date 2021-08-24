<?php

$peticionAjax = true;
require_once "../core/configAPP.php";

if () {

} else {
    session_start(['name' => 'UIC']);
    session_unset();
    session_destroy();
    header("Location:" . SERVERURL . "login/");
    exit();
}
