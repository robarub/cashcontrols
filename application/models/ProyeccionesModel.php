<?php

class ProyeccionesModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "proyecciones";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_id($idSigla){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('id_sigla', $idSigla);
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
