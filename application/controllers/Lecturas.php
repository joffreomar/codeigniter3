<?php
class Lecturas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("lectura");
    $this->load->model("cuenta");
    $this->load->model("usuario");
    $this->load->model("sector");
    $this->load->model("cliente");
    //validando si alguien esta conectado

    if ($this->session->userdata("c0nectadoUTC")) {
      // si esta conectado
    } else {
      redirect("seguridades/formularioLogin");
    }
  }

  public function index()
  {
    $data["listadoLecturas"] = $this->lectura->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("lecturas/index", $data);
    $this->load->view("administrador/footer");
  }

  public function listado()
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoCuentas"] = $this->cuenta->consultarTodos();
    $data["listadoUsuarios"] = $this->usuario->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("lecturas/listado", $data);
    $this->load->view("administrador/footer");
  }

  public function descripcion()
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoCuentas"] = $this->cuenta->consultarTodos();
    $data["listadoUsuarios"] = $this->usuario->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("lecturas/descripcion", $data);
    $this->load->view("administrador/footer");
  }

  public function nuevo()
  {
    $data["ultimaLectura"] = $this->lectura->consultarUltimaLectura();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoCuentas"] = $this->cuenta->consultarTodos();
    $data["listadoUsuarios"] = $this->usuario->consultarTodos();
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("lecturas/nuevo", $data);
    $this->load->view("administrador/footer");
  }

  public function editar($id_lectura)
  {
    $data["ultimaLectura"] = $this->lectura->consultarUltimaLectura();
    $data["listadoSectores"] = $this->sector->consultarTodos();
    $data["listadoCuentas"] = $this->cuenta->consultarTodos();
    $data["listadoUsuarios"] = $this->usuario->consultarTodos();
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $data["lectura"] = $this->lectura->consultarPorId($id_lectura);
    $this->load->view("administrador/header");
    $this->load->view("lecturas/editar", $data);
    $this->load->view("administrador/footer");
  }


  public function procesarActualizacion()
  {
    $id_lectura = $this->input->post("id_lectura");
    $datosLecturaEditado = array(
      "fecha_lectura" => $this->input->post("fecha_lectura"),
      "lectura_actual_lectura" => $this->input->post("lectura_actual_lectura"),
      "lectura_anterior_lectura" => $this->input->post("lectura_anterior_lectura"),
      "consumo_lectura" => $this->input->post("consumo_lectura"),
      "pago_lectura" => $this->input->post("pago_lectura"),
      "observacion_lectura" => $this->input->post("observacion_lectura"),
      "estado_lectura" => $this->input->post("estado_lectura"),
      "fecha_actualizacion_lectura" => $this->input->post("fecha_actualizacion_lectura"),
      "encargado_lectura" => $this->input->post("encargado_lectura"),
      "fk_id_cuenta" => $this->input->post("fk_id_cuenta")
    );
    if ($this->lectura->actualizar($id_lectura, $datosLecturaEditado)) {
      //echo "INSERCION EXITOSA";
      redirect("lecturas/index");
    } else {
      $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
    }
  }

  public function guardarLectura()
  {
    $datosNuevoLectura = array(
      "fecha_lectura" => $this->input->post("fecha_lectura"),
      "lectura_actual_lectura" => $this->input->post("lectura_actual_lectura"),
      "lectura_anterior_lectura" => $this->input->post("lectura_anterior_lectura"),
      "consumo_lectura" => $this->input->post("consumo_lectura"),
      "pago_lectura" => $this->input->post("pago_lectura"),
      "observacion_lectura" => $this->input->post("observacion_lectura"),
      "estado_lectura" => $this->input->post("estado_lectura"),
      "fecha_actualizacion_lectura" => $this->input->post("fecha_actualizacion_lectura"),
      "encargado_lectura" => $this->input->post("encargado_lectura"),
      "fk_id_cuenta" => $this->input->post("fk_id_cuenta")
    );
    if ($this->lectura->insertar($datosNuevoLectura)) {
      $this->session->set_flashdata("confirmacion", "Lectura insertado exitosamente.");
    } else {
      $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
    }
    redirect("lecturas/index");
  }

  public function procesarEliminacion($id_lectura)
  {
    if ($this->session->userdata("c0nectadoUTC")->tipo_usuario == "ADMINISTRADOR") {
      if ($this->lectura->eliminar($id_lectura)) {
        redirect("lecturas/index");
      } else {
        $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
      }
    } else {
      redirect("seguridades/formularioLogin");
    }
  }
  public function ultimaLecturaCuenta($id)
  {
    $data = $this->lectura->consultarUltimaLecturaCuenta($id);
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
  }
}//cierre de la clase
