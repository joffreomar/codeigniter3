<?php
    class Carrusel extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("carrusel",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_carrusel,$datos){
        $this->db->where("id_carrusel",$id_carrusel);
        return $this->db->update("carrusel",$datos);
      }
      //funcion para sacar el detalle de un carrusel
      public function consultarPorId($id_carrusel){
        $this->db->where("id_carrusel",$id_carrusel);
        $carrusel=$this->db->get("carrusel");
        if($carrusel->num_rows()>0){
          return $carrusel->row();//cuando SI hay carruseles
        }else{
          return false;//cuando NO hay carruseles
        }
      }
      //funcion para consultar todos lo carruseles
      public function consultarTodos(){

          $listadoCarruseles=$this->db->get("carrusel");
          if($listadoCarruseles->num_rows()>0){
            return $listadoCarruseles;//cuando SI hay carruseles
          }else{
            return false;//cuando NO hay carrusels
          }
      }

      public function eliminar($id_carrusel){
        $this->db->where("id_carrusel",$id_carrusel);
        return $this->db->delete("carrusel");
      }
      public function obtenerPorId($id_carrusel){
       $this->db->where('id_carrusel',$id_carrusel);
       $query= $this->db->get('carrusel');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }

   }//cierre de la clase


 ?>
