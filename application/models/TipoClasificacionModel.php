<?php

class TipoClasificacionModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "tipo_clasificacion";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_id($idClasificacion){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("id_clasificacion", $idClasificacion);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_movimiento($movimiento){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("id_tipo_movimiento", $movimiento);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
