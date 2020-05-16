<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('GruposModel');
	}

	public function get_by_clasificacion(){
		$request = $this->input->post();
		echo json_encode($this->GruposModel->get_by_clasificacion($request['busqueda']));
	}

	public function index(){
		echo "alkdsj";
	}

}
