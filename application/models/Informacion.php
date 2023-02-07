<?php
    class Informacion extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("informacion",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_informacion,$datos){
        $this->db->where("id_informacion",$id_informacion);
        return $this->db->update("informacion",$datos);
      }
      //funcion para sacar el detalle de un informacion
      public function consultarPorId($id_informacion){
        $this->db->where("id_informacion",$id_informacion);
        $informacion=$this->db->get("informacion");
        if($informacion->num_rows()>0){
          return $informacion->row();//cuando SI hay informacions
        }else{
          return false;//cuando NO hay informacions
        }
      }
      //funcion para consultar todos lo informacions
      public function consultarTodos(){

          $listadoInformaciones=$this->db->get("informacion");
          if($listadoInformaciones->num_rows()>0){
            return $listadoInformaciones;//cuando SI hay informacions
          }else{
            return false;//cuando NO hay informacions
          }
      }

      public function eliminar($id_informacion){
        $this->db->where("id_informacion",$id_informacion);
        return $this->db->delete("informacion");
      }



   }//cierre de la clase



   //
 ?>
