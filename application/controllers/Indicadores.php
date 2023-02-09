<?php
class Indicadores extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //MODELO CLIENTE
    $this->load->model("cliente");
    $this->load->model("usuario");

    //validando si alguien esta conectado
    if ($this->session->userdata('c0nectadoUTC')) {
      //SI ESTA CONECTADO
      // code...
    } else {
      redirect('seguridades/formularioLogin');
    }
  }

  public function index()
  {
    $this->load->view("administrador/header");
    $this->load->view("indicadores/index");
    $this->load->view("administrador/footer");
  }
  public function perfil()
  {
    $data["listadoUsuarios"] = $this->usuario->consultarTodos();
    $this->load->view("administrador/header");
    $this->load->view("indicadores/perfil", $data);
    $this->load->view("administrador/footer");
  }
  public function usuarios()
  {
    $var['usuarios_activos'] = $this->usuario->obtenerUsuariosPorEstadoModal("1");
    $var['usuarios_inactivos'] = $this->usuario->obtenerUsuariosPorEstadoModal("0");
    $this->load->view("indicadores/usuarios", $var);
  }
}//cierre de la clase
