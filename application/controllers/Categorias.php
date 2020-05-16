<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->library('session');

		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->Model('CategoriasModel');
	}

	public function get(){
		$dataResponse = $this->input->post();
		$tipo = $dataResponse['tipo'];
		echo json_encode($this->CategoriasModel->get_tipo($tipo));

	}

}
