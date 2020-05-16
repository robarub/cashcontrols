<?php

class ActividadesModel extends CI_Model
{
	public $tabla;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->tabla = "actividades";
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
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

	#Funcion para sacar la suma de todas las actividades de terceros
	public function total_terceros()
	{
		$where1 = "actividades.tipo_operacion = 5 OR actividades.tipo_operacion = 6";
		$this->db->select('SUM(actividades.monto) as t');
		$this->db->from($this->tabla);
		$this->db->where($where1);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function actividades_filtro($dataBusqueda)
	{
		$this->db->select('actividades.id_actividad,
							cuentas.nombre AS nCuenta,
							actividades.nombre AS actividad,
							actividades.monto,
							actividades.fecha,
							actividades.comentario,
							tipo_clasificacion.clasificacion,
							siglas.sigla,
							grupos.nombre as nGrupo');
		$this->db->from($this->tabla);
		$this->db->join("cuentas ", " actividades.id_cuenta = cuentas.id_cuenta");
		$this->db->join("siglas ", " actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos ", " siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion ", " grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->where($dataBusqueda);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function actividades_filtro_all($dataBusqueda)
	{
		$this->db->select('actividades.id_actividad,
							cuentas.nombre AS nCuenta,
							actividades.nombre AS actividad,
							actividades.monto,
							actividades.fecha,
							actividades.comentario,
							tipo_clasificacion.clasificacion,
							siglas.sigla,
							grupos.nombre as nGrupo');
		$this->db->from($this->tabla);
		$this->db->join("cuentas ", " actividades.id_cuenta = cuentas.id_cuenta");
		$this->db->join("siglas ", " actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos ", " siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion ", " grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->where($dataBusqueda);
		$consulta = $this->db->get();
		return $consulta->result();
	}


}
