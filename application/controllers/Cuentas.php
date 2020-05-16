<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->hoy = date("Y-m-d");
		$this->load->Model('CuentasModel');
		$this->load->Model('TipoCuentasModel');
		$this->load->Model('SaldosModel');

	}

	public  function get_by_id(){
		$dataCuenta = $this->CuentasModel->get_by_id($this->input->post("id"));
		foreach ($dataCuenta as $c){
			$dataTipoCuenta = $this->TipoCuentasModel->get_by_id($c->id_tipo_cuenta);
			$c->tipoCuenta = $dataTipoCuenta[0]->nombre;
		}
		echo json_encode($dataCuenta);
	}

	public function editar_cuenta(){
		$id_cuenta = $this->input->post("id_cuenta");
		$request = $this->input->post();
		$dataEdit = array(
			"nombre"=> $request['nombre'],
			"id_tipo_cuenta"=> $request['id_tipo_cuenta'],
			"color"=> $request['color'],
			"status"=> 1,
			"saldo"=> $request['saldo'],
			"fecha"=> $request['fecha'],
			"updated_at"=>date("Y-m-d H:i")
		);
		echo $this->CuentasModel->edit($id_cuenta, $dataEdit);
	}


	public function crear()
	{
		$dataCuentas = $this->CuentasModel->get();
		foreach ($dataCuentas as $c){
			$dataTipoCuenta = $this->TipoCuentasModel->get_by_id($c->id_tipo_cuenta);
			$c->tipoCuenta = $dataTipoCuenta[0]->nombre;
		}
		$dataTipoCuenta = $this->TipoCuentasModel->get();
		$data = array(
			"cuentas"=>$dataCuentas,
			"tipocuentas"=> $dataTipoCuenta
		);
		$this->load->view('cuentasgenerales',$data);
	}

	public function insert(){
		$request = $this->input->post();
		$dataInsert = array(
			"nombre"=> $request['nombre'],
			"id_tipo_cuenta"=> $request['tipo_cuenta'],
			"color"=> $request['color'],
			"status"=> 1,
			"saldo"=> $request['saldo'],
			"saldo_inicial"=> $request['saldo'],
			"fecha"=> $request['fecha'],
			"created_at"=> date("Y-m-d H:i"),
			"updated_at"=>date("Y-m-d H:i")
		);
		echo  $this->CuentasModel->insert($dataInsert);
	}

}
