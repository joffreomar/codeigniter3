<?php
    class Usuario extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //consulta para el Login de Usuario
      public function buscarUsuarioPorEmailPassword($correo_usuario,
                      $password_usuario){
            $this->db->where("correo_usuario",$correo_usuario);
            $this->db->where("password_usuario",$password_usuario);
            $usuarioEncontrado=$this->db->get("usuario");
            if($usuarioEncontrado->num_rows()>0){
              return $usuarioEncontrado->row();
            }else{//cuando las credenciales estan incorrectas
              return false;
            }
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("usuario",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_usuario,$datos){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->update("usuario",$datos);
      }
      //funcion para sacar el detalle de un usuario
      public function consultarPorId($id_usuario){
        $this->db->where("id_usuario",$id_usuario);
        $this->db->join('sector','sector.id_sector=usuario.fk_id_sector');
        $usuario=$this->db->get("usuario");
        if($usuario->num_rows()>0){
          return $usuario->row();//cuando SI hay usuarios
        }else{
          return false;//cuando NO hay usuarios
        }
      }
      //funcion para consultar todos los usuarios
      public function consultarTodos(){
        $this->db->join('sector','sector.id_sector=usuario.fk_id_sector');
          $listadoUsuarios=$this->db->get("usuario");
          if($listadoUsuarios->num_rows()>0){
            return $listadoUsuarios;//cuando SI hay usuarios
          }else{
            return false;//cuando NO hay usuarios
          }
      }

      public function eliminar($id_usuario){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->delete("usuario");
      }

      public function obtenerPorId($id_usuario){
       $this->db->where('id_usuario',$id_usuario);
       $query= $this->db->get('usuario');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }
     public function obtenerPorEmail($correo_usuario){
        $this->db->where("correo_usuario",$correo_usuario);
        $usuario=$this->db->get("usuario");
        if ($usuario->num_rows()>0) {
            return $usuario->row();
        }else{
            return false;
            }
          }

     public function obtenerUsuariosPorEstado($estado){
         $this->db->where("estado_usuario",$estado);
         $usuarios=$this->db->get("usuario");
         if($usuarios->num_rows()>0){
           return $usuarios;
         }else{
           return false;
         }
       }


   }//cierre de la clase



   //
 ?>
