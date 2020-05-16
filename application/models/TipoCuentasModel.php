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

	public function get_by_id($id){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("id_tipo_cuenta",$id);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
