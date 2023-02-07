<?php
    class Vision extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("vision",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_vision,$datos){
        $this->db->where("id_vision",$id_vision);
        return $this->db->update("vision",$datos);
      }
      //funcion para sacar el detalle de un vision
      public function consultarPorId($id_vision){
        $this->db->where("id_vision",$id_vision);
        $vision=$this->db->get("vision");
        if($vision->num_rows()>0){
          return $vision->row();//cuando SI hay visiones
        }else{
          return false;//cuando NO hay visiones
        }
      }
      //funcion para consultar todos lo visiones
      public function consultarTodos(){

          $listadoVisiones=$this->db->get("vision");
          if($listadoVisiones->num_rows()>0){
            return $listadoVisiones;//cuando SI hay visiones
          }else{
            return false;//cuando NO hay visiones
          }
      }

      public function eliminar($id_vision){
        $this->db->where("id_vision",$id_vision);
        return $this->db->delete("vision");
      }
      public function obtenerPorId($id_vision){
       $this->db->where('id_vision',$id_vision);
       $query= $this->db->get('vision');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }


   }//cierre de la clase



   //
 ?>
