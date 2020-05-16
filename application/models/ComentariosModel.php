<?php

class ComentariosModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "comentarios";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_idActividad($idActividad){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("idActividad", $idActividad);
		$this->db->order_by("fecha", "DESC");
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
