<?php

class ConceptosModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "conceptos";
	}

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_conceptos_by_movimiento_accion($movimiento, $accion){
		$this->db->select('conceptos.id_concepto,
							conceptos.nombre,
							grupos.nombre,
							siglas.sigla,
							tipo_clasificacion.clasificacion,
							tipo_accion.id_accion,
							tipo_accion.accion,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("tipo_accion", $this->tabla.".id_accion = tipo_accion.id_accion");
		$this->db->join("grupos", "conceptos.id_grupo = grupos.id_grupo");
		$this->db->join("siglas", "siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion", "siglas.clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento","tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("tipo_movimiento.id_movimiento", $movimiento);
		$this->db->where("tipo_accion.id_accion", $accion);
		$consulta = $this->db->get();
		return $consulta->result();
	}


	public function get_tipo($tipo){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("tipo", $tipo);
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
