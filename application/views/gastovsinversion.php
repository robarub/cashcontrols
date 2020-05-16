<?php require_once 'complementos/head.php'; ?>

<body>
<div class="system-page admin">
	<div class="container-fluid">
		<?php require_once 'complementos/cabecera.php'; ?>
		<div class="row">
			<?php require_once 'complementos/menu.php'; ?>
			<div class="col-sm-9 mt-4 admin">
				<div class="row">
					<div class="col-sm-2">
						<button type="button" class="btn btn-gray-orange btn-block" id="fechaEspecifica">Fecha
							especifica
						</button>
						<div id="divfEspecifica" style="display: none;">
							<div class="input-group mt-2">
								<input type="date" class="form-control calendario" id="fechaE">
							</div>
							<button class="button-save float-right px-3 mt-2" type="submit" name="button" id="btnfE">
								Ir
							</button>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="row">
							<div class="col-12 d-flex justify-content-center">
								<button type="button" class="btn projections active" id="periodoEspecifico">Periodo
									especifico
								</button>
							</div>
						</div>
						<div class="row mt-2" style="display: none;" id="divpEspecifico">
							<div class="col-sm-6">
								<div class="input-group">
									<input type="date" class="form-control calendario" id="fiperiodoEspecifivo">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<input type="date" class="form-control calendario" id="ffperiodoEspecifivo">
								</div>
								<button class="button-save float-right px-3 mt-2" type="submit" name="button"
										id="btnpe">Ir
								</button>

							</div>

						</div>
					</div>
					<div class="col-sm-3">
						<div class="d-flex justify-content-center">
							<button type="button" class="btn projections active" id="ma">Mes y Año</button>
						</div>
						<div class="row mt-2" id="divma" style="display: none;">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-control">
										<select id="mes">
											<option value="0">Elige un mes:</option>
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
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-control" >
										<select id="anio">
											<option value="0">Elige año:</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
										</select>
									</div>
								</div>
								<button class="button-save float-right px-3 mt-2" type="submit" name="button"
										id="btnMa">Ir
								</button>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="d-flex justify-content-center">
							<button type="button" class="btn btn-grapic-income">Grafica por Ingresos vs Egresos</button>
						</div>
						<div class="mt-4 d-flex justify-content-center mb-2">
							<button type="button" class="btn projections btn-gray-orange" id="vDetalle">Ver Detalle
							</button>
						</div>
						<div class="d-flex align-items-center mt-3">
							<button type="button" class="btn value text-uppercase mr-3">Valor</button>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="value" id="thousands"
									   checked="checked">
								<label class="form-check-label" for="thousands">Con miles</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="value" id="whitout-thousands">
								<label class="form-check-label" for="whitout-thousands">Sin miles</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-9">
						<div id="graphic"></div>
					</div>
					<!--<div class="col-3 align-self-center">
						<div class="terms">Terminos Consolidados</div>
						<div class="text-income mt-2">Egresos 65%</div>
					</div>-->
				</div>
				<div class="row" style="display: none;" id="tablaValores">
					<div class="col-sm-2 offset-sm-1">
						<div class="mt-5">
							<button type="button" class="btn btn-primary btn-block value">Porcentaje</button>
							<button type="button" class="btn btn-primary btn-block value">Valor</button>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="table-detail-graphic">
							<table class="table table-bordered table-sm" cellspacing="0" width="100%">
								<thead class="thead-dark">
								<tr>
									<th scope="col">Ingresos</th>
									<th scope="col">Egresos</th>
									<th scope="col">Total</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td id="porcentajeI"></td>
									<td id="porcentajeE">System Architect</td>
									<td>100%</td>
								</tr>
								<tr>
									<td id="valorI"></td>
									<td id="valorE"></td>
									<td id="sumaValor"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'complementos/footer.php'; ?>
</body>

