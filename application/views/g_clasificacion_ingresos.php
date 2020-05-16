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
									<div class="form-control">
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
							<button type="button" class="btn btn-grapic-income">Grafica Por Clasificacion Ingresos
							</button>
						</div>
						<!--<div class="row mt-5">
								<div class="col-md-6 text-right">
									<div class="col-md-12">
										<button class="button-save text-uppercase" id="productivo">
											Productivos
										</button>
									</div>
									<div class="col-md-12 mt-3">
										<button class="button-save text-uppercase" id="noProductivo">
											No Productivos
										</button>
									</div>
								</div>
								<div class="col-md-6 text-left">
									<div class="col-md-12">
										<button class="button-save text-uppercase" id="noAcumula">
											No Acumula
										</button>
									</div>
									<div class="col-md-12 mt-3">
										<button class="button-save text-uppercase" id="otros">
											Otros
										</button>
									</div>
								</div>


						</div>-->


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
									<th scope="col">Productivo</th>
									<th scope="col">No Productivo</th>
									<th scope="col">No Acumla</th>
									<th scope="col">Otros</th>
									<th scope="col">Total</th>

								</tr>
								</thead>
								<tbody>
								<tr>
									<td id="porcentajeProductivo"></td>
									<td id="porcentajeNoProductivo"></td>
									<td id="procentajeNoAcumula"></td>
									<td id="porcentajeOtros"></td>
									<td>100%</td>
								</tr>
								<tr>
									<td id="valorProductivo"></td>
									<td id="valorNoProductivo"></td>
									<td id="valorNoAcumula"></td>
									<td id="valorOtros"></td>
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
		clasifica=0;
		$("#productivo").on("click", function () {
			clasifica=1;
			$(this).css({"background": "#160C66"});
			$("#noProductivo").css({"background": "#8c8c8c"});
			$("#noAcumula").css({"background": "#8c8c8c"});
			$("#otros").css({"background": "#8c8c8c"});
		});
		$("#noProductivo").on("click", function () {
			clasifica=2;
			$(this).css({"background": "#160C66"});
			$("#productivo").css({"background": "#8c8c8c"});
			$("#noAcumula").css({"background": "#8c8c8c"});
			$("#otros").css({"background": "#8c8c8c"});
		});
		$("#noAcumula").on("click", function () {
			clasifica=3;
			$(this).css({"background": "#160C66"});
			$("#noProductivo").css({"background": "#8c8c8c"});
			$("#productivo").css({"background": "#8c8c8c"});
			$("#otros").css({"background": "#8c8c8c"});
		});
		$("#otros").on("click", function () {
			clasifica=10;
			$(this).css({"background": "#160C66"});
			$("#noProductivo").css({"background": "#8c8c8c"});
			$("#noAcumula").css({"background": "#8c8c8c"});
			$("#productivo").css({"background": "#8c8c8c"});
		});

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
				url: "../../actividades/graficaclasificacioningresos/1",
				success: function (response) {
					chart = '';
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Productivo", value: dataValores[0].porcentajeProductivo.toFixed(), info: "Productivo"},
							{x: "No Productivo", value: dataValores[0].porcentajeNoProductivo.toFixed(), info: "No Productivo"},
							{x: "No Acumula", value: dataValores[0].porcentajeNoAcumula.toFixed(), info: "No Acumula"},
							{x: "Otros", value: dataValores[0].porcentajeOtros.toFixed(), info: "Otros"}
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
						$("#porcentajeProductivo").text(dataValores[0].porcentajeProductivo.toFixed() + "%");
						$("#porcentajeNoProductivo").text(dataValores[0].porcentajeNoProductivo.toFixed() + "%");
						$("#procentajeNoAcumula").text(dataValores[0].porcentajeNoAcumula.toFixed() + "%");
						$("#porcentajeOtros").text(dataValores[0].porcentajeOtros.toFixed() + "%");
						$("#valorProductivo").text(accounting.formatMoney(dataValores[0].sumaProductivo));
						$("#valorNoProductivo").text(accounting.formatMoney(dataValores[0].sumaNoProductivo));
						$("#valorNoAcumula").text(accounting.formatMoney(dataValores[0].sumaNoAcumula));
						$("#valorOtros").text(accounting.formatMoney(dataValores[0].sumaOtros));
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
				url: "../../actividades/graficaclasificacioningresos/2",
				success: function (response) {
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Productivo", value: dataValores[0].porcentajeProductivo.toFixed(), info: "Productivo"},
							{x: "No Productivo", value: dataValores[0].porcentajeNoProductivo.toFixed(), info: "No Productivo"},
							{x: "No Acumula", value: dataValores[0].porcentajeNoAcumula.toFixed(), info: "No Acumula"},
							{x: "Otros", value: dataValores[0].porcentajeOtros.toFixed(), info: "Otros"}
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
						$("#porcentajeProductivo").text(dataValores[0].porcentajeProductivo.toFixed() + "%");
						$("#porcentajeNoProductivo").text(dataValores[0].porcentajeNoProductivo.toFixed() + "%");
						$("#procentajeNoAcumula").text(dataValores[0].porcentajeNoAcumula.toFixed() + "%");
						$("#porcentajeOtros").text(dataValores[0].porcentajeOtros.toFixed() + "%");
						$("#valorProductivo").text(accounting.formatMoney(dataValores[0].sumaProductivo));
						$("#valorNoProductivo").text(accounting.formatMoney(dataValores[0].sumaNoProductivo));
						$("#valorNoAcumula").text(accounting.formatMoney(dataValores[0].sumaNoAcumula));
						$("#valorOtros").text(accounting.formatMoney(dataValores[0].sumaOtros));
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
				url: "../../actividades/graficaclasificacioningresos/3",
				success: function (response) {
					if (response != 0) {
						dataValores = JSON.parse(response);
						// create an instance of a pie chart
						var data = [
							{x: "Productivo", value: dataValores[0].porcentajeProductivo.toFixed(), info: "Productivo"},
							{x: "No Productivo", value: dataValores[0].porcentajeNoProductivo.toFixed(), info: "No Productivo"},
							{x: "No Acumula", value: dataValores[0].porcentajeNoAcumula.toFixed(), info: "No Acumula"},
							{x: "Otros", value: dataValores[0].porcentajeOtros.toFixed(), info: "Otros"}
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
						$("#porcentajeProductivo").text(dataValores[0].porcentajeProductivo.toFixed() + "%");
						$("#porcentajeNoProductivo").text(dataValores[0].porcentajeNoProductivo.toFixed() + "%");
						$("#procentajeNoAcumula").text(dataValores[0].porcentajeNoAcumula.toFixed() + "%");
						$("#porcentajeOtros").text(dataValores[0].porcentajeOtros.toFixed() + "%");
						$("#valorProductivo").text(accounting.formatMoney(dataValores[0].sumaProductivo));
						$("#valorNoProductivo").text(accounting.formatMoney(dataValores[0].sumaNoProductivo));
						$("#valorNoAcumula").text(accounting.formatMoney(dataValores[0].sumaNoAcumula));
						$("#valorOtros").text(accounting.formatMoney(dataValores[0].sumaOtros));
						$("#sumaValor").text(accounting.formatMoney(dataValores[0].total));

					}
					console.log(dataValores);
				}
			});
		});

	});

</script>

</html>
