<?php

class TipoTransferenciaModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "tipo_transferencia";
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
		$this->db->where("id_tipoT",$id);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
