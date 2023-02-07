<?php
    class Sector extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("sector",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_sector,$datos){
        $this->db->where("id_sector",$id_sector);
        return $this->db->update("sector",$datos);
      }
      //funcion para sacar el detalle de un sector
      public function consultarPorId($id_sector){
        $this->db->where("id_sector",$id_sector);
        $sector=$this->db->get("sector");
        if($sector->num_rows()>0){
          return $sector->row();//cuando SI hay sectores
        }else{
          return false;//cuando NO hay sectores
        }
      }
      //funcion para consultar todos lo sectores
      public function consultarTodos(){

          $listadoSectores=$this->db->get("sector");
          if($listadoSectores->num_rows()>0){
            return $listadoSectores;//cuando SI hay sectores
          }else{
            return false;//cuando NO hay sectores
          }
      }

      public function eliminar($id_sector){
        $this->db->where("id_sector",$id_sector);
        return $this->db->delete("sector");
      }


   }//cierre de la clase



   //
 ?>
