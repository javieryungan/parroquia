<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> LISTA <small>CONFIRMACIÓN</small></h1>
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

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CONFIRMAACIONES</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">FECHA</th>
							<th class="text-center">NOMBRES </th>
							<th class="text-center">APELLIDOS </th>
							<th class="text-center">NOMBRES PADRES</th>
							<th class="text-center">APELLIDOS PADRE</th>
							<th class="text-center">TELÉFONO PADRE</th>
							<th class="text-center">NOMBRES MADRE </th>
							<th class="text-center">APELLIDOS MADRE </th>
							<th class="text-center">TELÉFONO MADRE </th>
							<th class="text-center">NOMBRES PADRINO</th>
							<th class="text-center">APELLIDOS PADRINO</th>
							<th class="text-center">NOMBRES MADRINA</th>
							<th class="text-center">APELLIDOS MADRINA</th>
							<th class="text-center">FECHA DE CELEBRACIÓN</th>
							<th class="text-center">CERTIFICADO BAUTISMO</th>
							<th class="text-center">NOMBRES MINISTRO </th>
							<th class="text-center">APELLIDOS MINISTRO </th>
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