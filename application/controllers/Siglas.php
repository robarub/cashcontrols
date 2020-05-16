<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siglas extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('SiglasModel');
	}

	public function get_by_grupo(){
		$request = $this->input->post();
		echo json_encode($this->SiglasModel->get_by_grupo($request['busqueda']));
	}

	public function get_by_id_sigla_with_accion_movimiento(){
		$request = $this->input->post();
		echo json_encode($this->SiglasModel->get_by_id_sigla_with_accion_movimiento($request['id_sigla']));
	}

	public function sigla_x_movimiento(){
		$request = $this->input->post();
		echo json_encode($this->SiglasModel->sigla_x_movimiento($request['id_movimiento']));
	}

}
