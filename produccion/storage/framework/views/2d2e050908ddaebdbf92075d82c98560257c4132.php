 

<?php $__env->startSection('title', 'Managed Tables - Extension Combination'); ?>

<?php $__env->startPush('css'); ?>
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

   <?php if($action == "listado"): ?> 

				<ol class="breadcrumb float-xl-right">
						<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:;">Administracion</a></li>
						<li class="breadcrumb-item active">Clientes</li>
					</ol>
					<h1 class="page-header">Listado <small>Clientes</small></h1>
					<div class="row">
						<div class="col-xl-12">
							<div class="panel panel-inverse">
								<div class="panel-heading">
									<h4 class="panel-title">Registros</h4>
									<div class="panel-heading-btn">
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
										
											<div class="float-left">
												<a href="#modal-add"  data-toggle="modal">
													<span class="label label-inverse">Nuevo</span>
												</a>
											</div>
											<div class="btn-group float-right" >
												<button class="btn btn-white">PDF</button>
												<button class="btn btn-white">Excel</button>
												<button class="btn btn-white">Imprimir</button>
											</div>
											<thead>
												<tr>
													<th > </th>
													<th width="1%" > ID</th>
													<th class="text-nowrap">Tipo</th>
													<th class="text-nowrap">Nombre</th>
													<th class="text-nowrap">Email</th>
													<th class="text-nowrap">Teléfono</th>
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
													 	
														<td class="with-btn" >
															<?php if($items->estado==1): ?>
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('CA_clientes.estado',[ $items->id ,0])); ?>"> <span  class="badge bg-danger">In</span></a>
															<span type="button" ><a href="<?php echo e(route('CA_clientes.contactos',$items->id)); ?>" ><i class="fas fa-user-tag"></i></a></span>
															<?php else: ?>
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('CA_clientes.estado',[ $items->id ,1])); ?>"> <span class="badge bg-success">Ac</span></a>
															<?php endif; ?>
														</td>
														<td> <a href="#" onclick="editar(<?php echo e($items->id); ?>)"  data-toggle="modal" data-id="<?php echo e($items->id); ?>" data-target="#modal-edit"> <?php echo e($items->id); ?></a></td>
														<td><?php echo e($items->nombre); ?></td>
														<td><?php echo e($items->Nombre); ?></td>
														<td><?php echo e($items->email); ?></td>
														<td><?php echo e($items->telefono); ?></td>
														<td></td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

	<?php endif; ?>
   
	

	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_clientes.update')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							 <input type="hidden" id="id" name="id">
							 	<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Tipo Cliente * :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="tipo_cliente" >
											<?php $__currentLoopData = $cm_tipo_cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->descripcion); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre"  data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="giro">Giro * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="giro" name="giro"  data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="direccion">Direccion * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="direccion" name="direccion"  data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="telefono">Telefono * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="telefono" name="telefono"  data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Email * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="email" name="email"  data-parsley-required="true" />
									</div>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nuevo Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_clientes.store')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Tipo Cliente * :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="tipo_cliente" >
											<?php $__currentLoopData = $cm_tipo_cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->descripcion); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="giro">Giro * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="giro" name="giro" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="direccion">Dirección * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="direccion" name="direccion" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="telefono">Telefono * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="telefono" name="telefono" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Email * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="email" name="email" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>


	

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
	<script src="/assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-colreorder/js/dataTables.colreorder.min.js"></script>
	<script src="/assets/plugins/datatables.net-colreorder-bs4/js/colreorder.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-keytable/js/dataTables.keytable.min.js"></script>
	<script src="/assets/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
	<script src="/assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
	<script src="/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
	<script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
	<script src="/assets/js/demo/table-manage-combine.demo.js"></script>
	<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>


<script>
	function cambioEstado(id){
	var idSexo = id.getAttribute("data-href");
	var url = idSexo;

	swal({
		title: 'Está Seguro?',
		text: "con esta acción cambiara el estado del registro!",
		type: 'warning',
		buttons: {
			cancel: {
				text: 'Cancelar',
				value: null,
				visible: true,
				className: 'btn btn-default',
				closeModal: true,
			},
			confirm: {
				text: 'Aceptar',
				value: true,
				visible: true,
				className: 'btn btn-warning'
			}
		},
	}).then(function(isConfirm) {
		if (isConfirm) {
			window.location.href=url;
				} 
	})

	} 


$('#modal-add').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})	


var editar= function(id)
{
    var route = "<?php echo e(url('/cliente/administracion/clientes')); ?>/"+id+"/edit";
    $.get(route, function(data){
		$("#id").val(data.id);
		$("#nombre").val(data.Nombre);
		$("#giro").val(data.giro);
		$("#direccion").val(data.direccion);
		$("#telefono").val(data.telefono);
		$("#email").val(data.email);
		$("#tipo_cliente").val(data.tipo_cliente_id);
    });
}

</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/cst62160/sistemas/desarrollo/resources/views/cliente/administracion/clientes/index.blade.php ENDPATH**/ ?>