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
		$this->load->Model("TipoClasificacionModel");


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
			if ($dataResponse['transferencia'] == 2) {
				#Para terceros
				#Lo que es un prestamo para mi lo cual hacer que lo deba
				#Le vamos a meter dinero a una cuenta
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataResponse['monto'] + $dataCuenta[0]->saldo;
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));
				$dataResponse['monto'] *= -1;
				echo $this->ActividadesModel->insert($dataResponse);

			} elseif ($dataResponse['transferencia'] == 1) {
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataResponse['monto'] + $dataCuenta[0]->saldo;
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));

				$dataCuenta = $this->CuentasModel->get_by_id($cta_tras);
				$total = $dataCuenta[0]->saldo - $dataResponse['monto'];
				$this->CuentasModel->edit($cta_tras, array("saldo" => $total));

				#Propias
				#Movimiento que se registra dos veces uno con saldo negativo y otro con saldo positivo
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
			if ($dataResponse['transferencia'] == 2) {
				#Para terceros
				#Lo cual significa que salio haci alguien mas y me deben
				$dataCuenta = $this->CuentasModel->get_by_id($dataResponse['id_cuenta']);
				$total = $dataCuenta[0]->saldo - $dataResponse['monto'];
				$this->CuentasModel->edit($dataResponse['id_cuenta'], array("saldo" => $total));

				echo $this->ActividadesModel->insert($dataResponse);

			} elseif ($dataResponse['transferencia'] == 1) {
				#Propias
				#Movimiento que se registra dos veces uno con saldo negativo y otro con saldo positivo

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
				#Lo cual es una salida de flujo
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
		$dataCuentas = $this->CuentasModel->get();
		$dataOperaciones = $this->OperacionesModel->get();
		$dataMovimientos = $this->MovimientosModel->get();
		$dataAcciones = $this->AccionesModel->get();
		$data = array(
			"cuentas" => $dataCuentas,
			"operaciones" => $dataOperaciones,
			"movimientos" => $dataMovimientos,
			"acciones" => $dataAcciones
		);
		$this->load->view('busqueda', $data);

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

		if($request['id_cuenta']=="t"){
			$dataBusqueda = array(
				"actividades.fecha >=" => $fInicio,
				"actividades.fecha <=" => $fFinal
			);
			$dataRespuesta = $this->ActividadesModel->actividades_filtro_all($dataBusqueda);
		}else{
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


}
