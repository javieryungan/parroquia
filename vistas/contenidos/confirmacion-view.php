  <!-- Content page -->
  <div class="container-fluid">
    <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>CONFIRMACIÓN</small></h1>
    </div>
  
  </div>

    <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">
          
          <li>
            <a href="" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVA CONFIRMACIÓN
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>confirmacioneslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CONFIRMACIONES
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CONFIRMACIÓN
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
        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CONFIRMACIÓN</h3>
      </div>
      <div class="panel-body">
        <form>
          <fieldset>
             <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
              <div class="row">

                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Fecha de inscripción *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>        
                
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres padre *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos padre *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Teléfono padre</label>
                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                  </div>
                </div>
             
                  <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres madre*</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos madre *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Teléfono madre</label>
                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                  </div>
                </div>
                              
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres padrino*</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos padrino *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>

                   <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres madrina*</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos madrina *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>

                    <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Fecha de celebración *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres ministro *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Apellidos ministro *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>

                  <div class="col-xs-12">
                  <div class="form-group">
                    <span class="control-label">Certificado de bautismo </span>
                  <input type="file" name="pdf-reg" accept=".pdf">
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
            </form>
        </div>
      </div>
    </div>
