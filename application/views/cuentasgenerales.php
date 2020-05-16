<?php require_once 'complementos/head.php'; ?>
<style>

	#listaCuentas{
		display: none;
	}
	#edit{
		display: none;
	}

	#button-save, #edit{
		background: #160C66;
		border: none ;
		border-radius: 2px 6px 2px 6px ;
		box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75) ;
		-moz-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
		-webkit-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
		color: #FFF;
		font-size: 12px;
		padding: 2px 8px;
	}
	#button-add{
		background: #8c8c8c;
		border: none ;
		border-radius: 2px 6px 2px 6px ;
		box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75)
		-moz-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75)
		-webkit-box-shadow: 1px 1px 4px 0px rgba(0,0,0,0.75);
		color: #FFF;
		font-size: 12px;
		padding: 2px 8px;
	}


</style>
<body>
<div class="system-page">
	<div class="container-fluid">
		<?php require_once 'complementos/cabecera.php'; ?>
		<div class="row">
			<?php require_once 'complementos/menu.php'; ?>
			<div class="col-sm-9 mt-3 general-accounts">
				<div class="row">
					<div class="col-md-12 col-12">
						<p class="title pl-2">Cuentas generales</p>
						<div class="row">

							<div class="form-group col-md-2">
								<label class="mb-0 pl-2"><small>Incluye Cta. General</small></label>
								<input type="text" class="form-control" id="cuenta">
								<small style="color: red; display: none;" id="alertCuenta">Debe ingresar un
									cuenta</small>
							</div>


							<div class="form-group col-md-3">
								<label class="mb-0 pl-2"><small>Seleccione el tipo de tarjeta y/o cuenta</small></label>
								<div>
									<select id="tipoCuenta" class="form-control">
										<option value="0">Seleccione una opción</option>
										<?php foreach ($tipocuentas as $tc) { ?>
											<option
													value="<?php echo $tc->id_tipo_cuenta; ?>"><?php echo $tc->nombre; ?></option>
										<?php } ?>
									</select>
								</div>
								<small style="color: red; display: none;" id="alertTipoCuenta">Debe ingresar un
									cuenta</small>
							</div>


							<div class="form-group col-md-1">
								<label class="mb-0 pl-2"><small></small></label>
								<input class="form-control" id="color" type="color">
								<small style="color: red; display: none;" id="msj_color">Debe asignarle un color</small>
							</div>

							<div class="form-group col-md-3">
								<label class="mb-0 pl-2"><small></small></label>
								<input class="form-control calendario" id="fecha" type="date">
								<small style="color: red; display: none;" id="msj_color">Debe ingresar una fecha</small>
							</div>

							<div class="form-group col-md-2">
								<label class="mb-0 pl-2"><small>Saldo inicial</small></label>
								<input type="text" class="form-control" id="saldo">
								<small style="color: red; display: none;" id="alertCuenta">Debe ingresar un
									cuenta</small>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
									<button id="button-add" class=button-app"><i class="fa fa-eye"></i></button>
									<button id="button-save" class=button-app"><i class="fa fa-eye-slash"></i></button>
									<button id="edit" class=button-app">Editar</button>
							</div>
							<div class="col-md-8 text-right">
								<div class="row">
									<div class="col-md-10">
										<button class="button-save" type="button" name="button" id="editar">
											Editar
										</button>
									</div>
									<div class="col-md-2">
										<button class="button-save" type="button" name="button" id="guardar">
											Guardar
										</button>
									</div>

								</div>



							</div>
						</div>


						<div class="table-striped-system mt-5 mb-5" id="listaCuentas">
							<div class="row">

								<?php echo $this->session->userdata('rol');
								if ($this->session->userdata('rol') !=1) { ?>

								<div class="form-group col-md-4">
									<select id="tipoTabla" class="form-control" readonly="false">
										<option value="cd" selected>Vista a color</option>
										<option value="sd">Vista sin color</option>
									</select>
								</div>
								<?php }elseif ($this->session->userdata('rol') ==1) {?>
									<div class="form-group col-md-4" style="display: none;">
										<select id="tipoTabla" class="form-control" readonly="true">
											<option value="cd">Vista a color</option>
											<option value="sd" selected>Vista sin color</option>
										</select>
									</div>
								<?php } ?>
							</div>
							<div id="tbl_cuentas" style="font-size: 12px; display: none;">
								<table class="table table-striped text-uppercase"  >
									<thead>
										<tr>
											<th>Cuenta</th>
											<th>Tipo de tarjeta y/o cuenta</th>
											<th>Saldo inicial</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($cuentas as $c) { ?>
										<tr style="cursor:pointer;" class="fila" id="<?php echo $c->id_cuenta; ?>">
											<th><?php echo $c->nombre; ?></th>
											<th><?php echo $c->tipoCuenta; ?></th>
											<th class="saldos"><?php echo $c->saldo; ?></th>
											<th><?php echo $c->fecha; ?></th>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div id="tbl_cuentas_color" style="font-size: 12px; display: none;">
								<table class="table table-striped text-uppercase"  >
									<thead>
									<tr>
										<th>Cuenta</th>
										<th>Tipo de tarjeta y/o cuenta</th>
										<th>Saldo inicial</th>
										<th>Fecha</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($cuentas as $c) { ?>
										<tr style="cursor:pointer; background: <?php echo $c->color; ?>" class="fila" id="<?php echo $c->id_cuenta; ?>">
											<th><?php echo $c->nombre; ?></th>
											<th><?php echo $c->tipoCuenta; ?></th>
											<th class="saldos"><?php echo $c->saldo; ?></th>
											<th><?php echo $c->fecha; ?></th>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'complementos/footer.php'; ?>
<script src="<?php echo base_url(); ?>assets/js/cuentasgenerales.js"></script>
</body>
<script>

</script>
</html>
