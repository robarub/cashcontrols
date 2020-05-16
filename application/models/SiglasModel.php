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

	public function get_by_id($idSigla){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('id_sigla', $idSigla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function select_by_sigla($sigla){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('sigla', $sigla);
		$consulta = $this->db->get();
		return $consulta->result();
	}
	public function get_by_grupo($id_grupo){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('id_grupo', $id_grupo);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_id_sigla_with_accion_movimiento($id_sigla){
		$this->db->select('siglas.id_sigla,
							siglas.sigla,
							tipo_accion.accion,
							conceptos.nombre');
		$this->db->from($this->tabla);
		$this->db->join("tipo_accion "," siglas.id_accion = tipo_accion.id_accion");
		$this->db->join("conceptos "," siglas.id_concepto =conceptos.id_concepto");
		$this->db->where('id_sigla', $id_sigla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_movimiento_grupo(){
		$this->db->select('tipo_movimiento.movimiento,
							siglas.sigla,
							grupos.nombre');
		$this->db->from($this->tabla);
		$this->db->join("grupos"," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion"," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$consulta = $this->db->get();
		return $consulta->result();
	}


	public function insert($data){
		if ($this->db->insert($this->tabla, $data))
			return $this->db->insert_id();
		else
			return null;
	}

	public function sigla_x_movimiento($id_movimiento){
		$this->db->select('siglas.id_sigla,
							siglas.sigla');
		$this->db->from($this->tabla);
		$this->db->join("grupos"," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("id_movimiento", $id_movimiento);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
