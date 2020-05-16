<?php require_once 'complementos/head.php'; ?>


<body>
<div class="login-page-form">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1>Sistema.....</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 offset-md-6 mt-3 text-right">
				<div>
					<div class="form-group text-right">
						<label class="mb-0">Usuario</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<img src="<?php echo base_url(); ?>assets/assets/img/login-icon-user.png"
									 class="img-fluid" alt="Usuario input">
							</div>
							<input type="usuario" class="form-control" id="usuario">
						</div>
						<div>
							<small id="msj_usuario" style="color: red; display: none;"></small>
						</div>
					</div>
					<div class="form-group text-right">
						<label class="mb-0">Contraseña</label>
						<div class="input-group" id="inputPassword1">
							<div class="input-group-prepend">
								<img src="<?php echo base_url(); ?>assets/assets/img/login-icon-pass.png"
									 class="img-fluid" alt="Contraseña input">
							</div>
							<input type="password" class="form-control" id="clave">
						</div>
						<div>
							<small id="msj_clave" style="color: red !important; display: none;"></small>
						</div>
					</div>
					<button type="submit" class="btn" id="ingresar">
						<img src="<?php echo base_url(); ?>assets/assets/img/login-icon-go.png" class="img-fluid" alt="Go"></button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 mt-5 text-right position-absolute">
				<h1>.....de Administración Financiera</h1>
			</div>
		</div>
	</div>
</div>

<?php require_once 'complementos/footer.php'; ?>

</body>
</html>

<script>
	$(document).ready(function () {
		$("#usuario").click(function () {
			$(this).val('');
			$("#usuario").css({"background": "#b2b2b2"});
			$("#msj_usuario").fadeOut(1500);
		});
		$("#clave").click(function () {
			$(this).val('');
			$("#clave").css({"background": "#b2b2b2"});
			$("#msj_clave").fadeOut(1500);
		});

		$(document).keypress(function (e) {
			if (e.which == 13) {
				var avanza = 1;
				var usuario = $("#usuario").val();
				var clave = $("#clave").val();
				if (usuario == '') {
					$("#msj_usuario").html("Ingrese su usuario");
					$("#usuario").css({"background": "#EFD3D2"});
					$("#msj_usuario").show();
					avanza = 0;
				}
				if (clave == '') {
					$("#msj_clave").html("Ingrese su clave");
					$("#clave").css({"background": "#EFD3D2"});
					$("#msj_clave").show();
					avanza = 0;
				}
				if (avanza == 1) {
					$.ajax({
						url: 'Usuarios/valida',
						data: {
							correo: usuario,
							clave: clave
						},
						type: 'POST',
						success: function (response) {
							if (response == 0) {
								/*Usuario no valido*/
								$("#usuario").css({"background": "#EFD3D2"});
								$("#msj_usuario").html("Usuario no válido");
								$("#msj_usuario").show();
							} else if (response == 1) {
								/*Contraseña no valida*/
								$("#clave").css({"background": "#EFD3D2"});
								$("#msj_clave").html("Contraseña no válida");
								$("#msj_clave").show();
							} else if (response == 2) {
								window.location = "cuentas/crear";
							}
						}
					});
				}
			}
		});


		$("#ingresar").click(function () {
			var avanza = 1;
			var usuario = $("#usuario").val();
			var clave = $("#clave").val();
			if (usuario == '') {
				$("#msj_usuario").html("Ingrese su usuario");
				$("#usuario").css({"background": "#EFD3D2"});
				$("#msj_usuario").show();
				avanza = 0;
			}
			if (clave == '') {
				$("#msj_clave").html("Ingrese su clave");
				$("#clave").css({"background": "#EFD3D2"});
				$("#msj_clave").show();
				avanza = 0;
			}
			if (avanza == 1) {
				$.ajax({
					url: 'Usuarios/valida',
					data: {
						correo: usuario,
						clave: clave
					},
					type: 'POST',
					success: function (response) {
						if (response == 0) {
							/*Usuario no valido*/
							$("#usuario").css({"background": "#EFD3D2"});
							$("#msj_usuario").html("Usuario no válido");
							$("#msj_usuario").show();
						} else if (response == 1) {
							/*Contraseña no valida*/
							$("#clave").css({"background": "#EFD3D2"});
							$("#msj_clave").html("Contraseña no válida");
							$("#msj_clave").show();
						} else if (response == 2) {
							window.location = "cuentas/crear";
						}
					}
				});
			}
		});


	});
</script>
