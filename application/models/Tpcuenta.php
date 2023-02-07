<?php
    class Tpcuenta extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("tpcuenta",$datos);
      }
      //funcion para actualizar
      public function actualizar($id_tpcuenta,$datos){
        $this->db->where("id_tpcuenta",$id_tpcuenta);
        return $this->db->update("tpcuenta",$datos);
      }
      //funcion para sacar el detalle de un tpcuenta
      public function consultarPorId($id_tpcuenta){
        $this->db->where("id_tpcuenta",$id_tpcuenta);
        $tpcuenta=$this->db->get("tpcuenta");
        if($tpcuenta->num_rows()>0){
          return $tpcuenta->row();//cuando SI hay tpcuentas
        }else{
          return false;//cuando NO hay stpcuentas
        }
      }
      //funcion para consultar todos lo stpcuentas
      public function consultarTodos(){

          $listadoTpcuentas=$this->db->get("tpcuenta");
          if($listadoTpcuentas->num_rows()>0){
            return $listadoTpcuentas;//cuando SI hay stpcuentas
          }else{
            return false;//cuando NO hay stpcuentas
          }
      }

      public function eliminar($id_tpcuenta){
        $this->db->where("id_tpcuenta",$id_tpcuenta);
        return $this->db->delete("tpcuenta");
      }


   }//cierre de la clase



   //
 ?>
