<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('UsuariosModel');
		$this->load->Model('SesionesModel');

	}

	public function valida()
	{
		$data = $this->input->post();
		$datosUsua = $this->UsuariosModel->get_by_id($data['correo']);
		if (count($datosUsua) > 0 && $datosUsua[0]->status == 1) {
			$response = $this->UsuariosModel->valida($data);
			if (count($response) > 0) {
				$ip = $this->ObtenerIP();
				$arraydata = array(
					'correo' => $response[0]->correo,
					'nombre' => $response[0]->nombre,
					'apellido'	=> $response[0]->apellidos,
					'rol' => $response[0]->rol,
					'log_in' => true
				);
				$arrayInsert = array(
					"tipo"=>"Ingreso",
					"fecha"=>date('Y-m-d'),
					"hora"=>date("H:i"),
					"id_user"=>$response[0]->correo,
					"ip"=>$ip
				);
				$this->SesionesModel->insert($arrayInsert);
				$this->session->sess_expiration = '1200'; // La sesión termina en 20 minutos
				$this->session->set_userdata($arraydata);
				echo 2;
			} else {
				#La clave no esta bien y modificamos los intentos
				echo 1;
			}
		} else {
			echo 0;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function ObtenerIP()
	{
		if (isset($_SERVER)) {
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
		} else {
			if (getenv('HTTP_CLIENT_IP')) {
				$ip = getenv('HTTP_CLIENT_IP');
			} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
				$ip = getenv('HTTP_X_FORWARDED_FOR');
			} else {
				$ip = getenv('REMOTE_ADDR');
			}
		}
		// En algunos casos muy raros la ip es devuelta repetida dos veces separada por coma
		if (strstr($ip, ',')) {
			$ip = array_shift(explode(',', $ip));
		}
		return $ip;
	}

}
