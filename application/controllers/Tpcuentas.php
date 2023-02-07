<?php
      class Tpcuentas extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("tpcuenta");
            //validando si alguien esta conectado

            if ($this->session->userdata("c0nectadoUTC")) {
              // si esta conectado
            } else {
              redirect("seguridades/formularioLogin");
            }

        }

        public function index(){
          $data["listadoTpcuentas"]=$this->tpcuenta->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("tpcuentas/index",$data);
          $this->load->view("administrador/footer");
        }
        public function nuevo(){
          $data["listadoTpcuentas"]=$this->tpcuenta->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("tpcuentas/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_tpcuenta){
          $data["tpcuenta"]=$this->tpcuenta->consultarPorId($id_tpcuenta);
          $this->load->view("administrador/header");
          $this->load->view("tpcuentas/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_tpcuenta=$this->input->post("id_tpcuenta");
            $datosTpcuentaEditado=array(
                "nombre_tpcuenta"=>$this->input->post("nombre_tpcuenta"),
                "precio_consumo_tpcuenta"=>$this->input->post("precio_consumo_tpcuenta"),
                "fecha_ingreso_tpcuenta"=>$this->input->post("fecha_ingreso_tpcuenta"),
                "fecha_actualizacion_tpcuenta"=>$this->input->post("fecha_actualizacion_tpcuenta")
            );
            if($this->tpcuenta->actualizar($id_tpcuenta,$datosTpcuentaEditado)){
                //echo "INSERCION EXITOSA";
                redirect("tpcuentas/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarTpcuenta(){
            $datosNuevoTpcuenta=array(
              "nombre_tpcuenta"=>$this->input->post("nombre_tpcuenta"),
              "precio_consumo_tpcuenta"=>$this->input->post("precio_consumo_tpcuenta"),
              "fecha_ingreso_tpcuenta"=>$this->input->post("fecha_ingreso_tpcuenta"),
              "fecha_actualizacion_tpcuenta"=>$this->input->post("fecha_actualizacion_tpcuenta")
            );
            if($this->tpcuenta->insertar($datosNuevoTpcuenta)){
                $this->session->set_flashdata("confirmacion", "Tipo de cuenta insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("tpcuentas/index");
        }

        public function procesarEliminacion($id_tpcuenta){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->tpcuenta->eliminar($id_tpcuenta)){
                redirect("tpcuentas/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
