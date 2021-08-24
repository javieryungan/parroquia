<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Generar <small>CERTIFICADOS</small></h1>
	</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
           <a id="modal-905954" href="#modal-container-905954" role="button" class="btn btn-info" data-toggle="modal" ><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD </a>

      </li>




            <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="modal fade" id="modal-container-905954" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">
                Título modal
              </h5> 
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
               
              <button type="button" class="btn btn-primary">
                Guardar cambios
              </button> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
          
        </div>
        
      </div>
      
    </div>
  </div>
</div>



		 <li>
        <a href="<?php echo SERVERURL; ?>solicitudeslista/" class="btn btn-success">
          <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE SOLICITUDES
      </li>
      <li>
        <a href="<?php echo SERVERURL; ?>adminsearch/" class="btn btn-primary">
          <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR SOLICITUD
        </a>
      </li>
	</ul>
</div>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CERTIFICADOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">TIPO</th>
							<th class="text-center">FECHA Y HORA</th>
							<th class="text-center">ESTADO</th>
							<th class="text-center">USUARIO</th>
							
							<th class="text-center">ACTUALIZAR</th>
							<th class="text-center">ELIMINAR</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>7890987651</td>
							<td>Nombres</td>
							<td>Apellidos</td>
							<td>Telefono</td>
							<td>
								1
							</td>
							<td>
								<a href="#!" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>7890987651</td>
							<td>Nombres</td>
							<td>Apellidos</td>
							<td>Telefono</td>
							<td>
								2
							</td>
							<td>
								<a href="#!" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				<ul class="pagination pagination-sm">
					<li class="disabled"><a href="javascript:void(0)">«</a></li>
					<li class="active"><a href="javascript:void(0)">1</a></li>
					<li><a href="javascript:void(0)">2</a></li>
					<li><a href="javascript:void(0)">3</a></li>
					<li><a href="javascript:void(0)">4</a></li>
					<li><a href="javascript:void(0)">5</a></li>
					<li><a href="javascript:void(0)">»</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>