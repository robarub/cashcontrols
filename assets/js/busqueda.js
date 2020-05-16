$(document).ready(function () {
	$("#button-add").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#button-save").css({"background": "#8c8c8c"});
		$("#tbl_notificaciones").show();
	});

	$("#button-save").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#button-add").css({"background": "#8c8c8c"});
		$("#tbl_notificaciones").hide();
	});

	$(".tdSaldiInicial").each(function () {
		let saldo = accounting.formatMoney($(this).html());
		$(this).html(saldo);
	});

	$(".tdSaldoFecha").each(function () {
		let saldo = accounting.formatMoney($(this).html());
		$(this).html(saldo);
	});

	$("#tbl_cuentas").DataTable({
		"lengthChange": false,
	});

	$("#aplicar").on("click", function () {
		$.ajax({
			url: "../Actividades/actividades_filtro",
			type: "POST",
			data: {
				id_cuenta: $("#ctaGeneral").val(),
				mes: $("#mes").val(),
				anio: $("#anio").val()
			},
			success: function (response) {
				if (response == 1) {
					$.dialog({
						title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Error en la busqueda',
						content: 'No se encontraron resultados en la busqueda',
					});
				} else {
					$("#divTabla").show();
					$("#tbl_tbody").empty();
					var respuesta = JSON.parse(response);
					console.log(respuesta);
					$.each(respuesta, function (i, e) {
						if ((e.ae == '' && e.ai != '') || (e.ae != '' && e.ai == '')) {
							var noMuestra = `display:none !important;`;
						} else {
							if (e.autReclasificar == 1) {
								var estiloReclasificar = `color: dodgerblue !important; font-size: 17px !important; cursor: pointer;`;
							} else {
								var estiloReclasificar = `color: grey !important;font-size: 17px !important;cursor: pointer;`;
							}

							if (e.autAutorizar == 1) {
								var estiloAutorizar = `color: forestgreen !important; font-size: 17px !important; cursor: pointer;`;
							} else {
								var estiloAutorizar = `color: grey !important; font-size: 17px !important; cursor: pointer;`;
							}

							if (e.autComentario == 1) {
								var estiloComentario = `color: red !important; font-size: 17px !important; cursor: pointer;`;
							} else {
								var estiloComentario = `color: grey !important; font-size: 17px !important; cursor: pointer;`;
							}
						}

						let fila = `
						<tr>
							<td>${e.id_actividad}</td>
							<td>${e.nCuenta}</td>
							<td>${e.actividad}</td>
							<td>${accounting.formatMoney(e.monto)}</td>
							<td>${e.fecha}</td>
							<td>${e.comentario}</td>
							<td>${e.clasificacion}</td>
							<td>${e.sigla}</td>
							<td>${e.nGrupo}</td>
							<td>${e.ae}</td>
							<td>${e.ai}</td>
							<td style="${estiloReclasificar}"><i title="${e.autReclasificar}" id="${e.id_actividad}" class="fas fa-edit reclasificar" style="${noMuestra}" ></i></td>
							<td style="${estiloAutorizar}"><i title="${e.autAutorizar}"  id="${e.id_actividad}" class="far fa-calendar-check autorizar" style="${noMuestra}"></i></td>
							<td style="${estiloComentario}"><i text="${e.mensajeComentario}" title="${e.autComentario}"  id="${e.id_actividad}" class="fas fa-align-justify comentario" style="${noMuestra}"></i></td>
						</tr>`;
						$("#tbl_tbody").append(fila);
					});

					$(".reclasificar").on("click", function () {
						let apuntador = $(this);
						if ($("#rol").val() == 1) {
							//Es administrador
							if (apuntador.attr("title") == 1) {
								//Tiene permitido
								$.confirm({
									title: '<i class="fas fa-hand-o-up" style="color:red;"></i> Mensaje del sistema',
									content: `<p>Estas apunto de reclasificar una actividad</p><p>¿Deseas continuar?</p>`,
									buttons: {
										Aceptar: {
											btnClass: `btn-blue`,
											action: hacer = () => {
												window.location = '../actividades/reclasificar/'+apuntador.attr("id");
											}
										},
										Cancelar: {
											action: hacer = () => {

											}
										}
									}
								});
							} else {
								//No lo tiene permitido
								$.alert({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
									content: `No tienes permitido realizar esta accion`,
								});
							}

						} else {
							//Es coordinador
							if (apuntador.attr("title") == 1) {
								//Tiene permitido
								$.confirm({
									title: '<i class="fas fa-hand-o-up" style="color:red;"></i> Mensaje del sistema',
									content: `<p>Estas apunto de reclasificar una actividad</p><p>¿Deseas continuar?</p>`,
									buttons: {
										Aceptar: {
											btnClass: `btn-blue`,
											action: hacer = () => {
												window.location = '../actividades/reclasificar/'+apuntador.attr("id");
											}
										},
										Cancelar: {
											action: hacer = () => {

											}
										}
									}
								});
							} else {
								//No lo tiene permitido
								$.alert({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
									content: `No tienes permitido realizar esta accion`
								});
							}

						}
					});


					$(".autorizar").on("click", function () {
						let apuntador = $(this);
						if ($("#rol").val() == 1) {
							if (apuntador.attr("title") == 1) {
								let idActividad = apuntador.attr("id");
								//Se puede usar
								$.ajax({
									url: "../Actividades/autorizar/" + idActividad,
									type: "POST",
									data: {},
									success: function (response) {
										if (response == 1) {
											$.confirm({
												title: '<i class="fas fa-hand-o-up" style="color:red;"></i> Mensaje del sistema',
												content: `La actividad fue autorizada correctamente`,
												buttons: {
													Aceptar: {
														btnClass: "btn-blue",
														action: function () {
															window.location = "../actividades/busqueda";
														}
													}
												}
											});

										}
									}
								});
							} else {
								$.alert({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
									content: `La actividad ya fue autorizada o por el momento no puede ser utilizada`,
								});
							}
						} else {
							$.alert({
								title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
								content: `No cuentas con permisos para autorizar la actividad`,
							});
						}

					});

					$(".comentario").on("click", function () {
						let apuntador = $(this);
						let mensaje = apuntador.attr("text");
						if ($("#rol").val() == 1) {
							if ($(this).attr("title") == 1) {
								if (mensaje != "undefined") {
									$.alert({
										title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Ya existe un mensaje',
										content: `${mensaje}`,
									});
								} else {
									let idActividad = apuntador.attr("id");
									$.confirm({
										title: 'Comentario para el coordinador',
										content: `
									<div action="" class="formName">
										<div class="form-group">
											<textarea class="form-control" id="comentario"></textarea>
										</div>
									</div>`,
										buttons: {
											Enviar: {
												btnClass: 'btn-blue',
												action: function () {
													$.ajax({
														url: "../Comentarios/insert/" + idActividad,
														type: "POST",
														data: {
															comentario: $("#comentario").val()
														},
														success: function (response) {
															if (response == 1) {
																$.confirm({
																	title: '<i class="fas fa-hand-o-up" style="color:red;"></i> Mensaje del sistema',
																	content: `El comentario fue enviado correctamente`,
																	buttons: {
																		Aceptar: {
																			btnClass: "btn-blue",
																			action: function () {
																				window.location = "../actividades/busqueda";
																			}
																		}
																	}
																});
															}
														}
													});

												}
											},
											Cancelar: function () {
												//close
											},
										}
									});
								}
								//Se puede usar
							} else {

								$.dialog({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
									content: `No cuenta con mensaje aún`,
								});

							}


						} else {
							if (mensaje != "undefined") {
								$.alert({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Ya existe un mensaje',
									content: `${mensaje}`,
								});
							} else {
								$.dialog({
									title: '<i class="fas fa-exclamation-triangle" style="color:red;"></i> Mensaje del sistema',
									content: `No cuenta con mensaje aún`,
								});
							}
						}

					});


				}
			},
			xhr: function () {
				var xhr = $.ajaxSettings.xhr();
				xhr.onloadstart = function (e) {
					$("#loader_table").show();
				};
				xhr.onloadend = function (e) {
					$("#loader_table").fadeOut(0);
				}
				return xhr;
			}
		});
	});

});
