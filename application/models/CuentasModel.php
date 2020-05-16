<?php

class CuentasModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "cuentas";
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function edit($id, $dataUpdate)
	{

		$this->db->set($dataUpdate);
		$this->db->where('id_cuenta', $id);
		$this->db->update($this->tabla);
		return 1;
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("id_cuenta", $id);
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

	public function saldos_cuentas_general()
	{
		$this->db->select('SUM(saldo) as t');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

}
