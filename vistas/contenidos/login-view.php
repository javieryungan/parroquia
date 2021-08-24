
<div class="full-box login-container cover">

<center>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alata&family=Italianno&family=MonteCarlo&display=swap" rel="stylesheet">

<br>
<label class="titulo1">  Parroquia Santa Maria</label>
<label class="titulo"> Madre de la Iglesia de Miraflores </label>

</center>



<!-- <img  class="icono" src="vistas/assets/avatars/logo2.png">
<img  class="icono2" src="vistas/assets/avatars/logo4.png">  -->

</div>

<div class="full-box login-container cover">

    <form action="" method="POST" autocomplete="off" class="logInForm">
      <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
      <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>

      <div class="form-group label-floating" >
        <label class="control-label"  for="UserName"><i class="fas fa-lock"></i>  Usuario</label>
        <input class="form-control" id="UserName" type="text" name="usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35" required="">
        <p class="help-block">Escribe tú nombre de usuario</p>
      </div>

      <div class="form-group label-floating">
        <label class="control-label" for="UserPass"><i class="fas fa-key"></i> Contraseña</label>
        <input class="form-control" id="UserPass" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{2,100}" maxlength="100" required="">
        <p class="help-block">Escribe tú contraseña</p>
      </div>
      <div class="form-group text-center">
        <input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
      </div>

<center>
    <p class="mb-1">
      <a href="forgot-password.html"> Olvide mi contraseña</a>
    </p>
    <p class="mb-0">
      <a href="<?php echo SERVERURL; ?>registro/" class="text-center">¿Aún no tienes cuenta? Regístrate </a>
    </p>

 </center>
    </form>
    </div>

    <?php
if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    require_once "./controladores/login.controlador.php";
    $login = new LoginControlador();
    echo $login->CrtlIniciarSesion();
}

?>