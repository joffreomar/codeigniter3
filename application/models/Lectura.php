<?php
class Lectura extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  //funcion para insertar
  public function insertar($datos)
  {
    $this->db->insert("lectura", $datos);
    return $this->db->insert_id();
  }
  //funcion para actualizar
  public function actualizar($id_lectura, $datos)
  {
    $this->db->where("id_lectura", $id_lectura);
    return $this->db->update("lectura", $datos);
  }
  //funcion para sacar el detalle de un lectura
  public function consultarPorId($id_lectura)
  {
    $this->db->where("id_lectura", $id_lectura);
    $this->db->join('cuenta', 'cuenta.id_cuenta=lectura.fk_id_cuenta');
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $lectura = $this->db->get("lectura");
    if ($lectura->num_rows() > 0) {
      return $lectura->row(); //cuando SI hay lecturas
    } else {
      return false; //cuando NO hay lecturas
    }
  }
  //funcion para consultar todos lo lecturas
  public function consultarTodos()
  {
    $this->db->join('cuenta', 'cuenta.id_cuenta=lectura.fk_id_cuenta');
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $listadoLecturas = $this->db->get("lectura");
    if ($listadoLecturas->num_rows() > 0) {
      return $listadoLecturas; //cuando SI hay lecturas
    } else {
      return false; //cuando NO hay lecturas
    }
  }


  public function consultarUltimaLectura()
  {
    $this->db->order_by("lectura_actual_lectura", "asc");
    $this->db->join('cuenta', 'cuenta.id_cuenta=lectura.fk_id_cuenta');
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $listadoLecturas = $this->db->get("lectura");
    if ($listadoLecturas->num_rows() > 0) {
      return $listadoLecturas->row(); //cuando SI hay lecturas
    } else {
      return false; //cuando NO hay lecturas
    }
  }
  public function consultarUltimaLecturaCuenta($id_cuenta)
  {
    $this->db->order_by("lectura_actual_lectura", "asc");
    $this->db->join('cuenta', 'cuenta.id_cuenta=lectura.fk_id_cuenta');
    $this->db->join('tpcuenta', 'cuenta.fk_id_tpcuenta=tpcuenta.id_tpcuenta');
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $this->db->where("lectura.fk_id_cuenta", $id_cuenta);
    $listadoLecturas = $this->db->get("lectura");
    if ($listadoLecturas->num_rows() > 0) {
      return $listadoLecturas->row(); //cuando SI hay lecturas
    } else {
      return null; //cuando NO hay lecturas
    }
  }

  public function eliminar($id_lectura)
  {
    $this->db->where("id_lectura", $id_lectura);
    return $this->db->delete("lectura");
  }

  public function obtenerPorId($id_lectura)
  {
    $this->db->where('id_lectura', $id_lectura);
    $query = $this->db->get('lectura');
    if ($query->num_rows() > 0) {
      // code...
      return $query->row();
    } else {
      return false;
    }
  }

  public function obtenerLecturasPorEstado($estado)
  {
    $this->db->where("estado_lectura", $estado);
    $lecturas = $this->db->get("lectura");
    if ($lecturas->num_rows() > 0) {
      return $lecturas;
    } else {
      return false;
    }
  }
}//cierre de la clase
