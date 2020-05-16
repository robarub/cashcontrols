<?php

class GruposModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "grupos";
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_clasificacion($id_tipo_clasificacion){

		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where('id_tipo_clasificacion', $id_tipo_clasificacion);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function insert($data)
	{
		if ($this->db->insert($this->tabla, $data))
			return $this->db->insert_id();
		else
			return null;
	}



	public function get_with_movimiento(){
		$this->db->select('grupos.nombre,
							grupos.id_grupo,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("tipo_clasificacion","grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento","tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$consulta = $this->db->get();
		return $consulta->result();
	}



	/*public function join($concepto, $accion, $movimiento){
		$this->db->select('grupos.nombre AS nGrupo,
							grupos.id_grupo,
							conceptos.id_concepto,
							conceptos.nombre as nConcepto,
							tipo_accion.id_accion,
							tipo_accion.accion,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("conceptos"," grupos.id_concepto = conceptos.id_concepto");
		$this->db->join("tipo_accion"," grupos.id_tipo_accion = tipo_accion.id_accion");
		$this->db->join("tipo_clasificacion"," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento", " tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("conceptos.id_concepto", $concepto);
		$this->db->where("tipo_accion.id_accion", $accion);
		$this->db->where("tipo_movimiento.id_movimiento", $movimiento);
		$consulta = $this->db->get();
		return $consulta->result();
	}*/


}
