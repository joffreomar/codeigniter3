<?php
      class Misiones extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("mision");
            $this->load->model("vision");
        }

        public function index(){
          $data["listadoMisiones"]=$this->mision->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("misiones/index",$data);
          $this->load->view("administrador/footer");
        }
        public function listado(){
          $data["listadoVisiones"]=$this->vision->consultarTodos();
          $data["listadoMisiones"]=$this->mision->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("misiones/listado",$data);
          $this->load->view("publica/footer");
        }
        public function nuevo(){
          $data["listadoMisiones"]=$this->mision->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("misiones/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_mision){
          $data["mision"]=$this->mision->consultarPorId($id_mision);
          $this->load->view("administrador/header");
          $this->load->view("misiones/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_mision=$this->input->post("id_mision");
            $datosMisionEditado=array(
              "nombre_mision"=>$this->input->post("nombre_mision"),
              "descripcion_mision"=>$this->input->post("descripcion_mision"),
              "fecha_ingreso_mision"=>$this->input->post("fecha_ingreso_mision"),
              "fecha_actualizacion_mision"=>$this->input->post("fecha_actualizacion_mision")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_mision_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/misiones/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_mision')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->mision->obtenerPorId($id_mision);
            unlink(APPPATH.'../uploads/misiones/'.$query->foto_mision);


            $dataSubida=$this->upload->data();
            $datosMisionEditado['foto_mision']=$dataSubida['file_name'];

            }
            if($this->mision->actualizar($id_mision,$datosMisionEditado)){
                //echo "INSERCION EXITOSA";
                redirect("misiones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
        }

        public function guardarMision(){
            $datosNuevoMision=array(
              "nombre_mision"=>$this->input->post("nombre_mision"),
              "descripcion_mision"=>$this->input->post("descripcion_mision"),
              "fecha_ingreso_mision"=>$this->input->post("fecha_ingreso_mision"),
              "fecha_actualizacion_mision"=>$this->input->post("fecha_actualizacion_mision")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_mision_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/misiones/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_mision')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoMision['foto_mision']=$dataSubida['file_name'];

            }
            if($this->mision->insertar($datosNuevoMision)){
                $this->session->set_flashdata("confirmacion","Misiones insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("misiones/index");
        }

        public function procesarEliminacion($id_mision){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->mision->eliminar($id_mision)){
                redirect("misiones/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
