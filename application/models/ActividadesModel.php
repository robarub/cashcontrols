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

	public function get_by_id($idActividad)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("id_actividad", $idActividad);
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
	public function edit($id, $dataUpdate)
	{
		$this->db->set($dataUpdate);
		$this->db->where('id_actividad', $id);
		$this->db->update($this->tabla);
		return 1;
	}

	public function get_by_ai($idActividad)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("ai", $idActividad);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function get_by_ae($idActividad)
	{
		$this->db->select('*');
		$this->db->from($this->tabla);
		$this->db->where("ae", $idActividad);
		$consulta = $this->db->get();
		return $consulta->result();
	}


	public function get_by_status($status, $mes){
		$where1 = "`status` = $status AND ai IS NULL AND ae IS NULL AND MONTH(fecha)=$mes AND YEAR(fecha) = 2020";
		$this->db->select('COUNT(*) as tnot');
		$this->db->from($this->tabla);
		$this->db->where($where1);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function edit_ae($id, $dataUpdate)
	{
		$this->db->set($dataUpdate);
		$this->db->where('ae', $id);
		$this->db->update($this->tabla);
		return 1;
	}
	public function edit_ai($id, $dataUpdate)
	{
		$this->db->set($dataUpdate);
		$this->db->where('ai', $id);
		$this->db->update($this->tabla);
		return 1;
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
							actividades.ae,
							actividades.ai,
							actividades.status,
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
							actividades.ae,
							actividades.ai,
							actividades.status,
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

	public function graficaingresosegresos1($fecha){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("actividades.fecha", $fecha);
		$consulta = $this->db->get();
		return $consulta->result();

	}

	public function graficaingresosegresos2($fechaIni, $fechaFin){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("actividades.fecha >=", $fechaIni);
		$this->db->where("actividades.fecha <=", $fechaFin);

		$consulta = $this->db->get();
		return $consulta->result();

	}

	public function graficaingresosegresos3($dataBusqueda){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where($dataBusqueda);
		$consulta = $this->db->get();
		return $consulta->result();
	}



	public function graficaclasificacion1($fecha){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento,
								tipo_clasificacion.id_clasificacion as clasificacion
');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("actividades.fecha", $fecha);
		$consulta = $this->db->get();
		return $consulta->result();

	}

	public function graficaclasificacion2($fechaIni, $fechaFin){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento,
								tipo_clasificacion.id_clasificacion as clasificacion
');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where("actividades.fecha >=", $fechaIni);
		$this->db->where("actividades.fecha <=", $fechaFin);

		$consulta = $this->db->get();
		return $consulta->result();

	}

	public function graficaclasificacion3($dataBusqueda){
		$this->db->select('actividades.id_actividad,
							actividades.nombre,
							actividades.fecha,
							actividades.monto,
							tipo_movimiento.id_movimiento,
							tipo_movimiento.movimiento,
								tipo_clasificacion.id_clasificacion as clasificacion
');
		$this->db->from($this->tabla);
		$this->db->join("siglas "," actividades.id_sigla = siglas.id_sigla");
		$this->db->join("grupos "," siglas.id_grupo = grupos.id_grupo");
		$this->db->join("tipo_clasificacion "," grupos.id_tipo_clasificacion = tipo_clasificacion.id_clasificacion");
		$this->db->join("tipo_movimiento "," tipo_clasificacion.id_tipo_movimiento = tipo_movimiento.id_movimiento");
		$this->db->where($dataBusqueda);
		$consulta = $this->db->get();
		return $consulta->result();
	}






}
