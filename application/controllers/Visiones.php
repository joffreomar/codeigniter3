<?php
      class Visiones extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("vision");
        }

        public function index(){
          $data["listadoVisiones"]=$this->vision->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("visiones/index",$data);
          $this->load->view("administrador/footer");
        }

        public function nuevo(){
          $data["listadoVisiones"]=$this->vision->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("visiones/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_vision){
          $data["vision"]=$this->vision->consultarPorId($id_vision);
          $this->load->view("administrador/header");
          $this->load->view("visiones/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_vision=$this->input->post("id_vision");
            $datosVisionEditado=array(
                "nombre_vision"=>$this->input->post("nombre_vision"),
                "descripcion_vision"=>$this->input->post("descripcion_vision"),
                "fecha_ingreso_vision"=>$this->input->post("fecha_ingreso_vision"),
                "fecha_actualizacion_vision"=>$this->input->post("fecha_actualizacion_vision")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_vision_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/visiones/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_vision')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->vision->obtenerPorId($id_vision);
            unlink(APPPATH.'../uploads/visiones/'.$query->foto_vision);


            $dataSubida=$this->upload->data();
            $datosVisionEditado['foto_vision']=$dataSubida['file_name'];

            }
            if($this->vision->actualizar($id_vision,$datosVisionEditado)){
                //echo "INSERCION EXITOSA";
                redirect("visiones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarVision(){
            $datosNuevoVision=array(
              "nombre_vision"=>$this->input->post("nombre_vision"),
              "descripcion_vision"=>$this->input->post("descripcion_vision"),
              "fecha_ingreso_vision"=>$this->input->post("fecha_ingreso_vision"),
              "fecha_actualizacion_vision"=>$this->input->post("fecha_actualizacion_vision")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_vision_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/visiones/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_vision')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoVision['foto_vision']=$dataSubida['file_name'];

            }
            if($this->vision->insertar($datosNuevoVision)){
                $this->session->set_flashdata("confirmacion","Visiones insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("visiones/index");
        }

        public function procesarEliminacion($id_vision){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->vision->eliminar($id_vision)){
                redirect("visiones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
