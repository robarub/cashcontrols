$(document).ready(function () {
	//Variables para ver si se esta seleccionado ingresos o egreso
	var tipo;
	var clasifica
	var nuevoGrupo = true;
	var nuevaSigla = true;
	var clasifica2;
	var idGrupo;

	$("#btn_ingresos").on("click", function () {
		$(this).css({"background": "#948277"});
		$("#btn_egresos").css({"background": "#8c8c8c"});
		tipo = 1;
		$("#clasifica_ingresos").show();
		$("#clasifica_egresos").hide();
	});
	$("#btn_egresos").on("click", function () {
		$(this).css({"background": "#948277"});
		$("#btn_ingresos").css({"background": "#8c8c8c"});
		$("#clasifica_egresos").show();
		$("#clasifica_ingresos").hide();
		tipo = 2;
	});
	//Seccion para el cambio de botones de ingresos
	$("#prodi").on("click", function () {
		$(this).css({"background": "#160C66"});
		clasifica = $(this).attr("data-value");
		$("#npi").css({"background": "#8c8c8c"});
		$("#nai").css({"background": "#8c8c8c"});
		$("#otroi").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});
	$("#npi").on("click", function () {
		$(this).css({"background": "#160C66"});
		clasifica = $(this).attr("data-value");
		$("#prodi").css({"background": "#8c8c8c"});
		$("#nai").css({"background": "#8c8c8c"});
		$("#otroi").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});
	$("#nai").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#prodi").css({"background": "#8c8c8c"});
		$("#npi").css({"background": "#8c8c8c"});
		$("#otroi").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});

	$("#otroi").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#prodi").css({"background": "#8c8c8c"});
		$("#npi").css({"background": "#8c8c8c"});
		$("#nai").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});


	//////////////////////////////////////////////////////////////////
	//Seccion para el cambio de botones de egresos
	$("#npe").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#inve").css({"background": "#8c8c8c"});
		$("#nae").css({"background": "#8c8c8c"});
		$("#otroe").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();
	});

	$("#inve").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#npe").css({"background": "#8c8c8c"});
		$("#nae").css({"background": "#8c8c8c"});
		$("#otroe").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});

	$("#nae").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#inve").css({"background": "#8c8c8c"});
		$("#npe").css({"background": "#8c8c8c"});
		$("#otroe").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});
	$("#otroe").on("click", function () {
		clasifica = $(this).attr("data-value");
		$(this).css({"background": "#160C66"});
		$("#inve").css({"background": "#8c8c8c"});
		$("#npe").css({"background": "#8c8c8c"});
		$("#nae").css({"background": "#8c8c8c"});
		$("#paso2").show();
		$("#siglasGeneral").show();
		$("#gruposGenerales").show();

	});

	////////////////////////////////////////////////////////////////////////////////////
	$("#siglas").on("focus", function () {
		$("#msj_siglas").hide();
	});
	$("#describir").on("focus", function () {
		$("#msj_descripcionsiglas").hide();
	});

	$("#describir").on("click", function () {
		if ($("#siglas").val() != '') {

			if ($("#siglas").val().indexOf(" ") === -1) {
				$(this).hide();
				$("#siglas").attr("readonly", true);
				$("#paso3").show();
			} else {
				$("#msj_siglas").html("La sigla no puede contener espacios");
				$("#msj_siglas").show();
			}
		} else {
			$("#msj_siglas").html("Debes ingresar una sigla");
			$("#msj_siglas").show();
		}
	});
	//Guarda el nombre de la sigla
	$("#guardar").on("click", function () {
		if ($("#descripcionsiglas").val() != '') {
			$(this).hide();
			$("#descripcionsiglas").attr("readonly", true);
			var sigla = $("#siglas").val();
			/*+$("#siglasGeneral").show();
			$("#tablesiglas tbody").append(`<th scope="row">${sigla}</th>`);*/
			$("#paso4").show();
			$("#gruposGenerales").show();
			$(".prod").css({"pointer-events": " none"});
			$(".button-egress").css({"pointer-events": " none"});
			$(".button-entry").css({"pointer-events": " none"});
		} else {
			$("#msj_descripcionsiglas").show();
		}
	});


	$(".thGrupos").on("dblclick", function () {
		idGrupo = $(this).attr("id");
		$("#grupo").val($(this).html());
		$("#grupo").attr("readonly", true);
		$("#grupo").css({"cursor": "not-allowed"});
		$("#quitarGrupo").show();
		$("#msj_grupos").hide();
		//guardamos un grupo seleccionado
		nuevoGrupo = false;
	});

	$("#quitarGrupo").on("click", function () {
		$(this).hide();
		$("#grupo").val('');
		$("#grupo").attr("readonly", false);
		$("#grupo").css({"cursor": "text"});
		//guardamos un grupo nuevo
		nuevoGrupo = true;
	});


	$("#guardarGrupo").on("click", function () {
		if ($("#grupo").val() != '') {
			if (nuevoGrupo == true) {
				let existeGrupo = false;
				//Vamos a checar si el grupo ya existe
				//alert("Entramos al forecha");
				$('#listaGruposGenerales tbody tr').each(function (index) {
					//alert("El index");
					//alert(index);
					$(this).children("th").each(function (index2) {
						//alert("El index2");
						//(index2);
						switch (index2) {
							case 0:
								grupoTabla = $(this).text().toLowerCase();
								break;
							case 1:
								movimiento = $(this).text().toLowerCase();
								break;
						}
					});
					if (tipo == 1) {
						movCompara = "ingreso";
					} else {
						movCompara = "egresos";
					}
					if ($("#grupo").val().toLowerCase() == grupoTabla.toLowerCase()  && movCompara == movimiento.toLowerCase() ) {
						existeGrupo = true;
					}
				});
				if (existeGrupo == true) {
					alert("El grupo ya existe");
				} else {
					//$("#paso5").show();
					$("#pasofinal").show();
				}
			} else if (nuevoGrupo == false) {
				//Verificamos si la sigla existe en la tabla de siglas ya que no se pueden repetir siglas
				let existeSigla = false;
				$('#tablesiglas tr th').each(function () {
					let sigla = $(this).html();
					if (sigla.toLowerCase(sigla) == $("#siglas").val().toLowerCase()) {
						existeSigla = true;
					}
				});
				if (existeSigla === true) {
					alert("La sigla ya existe en el grupo de siglas");
				} else {
					var nombre = $("#grupo").val();
					$("#listaGruposGenerales tbody").append(`<th scope="row">${nombre}</th>`);
					$("#selecionarClasifica2").show();
				}

			}
			$("#grupo").attr("readonly", true);
			$("#quitarGrupo").hide();
			$(this).hide();
		} else {
			$("#msj_grupos").show();
			return 0;
		}
	});

	$("#grupo").on("focus", function () {
		$("#msj_grupos").hide();
	});


	$("#selectListaConcepto").on("click", function () {
		$("#msj_conceptoEspecifico").hide();
	});

	$("#guardarConcepto	").on("click", function () {
		if ($("#listaConceptos").val() != 0) {
			$(this).hide();
			var conceptoEspecifico = $("#conceptoEspecifico").val();
			$("#selectListaConcepto").css({"pointer-events": " none"});
			$("#pasofinal").show();
		} else {
			$("#msj_conceptoEspecifico").show();
			return 0;
		}
	});

	$("#fijos").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#variables").css({"background": "#8c8c8c"});
		clasifica2 = 1;
		$("#paso2").show();
	});


	$("#variables").on("click", function () {
		$(this).css({"background": "#160C66"});
		$("#fijos").css({"background": "#8c8c8c"});
		clasifica2 = 2;
		$("#paso2").show();
	});

	$("#selectConceptos").on("change", function () {
		$("#msj_conceptos").hide();
	});
	$("#validar").on("click", function () {
		if (typeof clasifica2 !== "undefined") {
			$(this).hide();
			$("#fijos").attr('disabled', true);
			$("#variables").attr('disabled', true);
			$("#paso5").show();
		} else {
			$("#msj_validarClasifica2").show();
			return 0;
		}
	});

	$("#fijos").on("click", function () {
		$("#msj_validarClasifica2").hide();
	});

	$("#variables").on("click", function () {
		$("#msj_validarClasifica2").hide();
	});


	$("#selectGrupos").on("change", function () {
		$("#msj_asociargrupo").hide();
	});

	$("#validarGrupo").on("click", function () {
		$("#selectGrupos").attr('disabled', true);
		$("#paso9").show();
	});

	$("#agrupar").on("click", function () {
		if (tipo == 1) {
			$("#selectIngresos").show();
			prodi
		} else if (tipo == 2) {
			$("#selectEgresos").show();
		}
		$("#paso11").show();
	});

	/*$("#guardarCategoria").on("click", function () {
		$("#selectEgresos").attr("disabled", true);
		$("#selectIngresos").attr("disabled", true);
		$("#paso11").show();
	});*/

	$("#guardarFinal").on("click", function () {
		/*Variables para guardar las siglas*/
		var siglas = $("#siglas").val();
		var descripcionSiglas = $("#descripcionsiglas").val();
		var nombreGrupo = $("#grupo").val();
		var nombre = $("#conceptoEspecifico").val();
		if(nuevoGrupo==true && nuevaSigla==true){
			conceptoEspecifico = 1;
		}else{
			var conceptoEspecifico = $("#listaConceptos").val();
		}
		$.ajax({
			url: "../inserta_concepto",
			type: "POST",
			data: {
				siglas: siglas,
				descripcionSiglas: descripcionSiglas,
				nombreGrupo: nombreGrupo,
				conceptoEspecifico: conceptoEspecifico,
				tipo: tipo,
				clasifica: clasifica,
				clasifica2: clasifica2,
				grupoSeleccionado: idGrupo,
				nuevoGrupo: nuevoGrupo,
				nuevaSigla: nuevaSigla

			},
			success: function (response) {
				if (response == 1) {
					alert("Grupo ingresado correctamente");
					window.location = "crear";
				} else if (response == 2) {
					alert("Sigla ingresada correctamente");
					window.location = "crear";
				}

			}
		});
	});

});
