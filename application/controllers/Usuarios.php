<?php
      class Usuarios extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("usuario");
            $this->load->model("sector");
            //validando si alguien esta conectado
            if ($this->session->userdata("c0nectadoUTC")) {
              // si esta conectado
              if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR")
              {
                // SI ES ADMINISTRADOR
              } else {
                redirect("/");
              }
            } else {
              redirect("seguridades/formularioLogin");
            }
        }

        public function index(){
          $data["listadoUsuarios"]=$this->usuario->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("usuarios/index",$data);
          $this->load->view("administrador/footer");
        }


        public function nuevo(){
          $data["listadoSectores"]=$this->sector->consultarTodos();
          $this->load->view("administrador/header");
          $this->load->view("usuarios/nuevo",$data);
          $this->load->view("administrador/footer");
        }


        public function editar($id_usuario){
          $data["listadoSectores"]=$this->sector->consultarTodos();
          $data["usuario"]=$this->usuario->consultarPorId($id_usuario);
          $this->load->view("administrador/header");
          $this->load->view("usuarios/editar",$data);
          $this->load->view("administrador/footer");
        }
        public function guardarUsuario(){
            $datosNuevoUsuario=array(
              "nombre_usuario"=>$this->input->post("nombre_usuario"),
              "apellido_usuario"=>$this->input->post("apellido_usuario"),
               "telefono_usuario"=>$this->input->post("telefono_usuario"),
               "correo_usuario"=>$this->input->post("correo_usuario"),
               "password_usuario"=>$this->input->post("password_usuario"),
               "descripcion_usuario"=>$this->input->post("descripcion_usuario"),
               "estado_usuario"=>$this->input->post("estado_usuario"),
               "tipo_usuario"=>$this->input->post("tipo_usuario"),
               "fecha_ingreso_usuario"=>$this->input->post("fecha_ingreso_usuario"),
               "fecha_actualizacion_usuario"=>$this->input->post("fecha_actualizacion_usuario"),
               "fk_id_sector"=>$this->input->post("fk_id_sector")
            );
            //logica de negocio necesarioa para subir la fotografia del car

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_usuario_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/usuarios/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=3*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_usuario')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $dataSubida=$this->upload->data();
            $datosNuevoUsuario['foto_usuario']=$dataSubida['file_name'];
            }
            if($this->usuario->insertar($datosNuevoUsuario)){
                $this->session->set_flashdata("confirmacion",
                 "Usuario insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error",
               "Error al procesar, intente nuevamente.");
            }
            redirect("usuarios/index");
        }

        public function procesarActualizacion(){
            $id_usuario=$this->input->post("id_usuario");
            $datosUsuarioEditado=array(
              "nombre_usuario"=>$this->input->post("nombre_usuario"),
              "apellido_usuario"=>$this->input->post("apellido_usuario"),
               "telefono_usuario"=>$this->input->post("telefono_usuario"),
               "correo_usuario"=>$this->input->post("correo_usuario"),
               "password_usuario"=>$this->input->post("password_usuario"),
               "descripcion_usuario"=>$this->input->post("descripcion_usuario"),
               "estado_usuario"=>$this->input->post("estado_usuario"),
               "tipo_usuario"=>$this->input->post("tipo_usuario"),
               "fecha_ingreso_usuario"=>$this->input->post("fecha_ingreso_usuario"),
               "fecha_actualizacion_usuario"=>$this->input->post("fecha_actualizacion_usuario"),
               "fk_id_sector"=>$this->input->post("fk_id_sector")
            );
            //logica de negocio necesarioa para subir la fotografia del usuario

            $this->load->library('upload');//carga de la libreria de subida de archivos
            $nombreTemporal='foto_usuario_'.time().'_'.rand(1,500);//generar nombre aleatorio
            $config['file_name']=$nombreTemporal; //te,poral
            $config['upload_path']=APPPATH.'../uploads/usuarios/'; //ruta de la subida de los archivos
            $config['allowed_types']='jpeg|jpg|png';//tipo de datos permitidos
            $config['max_size']=5*1024;//configurar el peso maximo de los archivos
            $this->upload->initialize($config);//inicializar la configuracion
            //instruccion para que se valide la subida del archivos
            if($this->upload->do_upload('foto_usuario')){
              //FUNCION PARA QUE SE ME ACTUALICE LA FOTO CUANDO PONGO UNA NUEVA FOTO
            $query =$this->usuario->obtenerPorId($id_usuario);
            unlink(APPPATH.'../uploads/usuarios/'.$query->foto_usuario);


            $dataSubida=$this->upload->data();
            $datosUsuarioEditado['foto_usuario']=$dataSubida['file_name'];

            }

            if($this->usuario->actualizar($id_usuario,$datosUsuarioEditado)){
                $this->session->set_flashdata('confirmacion','USUARIO EDITADO EXITOSAMENTE');
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');
            }
            redirect("usuarios/index");
        }



        public function procesarEliminacion($id_usuario){
          $data['usuario']=$this->usuario->obtenerPorId($id_usuario);
          $id_img= $data['usuario']->foto_usuario;
          unlink(  APPPATH.'../uploads/usuarios/'.$id_img);
          if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR") {
            if($this->usuario->eliminar($id_usuario)){
                redirect("usuarios/index");
            }else{
                echo "ERROR AL ELIMINAR";
            }
          } else {
            redirect("seguridades/formularioLogin");
          }
        }


    }//cierre de la clase
?>
