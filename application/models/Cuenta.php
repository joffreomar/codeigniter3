<?php
class Cuenta extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  //funcion para insertar
  public function insertar($datos)
  {
    return $this->db->insert("cuenta", $datos);
  }
  //funcion para actualizar
  public function actualizar($id_cuenta, $datos)
  {
    $this->db->where("id_cuenta", $id_cuenta);
    return $this->db->update("cuenta", $datos);
  }
  //funcion para sacar el detalle de un cuenta
  public function consultarPorId($id_cuenta)
  {
    $this->db->where("id_cuenta", $id_cuenta);
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $this->db->join('sector', 'sector.id_sector=cuenta.fk_id_sector');
    $this->db->join('tpcuenta', 'tpcuenta.id_tpcuenta=cuenta.fk_id_tpcuenta');
    $cuenta = $this->db->get("cuenta");
    if ($cuenta->num_rows() > 0) {
      return $cuenta->row(); //cuando SI hay cuentas
    } else {
      return false; //cuando NO hay cuentas
    }
  }
  //Consultar cliente repetido
  public function consultarCuentaRepetida($numero_cuenta)
  {
    $this->db->where("numero_cuenta", $numero_cuenta);
    $cliente = $this->db->get("cuenta");
    if ($cliente->num_rows() > 0) {
      return true; //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  //Consultar medidor repetido
  public function consultarMedidorRepetido($numero_medidor_cuenta)
  {
    $this->db->where("numero_medidor_cuenta", $numero_medidor_cuenta);
    $cliente = $this->db->get("cuenta");
    if ($cliente->num_rows() > 0) {
      return true; //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  //funcion para consultar todos lo cuentas
  public function consultarTodos()
  {
    $this->db->join('cliente', 'cliente.id_cliente=cuenta.fk_id_cliente');
    $this->db->join('sector', 'sector.id_sector=cuenta.fk_id_sector');
    $this->db->join('tpcuenta', 'tpcuenta.id_tpcuenta=cuenta.fk_id_tpcuenta');
    $listadoCuentas = $this->db->get("cuenta");
    if ($listadoCuentas->num_rows() > 0) {
      return $listadoCuentas; //cuando SI hay cuentas
    } else {
      return false; //cuando NO hay cuentas
    }
  }
  public function consultarTodosConClientes($estado_cuenta = "")
  {
    $this->db->join('cliente', 'cuenta.fk_id_cliente=cliente.id_cliente', "LEFT");
    $this->db->join('sector', 'sector.id_sector=cuenta.fk_id_sector');
    $this->db->join('tpcuenta', 'tpcuenta.id_tpcuenta=cuenta.fk_id_tpcuenta');
    if ($estado_cuenta != "todos") {
      $this->db->where("cuenta.estado_cuenta", $estado_cuenta);
    }
    $listadoCuentas = $this->db->get("cuenta");

    if ($listadoCuentas->num_rows() > 0) {
      return $listadoCuentas->result(); //cuando SI hay clientes
    } else {
      return false; //cuando NO hay clientes
    }
  }
  public function eliminar($id_cuenta)
  {
    $this->db->where("id_cuenta", $id_cuenta);
    return $this->db->delete("cuenta");
  }

  public function obtenerPorId($id_cuenta)
  {
    $this->db->where('id_cuenta', $id_cuenta);
    $query = $this->db->get('cuenta');
    if ($query->num_rows() > 0) {
      // code...
      return $query->row();
    } else {
      return false;
    }
  }

  public function obtenerCuentasPorEstado($estado)
  {
    $this->db->where("estado_cuenta", $estado);
    $cuentas = $this->db->get("cuenta");
    if ($cuentas->num_rows() > 0) {
      return $cuentas;
    } else {
      return false;
    }
  }
}//cierre de la clase
