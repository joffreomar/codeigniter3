<?php
    class Seguridades extends CI_Controller{
        public function __construct(){
          parent::__construct();
          $this->load->model('usuario');
        }

        public function formularioLogin(){

            $this->load->view("seguridades/formularioLogin");

        }
        public function formularioRecuperar(){

            $this->load->view("seguridades/formularioRecuperar");

        }

     public function validarAcceso(){
     $correo_usuario=$this->input->post("correo_usuario");
     $password_usuario=$this->input->post("password_usuario");
     $usuario= $this->usuario->buscarUsuarioPorEmailPassword($correo_usuario, $password_usuario);
     if($usuario){
        if($usuario->estado_usuario>0){
            $this->session->set_userdata("c0nectadoUTC", $usuario);
            $this->session->set_flashdata("bienvenida", "Usuario Conectado");
            redirect("indicadores/index");

        }else{
            $this->session->set_flashdata("error", "Usuario Bloqueado");
            redirect("seguridades/formularioLogin");

        }
        //cuando el email y contraseña son correctos
     }
     else{//cuando el email y contraseña son incorrectos
        $this->session->set_flashdata("error", "correo o contraseña incorrecta");
        redirect("seguridades/formularioLogin");

     }
     }
     public function cerrarSesion(){
          $this->session->set_flashdata("salir","Salir, ");
        $this->session->sess_destroy();//Matando la sesiones

        redirect("seguridades/formularioLogin");
      }


      public function recuperarPassword(){
          $email=$this->input->post("email");
          $usuario=$this->usuario->obtenerPorEmail($email);
          if($usuario){
            $password_aleatorio=rand(111111,999999);
            $asunto="RECUPERAR PASSWORD";
            $contenido="Su contraseña temporal es: <b> $password_aleatorio</b>";
            enviarEmail($email,$asunto,$contenido);
            $data=array(
              "password_usu"=>$password_aleatorio
            );
            $this->usuario->actualizar($data,$usuario->id_usu);
            $this->session->set_flashdata("confirmacion","Hemos enviado una clave temporal a su direccion de email");

          } else{

              $this->session->set_flashdata("error","El email ingresado no existe");

          }

          redirect("seguridades/formularioLogin");

        }

    }//cierre clase
