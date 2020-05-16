<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("America/Mexico_City");
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->hoy = date("Y-m-d");
		$this->load->library('session');

		$this->load->Model('ComentariosModel');
		$this->load->Model('ActividadesModel');

	}

	public function insert($idActividad = 0)
	{
		$this->ActividadesModel->edit($idActividad, array("status" => 3));
		#Editamos ae
		$this->ActividadesModel->edit_ae($idActividad, array("status" => 3));
		#Editamos ai
		$this->ActividadesModel->edit_ai($idActividad, array("status" => 3));

		$this->ComentariosModel->insert(array("comentario" => $this->input->post("comentario"), "idActividad" => $idActividad, "fecha"=>date('Y-m-d H:i')));
		echo 1;
	}

}
