<!-- Content page -->
    <div class="container-fluid">
       <div class="page-header">
      <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> <small>COMPROBANTES DE PAGOS</small></h1>
    </div>

    </div>

    <div class="container-fluid">
      <ul class="breadcrumb breadcrumb-tabs">
          
          <li>
            <a href="<?php echo SERVERURL; ?>recibo/" class="btn btn-info">
              <i class="zmdi zmdi-plus"></i> &nbsp;  NUEVO COMPROBANTE DE PAGO
            </a>
          </li>
          <li>
            <a href="<?php echo SERVERURL; ?>reciboslista/" class="btn btn-success">
              <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE COMPROBANTES DE PAGOS
            </a>
          </li>
          <li>
            <a href="" class="btn btn-primary">
              <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR COMPROBANTE DE PAGO
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
          <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO COMPROBANTE DE PAGO</h3>
        </div>
        <div class="panel-body">
          <form>
         <fieldset>
            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información comprobante de pago</legend>
            <div class="container-fluid">
              <div class="row">
              
               <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombres y apellidos*</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Fecha *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>
                 <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Monto *</label>
                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                  </div>
                </div>

               
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Concepto</label>
                    <textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
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
