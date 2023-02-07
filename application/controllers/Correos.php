<?php
      class Correos extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("correo");
        }

        public function index(){
          $data["listadoCorreos"]=$this->correo->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("correos/index",$data);
          $this->load->view("administrador/footer");
        }
        public function listado(){
          $data["listadoCorreos"]=$this->correo->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("correos/listado",$data);
          $this->load->view("publica/footer");
        }
        public function enviarEmail(){
          $data["listadoCorreos"]=$this->correo->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("correos/enviarEmail",$data);
          $this->load->view("administrador/footer");
        }
        public function nuevo(){
          $data["listadoCorreos"]=$this->correo->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("correos/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_correo){
          $data["correo"]=$this->correo->consultarPorId($id_correo);
          $this->load->view("administrador/header");
          $this->load->view("correos/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_correo=$this->input->post("id_correo");
            $datosCorreoEditado=array(
                "cliente_correo"=>$this->input->post("cliente_correo"),
                "correo_correo"=>$this->input->post("correo_correo"),
                "notificacion_correo"=>$this->input->post("notificacion_correo")
            );
            if($this->correo->actualizar($id_correo,$datosCorreoEditado)){
                //echo "INSERCION EXITOSA";
                redirect("correos/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarCorreo(){
            $datosNuevoCorreo=array(
              "cliente_correo"=>$this->input->post("cliente_correo"),
              "correo_correo"=>$this->input->post("correo_correo"),
              "notificacion_correo"=>$this->input->post("notificacion_correo")
            );
            if($this->correo->insertar($datosNuevoCorreo)){
                $this->session->set_flashdata("confirmacion","Correo insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("correos/index");
        }

        public function procesarEliminacion($id_correo){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->correo->eliminar($id_correo)){
                redirect("correos/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
