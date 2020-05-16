<?php require_once 'complementos/head.php'; ?>
<style>
	option{
		font-size: 10px;
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
							<small for="exampleFormControlInput1">Concepto</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<small for="exampleFormControlInput1">Sigla</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
					<div class="col-md-1">
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
					<div class="col-md-1">
						<div class="form-group">
							<small for="exampleFormControlInput1">Año</small>
							<select class="form-control form-control-sm">
								<option>----</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<small for="exampleFormControlInput1">Ingresar inporte</small>
							<input class="form-control form-control-sm">
						</div>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-gray-orange btn-block btn-sm" id="fechaEspecifica">
							Guardar
						</button>
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
