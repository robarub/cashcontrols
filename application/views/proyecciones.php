<?php require_once 'complementos/head.php'; ?>
<style>
	.grupos {
		/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#fefcea+0,efe49e+50,fefcea+100 */
		background: #fefcea; /* Old browsers */
		background: -moz-linear-gradient(left, #fefcea 0%, #efe49e 50%, #fefcea 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(left, #fefcea 0%, #efe49e 50%, #fefcea 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to right, #fefcea 0%, #efe49e 50%, #fefcea 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fefcea', endColorstr='#fefcea', GradientType=1); /* IE6-9 */
		cursor: pointer;
		border-style: solid;
		border-width: 1px;
		border-color: darkgrey;
	}
	.grupos .row label, .siglas .row label{
		cursor: pointer;
	}

	.siglas {
		/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ffeded+0,ffbcbc+51,ffeded+100 */
		background: #ffeded; /* Old browsers */
		background: -moz-linear-gradient(left, #ffeded 0%, #ffbcbc 51%, #ffeded 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(left, #ffeded 0%, #ffbcbc 51%, #ffeded 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to right, #ffeded 0%, #ffbcbc 51%, #ffeded 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffeded', endColorstr='#ffeded', GradientType=1); /* IE6-9 */
		cursor: pointer;
		border-style: solid;
		border-width: 1px;
		border-color: darkgrey;
	}

	#button-save, #edit {
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
<div class="system-page admin">
	<div class="container-fluid">
		<?php require_once 'complementos/cabecera.php'; ?>
		<div class="row">
			<?php require_once 'complementos/menu.php'; ?>
			<div class="col-sm-9 mt-4 admin">
				<div class="row">
					<div class="col-md-2">
						<button type="button" class="btn btn-gray-orange btn-block" id="fechaEspecifica">
							Proyecciones
						</button>
						<div id="divfEspecifica" class="row">
							<div class="col-md-6 text-right">
								<button class="button-save px-3 mt-2" type="submit" name="button"
										id="btnfE">
									Capturar
								</button>
							</div>
							<div class="col-md-6 text-left">
								<button class="button-save px-3 mt-2" type="submit" name="button"
										id="btnfE">
									Editar
								</button>
							</div>

						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Concepto</small>
							<select class="form-control form-control-sm">
								<option>----</option>
								<option>Ingreso</option>
								<option>Egreso</option>
							</select>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Grupo</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Sigla</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Mes</small>
							<select class="form-control form-control-sm">
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
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Año</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 offset-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Importe</small>
							<input class="form-control form-control-sm">
						</div>
					</div>
					<div class="col-md-2 offset-md-4">
						<button type="button" class="btn btn-gray-orange btn-block btn-sm" id="fechaEspecifica">
							Guardar
						</button>
					</div>
				</div>
				<div class="row mt-4 text-center">
					<div class="col-md-2">
						<button id="button-add" class=button-app"><i class="fa fa-eye"></i></button>
						<button id="button-save" class=button-app"><i class="fa fa-eye-slash"></i></button>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Mes</small>
							<select class="form-control form-control-sm">
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
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Saldo Inicial</small>
							<input class="form-control form-control-sm">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Ingreso Acumulado</small>
							<input class="form-control form-control-sm">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Egreso Acumulado</small>
							<input class="form-control form-control-sm">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Disponible</small>
							<input class="form-control form-control-sm">
						</div>
					</div>
				</div>
				<div class="row mt-4 text-center">
					<div class="col-md-2">
						<button id="button-add" class=button-app"><i class="fa fa-eye"></i></button>
						<button id="button-save" class=button-app"><i class="fa fa-eye-slash"></i></button>
					</div>
					<div class="col-md-5">
						<table class="table table-bordered" style="font-size: 10px !important;">
							<thead>
							<tr>
								<th colspan="3">2020</th>
							</tr>
							<tr>
								<th>Ingresos Acum. x mes</th>
								<th>Saldo proyectado</th>
								<th>Saldo Real</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Enero</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Febrero</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Marzo</td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-5">
						<table class="table table-bordered" style="font-size: 10px !important;">
							<thead>
							<tr>
								<th colspan="3">2020</th>
							</tr>
							<tr>
								<th>Egresos Acum. x mes</th>
								<th>Saldo proyectado</th>
								<th>Saldo Real</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Enero</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Febrero</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Marzo</td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 text-center">
								<h6>Ingresos</h6>
							</div>
							<?php foreach ($gruposIngresos as $gi) { ?>
								<div class="col-md-12">
									<div class="grupos col-md-12 pt-2" data-toggle="collapse"
										 data-target="#collapseSig<?php echo $gi->id_grupo;?>">
										<div class="row">
											<div class="col-md-6">
												<label><?php echo $gi->nombre; ?></label>
											</div>
											<div class="col-md-3">
												<label>$100000.00</label>
											</div>
											<div class="col-md-3">
												<label>$100000.00</label>
											</div>
										</div>
									</div>
									<?php foreach ($gi->siglas as $si){ ?>
									<div id="collapseSig<?php echo $gi->id_grupo;?>" class="col-md-12 collapse siglas pt-2" data-toggle="collapse"
										 data-target="#collapseTwo">
										<div class="row">
											<div class="col-md-6">
												<label><?php echo $si->sigla;?></label>
											</div>
											<div class="col-md-3">
												<label>$100000.00</label>
											</div>
											<div class="col-md-3">
												<label>$100000.00</label>
											</div>
										</div>
									</div>
									<div id="collapseTwo" class="col-md-12 collapse pt-2">
										Enero
									</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'complementos/footer.php'; ?>
</body>


</html>
