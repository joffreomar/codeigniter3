<?php
    class Correo extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("correo",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_correo,$datos){
        $this->db->where("id_correo",$id_correo);
        return $this->db->update("correo",$datos);
      }
      //funcion para sacar el detalle de un correo
      public function consultarPorId($id_correo){
        $this->db->where("id_correo",$id_correo);
        $correo=$this->db->get("correo");
        if($correo->num_rows()>0){
          return $correo->row();//cuando SI hay correos
        }else{
          return false;//cuando NO hay correos
        }
      }
      //funcion para consultar todos lo correos
      public function consultarTodos(){

          $listadoCorreos=$this->db->get("correo");
          if($listadoCorreos->num_rows()>0){
            return $listadoCorreos;//cuando SI hay correos
          }else{
            return false;//cuando NO hay correos
          }
      }

      public function eliminar($id_correo){
        $this->db->where("id_correo",$id_correo);
        return $this->db->delete("correo");
      }


   }//cierre de la clase



   //
 ?>
