<?php
    class Galeria extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("galeria",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_galeria,$datos){
        $this->db->where("id_galeria",$id_galeria);
        return $this->db->update("galeria",$datos);
      }
      //funcion para sacar el detalle de un galeria
      public function consultarPorId($id_galeria){
        $this->db->where("id_galeria",$id_galeria);
        $galeria=$this->db->get("galeria");
        if($galeria->num_rows()>0){
          return $galeria->row();//cuando SI hay galerias
        }else{
          return false;//cuando NO hay galerias
        }
      }
      //funcion para consultar todos lo galerias
      public function consultarTodos(){

          $listadoGalerias=$this->db->get("galeria");
          if($listadoGalerias->num_rows()>0){
            return $listadoGalerias;//cuando SI hay galerias
          }else{
            return false;//cuando NO hay galeria
          }
      }

      public function eliminar($id_galeria){
        $this->db->where("id_galeria",$id_galeria);
        return $this->db->delete("galeria");
      }
      public function obtenerPorId($id_galeria){
       $this->db->where('id_galeria',$id_galeria);
       $query= $this->db->get('galeria');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }


   }//cierre de la clase

 ?>
