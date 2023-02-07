<?php
      class Galerias extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("galeria");
            //validando si alguien esta conectado
        }
        public function index(){
          $data["listadoGalerias"]=$this->galeria->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("galerias/index",$data);
          $this->load->view("administrador/footer");
        }

        public function listado(){
          $data["listadoGalerias"]=$this->galeria->consultarTodos();
          $this->load->view("publica/header");
          $this->load->view("galerias/listado",$data);
          $this->load->view("publica/footer");
        }
        public function nuevo(){
          $data["listadoGalerias"]=$this->galeria->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("galerias/nuevo",$data);
          $this->load->view("administrador/footer");
        }

        public function editar($id_galeria){
          $data["galeria"]=$this->galeria->consultarPorId($id_galeria);
          $this->load->view("administrador/header");
          $this->load->view("galerias/editar",$data);
          $this->load->view("administrador/footer");
        }

        public function procesarActualizacion(){
            $id_galeria=$this->input->post("id_galeria");
            $datosGaleriaEditado=array(
                "nombre_galeria"=>$this->input->post("nombre_galeria"),
                "fecha_ingreso_galeria"=>$this->input->post("fecha_ingreso_galeria"),
                "fecha_actualizacion_galeria"=>$this->input->post("fecha_actualizacion_galeria")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_galeria_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/galerias/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_galeria')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->galeria->obtenerPorId($id_galeria);
            unlink(APPPATH.'../uploads/galerias/'.$query->foto_galeria);


            $dataSubida=$this->upload->data();
            $datosGaleriaEditado['foto_galeria']=$dataSubida['file_name'];

            }
            if($this->galeria->actualizar($id_galeria,$datosGaleriaEditado)){
                //echo "INSERCION EXITOSA";
                redirect("galerias/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');;
            }
        }

        public function guardarGaleria(){
            $datosNuevoGaleria=array(
              "nombre_galeria"=>$this->input->post("nombre_galeria"),
              "fecha_ingreso_galeria"=>$this->input->post("fecha_ingreso_galeria"),
              "fecha_actualizacion_galeria"=>$this->input->post("fecha_actualizacion_galeria")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_galeria_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/galerias/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_galeria')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoGaleria['foto_galeria']=$dataSubida['file_name'];

            }
            if($this->galeria->insertar($datosNuevoGaleria)){
                $this->session->set_flashdata("confirmacion", "Galeria insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error", "Error al procesar, intente nuevamente.");
            }
            redirect("galerias/index");
        }

        public function procesarEliminacion($id_galeria){
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->galeria->eliminar($id_galeria)){
                redirect("galerias/index");
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }

    }//cierre de la clase
?>
