<?php
function insertar_datos($id_correo,$cliente_correo,$correo_correo){
  global $con;
  $sentencia = "insert into correo (id_correo,cliente_correo,correo_correo) values ('$id_correo''$cliente_correo','$correo_correo')";
  $ejecutar = mysqli_query($sentencia);
  return $ejecutar;
}
?>
