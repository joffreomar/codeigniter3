<?php
    class Servicio extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("servicio",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_servicio,$datos){
        $this->db->where("id_servicio",$id_servicio);
        return $this->db->update("servicio",$datos);
      }
      //funcion para sacar el detalle de un servicio
      public function consultarPorId($id_servicio){
        $this->db->where("id_servicio",$id_servicio);
        $servicio=$this->db->get("servicio");
        if($servicio->num_rows()>0){
          return $servicio->row();//cuando SI hay servicios
        }else{
          return false;//cuando NO hay servicios
        }
      }
      //funcion para consultar todos lo servicios
      public function consultarTodos(){

          $listadoServicios=$this->db->get("servicio");
          if($listadoServicios->num_rows()>0){
            return $listadoServicios;//cuando SI hay servicios
          }else{
            return false;//cuando NO hay servicio
          }
      }

      public function eliminar($id_servicio){
        $this->db->where("id_servicio",$id_servicio);
        return $this->db->delete("servicio");
      }

      public function obtenerPorId($id_servicio){
       $this->db->where('id_servicio',$id_servicio);
       $query= $this->db->get('servicio');
       if ($query->num_rows()>0) {
         // code...
         return $query->row();
       } else {
         return false;
       }
     }



   }//cierre de la clase

 ?>