<script>
	$(document).ready(function () {

		$("#fechaEspecifica").on("click", function () {
			$("#divfEspecifica").show();
			$("#divpEspecifico").hide();
			$("#divma").hide();

		});
		$("#periodoEspecifico").on("click", function () {
			$("#divfEspecifica").hide();
			$("#divpEspecifico").show();
			$("#divma").hide();
		});
		$("#ma").on("click", function () {
			$("#divfEspecifica").hide();
			$("#divpEspecifico").hide();
			$("#divma").show();
		});

		$("#btnfE").on("click", function () {
			$.ajax({
				type: "POST",
				data: {
					fecha: $("#fechaE").val()
				},
				url: "../../actividades/graficaingresosvsegresos/1",
				success: function (response) {
					chart='';
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Ingresos", value: dataValores[0].porcentajeI.toFixed(), info: "Ingresos"},
							{x: "Egresos", value: dataValores[0].porcentajeE.toFixed(), info: "Egresos"}
						];

						// create a 3d pie chart
						chart = anychart.pie3d(data);

						// set chart labels
						var labels = chart.labels();
						labels.enabled(true);
						labels.fontColor("white");
						labels.width(140);
						labels.hAlign("center");
						labels.position("inside");
						labels.useHtml(true);
						labels.format("<span style='text-decoration: underline;'>{%value}%<br><br></span>{%info}");
						// set the layout of the legend
						chart.legend().itemsLayout("vertical");
						// set the position of the legend
						chart.legend().position("right");
						// set the container id
						chart.container("graphic");
						// initiate drawing the chart
						chart.draw();
						$("#tablaValores").show();
						$("#porcentajeE").text(dataValores[0].porcentajeE.toFixed() + "%");
						$("#porcentajeI").text(dataValores[0].porcentajeI.toFixed() + "%");
						$("#valorE").text(accounting.formatMoney(dataValores[0].sumaE));
						$("#valorI").text(accounting.formatMoney(dataValores[0].sumaI));
						$("#sumaValor").text(accounting.formatMoney(dataValores[0].total));

					}
					console.log(dataValores);
				}
			});
		});


		$("#btnpe").on("click", function () {
			$.ajax({
				type: "POST",
				data: {
					fechaIni: $("#fiperiodoEspecifivo").val(),
					fechaFin: $("#ffperiodoEspecifivo").val()
				},
				url: "../actividades/graficaingresosegresos/2",
				success: function (response) {
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Ingresos", value: dataValores[0].porcentajeI.toFixed(), info: "Ingresos"},
							{x: "Egresos", value: dataValores[0].porcentajeE.toFixed(), info: "Egresos"}
						];

						// create a 3d pie chart
						chart = anychart.pie3d(data);

						// set chart labels
						var labels = chart.labels();
						labels.enabled(true);
						labels.fontColor("white");
						labels.width(140);
						labels.hAlign("center");
						labels.position("inside");
						labels.useHtml(true);
						labels.format("<span style='text-decoration: underline;'>{%value}%<br><br></span>{%info}");
						// set the layout of the legend
						chart.legend().itemsLayout("vertical");
						// set the position of the legend
						chart.legend().position("right");
						// set the container id
						chart.container("graphic");
						// initiate drawing the chart
						chart.draw();
						$("#tablaValores").show();
						$("#porcentajeE").text(dataValores[0].porcentajeE.toFixed() + "%");
						$("#porcentajeI").text(dataValores[0].porcentajeI.toFixed() + "%");
						$("#valorE").text(accounting.formatMoney(dataValores[0].sumaE));
						$("#valorI").text(accounting.formatMoney(dataValores[0].sumaI));
						$("#sumaValor").text(accounting.formatMoney(dataValores[0].total));

					}
					console.log(dataValores);
				}
			});
		});




		$("#btnMa").on("click", function () {
			$.ajax({
				type: "POST",
				data: {
					mes: $("#mes").val(),
					anio: $("#anio").val()
				},
				url: "../actividades/graficaingresosegresos/3",
				success: function (response) {
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Ingresos", value: dataValores[0].porcentajeI.toFixed(), info: "Ingresos"},
							{x: "Egresos", value: dataValores[0].porcentajeE.toFixed(), info: "Egresos"}
						];

						// create a 3d pie chart
						chart = anychart.pie3d(data);

						// set chart labels
						var labels = chart.labels();
						labels.enabled(true);
						labels.fontColor("white");
						labels.width(140);
						labels.hAlign("center");
						labels.position("inside");
						labels.useHtml(true);
						labels.format("<span style='text-decoration: underline;'>{%value}%<br><br></span>{%info}");
						// set the layout of the legend
						chart.legend().itemsLayout("vertical");
						// set the position of the legend
						chart.legend().position("right");
						// set the container id
						chart.container("graphic");
						// initiate drawing the chart
						chart.draw();
						$("#tablaValores").show();
						$("#porcentajeE").text(dataValores[0].porcentajeE.toFixed() + "%");
						$("#porcentajeI").text(dataValores[0].porcentajeI.toFixed() + "%");
						$("#valorE").text(accounting.formatMoney(dataValores[0].sumaE));
						$("#valorI").text(accounting.formatMoney(dataValores[0].sumaI));
						$("#sumaValor").text(accounting.formatMoney(dataValores[0].total));

					}
					console.log(dataValores);
				}
			});
		});

	});

</script>

</html>
