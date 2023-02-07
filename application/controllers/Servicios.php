<?php
      class Servicios extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("servicio");
            //validando si alguien esta conectado
        }

        public function index(){
          $data["listadoServicios"]=$this->servicio->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("servicios/index",$data);
          $this->load->view("administrador/footer");
        }

        public function listado(){
          $data["listadoServicios"]=$this->servicio->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("servicios/listado",$data);
          $this->load->view("publica/footer");
        }

        public function nuevo(){
          $data["listadoServicios"]=$this->servicio->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("servicios/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_servicio){
          $data["servicio"]=$this->servicio->consultarPorId($id_servicio);
          $this->load->view("administrador/header");
          $this->load->view("servicios/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_servicios=$this->input->post("id_servicios");
            $datosServicioEditado=array(
                "nombre_servicio"=>$this->input->post("nombre_servicio"),
                "descripcion_servicio"=>$this->input->post("descripcion_servicio"),
                "fecha_ingreso_servicio"=>$this->input->post("fecha_ingreso_servicio"),
                "fecha_actualizacion_servicio"=>$this->input->post("fecha_actualizacion_servicio")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_servicio_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/servicios/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_servicio')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->servicio->obtenerPorId($id_servicio);
            unlink(APPPATH.'../uploads/servicios/'.$query->foto_servicio);


            $dataSubida=$this->upload->data();
            $datosServicioEditado['foto_servicio']=$dataSubida['file_name'];

            }
            if($this->servicio->actualizar($id_servicio,$datosServicioEditado)){
                //echo "INSERCION EXITOSA";
                redirect("servicios/index");
            }else{
                echo "ERROR AL ACTUALIZAR";
            }
        }

        public function guardarServicio(){
            $datosNuevoServicio=array(
              "nombre_servicio"=>$this->input->post("nombre_servicio"),
              "descripcion_servicio"=>$this->input->post("descripcion_servicio"),
              "fecha_ingreso_servicio"=>$this->input->post("fecha_ingreso_servicio"),
              "fecha_actualizacion_servicio"=>$this->input->post("fecha_actualizacion_servicio")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_servicio_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/servicios/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_servicio')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoServicio['foto_servicio']=$dataSubida['file_name'];

            }
            if($this->servicio->insertar($datosNuevoServicio)){
                $this->session->set_flashdata("confirmacion",
                 "Servicio insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error",
               "Error al procesar, intente nuevamente.");
            }
            redirect("servicios/index");
        }

        public function procesarEliminacion($id_servicio){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->servicio->eliminar($id_servicio)){
                redirect("servicios/index");
            }else{
                echo "ERROR AL ELIMINAR";
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
