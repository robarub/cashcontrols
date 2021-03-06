<?php

class SiglasModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "siglas";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_tipo($tipo){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("tipo",$tipo);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function insert($data){
		if ($this->db->insert($this->tabla, $data))
			return $this->db->insert_id();
		else
			return null;
	}


}
