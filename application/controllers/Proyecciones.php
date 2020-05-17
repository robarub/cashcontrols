<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecciones extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');
		$this->load->Model("GruposModel");
		$this->load->Model("SiglasModel");
		$this->load->Model('ProyeccionesModel');
	}

	public function index(){
		$dataGruposIngresos = $this->GruposModel->get_by_movimiento(1);
		foreach ($dataGruposIngresos as $gi){
			$dataSiglaPorGrupo = $this->SiglasModel->get_by_grupo($gi->id_grupo);
			$gi->siglas = $dataSiglaPorGrupo;
		}

		$data=array(
			"gruposIngresos"=>$dataGruposIngresos
		);

		$this->load->view("proyecciones", $data);
	}

}
