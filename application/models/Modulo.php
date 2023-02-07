<?php
    class Modulo extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("modulo",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_modulo,$datos){
        $this->db->where("id_modulo",$id_modulo);
        return $this->db->update("modulo",$datos);
      }
      //funcion para sacar el detalle de un modulo
      public function consultarPorId($id_modulo){
        $this->db->where("id_modulo",$id_modulo);
        $modulo=$this->db->get("modulo");
        if($modulo->num_rows()>0){
          return $modulo->row();//cuando SI hay modulos
        }else{
          return false;//cuando NO hay modulos
        }
      }
      //funcion para consultar todos lo modulos
      public function consultarTodos(){

          $listadoModulos=$this->db->get("modulo");
          if($listadoModulos->num_rows()>0){
            return $listadoModulos;//cuando SI hay modulos
          }else{
            return false;//cuando NO hay modulos
          }
      }

      public function eliminar($id_modulo){
        $this->db->where("id_modulo",$id_modulo);
        return $this->db->delete("modulo");
      }

      public function obtenerModulosPorEstado($estado){
    $this->db->where("estado_modulo",$estado);
    $modulos=$this->db->get("modulo");
    if($modulos->num_rows()>0){
      return $modulos;
    }else{
      return false;
    }
  }
   }//cierre de la clase



   //
 ?>
