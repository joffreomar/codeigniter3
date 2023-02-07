<?php
    class Contacto extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("contacto",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_contacto,$datos){
        $this->db->where("id_contacto",$id_contacto);
        return $this->db->update("contacto",$datos);
      }
      //funcion para sacar el detalle de un contacto
      public function consultarPorId($id_contacto){
        $this->db->where("id_contacto",$id_contacto);
        $contacto=$this->db->get("contacto");
        if($contacto->num_rows()>0){
          return $contacto->row();//cuando SI hay contactos
        }else{
          return false;//cuando NO hay contactos
        }
      }
      //funcion para consultar todos lo contactos
      public function consultarTodos(){

          $listadoContactos=$this->db->get("contacto");
          if($listadoContactos->num_rows()>0){
            return $listadoContactos;//cuando SI hay contactos
          }else{
            return false;//cuando NO hay contactos
          }
      }

      public function eliminar($id_contacto){
        $this->db->where("id_contacto",$id_contacto);
        return $this->db->delete("contacto");
      }


   }//cierre de la clase



   //
 ?>
