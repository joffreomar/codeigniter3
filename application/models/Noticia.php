<?php
    class Noticia extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("noticia",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_noticia,$datos){
        $this->db->where("id_noticia",$id_noticia);
        return $this->db->update("noticia",$datos);
      }
      //funcion para sacar el detalle de un noticia
      public function consultarPorId($id_noticia){
        $this->db->where("id_noticia",$id_noticia);
        $noticia=$this->db->get("noticia");
        if($noticia->num_rows()>0){
          return $noticia->row();//cuando SI hay noticias
        }else{
          return false;//cuando NO hay noticias
        }
      }
      //funcion para consultar todos lo noticias
      public function consultarTodos(){

          $listadoNoticias=$this->db->get("noticia");
          if($listadoNoticias->num_rows()>0){
            return $listadoNoticias;//cuando SI hay noticias
          }else{
            return false;//cuando NO hay noticia
          }
      }

      public function eliminar($id_noticia){
        $this->db->where("id_noticia",$id_noticia);
        return $this->db->delete("noticia");
      }

      public function obtenerPorId($id_noticia){
       $this->db->where('id_noticia',$id_noticia);
       $query= $this->db->get('noticia');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }


   }//cierre de la clase

 ?>
