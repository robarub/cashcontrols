<?php require_once 'complementos/head.php'; ?>
<style>
	svg {
		font-size: 17px !important;
	}

	#button-save svg, #button-add svg{
		font-size: 10px!important;
	}

	#button-save {
		background: #160C66;
		border: none;
		border-radius: 2px 6px 2px 6px;
		box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75);
		-moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75);
		-webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75);
		color: #FFF;
		font-size: 12px;
		padding: 2px 8px;
	}

	#button-add {
		background: #8c8c8c;
		border: none;
		border-radius: 2px 6px 2px 6px;
		box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75)
		-moz-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75)
		-webkit-box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.75);
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
			<div class="col-sm-9 mt-3 report">
				<div class="row">
					<input type="text" id="rol" value="<?php echo $this->session->userdata('rol'); ?>"
						   style="display: none;"/>
					<div class="col-md-5 overflow-auto" style="height: 120px;">
						<table class="table table-bordered">
							<thead style="background: gray; color: whitesmoke;">
							<tr>
								<td style="font-size: 11.5px;">CUENTA</td>
								<td style="font-size: 11.5px;">SALDO INICIAL</td>
								<td style="font-size: 11.5px;">SALDO A LA FECHA</td>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($cuentas as $c) { ?>
								<tr style="color:white;background: <?php echo $c->color; ?>">
									<td style="font-size: 13px;"><?php echo $c->nombre; ?></td>
									<td style="font-size: 13px;"
										class="tdSaldiInicial"><?php echo $c->saldo_inicial; ?></td>
									<td style="font-size: 13px;" class="tdSaldoFecha"><?php echo $c->saldo; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>

					<div class="col-md-5 offset-2">
						<div class="row">
							<?php if($this->session->userdata('rol')==2){ ?>
							<div class="col-md-12 text-right">
								<button id="button-add" class=button-app"><i class="fa fa-eye"></i></button>
								<button id="button-save" class=button-app"><i class="fa fa-eye-slash"></i></button>
								<div id="tbl_notificaciones" style="font-size: 12px; display: none;">
									<table class="table table-striped text-uppercase mt-3">
										<thead style="background: gray; color: whitesmoke;">
										<tr>
											<td style="font-size: 11.5px;">Mes</td>
											<td style="font-size: 11.5px;">Notificaciones</td>
										</tr>
										</thead>
										<?php foreach ($notificaciones as $n) { ?>
											<tr>
												<td><?php echo $n->mes; ?></td>
												<td><?php echo $n->total; ?></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<?php } ?>

							<div class="col-md-12 text-center">
								<label>PARAMTROS DE BUSQUEDA</label>
							</div>
							<div class="col-md-6 text-center">
								<label>Elige el tipo de Cuenta</label>
								<div class="form-group">
									<div class="text-uppercase">
										<select class="form-control" id="ctaGeneral">
											<option value="0">Seleccionar cuenta</option>
											<option value="t">Todas</option>
											<?php foreach ($cuentas as $c) { ?>
												<option value="<?php echo $c->id_cuenta; ?>"><?php echo $c->nombre; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6 text-center">
								<label>Mes y Año</label>
								<div class="row">
									<div class="colo-md-5">
										<div class="form-group">
											<div class="text-uppercase">
												<select class="form-control" id="mes">
													<option value="0">MES</option>
													<option value="1">Enero</option>
													<option value="2">Febrero</option>
													<option value="3">Marzo</option>
													<option value="4">Abril</option>
													<option value="5">Mayo</option>
													<option value="6">Junio</option>
													<option value="7">Julio</option>
													<option value="8">Agosto</option>
													<option value="9">Septiembre</option>
													<option value="10">Octubre</option>
													<option value="11">Noviembre</option>
													<option value="12">Diciembre</option>
												</select>
											</div>
										</div>
									</div>
									<div class="colo-md-5 offset-2">
										<div class="form-group">
											<div class="text-uppercase">
												<select class="form-control" id="anio">
													<option value="0">Año</option>
													<option value="2020">2020</option>
												</select>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>

				</div>
				<div class="row mt-4">
					<div class="col-md-12 col-12 d-flex justify-content-center align-items-center">
						<button class=" button-save" type="button" name="button" id="aplicar">Aplicar orden de
							parametro
						</button>
					</div>
				</div>
				<div class="row mt-5">
					<div id="loader_table" class="col-md-12 text-center"
						   style="display:none;">
						<img src="<?php echo base_url(); ?>assets/assets/img/805.gif"
							 style="width: 125px;">
					</div>
				</div>
				<div class="row mt-5" style="display: none;" id="divTabla">
					<div class="col-md-12" style="font-size: 12px; overflow: auto !important;">
						<table class="display responsive nowrap table table-striped text-uppercase" style="width:100%"
							   id="tbl_cuentas">
							<thead>
							<tr>
								<th>Id Actividad</th>
								<th>Cuenta Gral.</th>
								<th>Actividad</th>
								<th>Importe</th>
								<th>Fecha</th>
								<th>Comentario</th>
								<th>Clasificacion</th>
								<th>Sigla</th>
								<th>Grupo</th>
								<th>Act. Ing</th>
								<th>Act. Egr</th>
								<th>Reclasificar</th>
								<th>Validar</th>
								<th>Comentario</th>
							</tr>
							</thead>
							<tbody id="tbl_tbody">

							</tbody>
							<tfoot>
							<tr>
								<th>Id Actividad</th>
								<th>Cuenta Gral.</th>
								<th>Actividad</th>
								<th>Importe</th>
								<th>Fecha</th>
								<th>Comentario</th>
								<th>Clasificacion</th>
								<th>Sigla</th>
								<th>Grupo</th>
								<th>Act. Ing</th>
								<th>Act. Egr</th>
								<th>Reclasificar</th>
								<th>Validar</th>
								<th>Comentario</th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-sm-2 offset-md-10 d-flex justify-content-center align-items-center">
						<input type="text" class="form-control w-18 d-inline-block mr-2" value="1">
						<i class="arrow-left"></i>
						<span class="px-2">Páginas</span>
						<i class="arrow-right"></i>
						<input type="text" class="form-control w-18 d-inline-block ml-2" value="10">
					</div>
				</div>-->
			</div>
		</div>
	</div>
</div>
<?php require_once 'complementos/footer.php'; ?>
<script src="<?php echo base_url(); ?>assets/js/busqueda.js"></script>
<script src="<?php echo base_url(); ?>assets/js/accouting.js"></script>
</body>

</html>


