<?php
class Cuentas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("cuenta");
    $this->load->model("cliente");
    $this->load->model("sector");
    $this->load->model("tpcuenta");
    //validando si alguien esta conectado

    if ($this->session->userdata("c0nectadoUTC")) {
      // si esta conectado
    } else {
      redirect("seguridades/formularioLogin");
    }
  }

  public function index()
  {
    $data["listadoCuentas"] = $this->cuenta->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("cuentas/index", $data);
    $this->load->view("administrador/footer");
  }
  public function nuevo()
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoTpcuentas"] = $this->tpcuenta->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("cuentas/nuevo", $data);
    $this->load->view("administrador/footer");
  }

  public function editar($id_cuenta)
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoTpcuentas"] = $this->tpcuenta->consultarTodos();
    $data["cuenta"] = $this->cuenta->consultarPorId($id_cuenta);
    $this->load->view("administrador/header");
    $this->load->view("cuentas/editar", $data);
    $this->load->view("administrador/footer");
  }

  public function procesarActualizacion()
  {
    $id_cuenta = $this->input->post("id_cuenta");
    $datosCuentaEditado = array(
      "numero_cuenta" => $this->input->post("numero_cuenta"),
      "numero_medidor_cuenta" => $this->input->post("numero_medidor_cuenta"),
      "direccion_primaria_cuenta" => $this->input->post("direccion_primaria_cuenta"),
      "direccion_secundaria_cuenta" => $this->input->post("direccion_secundaria_cuenta"),
      "fecha_ingreso_cuenta" => $this->input->post("fecha_ingreso_cuenta"),
      "fecha_actualizacion_cuenta" => $this->input->post("fecha_actualizacion_cuenta"),
      "estado_cuenta" => $this->input->post("estado_cuenta"),
      "fk_id_cliente" => $this->input->post("fk_id_cliente"),
      "fk_id_sector" => $this->input->post("fk_id_sector"),
      "fk_id_tpcuenta" => $this->input->post("fk_id_tpcuenta")
    );
    if ($this->cuenta->actualizar($id_cuenta, $datosCuentaEditado)) {
      //echo "INSERCION EXITOSA";
      redirect("cuentas/index");
    } else {
      $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
    }
  }

  public function guardarCuenta()
  {
    $datosNuevoCuenta = array(
      "numero_cuenta" => $this->input->post("numero_cuenta"),
      "numero_medidor_cuenta" => $this->input->post("numero_medidor_cuenta"),
      "direccion_primaria_cuenta" => $this->input->post("direccion_primaria_cuenta"),
      "direccion_secundaria_cuenta" => $this->input->post("direccion_secundaria_cuenta"),
      "fecha_ingreso_cuenta" => $this->input->post("fecha_ingreso_cuenta"),
      "fecha_actualizacion_cuenta" => $this->input->post("fecha_actualizacion_cuenta"),
      "estado_cuenta" => $this->input->post("estado_cuenta"),
      "fk_id_cliente" => $this->input->post("fk_id_cliente"),
      "fk_id_sector" => $this->input->post("fk_id_sector"),
      "fk_id_tpcuenta" => $this->input->post("fk_id_tpcuenta")
    );
    if ($this->cuenta->insertar($datosNuevoCuenta)) {
      $this->session->set_flashdata("confirmacion", "Cuenta insertado exitosamente.");
    } else {
      $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
    }
    redirect("cuentas/index");
  }

  public function procesarEliminacion($id_cuenta)
  {
    if ($this->session->userdata("c0nectadoUTC")->tipo_usuario == "ADMINISTRADOR") {
      if ($this->cuenta->eliminar($id_cuenta)) {
        redirect("cuentas/index");
      } else {
        $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
      }
    } else {
      redirect("seguridades/formularioLogin");
    }
  }
  public function verificarnumeromedidor()
  {
    $data = $this->cuenta->consultarMedidorRepetido($_POST['numero_medidor_cuenta']);
    $data = !$data;
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }
  public function verificarnumerocuenta()
  {
    $data = $this->cuenta->consultarCuentaRepetida($_POST['numero_cuenta']);
    $data = !$data;
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }
}//cierre de la clase
