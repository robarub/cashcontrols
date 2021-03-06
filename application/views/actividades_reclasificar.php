<?php require_once 'complementos/head.php'; ?>
<style>
	/*.linebajo:hover{
		background: blue !important;
	}*/

	#divOperacion .select-selected {
		height: 40px !important;
	}

	.select-selected, .same-as-selected, .select-items div {
		font-size: 13px !important;
	}

	.linebajo {
		font-size: 11px !important;
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
<div class="system-page">
	<div class="container-fluid">
		<?php require_once 'complementos/cabecera.php'; ?>
		<div class="row">
			<?php require_once 'complementos/menu.php'; ?>
			<div class="col-sm-9 mt-3 activity">
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-10 offset-sm-1">
								<div class="form-group mb-2">
									<label class="mb-0 pl-2"><small>Elige la Cta General</small></label>
									<div class="text-uppercase" id="divCtaGeneral">
										<input class="form-control" readonly
											   value="<?php echo $actividad[0]->nCuenta; ?>">
									</div>
									<small style="color: red; display: none;" id="msj_cuenta">Debe seleccionar una
										cuenta</small>

								</div>
							</div>
						</div>
						<p class="title text-center mt-3 mb-0">Actividades</p>
						<div class="form-group mb-0">
							<label class="mb-0 pl-2"><small>Incluye Actividad</small></label>
							<input type="text" class="form-control" id="actividad" readonly
								   value="<?php echo $actividad[0]->nombre; ?>">
						</div>
						<div class="text-right mt-1">
							<button class="button-add" type="button" name="button" id="guardarActividad"
									style="display: none;">Guardar
							</button>
						</div>

						<div id="paso1">
							<div class="row">
								<div class="col-sm-10 offset-sm-1">
									<div class="form-group mb-0 date-activity mt-3">
										<div class="input-group mb-md-3">
											<input type="date" class="form-control calendario"
												   value="<?php echo $actividad[0]->fecha; ?>"
												   id="fecha">
										</div>
									</div>

								</div>
							</div>
							<p class="mt-3 mb-0 text-center"><small class="text-center">Selecciona</small></p>
							<div class="row">
								<?php if ($actividad[0]->mov == 1) { ?>
									<div class="col-sm-6 col-6">
										<div class="row">
											<div class="col d-flex justify-content-center">
												<button class="button-entry" type="button" name="button"
														id="ingreso_btn1">
													Ingresos
												</button>
											</div>
										</div>
									</div>
								<?php } else { ?>

									<div class="col-sm-6 col-6">
										<div class="row">
											<div class="col d-flex justify-content-center">
												<button class="button-egress blue" name="button" id="egresos_btn1">
													Egresos
												</button>
											</div>
										</div>
									</div>
								<?php } ?>

							</div>
							<div class="row">
								<div class="col-sm-12 mt-2 col-12">
									<div class="row">
										<div class="col-sm-6 col-6">
											<div class="form-group mb-2">
												<label class="mb-0 pl-2 text-center"><small>Ingresa el
														monto</small></label>
												<input type="text" class="form-control" readonly
													   value="<?php echo $actividad[0]->monto; ?>" id="monto">
											</div>
											<?php if (isset($actividad[0]->nTransferencia)) { ?>
												<div class="form-group h-50 no-scroll" id="selectTraspasoTransferencia">
													<label class="mb-0 pl-2 text-center"><small
																id="leyendadiv">Traspaso</small></label>
													<input id="traspaso" class="form-control" readonly
														   value="<?php echo $actividad[0]->nTransferencia; ?>">
												</div>
											<?php } ?>
										</div>
										<div class="col-sm-6 col-6">
											<div class="form-group h-50 no-scroll">
												<label class="mb-0 pl-2 text-center"><small>Tipo de
														Operación</small></label>
												<input id="operacion" value="<?php echo $actividad[0]->nOperacion; ?>"
													   class="form-control" readonly>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="afectaSaldo">
								<div class="row mt-2">
									<!--<div class="col-12">
										<div class="bg-degraded d-flex justify-content-around">
											<span>¿Afecta el saldo?</span>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="balance" id="yes"
													   value="si">
												<label class="form-check-label" for="yes">SI</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="balance" id="no"
													   value="si" checked="checked">
												<label class="form-check-label" for="no">NO</label>
											</div>
										</div>
										<small style="color: red; display: none;" id="alerta1">Error favor de
											verificar</small>
									</div>-->
								</div>
								<?php if ($actividad[0]->tipo_operacion == 5 || $actividad[0]->tipo_operacion == 6) { ?>
									<div class="row mt-2" id="pasointermedio">
										<div class="col-sm-10 offset-md-1">
											<div class="form-group mb-0">
												<label class="mb-0"><small>Cta de la que se realizó el
														traspaso</small></label>
												<div class="" id="divctaGeneral2">
													<input id="ctaGeneral2" class="form-control"
														   value="<?php echo $actividad[0]->cuentaEspejo;?>" readonly>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>


					<div class="col-sm-8">
						<!--<div class="row">
							<div class="col-md-12 text-right">
								<button id="button-add" class=button-app"><i class="fa fa-eye"></i></button>
								<button id="button-save" class=button-app"><i class="fa fa-eye-slash"></i></button>
								<div id="tbl_cuentas" style="font-size: 12px;display: none;">
									<table class="table table-striped text-uppercase mt-5">
										<thead style="background: gray; color: whitesmoke;">
										<tr>
											<td style="font-size: 11.5px;">CUENTA</td>
											<td style="font-size: 11.5px;">SALDO INICIAL</td>
											<td style="font-size: 11.5px;">SALDO A LA FECHA</td>
										</tr>
										</thead>
										<?php foreach ($cuentas as $c) { ?>
											<tr>
												<td><?php echo $c->nombre; ?></td>
												<td><?php echo $c->saldo_inicial; ?></td>
												<td><?php echo $c->saldo; ?></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>

							<div class="col-12 d-flex justify-content-around">
								<div class="balance-third">
									<small>Mov. Terceros</small>
									<input type="text" class="form-control" name="balance-third" id="saldot"
										   value="<?php echo $saldoTerceros; ?>" readonly
										   style="cursor: not-allowed;">
								</div>
								<div class="total-balance">
									<small>Saldo Total</small>
									<input type="text" class="form-control" name="total-balance" id="saldototal"
										   value="<?php echo $saldoTotal; ?>" readonly
										   style="cursor: not-allowed;">
								</div>
								<div class="available">
									<small>Saldo Disponible</small>
									<input type="text" class="form-control" name="available" id="saldodisponible"
										   value="<?php echo $saldoDisponible; ?>" readonly
										   style="cursor: not-allowed;">
								</div>
							</div>
						</div>-->
						<!--Aqui ba el display none-->
						<div id="pasoN">
							<div class="form-group row mt-4">
								<label for="inputActivity" class="col-sm-4 col-form-label pl-4">Nombre de la
									Actividad</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="actividadCopia"
										   value="<?php echo $actividad[0]->nombre; ?>" readonly>
									<button class="button-save float-right mt-2" type="button" name="button"
											id="editar">Editar
									</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<p class="title text-center mt-4 mt-md-0 text-uppercase">
										selecciona el grupo y clasifica la actividad
									</p>
								</div>
								<?php if ($actividad[0]->mov == 1){ ?>
									<div class="col-sm-5 offset-md-1 col-6" id="columnaIngreso">
										<div class="row">
											<div class="col-12 d-flex justify-content-center">
												<button class="button-entry" type="button" name="button"
														id="ingresobtn2">
													Ingresos
												</button>
											</div>
										</div>
										<div id="opcionesIngresos">
											<div class="form-group mb-12 mt-2" id="buscarIngresos">
												<div class="col-sm-10 offset-sm-1">
													<div class="form-group mb-2">
														<label class="mb-0 pl-2"><small>Elige una
																clasificacion</small></label>
														<div class="text-uppercase" id="divclasificacionIngresos">
															<select id="clasificacionIngresos" <?php echo $actividad[0]->idClasificacion;?>
																	style="height: 40px; width: 100%;">
																<option value="0">---------</option>
																<?php foreach ($clasificacionIngresos as $ci) { ?>
																	<option
																			value="<?php echo $ci->id_clasificacion; ?>"><?php echo $ci->clasificacion; ?></option>
																<?php } ?>
															</select>
														</div>
														<small style="color: red; display: none;" id="msj_cuenta">Debe
															seleccionar una
															cuenta</small>
													</div>
												</div>


												<div class="col-sm-10 offset-sm-1">
													<div class="form-group mb-2">
														<label class="mb-0 pl-2"><small>Elige un grupo</small></label>
														<div class="text-uppercase" id="divGruposIngresos">
															<select id="gruposIngresos"
																	style="height: 40px; width: 100%;">
																<option value="0">---------</option>
																<?php foreach ($grupos as $g) { ?>
																	<option
																			value="<?php echo $g->id_grupo; ?>"><?php echo $g->nombre; ?></option>
																<?php } ?>
															</select>
														</div>
														<small style="color: red; display: none;" id="msj_cuenta">Debe
															seleccionar una
															cuenta</small>
													</div>
												</div>

												<div class="col-sm-10 offset-sm-1">
													<div class="form-group mb-2">
														<label class="mb-0 pl-2"><small>Elige una sigla</small></label>
														<div class="text-uppercase" id="divSiglasIngresos">
															<select id="siglasIngresos"
																	style="height: 40px; width: 100%;">
																<option value="0">---------</option>
																<?php foreach ($siglas as $s) { ?>
																	<option
																			value="<?php echo $s->id_sigla; ?>"><?php echo $g->sigla; ?></option>
																<?php } ?>
															</select>
														</div>
														<small style="color: red; display: none;" id="msj_cuenta">Debe
															seleccionar una
															cuenta</small>
													</div>
												</div>
												<div id="grupoBotonesIngresos" style="display: none;">
													<div class="row">
														<div class="text-right mt-1 col-md-6">
															<button class="button-add" type="button" name="button"
																	id="btn1Ingreso"></button>
														</div>
														<div class="text-left mt-1 col-md-6">
															<button class="button-add" type="button" name="button"
																	id="btn2Ingreso"></button>
														</div>
													</div>

												</div>


											</div>
										</div>
									</div>

								<?php }else{ ?>

								<div class="col-sm-5 col-6" id="columnaEgreso" style="display: none;">
									<div class="row">
										<div class="col-12 d-flex justify-content-center">
											<button class="button-egress blue" name="button" id="egresosbtn2">Egresos
											</button>
										</div>
									</div>
									<div class="col-sm-10 offset-sm-1">
										<div class="form-group mb-2">
											<label class="mb-0 pl-2"><small>Elige una opción</small></label>
											<div class="text-uppercase" id="divClasificacionEgresos">
												<select id="clasificacionEgresos" style="height: 40px; width: 100%;">
													<option value="0">---------</option>
													<?php foreach ($clasificacionEgresos as $ce) { ?>
														<option
																value="<?php echo $ce->id_clasificacion; ?>"><?php echo $ce->clasificacion; ?></option>
													<?php } ?>
												</select>
											</div>
											<small style="color: red; display: none;" id="msj_cuenta">Debe seleccionar
												una
												cuenta</small>

										</div>
									</div>


									<div class="col-sm-10 offset-sm-1">
										<div class="form-group mb-2">
											<label class="mb-0 pl-2"><small>Elige un grupo</small></label>
											<div class="text-uppercase" id="divGruposEgresos">
												<select id="gruposEgresos" style="height: 40px; width: 100%;">
													<option value="0">---------</option>
													<?php foreach ($grupos as $g) { ?>
														<option
																value="<?php echo $g->id_grupo; ?>"><?php echo $g->nombre; ?></option>
													<?php } ?>
												</select>
											</div>
											<small style="color: red; display: none;" id="msj_cuenta">Debe seleccionar
												una
												cuenta</small>
										</div>
									</div>

									<div class="col-sm-10 offset-sm-1">
										<div class="form-group mb-2">
											<label class="mb-0 pl-2"><small>Elige una sigla</small></label>
											<div class="text-uppercase" id="divSiglasEgresos">
												<select id="siglaEgresos" style="height: 40px; width: 100%;">
													<option value="0">---------</option>
													<select id="siglasIngresos"
															style="height: 40px; width: 100%;">
														<option value="0">---------</option>
														<?php foreach ($siglas as $s) { ?>
															<option
																	value="<?php echo $s->id_sigla; ?>"><?php echo $g->sigla; ?></option>
														<?php } ?>
													</select>
												</select>
											</div>
											<small style="color: red; display: none;" id="msj_cuenta">Debe seleccionar
												una
												cuenta</small>
										</div>
									</div>
									<div id="grupoBotonesEgresos" style="display: none;">
										<div class="row">
											<div class="text-right mt-1 col-md-6">
												<button class="button-add" type="button" name="button"
														id="btn1Egreso"></button>
											</div>
											<div class="text-left mt-1 col-md-6">
												<button class="button-add" type="button" name="button"
														id="btn2Egreso"></button>
											</div>
										</div>
									</div>

									<?php } ?>
								</div>
								<div class="row">
									<div class="col-12" id="SeccionComentario">
										<div class="form-check form-check-inline">
											<p class="title mb-0 mr-2">Comentario</p>
											<input class="form-check-input" type="radio" name="comentario" id="yesC"
												   checked="checked">
											<label class="form-check-label" for="yes" id="labelYesC">SI</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="comentario" id="noC">

											<label class="form-check-label" for="no" id="labelNoC">NO</label>

										</div>
										<div class="form-group mb-2" id="comentarioarea">
											<label class="mb-0"><small>Incluye una descripción</small></label>
											<textarea rows="7" cols="12" class="w-100" id="comentario"><?php echo $actividad[0]->comentario;?></textarea>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-between align-items-center"
										 id="guardarSeccion">
										<div class="date">
											<small class="d-block">Fecha de registro</small>
											<input type="text" class="date-actual" name="date-actual" id="name-actual"
												   value="<?php echo $fecha; ?>" readonly>
										</div>
										<div>
											<button class="button-save" type="button" name="button" id="guardarGeneral">
												Reclasificar
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'complementos/footer.php'; ?>
	<script src="<?php echo base_url(); ?>assets/js/accouting.js"></script>

	<script>
		$(document).ready(function () {
			const movimiento = <?php echo $actividad[0]->mov;?>;

			$("#editar").on("click", function () {
				$("#actividad").attr("readonly", false);
				$("#guardarActividad").show();
			});

			$("#guardarActividad").on("click", function () {
				$(this).hide();
				$("#actividadCopia").val($("#actividad").val());
				$("#actividadCopia").attr("readonly", true);
				$("#actividad").attr("readonly", true);
			});

			if(movimiento==1){
				$("#clasificacionIngresos").val(<?php echo $actividad[0]->idClasificacion;?>);
				$("#gruposIngresos").val(<?php echo $actividad[0]->idGrupo;?>);
				$("#siglasIngresos").val(<?php echo $actividad[0]->id_sigla;?>);
			}else{
				$("#clasificacionEgresos").val(<?php echo $actividad[0]->idClasificacion;?>);
				$("#gruposEgresos").val(<?php echo $actividad[0]->idGrupo;?>);
				$("#siglaEgresos").val(<?php echo $actividad[0]->id_sigla;?>);
			}

			$("#clasificacionIngresos").on("change", function () {
				var ruta = "../../Grupos/get_by_clasificacion";
				var idClasificacion = $(this).val();
				$.ajax({
					url: ruta,
					type: "POST",
					data: {
						busqueda: idClasificacion,
					},
					success: function (response) {
						$("#gruposIngresos").empty();
						$("#gruposIngresos").append(`<option value="0">---------</option>`);

						var respuesta = JSON.parse(response);
						console.log(respuesta);
						$.each(respuesta, function (i, val) {
							$("#gruposIngresos").append(`<option value="${val.id_grupo}">${val.nombre}</option>`);
						})
					}
				});
			});
			$("#gruposIngresos").on("change", function () {
				var ruta = "../../Siglas/get_by_grupo";
				var idClasificacion = $(this).val();
				$.ajax({
					url: ruta,
					type: "POST",
					data: {
						busqueda: idClasificacion,
					},
					success: function (response) {
						$("#siglasIngresos").empty();
						$("#siglasIngresos").append(`<option value="0">---------</option>`);

						var respuesta = JSON.parse(response);
						console.log(respuesta);
						$.each(respuesta, function (i, val) {
							$("#siglasIngresos").append(`<option value="${val.id_sigla}">${val.sigla}</option>`);
						})
					}
				});
			});

			$("#monto").val(accounting.formatMoney($("#monto").val()));

			$("#siglasIngresos").on("change", function () {
				var id_sigla = $(this).val();
				$.ajax({
					url: "../../Siglas/get_by_id_sigla_with_accion_movimiento",
					type: "POST",
					data: {
						id_sigla: id_sigla,
					},
					success: function (response) {
						var respuesta = JSON.parse(response);
						$.each(respuesta, function (i, val) {
							$("#btn1Ingreso").text(`${val.accion}`);
							$("#btn2Ingreso").text(`${val.nombre}`);
						});
						$("#grupoBotonesIngresos").show();
						$("#SeccionComentario").show();
						$("#guardarSeccion").show();
					}
				});
			});

			$("#guardarGeneral").on("click", function () {
				var idActividad = <?php echo $actividad[0]->id_actividad?>;

				var nombre = $("#actividad").val();
				var fecha = $("#fecha").val();
				const movimiento = <?php echo $actividad[0]->mov;?>;
				if (movimiento == 1) {
					var id_sigla = $("#siglasIngresos").val();
				} else {
					var id_sigla = $("#siglaEgresos").val();
				}
				var monto = accounting.unformat($("#monto").val());
				var comentario = $("#comentario").val();

				$.ajax({
					url: "../../actividades/update/"+idActividad,
					data: {
						nombre: nombre,
						fecha: fecha,
						monto: monto,
						comentario: comentario,
						status: 4,
						id_sigla: id_sigla
					},
					type: "POST",
					success: function (response) {
						if (response != 0) {
							$.confirm({
								title: '',
								content: 'Actividad reclasificada correctamente',
								buttons: {
									Aceptar: function () {
										window.location = "../../actividades/busqueda";
									}
								}
							});
						}
					}
				});

			});



		});
	</script>

</body>
</html>



