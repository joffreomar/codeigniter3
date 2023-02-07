<?php
      class Informaciones extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("informacion");
        }

        public function index(){
          $data["listadoInformaciones"]=$this->informacion->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("informaciones/index",$data);
          $this->load->view("administrador/footer");
        }
        public function listado(){
          $data["listadoInformaciones"]=$this->informacion->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("informaciones/listado",$data);
          $this->load->view("publica/footer");
        }
        public function nuevo(){
          $data["listadoInformaciones"]=$this->informacion->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("informaciones/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_informacion){
          $data["informacion"]=$this->informacion->consultarPorId($id_informacion);
          $this->load->view("administrador/header");
          $this->load->view("informaciones/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_informacion=$this->input->post("id_informacion");
            $datosInformacionEditado=array(
                "nombre_informacion"=>$this->input->post("nombre_informacion"),
                "direccion_informacion"=>$this->input->post("direccion_informacion"),
                "telefono_informacion"=>$this->input->post("telefono_informacion"),
                "convencional_informacion"=>$this->input->post("convencional_informacion"),
                "correo_informacion"=>$this->input->post("correo_informacion"),
                "fecha_ingreso_informacion"=>$this->input->post("fecha_ingreso_informacion"),
                "fecha_actualizacion_informacion"=>$this->input->post("fecha_actualizacion_informacion")
            );
            if($this->informacion->actualizar($id_informacion,$datosInformacionEditado)){
                //echo "INSERCION EXITOSA";
                redirect("informaciones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarInformacion(){
            $datosNuevoInformacion=array(
              "nombre_informacion"=>$this->input->post("nombre_informacion"),
              "direccion_informacion"=>$this->input->post("direccion_informacion"),
              "telefono_informacion"=>$this->input->post("telefono_informacion"),
              "convencional_informacion"=>$this->input->post("convencional_informacion"),
              "correo_informacion"=>$this->input->post("correo_informacion"),
              "fecha_ingreso_informacion"=>$this->input->post("fecha_ingreso_informacion"),
              "fecha_actualizacion_informacion"=>$this->input->post("fecha_actualizacion_informacion")
            );
            if($this->informacion->insertar($datosNuevoInformacion)){
                $this->session->set_flashdata("confirmacion","Informacion insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("informaciones/index");
        }

        public function procesarEliminacion($id_informacion){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->informacion->eliminar($id_informacion)){
                redirect("informaciones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
