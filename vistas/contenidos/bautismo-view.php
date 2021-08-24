<!-- Content page -->
<div class="container-fluid">
 <div class="page-header">
  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>BAUTISMO</small></h1>
</div>

</div>

<div class="container-fluid">
 <ul class="breadcrumb breadcrumb-tabs">

  <li>
   <a href="<?php echo SERVERURL ?>bautismo/" class="btn btn-info">
    <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO BAUTISMO
  </a>
</li>
<li>
 <a href="<?php echo SERVERURL; ?>bautismoslista/" class="btn btn-success">
  <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE BAUTISMOS
</a>
</li>
<li>
 <a href="" class="btn btn-primary">
  <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR BAUTISMO
</a>
</li>
</ul>


</div>

<br>
<br>


<!-- Panel nuevo administrador -->
<div class="container-fluid">
 <div class="panel panel-info">
  <div class="panel-heading">
   <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO BAUTISMO</h3>
 </div>
 <div class="panel-body">
   <form data-form="" class="FormularioAjax" method="POST" action="<?php echo SERVERURL ?>ajax/bautismo.ajax.php" data-form = "save" autocomplete = "off" enctype="multipart/form-data" >
    <fieldset>
     <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de Bautismo</legend>
     <div class="container-fluid">
      <div class="row">

       <div class="col-xs-12 col-sm-6">
        <div class="form-group label-floating">
         <label class="control-label"><br>Fecha de inscripción *</label>
         <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="datetime-local" name="fechainscripcion" required="" maxlength="30">
       </div>
     </div>

     <div class="col-xs-12 col-sm-6">
      <div class="form-group label-floating">
       <label class="control-label">Tomo</label>
       <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="tomo" maxlength="15">
     </div>
   </div>
   <div class="col-xs-12 col-sm-6">
    <div class="form-group label-floating">
     <label class="control-label">Página</label>
     <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="pagina" maxlength="15">
   </div>
 </div>
 <div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Número</label>
   <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="numero" maxlength="15">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombres" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidos" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres padre *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombrespadre" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos padre *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidospadre" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Teléfono padre</label>
   <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefonopadre" maxlength="15">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Dirección padre</label>
   <textarea name="direccionpadre" class="form-control" maxlength="100"></textarea>
 </div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres madre*</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresmadre" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos madre *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosmadre" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Teléfono madre</label>
   <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefonomadre" maxlength="15">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Dirección madre</label>
   <textarea name="direccionmadre" class="form-control" rows="2" maxlength="100"></textarea>
 </div>
</div>


<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres padrino*</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombrespadrino" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos padrino *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidospadrino" required="" maxlength="30">
 </div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Estado civil padrino</label>
   <select name="civilpadrino" class="form-control">
    <option value="Soltero">Soltero</option>
    <option value="Casado">Casado</option>
    <option value="Divorsiado">Divorsiado</option>
  </select>
</div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres madrina*</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresmadrina" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos madrina *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosmadrina" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Estado civil madrina</label>
   <select name="civilmadrina" class="form-control">
    <option value="Soltera">Soltera</option>
    <option value="Casada">Casada</option>
    <option value="Divorsiada">Divorsiada</option>
  </select>
</div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label"><br>Fecha de celebración *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="date" name="fechacelebracion" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Nombres ministro *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombresministro" required="" maxlength="30">
 </div>
</div>
<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Apellidos ministro *</label>
   <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidosministro" required="" maxlength="30">
 </div>
</div>



<div class="col-xs-12 col-sm-6">
  <div class="form-group label-floating">
   <label class="control-label">Aporte</label>
   <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="aporte" maxlength="15">
 </div>
</div>



<div class="col-xs-12">
  <div class="form-group">
   <span class="control-label">Acta de nacimiento </span>
   <input type="file" name="actanacimiento" accept=".pdf, PDF">
   <div class="input-group">
    <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
    <span class="input-group-btn input-group-sm">
     <button type="button" class="btn btn-fab btn-fab-mini">
      <i class="zmdi zmdi-attachment-alt"></i>
    </button>
  </span>
</div>
<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
</div>
</div>

<div class="col-xs-12">
  <div class="form-group">
   <span class="control-label">Certificado matrimonio padrino </span>
   <input type="file" name="matrimoniopadrino" accept=".pdf,PDF">
   <div class="input-group">
    <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
    <span class="input-group-btn input-group-sm">
     <button type="button" class="btn btn-fab btn-fab-mini">
      <i class="zmdi zmdi-attachment-alt"></i>
    </button>
  </span>
</div>
<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
</div>
</div>

<div class="col-xs-12">
  <div class="form-group">
   <span class="control-label">Certificado matrimonio madrina </span>
   <input type="file" name="matrimoniomadrina" accept=".pdf, .PDF">
   <div class="input-group">
    <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
    <span class="input-group-btn input-group-sm">
     <button type="button" class="btn btn-fab btn-fab-mini">
      <i class="zmdi zmdi-attachment-alt"></i>
    </button>
  </span>
</div>
<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
</div>
</div>



</div>
</div>
</fieldset>


<br>

<br>

<p class="text-center" style="margin-top: 20px;">
  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
</p>
<div class= "RespuestaAjax"></div>
</form>
</div>
</div>
</div>
