<?php
    class Mision extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("mision",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_mision,$datos){
        $this->db->where("id_mision",$id_mision);
        return $this->db->update("mision",$datos);
      }
      //funcion para sacar el detalle de un mision
      public function consultarPorId($id_mision){
        $this->db->where("id_mision",$id_mision);
        $mision=$this->db->get("mision");
        if($mision->num_rows()>0){
          return $mision->row();//cuando SI hay misiones
        }else{
          return false;//cuando NO hay misiones
        }
      }
      //funcion para consultar todos lo misiones
      public function consultarTodos(){

          $listadoMisiones=$this->db->get("mision");
          if($listadoMisiones->num_rows()>0){
            return $listadoMisiones;//cuando SI hay misiones
          }else{
            return false;//cuando NO hay misiones
          }
      }

      public function eliminar($id_mision){
        $this->db->where("id_mision",$id_mision);
        return $this->db->delete("mision");
      }
      public function obtenerPorId($id_mision){
       $this->db->where('id_mision',$id_mision);
       $query= $this->db->get('mision');
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
