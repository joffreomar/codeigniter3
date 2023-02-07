<?php
      class Noticias extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("noticia");
            //validando si alguien esta conectado

        }

        public function index(){
          $data["listadoNoticias"]=$this->noticia->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("noticias/index",$data);
          $this->load->view("administrador/footer");
        }

        public function listado(){
          $data["listadoNoticias"]=$this->noticia->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("noticias/listado",$data);
          $this->load->view("publica/footer");
        }

        public function descripcion(){
          $data["listadoNoticias"]=$this->noticia->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("noticias/descripcion",$data);
          $this->load->view("publica/footer");
        }

        public function nuevo(){
          $data["listadoNoticias"]=$this->noticia->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("noticias/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_noticia){
          $data["noticia"]=$this->noticia->consultarPorId($id_noticia);
          $this->load->view("administrador/header");
          $this->load->view("noticias/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function edit($id_noticia){
          $data["listadoNoticias"]=$this->noticia->consultarTodos();
          $data["noticia"]=$this->noticia->consultarPorId($id_noticia);
          $this->load->view("publica/header");
          $this->load->view("noticias/descripcion",$data);
          $this->load->view("publica/footer");
        }

        public function procesarActualizacion(){
            $id_noticia=$this->input->post("id_noticia");
            $datosNoticiaEditado=array(
                "nombre_noticia"=>$this->input->post("nombre_noticia"),
                "descripcion_noticia"=>$this->input->post("descripcion_noticia"),
                "fecha_ingreso_noticia"=>$this->input->post("fecha_ingreso_noticia"),
                "fecha_actualizacion_noticia"=>$this->input->post("fecha_actualizacion_noticia")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_noticia_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/noticias/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_noticia')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->noticia->obtenerPorId($id_noticia);
            unlink(APPPATH.'../uploads/noticias/'.$query->foto_noticia);


            $dataSubida=$this->upload->data();
            $datosNoticiaEditado['foto_noticia']=$dataSubida['file_name'];

            }
            if($this->noticia->actualizar($id_noticia,$datosNoticiaEditado)){
                //echo "INSERCION EXITOSA";
                redirect("noticias/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarNoticia(){
            $datosNuevoNoticia=array(
              "nombre_noticia"=>$this->input->post("nombre_noticia"),
              "descripcion_noticia"=>$this->input->post("descripcion_noticia"),
              "fecha_ingreso_noticia"=>$this->input->post("fecha_ingreso_noticia"),
              "fecha_actualizacion_noticia"=>$this->input->post("fecha_actualizacion_noticia")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_noticia_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/noticias/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_noticia')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoNoticia['foto_noticia']=$dataSubida['file_name'];

            }
            if($this->noticia->insertar($datosNuevoNoticia)){
                $this->session->set_flashdata("confirmacion", "Noticia insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("noticias/index");
        }

        public function procesarEliminacion($id_noticia){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->noticia->eliminar($id_noticia)){
                redirect("noticias/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
