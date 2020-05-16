$(document).ready(function () {
	id_cuenta='';
	$(".fila").on("dblclick", function () {
		id = $(this).attr("id");
		$.ajax({
			url:"../Cuentas/get_by_id",
			data:{
				id:id
			},
			type:"POST",
			success:function (response) {
				if(response!=0){
					respuesta  = JSON.parse(response);
					id_cuenta = respuesta[0].id_cuenta;
					$("#cuenta").val(respuesta[0].nombre);
					$("#tipoCuenta").val(respuesta[0].id_tipo_cuenta);
					$("#fecha").val(respuesta[0].fecha);
					$("#color").val(respuesta[0].color);
					$("#saldo").val(accounting.formatMoney(respuesta[0].saldo));
				}
			}
		})
	});

	$("#editar").on("click", function () {
		if(id_cuenta!=''){
			$.ajax({
				url: "../Cuentas/editar_cuenta",
				type: "POST",
				data: {
					id_cuenta:id_cuenta,
					nombre: $("#cuenta").val(),
					saldo: accounting.unformat($("#saldo").val()),
					fecha: $("#fecha").val(),
					color: $("#color").val(),
					id_tipo_cuenta: $("#tipoCuenta").val()
				},
				success: function (response) {
					if (response!=0){
						$.confirm({
							title: '',
							content: '¿Registro editado correctamente?',
							buttons: {
								Aceptar: function () {
									window.location = "crear_nuevo";
								}
							}
						});
					}
				}
			});
		}else{
			$.alert({
				title:'',
				content:"No has seleccionado una cuenta para editar"
			});
		}
	});


	$(".table").DataTable({
		"lengthChange": false
	});

	$("#button-add").on("click", function () {
		$("#listaCuentas").show();
		if($("#tipoTabla").val()=="sd"){
			$("#tbl_cuentas").show();
		}else if($("#tipoTabla").val()=="cd") {
			$("#tbl_cuentas_color").show();
		}
		$(this).css({"background":"#160C66"});
		$("#button-save").css({"background":"#8c8c8c"});
	});

	$("#tipoTabla").on("change", function () {
		if($(this).val()=="sd"){
			$("#tbl_cuentas").show();
			$("#tbl_cuentas_color").hide();
		}else if($(this).val()=="cd"){
			$("#tbl_cuentas").hide();
			$("#tbl_cuentas_color").show();
		}
	});

	$("#button-save").on("click", function () {
		$(this).css({"background":"#160C66"});
		$("#button-add").css({"background":"#8c8c8c"});
		$("#listaCuentas").hide();
	});

	$("#saldo").on("blur", function () {
		$("#saldo").val(accounting.formatMoney($("#saldo").val()));
	});

	$(".saldos").each(function () {
		let saldo = accounting.formatMoney($(this).html());
		$(this).html(saldo);
	});


	$("#guardar").on("click", function () {
		var confirmacion = $.confirm({
			title: '',
			content: '¿Deseas guardar el registro?',
			buttons: {
				Confirmar: function () {
					$.ajax({
						url: "../insert_cuenta",
						type: "POST",
						data: {
							nombre: $("#cuenta").val(),
							saldo: accounting.unformat($("#saldo").val()),
							fecha: $("#fecha").val(),
							color: $("#color").val(),
							status: 1,
							tipo_cuenta: $("#tipoCuenta").val()
						},
						success: function (response) {
							if (response!=0){
								$.confirm({
									title: '',
									content: '¿Registro guardado correctamente?',
									buttons: {
										Aceptar: function () {
											window.location = "crear";
										}
									}
								});
							}

						}
					});
				},
				Cancelar: function () {
					$.alert('Cancelado!');
				}
			}
		});

	});


});
