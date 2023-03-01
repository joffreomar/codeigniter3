<?php
class Clientes extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("cliente");
    $this->load->model("cuenta");
    $this->load->library('Simplexlsx1');
    $this->load->helper('url');
    //validando si alguien esta conectado
    if ($this->session->userdata("c0nectadoUTC")) {
      // si esta conectado
    } else {
      redirect("seguridades/formularioLogin");
    }
  }

  public function index()
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("clientes/index", $data);
    $this->load->view("administrador/footer");
  }
  public function nuevo()
  {
    $data["listadoClientes"] = $this->cliente->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("clientes/nuevo", $data);
    $this->load->view("administrador/footer");
  }

  public function editar($id_cliente)
  {
    $data["cliente"] = $this->cliente->consultarPorId($id_cliente);
    $this->load->view("administrador/header");
    $this->load->view("clientes/editar", $data);
    $this->load->view("administrador/footer");
  }

  public function procesarActualizacion()
  {
    $id_cliente = $this->input->post("id_cliente");
    $datosClienteEditado = array(
      "nombre_cliente" => $this->input->post("nombre_cliente"),
      "apellido_cliente" => $this->input->post("apellido_cliente"),
      "cedula_cliente" => $this->input->post("cedula_cliente"),
      "telefono_cliente" => $this->input->post("telefono_cliente"),
      "correo_cliente" => $this->input->post("correo_cliente"),
      "estado_cliente" => $this->input->post("estado_cliente"),
      "fecha_ingreso_cliente" => $this->input->post("fecha_ingreso_cliente"),
      "fecha_actualizacion_cliente" => $this->input->post("fecha_actualizacion_cliente")
    );
    if ($this->cliente->actualizar($id_cliente, $datosClienteEditado)) {
      //echo "INSERCION EXITOSA";
      redirect("clientes/index");
    } else {
      $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
    }
  }

  public function guardarCliente()
  {
    $datosNuevoCliente = array(
      "nombre_cliente" => $this->input->post("nombre_cliente"),
      "apellido_cliente" => $this->input->post("apellido_cliente"),
      "cedula_cliente" => $this->input->post("cedula_cliente"),
      "telefono_cliente" => $this->input->post("telefono_cliente"),
      "correo_cliente" => $this->input->post("correo_cliente"),
      "estado_cliente" => $this->input->post("estado_cliente"),
      "fecha_ingreso_cliente" => $this->input->post("fecha_ingreso_cliente"),
      "fecha_actualizacion_cliente" => $this->input->post("fecha_actualizacion_cliente")
    );
    if ($this->cliente->insertar($datosNuevoCliente)) {
      $this->session->set_flashdata("confirmacion", "Cliente insertado exitosamente.");
    } else {
      $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
    }
    redirect("clientes/index");
  }

  public function procesarEliminacion($id_cliente)
  {
    if ($this->session->userdata("c0nectadoUTC")->tipo_usuario == "ADMINISTRADOR") {
      if ($this->cliente->eliminar($id_cliente)) {
        redirect("clientes/index");
      } else {
        $this->session->set_flashdata('error', 'Error al procesar, intente nuevamente');
      }
    } else {
      redirect("seguridades/formularioLogin");
    }
  }
  public function cargaMasiva()
  {
    try {
      if (!empty($_FILES['matriz_clientes']['tmp_name'])) {
        $archivo = $this->simplexlsx1->generate($_FILES['matriz_clientes']['tmp_name']);
        $contador = 0;
        foreach ($archivo->rows() as $fields) {
          if (!empty(trim($fields[0])) && !empty(trim($fields[2])) && !$this->cliente->consultarClienteRepetido($fields[2])) {
            $data_cliente['cedula_cliente'] = '';
            $data_cliente['nombre_cliente'] = '';
            $data_cliente['apellido_cliente'] = '';
            $data_cliente['estado_cliente'] = 'ACTIVO';
            $data_cliente['fecha_ingreso_cliente'] = date("Y-m-d");
            $data_cuenta['numero_cuenta'] = trim($fields[1]);
            $data_cuenta['direccion_primaria_cuenta'] = '';
            $data_cuenta['direccion_secundaria_cuenta'] = '';
            $data_cuenta['estado_cuenta'] = "ACTIVA";
            $data_cuenta['fk_id_cliente'] = '';
            $data_cuenta['fk_id_tpcuenta'] = 1;
            $data_cuenta['fk_id_sector'] = 1;
            if ($contador >= 1) {
              $bandera = false;
              if (!empty($fields[2])) {
                $bandera = $this->cuenta->consultarCuentaRepetida($fields[2]);
                $bandera = $this->cuenta->consultarMedidorRepetido($fields[7]);
              }
              //si $bandera es falso significa que no encontró clientes repetidos, entonces guarda el cliente
              if (!$bandera) {
                $data_cliente['cedula_cliente'] = trim($fields[2]);
                $data_cliente['telefono_cliente'] = trim($fields[3]);
                $data_cliente['correo_cliente'] = trim($fields[4]);
                $data_cliente['nombre_cliente'] = trim($fields[5]);
                $data_cliente['apellido_cliente'] = trim($fields[6]);
                $id = $this->cliente->insertarCargaMasiva($data_cliente);
                $data_cuenta['numero_cuenta'] = trim($fields[1]);
                $data_cuenta['numero_medidor_cuenta'] = trim($fields[9]);
                $data_cuenta['direccion_primaria_cuenta'] = trim($fields[7]);
                $data_cuenta['direccion_secundaria_cuenta'] = trim($fields[8]);
                $data_cuenta['estado_cuenta'] = "ACTIVA";
                $data_cuenta['fk_id_cliente'] = $id;
                $data_cuenta['fk_id_tpcuenta'] = trim($fields[10]);
                $data_cuenta['fk_id_sector'] = trim($fields[11]);
                $this->cuenta->insertar($data_cuenta);
              }
            }
            $contador++;
          }
        }
        echo "Datos Guardados";
      }
    } catch (Exception $e) {
      echo "Error al guardar los datos";
    }
  }
}//cierre de la clase
