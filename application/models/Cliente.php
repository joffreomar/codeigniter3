<?php
class Cliente extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  //funcion para insertar
  public function insertar($datos)
  {
    return $this->db->insert("cliente", $datos);
  }
  //funcion para insertar carga masiva
  public function insertarCargaMasiva($datos)
  {
    $this->db->insert("cliente", $datos);
    return $this->db->insert_id();
  }

  //funcion para actualizar
  public function actualizar($id_cliente, $datos)
  {
    $this->db->where("id_cliente", $id_cliente);
    return $this->db->update("cliente", $datos);
  }
  //funcion para sacar el detalle de un cliente
  public function consultarPorId($id_cliente)
  {
    $this->db->where("id_cliente", $id_cliente);
    $cliente = $this->db->get("cliente");
    if ($cliente->num_rows() > 0) {
      return $cliente->row(); //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  //Consultar cliente repetido
  public function consultarClienteRepetido($cedula_cliente)
  {
    $this->db->where("cedula_cliente", $cedula_cliente);
    $cliente = $this->db->get("cliente");
    if ($cliente->num_rows() > 0) {
      return true; //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  //funcion para consultar todos lo clientes
  public function consultarTodos()
  {

    $listadoClientes = $this->db->get("cliente");
    if ($listadoClientes->num_rows() > 0) {
      return $listadoClientes; //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  public function consultarTodosConCuentas($estado_cliente = "")
  {
    $this->db->join("cuenta", "cliente.id_cliente=cuenta.fk_id_cliente","LEFT");
    if($estado_cliente != "todos"){
      $this->db->where("estado_cliente", $estado_cliente);
    }
    $listadoClientes = $this->db->get("cliente");
    
    if ($listadoClientes->num_rows() > 0) {
      return $listadoClientes->result(); //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }

  public function eliminar($id_cliente)
  {
    $this->db->where("id_cliente", $id_cliente);
    return $this->db->delete("cliente");
  }

  public function obtenerClientesPorEstado($estado)
  {
    $this->db->where("estado_cliente", $estado);
    $clientes = $this->db->get("cliente");
    if ($clientes->num_rows() > 0) {
      return $clientes;
    } else {
      return false;
    }
  }
}//cierre de la clase



   //
