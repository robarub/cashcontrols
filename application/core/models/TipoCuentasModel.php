<?php

class TipoCuentasModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "tipo_cuentas";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
