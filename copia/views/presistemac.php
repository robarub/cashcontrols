<?php require_once 'complementos/head.php'; ?>

<body>
<div class="system-page presystem">
	<div class="container-fluid">
		<?php require_once 'complementos/cabecera.php'; ?>
		<div class="row">
			<?php require_once 'complementos/menu.php'; ?>
			<div class="col-sm-9 mt-4 presystem">
				<div class="row">
					<div class="col-sm-3">
						<p class="title text-center">siglas generales</p>
						<div class="row">
							<div class="col-6 d-flex justify-content-center">
								<button class="button-entry" type="button" name="button" id="btn_ingresos">Ingresos
								</button>
							</div>
							<div class="col-6 d-flex justify-content-center">
								<button class="button-egress" name="button" id="btn_egresos">Egresos</button>
							</div>
						</div>
						<div class="row mt-2" id="paso1">
							<div class="col-6 d-flex justify-content-center flex-column">
								<div id="clasifica_ingresos" style="display: none !important; text-align: center;">
									<small class="text-center">Clasifica</small>
									<?php foreach ($clasificacionIngresos as $ci) { ?>
										<button class="button-save text-uppercase prod" type="button" name="button"
												data-value="<?php echo $ci->id_clasificacion; ?>"
												id="<?php echo $ci->id_html; ?>">
											<?php echo $ci->clasificacion; ?>
										</button>
									<?php } ?>
								</div>

							</div>
							<div class="col-6 d-flex justify-content-center flex-column">
								<div id="clasifica_egresos" style="display: none !important; text-align: center;">
									<small class="text-center">Clasifica</small>
									<?php foreach ($clasificacionEgresos as $ce) { ?>
										<button class="button-save text-uppercase prod" type="button" name="button"
												data-value="<?php echo $ce->id_clasificacion; ?>"
												id="<?php echo $ce->id_html; ?>">
											<?php echo $ce->clasificacion; ?>
										</button>
									<?php } ?>
								</div>
							</div>
						</div>
						<div id="paso2" style="display: none;">
							<div class="form-group mb-2 mt-3">
								<label class="mb-0 pl-2"><small>Incluye las siglas</small></label>
								<input type="text" class="form-control" id="siglas">
								<small id="msj_siglas" style="color: red; display: none;">Debe ingresar las siglas para
									continuar</small>
							</div>
							<div class="text-right">
								<button class="button-add" type="button" name="button" id="describir" s>Describir
								</button>
							</div>
						</div>
						<div id="paso3" style="display: none">
							<div class="form-group mb-2 mt-3">
								<label class="mb-0 pl-2"><small>Escriba nombre completo de (siglas)</small></label>
								<input type="text" class="form-control" id="descripcionsiglas">
								<small id="msj_descripcionsiglas" style="color: red; display: none;">Debe ingresar el
									nombre de las siglas</small>

							</div>
							<div class="text-right">
								<button class="button-save" type="button" name="button" id="guardar">Guardar</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="table-striped-system" id="siglasGeneral" style="display: none;">
							<p class="title mt-md-0 mt-4 text-center">SIGLAS</p>
							<table class="table table-striped table-sm" id="tablesiglas">
								<tbody class="text-uppercase">
								<?php foreach ($siglas as $si) { ?>
									<tr style="cursor: pointer;">
										<th scope="row"><?php echo $si->sigla; ?></th>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-sm-3">
						<div id="paso4" style="display: none;">
							<p class="title text-center text-uppercase">grupos generales</p>
							<div class="form-group mb-2 mt-3">
								<label class="mb-0 pl-2"><small>Selecciona el grupo a asociar</small></label>
								<input type="text" class="form-control" id="grupo">
								<small id="msj_grupos" style="color: red;display: none;">Debe ingresar un grupo
									nuevo</small>

							</div>
							<div class="text-right">
								<button class="button-save" type="button" name="button" id="quitarGrupo"
										style="display: none !important;">Quitar Grupo
								</button>
								<button class="button-save" type="button" name="button" id="guardarGrupo">Guardar
								</button>
							</div>

							<div id="selecionarClasifica2" class="mt-5" style="display: none;">
								<small class="d-block pl-4">Clasifica</small>
								<button class="button-save mr-2" type="button" name="button" id="fijos">FIJOS</button>
								<button class="button-save" type="button" name="button" id="variables">VARIABLES
								</button>
								<button class="button-add float-right" type="button" name="button" id="validar">
									Validar
								</button>
								<small style="color: red; display: none;" id="msj_validarClasifica2">Debe seleccionar
									una clasificación</small>
							</div>


							<div class="mt-5" id="paso5" style="display: none;">
								<p class="title mt-md-0 mt-4 text-center">Conceptos Específicos</p>
								<div class="form-group mb-2 mt-3">
									<label class="mb-0 pl-2"><small>Agrega el concepto a asociar</small></label>
									<div class="custom-select-system" id="selectListaConcepto">
										<select id="listaConceptos">
											<option value="0">Elige un conceptos</option>
											<?php foreach ($conceptos as $c) { ?>
												<option value=<?php echo $c->id_concepto; ?>><?php echo $c->nombre; ?></option>
											<?php } ?>
										</select>
									</div>
									<small id="msj_conceptoEspecifico" style="color: red; display: none!important;">Debe
										seleccionar un concepto especifico</small>
								</div>
								<div class="text-right">
									<button class="button-save" type="button" name="button" id="guardarConcepto">Guardar
									</button>
								</div>
							</div>




						</div>
					</div>
					<div class="col-sm-3">
						<div class="table-striped-system" id="gruposGenerales" style="display: none;">
							<p class="title mt-md-0 mt-4 text-center">grupos generales</p>
							<table class="table table-striped table-sm" id="listaGruposGenerales">
								<tbody class="text-uppercase">
								<?php foreach ($grupos as $g) { ?>
									<tr  style="cursor: pointer;">
										<th class="thGrupos" id="<?php echo $g->id_grupo; ?>" scope="row"><?php echo $g->nombre; ?></th>
										<th scope="row"><?php echo $g->movimiento; ?></th>

									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row mt-5"  id="pasofinal" style="display: none;">
					<div class="col-md-6">
						<div class="date">
							<small class="d-block">Fecha de registro</small>
							<input type="text" class="date-actual" name="date-actual" id="name-actual" value="<?php echo $fecha; ?> " readonly>
						</div>
					</div>
					<div class="col-md-6 mt-4 text-right">
						<button class="button-save" type="button" name="button" id="guardarFinal">Guardar todo
						</button>
					</div>
				</div>




			</div>
		</div>
	</div>
</div>

<?php require_once 'complementos/footer.php'; ?>
<script src="<?php echo base_url(); ?>assets/js/presistemac.js"></script>
</body>

