$(document).ready(function () {
	var tipoEntrada;
	var tipoEntrada2;
	var tipoTranferencia = 3;

	$("#button-add").on("click", function () {
		$("#tbl_cuentas").show();
		$(this).css({"background": "#160C66"});
		$("#button-save").css({"background": "#8c8c8c"});
	});

	$("#button-save").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#button-add").css({"background": "#8c8c8c"});
		$("#tbl_cuentas").hide();
	});

	$("#saldot").val(accounting.formatMoney($("#saldot").val()));
	$("#saldototal").val(accounting.formatMoney($("#saldototal").val()));
	$("#saldodisponible").val(accounting.formatMoney($("#saldodisponible").val()));

	$("#actividad").on("focus", function () {
		$("#mmsj_actividad").hide();
	});

	$("#divCtaGeneral").on("click", function () {
		$("#msj_cuenta").hide();
	});

	$("#agregar").on("click", function () {
		let bandera = 1;
		if ($("#actividad").val() == '') {
			bandera = 0;
			$("#mmsj_actividad").show();
		} else {
			$("#actividad").attr("readonly", true);
		}

		if ($("#ctaGeneral").val() == 0) {
			$("#msj_cuenta").show();
			bandera = 0;
		} else {
			$("#ctaGeneral").attr('disabled', 'disabled');
		}

		if (bandera == 1) {
			$("#agregar").hide();
			$("#paso1").show();
			$("#msj_cuenta").hide();
			$("#mmsj_actividad").hide();
		} else {
			return 0;
		}

	});


	$("#ingreso_btn1").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#egresos_btn1").css({"background": "#8c8c8c"});
		tipoEntrada = "Ingreso";
	});

	$("#egresos_btn1").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#ingreso_btn1").css({"background": "#8c8c8c"});
		tipoEntrada = "Egreso";
	});

	$("#divOperacion").on("click", function () {
		if ($("#selectOperacion").val() == 5) {
			$("#selectTraspasoTransferencia").show();
			$("#leyendadiv").html("Transferencia");
		} else if ($("#selectOperacion").val() == 6) {
			$("#selectTraspasoTransferencia").show();
			$("#leyendadiv").html("Traspaso");
		} else {
			$("#selectTraspasoTransferencia").hide();
			$("#afectaSaldo").hide();
		}
	});

	$("#selectOperacionTraspaso").on("click", function () {
		$("#afectaSaldo").show();
		$("#pasointermedio").show();
		if ($("#selectTrapaso").val() == 1) {
			/*Cuentas propias n o afecta el saldo*/
			$("#no").prop('checked', true);
			$("#yes").prop('checked', false);

		} else {
			/*Cuentas tarcerros*/
			$("#no").prop('checked', false);
			$("#yes").prop('checked', true);
		}
	});

	$("#yes").on("click", function () {
		if ($("#selectTrapaso").val() == 1) {
			$("#alerta1").show();
			$("#guardar").hide();
		} else {
			$("#alerta1").hide();
			$("#guardar").show();
		}
	});

	$("#no").on("click", function () {
		if ($("#selectTrapaso").val() == 2) {
			$("#alerta1").show();
			$("#guardar").hide();
			$("#pasointermedio").hide();
		} else {
			$("#alerta1").hide();
			$("#guardar").show();
			$("#pasointermedio").show();
		}
	});

	$("#monto").on("blur", function () {
		$(this).val(accounting.formatMoney($("#monto").val()));

	});

	$("#guardar").on("click", function () {
		$(".select-selected").css({"cursor": "not-allowed !important"});
		$("#divCtaGeneral").css({"pointer-events": " none"}, {"cursor": "not-allowed"});
		$("#divOperacion").css({"pointer-events": " none"}, {"cursor": "not-allowed"});
		$("#monto").attr("readonly", true);
		$("#fecha").attr("readonly", true);
		$("#actividad").attr("readonly", true);
		$("#selectOperacionTraspaso").css({"pointer-events": " none"}, {"cursor": "not-allowed"});
		$("#divctaGeneral2").css({"pointer-events": " none"}, {"cursor": "not-allowed"});
		$("#divctaGeneral2").css({"pointer-events": " none"}, {"cursor": "not-allowed"});
		$("#pasoN").show();
		$("#actividadCopia").val($("#actividad").val());
		$("#actividadCopia").attr("readonly", true);

		if ($("#selectOperacion").val() != "5" && $("#selectOperacion").val() != "6") {
			if (tipoEntrada == "Ingreso") {
				var stotal = parseFloat(accounting.unformat($("#saldototal").val()));
				var saldoTer = parseFloat(accounting.unformat($("#saldot").val()));
				$("#saldototal").val(stotal + parseFloat(accounting.unformat($("#monto").val())));
				//Suma al saldo total
				//Aneterior era una resta
				$("#saldodisponible").val(accounting.formatMoney(parseFloat($("#saldototal").val()) + saldoTer));
				$("#saldototal").val(accounting.formatMoney($("#saldototal").val()));

			} else if (tipoEntrada == "Egreso") {
				var stotal = parseFloat(accounting.unformat($("#saldototal").val()));
				var saldoTer = parseFloat(accounting.unformat($("#saldot").val()));
				$("#saldototal").val(stotal - parseFloat(accounting.unformat($("#monto").val())));
				//Suma al saldo total
				//Anterior era una suma
				$("#saldodisponible").val(accounting.formatMoney(parseFloat($("#saldototal").val()) + saldoTer));
				$("#saldototal").val(accounting.formatMoney($("#saldototal").val()));

			}
		} else {
			if ($('#yes').is(':checked')) {
				if (tipoEntrada == "Ingreso") {
					var stotal = parseFloat(accounting.unformat($("#saldototal").val()));
					var saldoTer = parseFloat(accounting.unformat($("#saldot").val()));
					$("#saldot").val(saldoTer + parseFloat(accounting.unformat($("#monto").val())));
					//Siempre es una suma anterior era una resta
					console.log(stotal, $("#saldot").val());
					$("#saldodisponible").val(accounting.formatMoney(stotal + parseFloat($("#saldot").val())));
					$("#saldot").val(accounting.formatMoney($("#saldot").val()));

				} else if (tipoEntrada == "Egreso") {
					var stotal = parseFloat(accounting.unformat($("#saldototal").val()));
					var saldoTer = parseFloat(accounting.unformat($("#saldot").val()));
					$("#saldot").val(saldoTer + parseFloat(accounting.unformat($("#monto").val())));
					//Siempre es una suma anterior era una resta
					$("#saldodisponible").val(accounting.formatMoney(stotal + parseFloat($("#saldot").val())));
					$("#saldot").val(accounting.formatMoney($("#saldot").val()));
				}
			} else if ($('#no').is(':checked')) {
				/*if (tipoEntrada == "Ingreso") {
					var disponible = parseFloat(accounting.unformat($("#saldodisponible").val()));
					$("#saldodisponible").val(disponible + parseFloat(accounting.unformat($("#monto").val())));
					$("#saldodisponible").val(accounting.formatMoney($("#saldodisponible").val()));
				} else if (tipoEntrada == "Egreso") {
					var disponible = parseFloat(accounting.unformat($("#saldodisponible").val()));
					$("#saldodisponible").val(disponible - parseFloat(accounting.unformat($("#monto").val())));
					$("#saldodisponible").val(accounting.formatMoney($("#saldodisponible").val()));
				}*/
			}
		}
		if (tipoEntrada == "Ingreso") {
			$("#columnaIngreso").show();
		} else {
			$("#columnaEgreso").show();
		}
	});


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


	$("#ingresobtn2").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#egresosbtn2").css({"background": "#8c8c8c"});
		tipoEntrada2 = "Ingreso";
		$("#opcionesIngresos").show();
		$("#opcionesEgresos").hide();
	});

	$("#egresosbtn2").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#ingresobtn2").css({"background": "#8c8c8c"});
		tipoEntrada2 = "Egreso";
		$("#opcionesIngresos").hide();
		$("#opcionesEgresos").show();
	});


	$("#labelYesC").on("click", function () {
		$("#yesC").prop('checked', true);
		$("noC").prop('checked', false);

		$("#comentarioarea").show();
	});

	$("#labelNoC").on("click", function () {
		$("#noC").prop('checked', true);
		$("yesC").prop('checked', false);
		$("#comentarioarea").hide();

	});


	$("#clasificacionIngresos").on("change", function () {
		var ruta = "../Grupos/get_by_clasificacion";
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
		var ruta = "../Siglas/get_by_grupo";
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

	$("#siglasIngresos").on("change", function () {
		var id_sigla = $(this).val();
		$.ajax({
			url: "../Siglas/get_by_id_sigla_with_accion_movimiento",
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


	$("#clasificacionEgresos").on("change", function () {
		var ruta = "../Grupos/get_by_clasificacion";
		var idClasificacion = $(this).val();
		$.ajax({
			url: ruta,
			type: "POST",
			data: {
				busqueda: idClasificacion,
			},
			success: function (response) {
				$("#gruposEgresos").empty();
				$("#gruposEgresos").append(`<option value="0">---------</option>`);

				var respuesta = JSON.parse(response);
				console.log(respuesta);
				$.each(respuesta, function (i, val) {
					$("#gruposEgresos").append(`<option value="${val.id_grupo}">${val.nombre}</option>`);
				})
			}
		});
	});
	$("#gruposEgresos").on("change", function () {
		var ruta = "../Siglas/get_by_grupo";
		var idClasificacion = $(this).val();
		$.ajax({
			url: ruta,
			type: "POST",
			data: {
				busqueda: idClasificacion,
			},
			success: function (response) {
				$("#siglaEgresos").empty();
				$("#siglaEgresos").append(`<option value="0">---------</option>`);

				var respuesta = JSON.parse(response);
				console.log(respuesta);
				$.each(respuesta, function (i, val) {
					$("#siglaEgresos").append(`<option value="${val.id_sigla}">${val.sigla}</option>`);
				})
			}
		});
	});

	$("#siglaEgresos").on("change", function () {
		var id_sigla = $(this).val();
		$.ajax({
			url: "../Siglas/get_by_id_sigla_with_accion_movimiento",
			type: "POST",
			data: {
				id_sigla: id_sigla,
			},
			success: function (response) {
				var respuesta = JSON.parse(response);
				$.each(respuesta, function (i, val) {
					$("#btn1Egreso").text(`${val.accion}`);
					$("#btn2Egreso").text(`${val.nombre}`);
				});
				$("#grupoBotonesEgresos").show();
				$("#SeccionComentario").show()
				$("#guardarSeccion").show();
			}
		});
	});


	$("#guardarGeneral").on("click", function () {
		var nombre = $("#actividad").val();
		var id_cuenta = $("#ctaGeneral").val();
		var fecha = $("#fecha").val();
		if (tipoEntrada == "Ingreso") {
			var id_sigla = $("#siglasIngresos").val();
			var tipo_movimiento = 1;
		} else {
			var tipo_movimiento = 2;
			var id_sigla = $("#siglaEgresos").val();

		}
		var monto = accounting.unformat($("#monto").val());
		if ($("#selectTrapaso").val() != 0) {
			var transferencia = $("#selectTrapaso").val();
		} else {
			var transferencia = 3;
		}

		if ($("#ctaGeneral2").val() != 0) {
			var cta_tras = $("#ctaGeneral2").val();
		} else {
			var cta_tras = 0;
		}


		var tipo_operacion = $("#selectOperacion").val();
		var comentario = $("#comentario").val();

		$.ajax({
			url: "../actividades/insertar",
			data: {
				nombre: nombre,
				id_cuenta: id_cuenta,
				fecha: fecha,
				tipo_movimiento: tipo_movimiento,
				monto: monto,
				transferencia: transferencia,
				tipo_operacion: tipo_operacion,
				comentario: comentario,
				status: 1,
				id_sigla: id_sigla,
				cta_tras: cta_tras
			},
			type: "POST",
			success: function (response) {
				if (response != 0) {
					$.confirm({
						title: '',
						content: 'Actividad registrada correctamente',
						buttons: {
							Aceptar: function () {
								window.location = "crear";
							}
						}
					});
				}
			}
		});

	});


});
