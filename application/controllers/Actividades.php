<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actividades extends CI_Controller
{

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');
		$this->load->Model('CuentasModel');
		$this->load->Model('OperacionesModel');
		$this->load->Model("ActividadesModel");
		$this->load->Model("MovimientosModel");
		$this->load->Model("AccionesModel");
		$this->load->Model("GruposModel");

		$this->load->Model("TipoClasificacionModel");
		$this->load->Model("TipoTransferenciaModel");
		$this->load->Model("TipoOperacionModel");
		$this->load->Model("SiglasModel");

		$this->load->Model("ComentariosModel");

		$this->login = $this->session->userdata("log_in");


	}


	public function insertar()
	{
		$dataResponse = $this->input->post();
		$mov = $dataResponse['tipo_movimiento'];
		unset($dataResponse['tipo_movimiento']);
		$cta_tras = $dataResponse['cta_tras'];
		unset($dataResponse['cta_tras']);

		if ($mov == 1) {
			#Es un ingreso
			if ($dataResponse['transferencia'] == 2 || $dataResponse['transferencia'] == 1) {
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataResponse['monto'] + $dataCuenta[0]->saldo;
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));

				$dataCuenta = $this->CuentasModel->get_by_id($cta_tras);
				$total = $dataCuenta[0]->saldo - $dataResponse['monto'];
				$this->CuentasModel->edit($cta_tras, array("saldo" => $total));

				$idActividadPadre = $this->ActividadesModel->insert($dataResponse);
				$dataResponse['monto'] *= -1;
				$dataResponse['id_cuenta'] = $cta_tras;
				$dataResponse['id_sigla'] = 94;
				$dataResponse['mi'] = $idActividadPadre;
				echo $this->ActividadesModel->insert($dataResponse);
			} else {
				#Propias
				#Lo que es un ingreso para una de mis cuentas
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataResponse['monto'] + $dataCuenta[0]->saldo;
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));
				echo $this->ActividadesModel->insert($dataResponse);

			}
		} else {
			#Es un egreso
			if ($dataResponse['transferencia'] == 2 || $dataResponse['transferencia'] == 1) {
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataCuenta[0]->saldo - $dataResponse['monto'];
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));


				$dataCuenta = $this->CuentasModel->get_by_id($cta_tras);
				$total = $dataResponse['monto'] + $dataCuenta[0]->saldo;
				$this->CuentasModel->edit($cta_tras, array("saldo" => $total));
				$idActividadPadre = $this->ActividadesModel->insert($dataResponse);


				$dataResponse['monto'] *= -1;
				$dataResponse['id_cuenta'] = $cta_tras;
				$dataResponse['id_sigla'] = 95;
				$dataResponse['me'] = $idActividadPadre;
				echo $this->ActividadesModel->insert($dataResponse);
			} else {
				#Propias
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataCuenta[0]->saldo - $dataResponse['monto'];
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));

				$dataResponse['monto'] *= -1;
				echo $this->ActividadesModel->insert($dataResponse);

			}
		}
	}

	public function busqueda()
	{
		if ($this->login == true) {
			$notificaciones = array();
			for ($i = 0; $i <= 9; $i++) {
				$dataNotificaciones = $this->ActividadesModel->get_by_status(3, $i + 1);
				if (count($dataNotificaciones) > 0 && $dataNotificaciones[0]->tnot > 0) {
					$not = new \stdClass;
					switch ($i + 1) {
						case 1:
							$not->mes = "Enero";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 2:
							$not->mes = "Febrero";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 3:
							$not->mes = "Marzo";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 4:
							$not->mes = "Abril";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 5:
							$not->mes = "Mayo";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 6:
							$not->mes = "Junio";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 7:
							$not->mes = "Julio";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 8:
							$not->mes = "Agosto";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 9:
							$not->mes = "Semptiembre";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 10:
							$not->mes = "Octubre";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 11:
							$not->mes = "Noviembre";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
						case 12:
							$not->mes = "Diciembre";
							$not->total = $dataNotificaciones[0]->tnot;
							array_push($notificaciones, $not);
							break;
					}
				}
			}
			$dataCuentas = $this->CuentasModel->get();
			$dataOperaciones = $this->OperacionesModel->get();
			$dataMovimientos = $this->MovimientosModel->get();
			$dataAcciones = $this->AccionesModel->get();
			$data = array(
				"cuentas" => $dataCuentas,
				"operaciones" => $dataOperaciones,
				"movimientos" => $dataMovimientos,
				"acciones" => $dataAcciones,
				"notificaciones" => $notificaciones
			);
			$this->load->view('busqueda', $data);
		} else {
			echo "<script>alert('No tiene permisos para entrar a este módulo');window.location='../Usuarios/logout';</script>";
		}


	}

	public function crear()
	{
		$dataClasificacionIngresos = $this->TipoClasificacionModel->get_movimiento(1);
		$dataClasificacionEgresos = $this->TipoClasificacionModel->get_movimiento(2);
		$dataCuentas = $this->CuentasModel->get();
		$dataOperaciones = $this->OperacionesModel->get();


		$saldoCuentasTotal = $this->CuentasModel->saldos_cuentas_general();

		$dataSaldoTerceros = $this->ActividadesModel->total_terceros();
		if ($dataSaldoTerceros[0]->t < 0) {
			#Debo dinero
			$disponible = $saldoCuentasTotal[0]->t - ((-1) * $dataSaldoTerceros[0]->t);

		} elseif ($dataSaldoTerceros[0]->t >= 0) {
			#Me deben dinero
			$disponible = $saldoCuentasTotal[0]->t + $dataSaldoTerceros[0]->t;

		}

		$data = array(
			"cuentas" => $dataCuentas,
			"operaciones" => $dataOperaciones,
			"clasificacionIngresos" => $dataClasificacionIngresos,
			"clasificacionEgresos" => $dataClasificacionEgresos,
			"saldoTerceros" => $dataSaldoTerceros[0]->t,
			"saldoTotal" => $saldoCuentasTotal[0]->t,
			"saldoDisponible" => $disponible,
			"fecha" => date("Y-m-d")
		);

		$this->load->view('actividades', $data);
	}

	public function actividades_filtro()
	{
		$request = $this->input->post();
		$fInicio = "01-" . $request['mes'] . "-" . $request['anio'];
		$dias = date("t", strtotime($fInicio));
		$fInicio = $request['anio'] . "-" . $request['mes'] . "-" . "01";
		$fFinal = $request['anio'] . "-" . $request['mes'] . "-" . $dias;

		if ($request['id_cuenta'] == "t") {
			$dataBusqueda = array(
				"actividades.fecha >=" => $fInicio,
				"actividades.fecha <=" => $fFinal
			);
			$dataRespuesta = $this->ActividadesModel->actividades_filtro_all($dataBusqueda);
			foreach ($dataRespuesta as $r) {
				#Validamos los null
				($r->ai == null) ? $r->ai = '' : $r->ai = $r->ai;
				($r->ae == null) ? $r->ae = '' : $r->ae = $r->ae;
				switch ($r->status) {
					case 1:
						#La actividad no esta clasificada aun
						if ($this->session->userdata("rol") == 1) {
							#Permisos para cada accion
							$r->autReclasificar = 1;
							$r->autAutorizar = 1;
							$r->autComentario = 1;

						} else {
							#Permisos para cada accion
							$r->autReclasificar = 0;

							$r->autAutorizar = 0;

							$r->autComentario = 0;
						}
						break;

					case 2:
						#La actividad ya esta autorizada
						#Estilos para los icons
						#Icono de Reclasificar
						if ($this->session->userdata("rol") == 1) {
							$r->autReclasificar = 0;

							#Icono de Autorizado
							$r->autAutorizar = 0;

							#Icono de comentario
							$r->autComentario = 0;

						} else {
							$r->autReclasificar = 0;

							#Icono de Autorizado
							$r->autAutorizar = 0;

							#Icono de comentario
							$r->autComentario = 0;

						}

						break;
					case 3:
						if ($this->session->userdata("rol") == 1) {
							#icono autorizar
							$r->autReclasificar = 0;

							#Icono de Autorizado
							$r->autAutorizar = 0;

							#Icono de comentario
							$r->autComentario = 1;
							$dataComentario = $this->ComentariosModel->get_by_idActividad($r->id_actividad);
							if (count($dataComentario) > 0) {
								$r->mensajeComentario = "Ya has ingresado el siguiente comentario:<br>" . $dataComentario[0]->comentario;
							}

						} else {
							#icono autorizar
							$r->autReclasificar = 1;

							#Icono de Autorizado
							$r->autAutorizar = 0;

							#Icono de comentario
							$r->autComentario = 1;
							$dataComentario = $this->ComentariosModel->get_by_idActividad($r->id_actividad);
							if (count($dataComentario) > 0) {
								$r->mensajeComentario = $dataComentario[0]->comentario;
							}

						}
						break;
				}
			}

		} else {
			$dataBusqueda = array(
				"actividades.id_cuenta" => $request['id_cuenta'],
				"actividades.fecha >=" => $fInicio,
				"actividades.fecha <=" => $fFinal
			);

			$dataRespuesta = $this->ActividadesModel->actividades_filtro($dataBusqueda);
		}


		if (count($dataRespuesta) > 0) {

			echo json_encode($dataRespuesta);


		} else {
			echo 1;
		}


	}

	public function autorizar($idActividad = 0)
	{
		$this->ActividadesModel->edit($idActividad, array("status" => 2));
		#Editamos ae
		$this->ActividadesModel->edit_ae($idActividad, array("status" => 2));
		#Editamos ai
		$this->ActividadesModel->edit_ai($idActividad, array("status" => 2));

		echo 1;
	}

	public function update($idActividad = 0)
	{
		$dataUpdate = $this->input->post();
		if ($this->session->userdata('rol') == 1) {
			$dataUpdate['status'] = 2;

			$dataActividadEspejo = $this->ActividadesModel->get_by_ai($idActividad);
			if (count($dataActividadEspejo) > 0) {
				#Si existe
				$updateEspejo = array(
					"status" => 2
				);
				$this->ActividadesModel->edit($dataActividadEspejo[0]->id_actividad, $updateEspejo);

			} else {
				$dataActividadEspejo = $this->ActividadesModel->get_by_ae($idActividad);
				if (count($dataActividadEspejo) > 0) {
					#Si existe
					$updateEspejo = array(
						"status" => 2
					);
					$this->ActividadesModel->edit($dataActividadEspejo[0]->id_actividad, $updateEspejo);

				}
			}
		} else {
			$dataUpdate['status'] = 1;

			$dataActividadEspejo = $this->ActividadesModel->get_by_ai($idActividad);
			if (count($dataActividadEspejo) > 0) {
				#Si existe
				$updateEspejo = array(
					"status" => 1
				);
				$this->ActividadesModel->edit($dataActividadEspejo[0]->id_actividad, $updateEspejo);

			} else {
				$dataActividadEspejo = $this->ActividadesModel->get_by_ae($idActividad);
				if (count($dataActividadEspejo) > 0) {
					#Si existe
					$updateEspejo = array(
						"status" => 1
					);
					$this->ActividadesModel->edit($dataActividadEspejo[0]->id_actividad, $updateEspejo);

				}
			}
		}
		$this->ActividadesModel->edit($idActividad, $dataUpdate);
		echo 1;
	}

	public function reclasificar($idActividad = 0)
	{
		$dataActividad = $this->ActividadesModel->get_by_id($idActividad);
		foreach ($dataActividad as $a) {
			$dataCuenta = $this->CuentasModel->get_by_id($a->id_cuenta);
			$a->nCuenta = $dataCuenta[0]->nombre;

			$dataTipo = $this->TipoOperacionModel->get_by_id($a->tipo_operacion);
			$a->nOperacion = $dataTipo[0]->operacion;

			$dataTransferencia = $this->TipoTransferenciaModel->get_by_id($a->transferencia);
			$a->nTransferencia = $dataTransferencia[0]->transferencia;

			$dataSigla = $this->SiglasModel->get_by_id($a->id_sigla);
			$dataGrupo = $this->GruposModel->get_by_id($dataSigla[0]->id_grupo);
			$dataClasificacion = $this->TipoClasificacionModel->get_by_id($dataGrupo[0]->id_tipo_clasificacion);

			$a->idGrupo = $dataSigla[0]->id_grupo;
			$a->idClasificacion = $dataGrupo[0]->id_tipo_clasificacion;
			$a->mov = $dataClasificacion[0]->id_tipo_movimiento;

			$dataGrupos = $this->GruposModel->get_by_clasificacion($a->idClasificacion);

			$dataSigla = $this->SiglasModel->get_by_grupo($a->idGrupo);

			$dataActividadEspejo = $this->ActividadesModel->get_by_ai($a->id_actividad);
			if (count($dataActividadEspejo) > 0) {
				#Si existe
				$dataCuentaEspejo = $this->CuentasModel->get_by_id($dataActividadEspejo[0]->id_cuenta);
				$a->cuentaEspejo = $dataCuentaEspejo[0]->nombre;
			} else {
				$dataActividadEspejo = $this->ActividadesModel->get_by_ae($a->id_actividad);
				if (count($dataActividadEspejo) > 0) {
					#Si existe
					$dataCuentaEspejo = $this->CuentasModel->get_by_id($dataActividadEspejo[0]->id_cuenta);
					$a->cuentaEspejo = $dataCuentaEspejo[0]->nombre;
				}
			}

		}
		$dataClasificacionIngresos = $this->TipoClasificacionModel->get_movimiento(1);
		$dataClasificacionEgresos = $this->TipoClasificacionModel->get_movimiento(2);


		$data = array(
			"actividad" => $dataActividad,
			"clasificacionIngresos" => $dataClasificacionIngresos,
			"clasificacionEgresos" => $dataClasificacionEgresos,
			"grupos" => $dataGrupos,
			"siglas" => $dataSigla,
			"fecha" => date("Y-m-d")
		);

		$this->load->view('actividades_reclasificar', $data);
	}

	public function graficas($redirect = 0)
	{
		switch ($redirect) {
			case 1:
				$this->load->view('gastovsinversion');
				break;
			case 2:
				$this->load->view('g_clasificacion_ingresos');
				break;
			case 3:
				$this->load->view('g_clasificacion_egresos');
				break;
		}
	}

	public function graficaclasificacioningresos($periodo = 0)
	{
		switch ($periodo) {
			case 1:

				$dataDatos = $this->ActividadesModel->graficaclasificacion1($this->input->post('fecha'));
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 1) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 2) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 3) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 10) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}

				break;

			case 2:

				$dataDatos = $this->ActividadesModel->graficaclasificacion2($this->input->post('fechaIni'), $this->input->post('fechaFin'));
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 1) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 2) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 3) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 10) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}
				break;
			case 3:

				$request = $this->input->post();
				$fInicio = "01-" . $request['mes'] . "-" . $request['anio'];
				$dias = date("t", strtotime($fInicio));
				$fInicio = $request['anio'] . "-" . $request['mes'] . "-" . "01";
				$fFinal = $request['anio'] . "-" . $request['mes'] . "-" . $dias;
				$dataBusqueda = array(
					"actividades.fecha >=" => $fInicio,
					"actividades.fecha <=" => $fFinal,
				);
				$dataDatos = $this->ActividadesModel->graficaclasificacion3($dataBusqueda);
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 1) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 2) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 3) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 10) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}
				break;
		}
	}


	public function graficaclasificacionegresos($periodo = 0)
	{
		switch ($periodo) {
			case 1:

				$dataDatos = $this->ActividadesModel->graficaclasificacion1($this->input->post('fecha'));
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 4) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 5) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 8) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 11) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				$sumaProductivo *= (-1);
				$sumaNoProductivo *= (-1);
				$sumaNoAcumula *= (-1);
				$sumaOtros *= (-1);
				$total *= (-1);
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}

				break;

			case 2:

				$dataDatos = $this->ActividadesModel->graficaclasificacion2($this->input->post('fechaIni'), $this->input->post('fechaFin'));
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 4) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 5) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 8) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 11) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				$sumaProductivo *= (-1);
				$sumaNoProductivo *= (-1);
				$sumaNoAcumula *= (-1);
				$sumaOtros *= (-1);
				$total *= (-1);
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}
				break;
			case 3:

				$request = $this->input->post();
				$fInicio = "01-" . $request['mes'] . "-" . $request['anio'];
				$dias = date("t", strtotime($fInicio));
				$fInicio = $request['anio'] . "-" . $request['mes'] . "-" . "01";
				$fFinal = $request['anio'] . "-" . $request['mes'] . "-" . $dias;
				$dataBusqueda = array(
					"actividades.fecha >=" => $fInicio,
					"actividades.fecha <=" => $fFinal,
				);
				$dataDatos = $this->ActividadesModel->graficaclasificacion3($dataBusqueda);
				$sumaProductivo = 0;
				$sumaNoProductivo = 0;
				$sumaNoAcumula = 0;
				$sumaOtros = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->clasificacion == 4) {
						#Ingreso
						$sumaProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 5) {
						#egreso
						$sumaNoProductivo += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 8) {
						#egreso
						$sumaNoAcumula += $d->monto;
						$total += $d->monto;
					} elseif ($d->clasificacion == 11) {
						#egreso
						$sumaOtros += $d->monto;
						$total += $d->monto;
					}
				}
				$sumaProductivo *= (-1);
				$sumaNoProductivo *= (-1);
				$sumaNoAcumula *= (-1);
				$sumaOtros *= (-1);
				$total *= (-1);
				if ($total > 0) {
					if ($sumaProductivo > 0) {
						$porcentajeProductivo = $sumaProductivo * 100 / $total;
					} else {
						$porcentajeProductivo = 0;
					}
					if ($sumaNoProductivo > 0) {
						$porcentajeNoProductivo = $sumaNoProductivo * 100 / $total;
					} else {
						$porcentajeNoProductivo = 0;
					}
					if ($sumaNoAcumula > 0) {
						$porcentajeNoAcumula = $sumaNoAcumula * 100 / $total;
					} else {
						$porcentajeNoAcumula = 0;
					}
					if ($sumaOtros > 0) {
						$porcentajeOtros = $sumaOtros * 100 / $total;
					} else {
						$porcentajeOtros = 0;
					}

					$datos = new \stdClass;
					$datos->porcentajeProductivo = $porcentajeProductivo;
					$datos->porcentajeNoProductivo = $porcentajeNoProductivo;
					$datos->porcentajeNoAcumula = $porcentajeNoAcumula;
					$datos->porcentajeOtros = $porcentajeOtros;

					$datos->sumaProductivo = $sumaProductivo;
					$datos->sumaNoProductivo = $sumaNoProductivo;
					$datos->sumaNoAcumula = $sumaNoAcumula;
					$datos->sumaOtros = $sumaOtros;

					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);

				} else {
					echo 0;
				}
				break;
		}
	}


	public function graficaingresosvsegresos($tipoConsulta = 0)
	{
		switch ($tipoConsulta) {
			case 1:

				$dataDatos = $this->ActividadesModel->graficaingresosegresos1($this->input->post('fecha'));
				$sumaI = 0;
				$sumaE = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->id_movimiento == 1) {
						#Ingreso
						$sumaI += $d->monto;
						$total += $d->monto;
					} else {
						#egreso
						$sumaE += $d->monto;
						$total += $d->monto;
					}
				}
				if ($sumaI > $sumaE) {
					#si se puede sacar el procentaje
					#mi 100 es la suma de los ingresos
					$porcentajeE = (-1) * $sumaE * 100 / $sumaI;
					$porcentajeI = 100 - $porcentajeE;
					$datos = new \stdClass;
					$datos->porcentajeE = $porcentajeE;
					$datos->porcentajeI = $porcentajeI;
					$datos->sumaE = $sumaE;
					$datos->sumaI = $sumaI;
					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);
				} elseif ($sumaI < $sumaE) {
					#los ingresos son negativos
					echo 0;
				}
				break;

			case 2:

				$dataDatos = $this->ActividadesModel->graficaingresosegresos2($this->input->post('fechaIni'), $this->input->post('fechaFin'));
				$sumaI = 0;
				$sumaE = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->id_movimiento == 1) {
						#Ingreso
						$sumaI += $d->monto;
						$total += $d->monto;
					} else {
						#egreso
						$sumaE += $d->monto;
						$total += $d->monto;
					}
				}
				if ($sumaI > $sumaE) {
					#si se puede sacar el procentaje
					#mi 100 es la suma de los ingresos
					$porcentajeE = (-1) * $sumaE * 100 / $sumaI;
					$porcentajeI = 100 - $porcentajeE;
					$datos = new \stdClass;
					$datos->porcentajeE = $porcentajeE;
					$datos->porcentajeI = $porcentajeI;
					$datos->sumaE = $sumaE;
					$datos->sumaI = $sumaI;
					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);
				} elseif ($sumaI < $sumaE) {
					#los ingresos son negativos
					echo 0;
				}
				break;
			case 3:

				$request = $this->input->post();
				$fInicio = "01-" . $request['mes'] . "-" . $request['anio'];
				$dias = date("t", strtotime($fInicio));
				$fInicio = $request['anio'] . "-" . $request['mes'] . "-" . "01";
				$fFinal = $request['anio'] . "-" . $request['mes'] . "-" . $dias;
				$dataBusqueda = array(
					"actividades.fecha >=" => $fInicio,
					"actividades.fecha <=" => $fFinal
				);

				$dataDatos = $this->ActividadesModel->graficaingresosegresos3($dataBusqueda);
				$sumaI = 0;
				$sumaE = 0;
				$total = 0;
				foreach ($dataDatos as $d) {
					if ($d->id_movimiento == 1) {
						#Ingreso
						$sumaI += $d->monto;
						$total += $d->monto;
					} else {
						#egreso
						$sumaE += $d->monto;
						$total += $d->monto;
					}
				}
				if ($sumaI > $sumaE) {
					#si se puede sacar el procentaje
					#mi 100 es la suma de los ingresos
					$porcentajeE = (-1) * $sumaE * 100 / $sumaI;
					$porcentajeI = 100 - $porcentajeE;
					$datos = new \stdClass;
					$datos->porcentajeE = $porcentajeE;
					$datos->porcentajeI = $porcentajeI;
					$datos->sumaE = $sumaE;
					$datos->sumaI = $sumaI;
					$datos->total = $total;
					$grafica = array(
						0 => $datos
					);
					echo json_encode($grafica);
				} elseif ($sumaI < $sumaE) {
					#los ingresos son negativos
					echo 0;
				}
				break;
		}
	}


	public function clasificacion_ingresos($tipoConsulta = 0, $clasificacion = 0)
	{

	}

}
