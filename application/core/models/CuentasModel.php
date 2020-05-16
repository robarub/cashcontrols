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

	public function get(){
		$this->db->select('*');
		$this->db->from($this->tabla);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function saldos_cuentas_terceros(){
		$this->db->select('SUM(saldos.saldo) as total');
		$this->db->from($this->tabla);
		$this->db->join("saldos", "cuentas.id_cuenta = saldos.id_cuenta");
		$this->db->join("tipo_cuentas", "tipo_cuentas.id_tipo_cuenta = cuentas.id_tipo_cuenta");
		$this->db->where("tipo_cuentas.id_tipo_cuenta", 5);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function saldos_cuentas_general(){
		$this->db->select('SUM(saldos.saldo) as total');
		$this->db->from($this->tabla);
		$this->db->join("saldos", "cuentas.id_cuenta = saldos.id_cuenta");
		$this->db->join("tipo_cuentas", "tipo_cuentas.id_tipo_cuenta = cuentas.id_tipo_cuenta");
		$this->db->where("tipo_cuentas.id_tipo_cuenta!=", 5);
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
