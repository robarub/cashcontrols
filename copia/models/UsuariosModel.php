<?php

class UsuariosModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "users";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function insert($data){
		if ($this->db->insert($this->tabla, $data))
			return $this->db->insert_id();
		else
			return null;
	}

	public function get_by_id($correo){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("correo", $correo);
		$this->db->where("status", 1);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function valida($data){
		$this->db->select("*");
		$this->db->from($this->tabla);
		$this->db->where('correo', $data['correo']);
		$this->db->where('clave', $data['clave']);
		$consulta = $this->db->get();
		$resultado = $consulta->result();
		return $resultado;
	}


}
