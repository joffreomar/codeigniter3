<?php
      class Contactos extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("contacto");
            $this->load->model("informacion");
        }

        public function index(){
          $data["listadoContactos"]=$this->contacto->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("contactos/index",$data);
          $this->load->view("administrador/footer");
        }
        public function listado(){
          $data["listadoContactos"]=$this->contacto->consultarTodos();
          $data["listadoInformaciones"]=$this->informacion->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("contactos/listado",$data);
          $this->load->view("publica/footer");
        }
        public function nuevo(){
          $data["listadoContactos"]=$this->contacto->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("contactos/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_contacto){
          $data["contacto"]=$this->contacto->consultarPorId($id_contacto);
          $this->load->view("administrador/header");
          $this->load->view("contactos/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_contacto=$this->input->post("id_contacto");
            $datosContactoEditado=array(
                "nombre_contacto"=>$this->input->post("nombre_contacto"),
                "apellido_contacto"=>$this->input->post("apellido_contacto"),
                "correo_contacto"=>$this->input->post("correo_contacto"),
                "telefono_contacto"=>$this->input->post("telefono_contacto"),
                "mensaje_contacto"=>$this->input->post("mensaje_contacto"),
                "estado_contacto"=>$this->input->post("estado_contacto"),
                "fecha_ingreso_contacto"=>$this->input->post("fecha_ingreso_contacto"),
                "fecha_actualizacion_contacto"=>$this->input->post("fecha_actualizacion_contacto")
            );
            if($this->contacto->actualizar($id_contacto,$datosContactoEditado)){
                //echo "INSERCION EXITOSA";
                redirect("contactos/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarContacto(){
            $datosNuevoContacto=array(
              "nombre_contacto"=>$this->input->post("nombre_contacto"),
              "apellido_contacto"=>$this->input->post("apellido_contacto"),
              "correo_contacto"=>$this->input->post("correo_contacto"),
              "telefono_contacto"=>$this->input->post("telefono_contacto"),
              "mensaje_contacto"=>$this->input->post("mensaje_contacto"),
              "estado_contacto"=>$this->input->post("estado_contacto"),
              "fecha_ingreso_contacto"=>$this->input->post("fecha_ingreso_contacto"),
              "fecha_actualizacion_contacto"=>$this->input->post("fecha_actualizacion_contacto")
            );
            if($this->contacto->insertar($datosNuevoContacto)){
                $this->session->set_flashdata("confirmacion","Contacto insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("contactos/listado");
        }

        public function procesarEliminacion($id_contacto){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->contacto->eliminar($id_contacto)){
                redirect("contactos/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
