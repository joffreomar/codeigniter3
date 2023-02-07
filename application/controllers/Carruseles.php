<?php
      class Carruseles extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("carrusel");
        }

        public function index(){
          $data["listadoCarruseles"]=$this->carrusel->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("carruseles/index",$data);
          $this->load->view("administrador/footer");
        }
        public function nuevo(){
          $data["listadoCarruseles"]=$this->carrusel->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("carruseles/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_carrusel){
          $data["carrusel"]=$this->carrusel->consultarPorId($id_carrusel);
          $this->load->view("administrador/header");
          $this->load->view("carruseles/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_carrusel=$this->input->post("id_carrusel");
            $datosCarruselEditado=array(
                "descripcion_carrusel"=>$this->input->post("descripcion_carrusel"),
                "fecha_ingreso_carrusel"=>$this->input->post("fecha_ingreso_carrusel"),
                "fecha_actualizacion_carrusel"=>$this->input->post("fecha_actualizacion_carrusel")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_carrusel_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/carruseles/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_carrusel')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->carrusel->obtenerPorId($id_carrusel);
            unlink(APPPATH.'../uploads/carruseles/'.$query->foto_carrusel);


            $dataSubida=$this->upload->data();
            $datosCarruselEditado['foto_carrusel']=$dataSubida['file_name'];

            }

            if($this->carrusel->actualizar($id_carrusel,$datosCarruselEditado)){
                $this->session->set_flashdata("confirmacion", "Imagen editado exitosamente.");
                redirect("carruseles/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarCarrusel(){
            $datosNuevoCarrusel=array(
              "descripcion_carrusel"=>$this->input->post("descripcion_carrusel"),
              "fecha_ingreso_carrusel"=>$this->input->post("fecha_ingreso_carrusel"),
              "fecha_actualizacion_carrusel"=>$this->input->post("fecha_actualizacion_carrusel")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_carrusel_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/carruseles/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_carrusel')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoCarrusel['foto_carrusel']=$dataSubida['file_name'];

            }
            if($this->carrusel->insertar($datosNuevoCarrusel)){
                $this->session->set_flashdata("confirmacion", "Imagen insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("carruseles/index");
        }

        public function procesarEliminacion($id_carrusel){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->carrusel->eliminar($id_carrusel)){
                redirect("carruseles/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
