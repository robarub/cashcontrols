<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldos extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('SaldosModel');
	}

	public function insert(){
		$request = $this->input->post();
		$dataInsert = array(
			"id_cuenta"=> $request['id_cuenta'],
			"saldo"=> $request['saldo'],
			"fecha"=> $request['fecha'],
			"status"=> 1,
			"created_at"=> date("Y-m-d H:i"),
			"updated_at"=>date("Y-m-d H:i")
		);
		$this->SaldosModel->insert($dataInsert);
	}

}
