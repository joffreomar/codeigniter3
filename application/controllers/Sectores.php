<?php
      class Sectores extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("sector");
            //validando si alguien esta conectado

            if ($this->session->userdata("c0nectadoUTC")) {
              // si esta conectado
            } else {
              redirect("seguridades/formularioLogin");
            }

        }

        public function index(){
          $data["listadoSectores"]=$this->sector->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("sectores/index",$data);
          $this->load->view("administrador/footer");
        }
        public function nuevo(){
          $data["listadoSectores"]=$this->sector->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("sectores/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_sector){
          $data["sector"]=$this->sector->consultarPorId($id_sector);
          $this->load->view("administrador/header");
          $this->load->view("sectores/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_sector=$this->input->post("id_sector");
            $datosSectorEditado=array(
                "nombre_sector"=>$this->input->post("nombre_sector"),
                "descripcion_sector"=>$this->input->post("descripcion_sector"),
                "fecha_ingreso_sector"=>$this->input->post("fecha_ingreso_sector"),
                "fecha_actualizacion_sector"=>$this->input->post("fecha_actualizacion_sector")
            );
            if($this->sector->actualizar($id_sector,$datosSectorEditado)){
                //echo "INSERCION EXITOSA";
                redirect("sectores/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarSector(){
            $datosNuevoSector=array(
              "nombre_sector"=>$this->input->post("nombre_sector"),
              "descripcion_sector"=>$this->input->post("descripcion_sector"),
              "fecha_ingreso_sector"=>$this->input->post("fecha_ingreso_sector"),
              "fecha_actualizacion_sector"=>$this->input->post("fecha_actualizacion_sector")
            );
            if($this->sector->insertar($datosNuevoSector)){
                $this->session->set_flashdata("confirmacion", "Sector insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("sectores/index");
        }

        public function procesarEliminacion($id_sector){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->sector->eliminar($id_sector)){
                redirect("sectores/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
