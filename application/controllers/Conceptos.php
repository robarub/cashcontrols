<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conceptos extends CI_Controller
{

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('ConceptosModel');
		$this->load->Model('SiglasModel');
		$this->load->Model('GruposModel');
		$this->load->Model('TipoClasificacionModel');

	}


	public function crear()
	{
		$dataSiglas = $this->SiglasModel->get();

		$dataTipoClasificacionIngresos = $this->TipoClasificacionModel->get_movimiento(1);
		$dataTipoClasificacionEgresos = $this->TipoClasificacionModel->get_movimiento(2);

		$dataConceptos = $this->ConceptosModel->get();
		$dataGrupos = $this->GruposModel->get_with_movimiento();
		$fecha = date("Y-m-d");

		$data = array(
			"siglas" => $dataSiglas,
			"grupos" => $dataGrupos,
			"conceptos" => $dataConceptos,
			"fecha" => $fecha,
			"clasificacionIngresos" => $dataTipoClasificacionIngresos,
			"clasificacionEgresos" => $dataTipoClasificacionEgresos
		);

		$this->load->view('presistemac', $data);
	}


	public function inserta_concepto()
	{
		$request = $this->input->post();
		if ($request['nuevoGrupo'] == "true" && $request['nuevaSigla'] == "true") {
			$dataInsert = array(
				"nombre" => $request['nombreGrupo'],
				"id_concepto" => 1,
				"id_tipo_clasificacion" => $request['clasifica'],
				"sigla" => $request['siglas'],
				"descripcionSigla" => $request['descripcionSiglas'],
				"created_at" => date("Y-m-d H:i"),
				"updated_at" => date("Y-m-d H:i")
			);
			$idGrupo = $this->GruposModel->insert($dataInsert);
			#Damos 1 si el grupo se dio de alta correctamente
			echo 1;
		} elseif ($request['nuevoGrupo'] == "false" && $request['nuevaSigla'] == "true") {
			$idGrupo = $request['grupoSeleccionado'];
			$dataInsert = array(
				"sigla" => $request['siglas'],
				"nombre" => $request['descripcionSiglas'],
				"id_grupo" => $idGrupo,
				"id_accion" => $request['clasifica2'],
				"created_at" => date("Y-m-d H:i"),
				"updated_at" => date("Y-m-d H:i"),
				"id_concepto" => $request['conceptoEspecifico'],

			);
			$idSigla = $this->SiglasModel->insert($dataInsert);
			echo 2;
		}
	}

	/*public function obtiene_conceptos_view()
	{
		$request = $this->input->post();
		$dataConcepto = $this->GruposModel->join($request['concepto'], $request['accion'], $request['movimiento']);
		echo json_encode($dataConcepto);
	}*/


}
