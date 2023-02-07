<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/profiling.html
|
*/
email_helper.php 
<?php

  function enviarEmail($emailDestinatario,$asunto, $contenido,
                        $adjunto=""){
        try{
          //Proceso de Envio de correo electronico
          $CI=&get_instance();//generando una instancia de CodeIgniter
          $CI->load->library('email');//cargando la libreria email
          //generar un array de configuracion del envio de correos electronicos
          $configuracionCorreo = array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.gmail.com',
             'smtp_port' => '587',
             '_smtp_auth'=>TRUE,
             'smtp_crypto' => 'tls',
             'smtp_user' => 'alex.guanuna0319@utc.edu.ec',
             'smtp_pass' => 'alexdario19961711guanuna',
             'mailtype' => 'html',
             'send_multipart' => TRUE,
             'wordwrap'=>TRUE,
             'charset' => 'utf-8',
             'newline' => "\r\n",
             'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
             )
           );
           //iniciando el proceso de envio del email
           //bajo la configuración establecida
           $CI->email->initialize($configuracionCorreo);
           //definiendo saltos de linea en el contenido del email
           $CI->email->set_newline("\r\n");
           //Definiendo el email del cual va a salir el correo (Remitente)
           $CI->email->from("alex.guanuna0319@utc.edu.ec");
           //Definiendo el email a donde va a llegar el correo (Destinatario)
           $CI->email->to($emailDestinatario);
           //Definiendo el asunto
           $CI->email->subject($asunto);
           //Definiendo el contenido del mensaje
           $CI->email->message($contenido);
           if($adjunto!=""){//validando que SI haya un archivo adjunto
              //enviando el archivo adjunto
              $CI->email->attach($adjunto);
           }
           //Enviando el correo electronico bajo la configuración establecida
           // y con los parametros indicados
          $CI->email->send();

          //Presentando todos los detalles del email enviado
          var_dump($CI->email->print_debugger());


        }catch(Exception $ex){
            echo "<h1>ERROR AL ENVIAR EL CORREO $ex </h1>";
        }
  }

 ?>

<!--  -->
controladores
Seguridades.php
<?php
    class Seguridades extends CI_Controller{
        public function __construct(){
          parent::__construct();
          $this->load->model('usuario');
        }

        public function formularioLogin(){
            $this->load->view("seguridades/formularioLogin");
        }
        public function registrar(){

            $this->load->view("seguridades/registrar");
          }

     public function validarAcceso(){
     $email_usu=$this->input->post("email_usu");
     $password_usu=$this->input->post("password_usu");
     $usuario= $this->usuario->buscarUsuarioPorEmailPassword($email_usu, $password_usu);
     if($usuario){
        if($usuario->estado_usu>0){
            $this->session->set_userdata("c0nectadoUTC", $usuario);
            $this->session->set_flashdata("bienvenida", "Usuario Conectado");
            redirect("usuarios/index");

        }else{
            $this->session->set_flashdata("error", "Usuario Bloqueado");
            redirect("seguridades/formularioLogin");

        }
        //cuando el email y contraseña son correctos
     }
     else{//cuando el email y contraseña son incorrectos
        $this->session->set_flashdata("error", "Email o contraseña incorrecta");
        redirect("seguridades/formularioLogin");

     }
     }
     public function cerrarSesion(){
     $this->session->set_flashdata("salir","Salir, ");
   $this->session->sess_destroy();//Matando la sesiones

   redirect("seguridades/formularioLogin");
 }



 public function pruebaEmail(){
      enviarEmail("alex.guanuna0319@utc.edu.ec","PRUEBA","<h1>HOLA</h1><i>MUNDO</i>");
      }

      public function recuperarPassword(){
          $email=$this->input->post("email");
          $usuario=$this->usuario->obtenerPorEmail($email);
          if($usuario){
            $password_aleatorio=rand(111111,999999);
            $asunto="RECUPERAR PASSWORD";
            $contenido="Su contraseña temporal es: <b> $password_aleatorio</b>";
            enviarEmail($email,$asunto,$contenido);
            $data=array(
              "password_usu"=>$password_aleatorio
            );
            $this->usuario->actualizar($data,$usuario->id_usu);
            $this->session->set_flashdata("confirmacion","Hemos enviado una clave temporal a su direccion de email");

          } else{

              $this->session->set_flashdata("error","El email ingresado no existe");

          }

          redirect("seguridades/formularioLogin");

        }



}//
Usuarios.php
<?php
class Usuarios extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
        //validando si alguien esta conectado ESTO ES LO PRIMORDIAL
        if ($this->session->userdata("c0nectadoUTC")) {
          // si esta conectado
          if ($this->session->userdata("c0nectadoUTC")->perfil_usu=="ADMINISTRADOR")
          {
            // SI ES ADMINISTRADOR
          } else {
            redirect("/");
          }
        } else {
          redirect("seguridades/formularioLogin");
        }
    }
    public function registrar(){

        $this->load->view("seguridades/registrar");
      }

  public function index(){
    $this->load->view("header");
    $this->load->view("usuarios/index");
    $this->load->view("footer");
  }
  //funcion para frenderizar la vista listado.php
  public function listado(){
    $data["listadoUsuarios"]=$this->usuario->obtenerTodos();
    $this->load->view("usuarios/listado",$data);

  }
  ///Inserciion Asincrona
  public function insertarUsuario(){
    $data=array(
    "apellido_usu"=>$this->input->post("apellido_usu"),
    "nombre_usu"=>$this->input->post("nombre_usu"),
    "email_usu"=>$this->input->post("email_usu"),
    "password_usu"=>$this->input->post("password_usu"),
    "perfil_usu"=>$this->input->post("perfil_usu")
    );
    if($this->usuario->insertarUsuario($data)){
      echo json_encode(array("respuesta"=>"ok"));
    }else{
      echo json_encode(array("respuesta"=>"error"));

    }
  }
  public function eliminarUsuario(){
    $id_usu=$this->input->post("id_usu");
    if ($this->usuario->eliminar($id_usu)) {
      echo json_encode(array("respuesta"=>"ok"));
    } else{
      echo json_encode(array("respuesta"=>"error"));
    }
  }

  public function editar($ide_usu){
      $data["usuario"]=$this->usuario->obtenerPorId($ide_usu);
      $this->load->view("usuarios/editar",$data);
      }

      public function actualizarUsuarioAjax(){
              $id_usu=$this->input->post("id_usu");
              $data=array(
                  "apellido_usu"=>$this->input->post("apellido_usu"),
                  "nombre_usu"=>$this->input->post("nombre_usu"),
                  "email_usu"=>$this->input->post("email_usu"),
                  "perfil_usu"=>$this->input->post("perfil_usu")
              );
              if($this->usuario->actualizar($data,$id_usu)){
                  echo json_encode(array("respuesta"=>"ok"));
              }else{
                  echo json_encode(array("respuesta"=>"error"));
              }
          }


  }//cierre de la clase

Welcome.php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		//validando si alguien esta conectado
		if ($this->session->userdata('c0nectadoUTC')) {
			//SI ESTA CONECTADO
			// code...
		} else {
			redirect('seguridades/formularioLogin');
		}
		$this->load->view("header");
		$this->load->view('welcome_message');
		$this->load->view("footer");
	}
}//CIERRE DE LA CLASE

models

Usuario.php
<?php
class Usuario extends CI_Model {
  public function __construct(){
    parent::__construct();
  }

//consulta login usuario FUNCION
public function buscarUsuarioPorEmailPassword($email_usu, $password_usu){

    $this->db->where("email_usu",$email_usu);
    $this->db->where("password_usu",$password_usu);
    $usuarioEncontrado=$this->db->get("usuario");
    if($usuarioEncontrado->num_rows()>0){
        return $usuarioEncontrado->row();

    }else{//cuando las credenciales son incorrectas
        return false;
    }

}

public function insertarUsuario($data){
  return $this->db->insert('usuario',$data);
}

public function obtenerTodos(){
$listado=$this->db->get("usuario");
if ($listado->num_rows()>0) {
  return $listado;
} else {
  return false;

    }
  }


  public function eliminar($id_usu){
    $this->db->where("id_usu",$id_usu);
  return  $this->db->delete("usuario");
  }


  public function obtenerPorId($id_usu){
                  $this->db->where("id_usu",$id_usu);
                  $usuario=$this->db->get("usuario");
                  if($usuario->num_rows()>0){
                    return $usuario->row();
                  }else{//cuando las credenciales estan incorrectas
                    return false;
                  }
                    }

  public function actualizar($data, $id_usu){
        $this->db->where("id_usu",$id_usu);
        return $this->db->update("usuario",$data);
    }
    public function obtenerPorEmail($email_usu){
      $this->db->where("email_usu",$email_usu);
      $usuario=$this->db->get("usuario");
      if ($usuario->num_rows()>0) {
        return $usuario->row();
      }else{
        return false;
      }

    }
}//cierre de la clase usuario

  ?>











views:
usuarios,index.php
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<br>
<h1 class="text-center">GESTION DE USUARIOS</h1>
<br>
<center>
  <button type="button" name="button" class="btn btn-primary"
   onclick="cargarListadoUsuarios();"><i class="fa fa-refresh" title="Actualizar"></i> ACTUALIZAR </button>
   <!-- Trigger the modal with a button -->
   <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalNuevoUsuario"><i class="fa fa-plus-circle"></i> AGREGAR USUARIO</button>
</center>
<div class="row">
  <div class="col-md-12"
  id="contenedor-listado-usuarios">
    <i class="fa fa-spin fa-lg fa-spinner"></i>
    Consultando Datos
  </div>
</div>


 <!-- Modal -->
 <div id="modalNuevoUsuario"
 style="z-index:9999 !important;"
  class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fa fa-users"></i> NUEVO USUARIO</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <form class=""
         action="<?php echo site_url('usuarios/insertarUsuario'); ?>"
         method="post"
         id="frm_nuevo_usuario">
         <label for="">APELLIDO:</label>
         <br>
         <input type="text" name="apellido_usu"
         id="apellido_usu" class="form-control"> <br>

         <label for="">NOMBRE:</label>
         <br>
         <input type="text" name="nombre_usu"
         id="nombre_usu" class="form-control"> <br>

         <label for="">EMAIL:</label>
         <br>
         <input type="text" name="email_usu"
         id="email_usu" class="form-control"> <br>

         <label for="">CONTRASEÑA:</label>
         <br>
         <input type="password" name="password_usu"
         id="password_usu" class="form-control"> <br>

         <label for="">CONFIRME LA CONTRASEÑA:</label>
         <br>
         <input type="password" name="password_confirmada"
         id="password_confirmada" class="form-control"> <br>

         <label for="">PERFIL:</label>
         <br>
         <select class="form-control" name="perfil_usu"
         id="perfil_usu">
          <option value="">Seleccione una opción</option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="VENDEDOR">VENDEDOR</option>
         </select>
         <br>
         <button type="submit" name="button"
         class="btn btn-success">
           <i class="fa fa-save"></i> GUARDAR
         </button>

         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
     </div>

   </div>
 </div>
 <div id="modalEditarUsuario"
 style="z-index:9999 !important;"
  class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fa fa-users"></i> EDITAR USUARIO</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body"id="contenedor-formulario-editar">

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
     </div>

   </div>
 </div>


<script type="text/javascript">
    function cargarListadoUsuarios(){
      $("#contenedor-listado-usuarios")
      .html('<i class="fa fa-spin fa-lg fa-spinner"></i>');
      $("#contenedor-listado-usuarios")
      .load("<?php echo site_url(); ?>/usuarios/listado");
    }
    cargarListadoUsuarios();
    $("#frm_nuevo_usuario").validate({
      rules:{
        apellido_usu:{
          required:true,
        },
        nombre_usu:{
          required:true,
        },
        email_usu:{
          required:true,
        },
        password_usu:{
          required:true
        },
        password_confirmada:{
          required:true,
          equalTo:"#password_usu"
        },
        perfil_usu:{
          required:true,
        }
      },
      messages:{
        apellido_usu:{
          required:"Por favor ingrese el apellido",
        },
        nombre_usu:{
          required:"Por favor ingrese el nombre",
        },
        email_usu:{
          required:"Por favor ingrese el email",
        },
        password_usu:{
          required:"Por favor ingrese la contraseña",
        },
        password_confirmada:{
          required:"Por favor ingrese la contraseña",
        },
      },
      submitHandler:function(form){//funcion para peticiones AJAX
          $.ajax({
            url:$(form).prop("action"),
            type:"post",
            data:$(form).serialize(),
            success:function(data){
                cargarListadoUsuarios();
                $("#modalNuevoUsuario").modal("hide");
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                var objetoJson=JSON.parse(data);
                if(objetoJson.respuesta=="ok" || objetoJson.respuesta=="OK"){
                  iziToast.success({
                     title: 'Confirmacion',
                     message: '<?php echo $this->session->flashdata("confirmacion"); ?>',
                     position: 'topRight',

                 });


                }else{
                  iziToast.danger({
                     title: 'Error',
                     message: '<?php echo $this->session->flashdata("error"); ?>',
                     position: 'topRight',
                 });
                }
                alert(data);
            }
          });
      }
    });
</script>

<script type="text/javascript">
  function abrirFormularioEditar(id_usu){
    alert("ok...");
    $("#contenedor-formulario-editar").html('<i class="fa fa-spin fa-lg fa-spinner"></i>');
    $("#contenedor-formulario-editar").load("<?php echo site_url('usuarios/editar');?>/"+id_usu);
    $("#modalEditarUsuario").modal("show");
  }

</script>

usuarios,listado.php


<?php if ($listadoUsuarios): ?>
  <table class="table table-bordered table-striped table-hover " id="tbl-clientes" >
      <thead>
         <tr>
           <th class="text-center">ID</th>
           <th class="text-center">APELLIDO</th>
           <th class="text-center">NOMBRE</th>
           <th class="text-center">CORREO ELECTRONICO</th>
           <th class="text-center">PERFIL</th>
          <th class="text-center">ESTADO</th>
           <th class="text-center">ACCIONES</th>
         </tr>
      </thead>
      <tbody>
          <?php foreach ($listadoUsuarios->result() as $usuario): ?>
              <tr>
                  <td class="text-center">
                    <?php echo $usuario->id_usu; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $usuario->apellido_usu; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $usuario->nombre_usu; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $usuario->email_usu; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $usuario->perfil_usu; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $usuario->estado_usu; ?>
                  </td>
                  <td class="text-center">
                    <a href="#"
                    onclick="abrirFormularioEditar(<?php echo $usuario->id_usu; ?>);"
                    class="btn btn-warning">
                      <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="#" class="btn btn-danger"
                    onclick="eliminarUsuario(<?php echo $usuario->id_usu; ?>);">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
<?php else: ?>
    <br>
    <div class="alert alert-danger">
        No se encontraron Usuarios Registrados
    </div>
<?php endif; ?>

<script type="text/javascript">

function eliminarUsuario(id_usu){
  iziToast.question({
    timeout: 20000,
    close: false,
    overlay: true,
    displayMode: 'once',
    id: 'question',
    zindex: 999,
    title: 'Hey',
    message: 'Estas seguro de eliminar el registro permanentemente?',
    position: 'center',
    buttons: [
        ['<button><b>SI</b></button>', function (instance, toast) {
instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
          $.ajax({

            url:"<?php echo site_url('usuarios/eliminarUsuario'); ?>",
            type:"post",
            data:{"id_usu":id_usu},
            success:function(data){

                cargarListadoUsuarios();
              //alert(data);

            }
          });

        }, true],
        ['<button>NO</button>', function (instance, toast) {

            instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

        }],
    ],
    onClosing: function(instance, toast, closedBy){
        console.info('Closing | closedBy: ' + closedBy);
    },
    onClosed: function(instance, toast, closedBy){
        console.info('Closed | closedBy: ' + closedBy);
    }
});

}

</script>
<!-- <script type="text/javascript">
  $("#tbl-clientes").DataTable();
</script> -->
<!-- revisarrrrrrr -->
<br>
<br>
<script type="text/javascript">
    function confirmarEliminacion(id_cli){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACIÓN',
              message: '¿Esta seguro de eliminar el cliente de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/clientes/procesarEliminacion/"+id_cli;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>
<br>
<br>
<script type="text/javascript">
$(document).ready( function () {
  $('#tbl-clientes').DataTable({
    dom: 'Blfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
    "language":idioma_español
  });
} );
</script>

<script type="text/javascript">
//YA ESTA EN ESPAÑOL
$(document).ready(function() {
    $("#tbl-cliente").DataTable( {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
        }
    } );
} );
</script>

usuarios,editar.php

<form class=""
action="<?php echo site_url('usuarios/actualizarUsuarioAjax'); ?>"
method="post"
id="frm_actualizar_usuario">

    <input type="hidden" name="id_usu" id="id_usu"
    value="<?php echo $usuario->id_usu; ?>">

    <label for="">APELLIDO:</label><br>
    <input type="text" name="apellido_usu"
    value="<?php echo $usuario->apellido_usu; ?>"
    id="apellido_usu_editar" class="form-control" required> <br>

    <label for="">NOMBRE:</label><br>
    <input type="text" name="nombre_usu"
    value="<?php echo $usuario->nombre_usu; ?>"
    id="nombre_usu_editar" class="form-control"> <br>

    <label for="">EMAIL:</label><br>
    <input type="text" name="email_usu"
    value="<?php echo $usuario->email_usu; ?>"
    id="email_usu_editar" class="form-control"> <br>
    <label for="">CONTRASEÑA:</label>
    <br>
    <input type="password" name="password_usu"
    value="<?php echo $usuario->password_usu; ?>"
    id="password_usu" class="form-control"> <br>
    <label for="">PERFIL:</label>
    <br>
    <select class="form-control" name="perfil_usu"
    id="perfil_usu_editar">
     <option value="">Seleccione una opción</option>
     <option value="ADMINISTRADOR">ADMINISTRADOR</option>
     <option value="VENDEDOR">VENDEDOR</option>
    </select>
    <script type="text/javascript">
        $("#perfil_usu_editar").val("<?php echo $usuario->perfil_usu; ?>");
    </script>

    <br>
    <button type="button" onclick="actualizar();" name="button"
    class="btn btn-success">
      <i class="fa fa-pen"></i> Actualizar
    </button>
</form>


<script type="text/javascript">

function actualizar(){

    $.ajax({
      url:$("#frm_actualizar_usuario").prop("action"),
      data:$("#frm_actualizar_usuario").serialize(),
      type:"post",
      success:function(data){
        cargarListadoUsuarios();
        $("#modalEditarUsuario").modal("hide");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        var objetoJson=JSON.parse(data);
        if(objetoJson.respuesta=="ok" || objetoJson.respuesta=="OK"){
          iziToast.success({
               title: 'CONFIRMACIÓN',
               message: 'Actualización Exitosa',
               position: 'topRight',
             });
        }else{
          iziToast.error({
               title: 'ERROR',
               message: 'Error al procesar',
               position: 'topRight',
             });
        }

      }
    });
}

</script>






formularioLogin.php
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.css">


<!--===============================================================================================-->


<!--===============================================================================================-->

<!--===============================================================================================-->


<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/assets/vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<center>
<form class=""
action="<?php echo site_url(); ?>/seguridades/validarAcceso" method="post">
  <label for=""><b>Email:</b></label> <br>
  <input type="email" name="email_usu"
  id="email_usu" value="" placeholder="Ingrese su email"
  required><br>
  <label for=""><b>Contraseña:</b></label> <br>
  <input type="password" name="password_usu"
  id="password_usu" value="" placeholder="Ingrese su contraseña"
  required><br>
  <button type="submit"> Ingresar </button>
</form>
<?php if ($this->session->flashdata("error")): ?>
<script type="text/javascript">
    alert("<?php echo $this->session->flashdata("error"); ?> ");
</script>
<?php endif; ?>
<br>
<form class="" action="<?php echo site_url("seguridades/recuperarPassword"); ?>" method="post"
  <h3>RECUPERAR CONTRASEÑA</h3>
  <label for="ingrese su email:"></label> <br>
  <input type="email" name="email" value="">
  <button type="submit" name="button">Recuperar ahora</button>

</form>
</center>
</body>
</html>


<!--===============================================================================================-->

footer.php

<!-- Plugin js for this page -->
<script type="text/javascript" src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">
      </script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>



      <?php if ($this->session->flashdata('confirmacion')): ?>
<script type="text/javascript">
  iziToast.info({
tittle: 'CONFIRMACION',
message: '<?php echo $this->session->flashdata('confirmacion'); ?>',
position: 'topRight',
});
</script>
<?php endif; ?>


<?php if ($this->session->flashdata('error')): ?>
<script type="text/javascript">
  iziToast.danger({
tittle: 'ADVERTENCIA',
message: '<?php echo $this->session->flashdata('error'); ?>',
position: 'topRight',
});
</script>
<?php endif; ?>

<style media="screen">
.error{
  color:red;
  font-size: 16px;

}
input.error, select.error{
  border: 2px solid red;
}
</style>

<?php if ($this->session->flashdata("bienvenida")): ?>
<script type="text/javascript">
  iziToast.info({
       title: 'CONFIRMACIÓN',
       message: '<?php echo $this->session->flashdata("bienvenida"); ?>',
       position: 'topRight',
     });
</script>
<?php endif; ?>

</body>
</html>


header.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <!-- jquery deley para que se vea bonito -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js">-- >

</script>

<!-- cdn font awesome para iconos pequeños  -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- cdn izitoast para alertas  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- cdn dattable 8/6/20022  -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json">



<!-- importar jquery validation clase 8/6 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js" integrity="sha512-XJiEiB5jruAcBaVcXyaXtApKjtNie4aCBZ5nnFDIEFrhGIAvitoqQD6xd9ayp5mLODaCeaXfqQMeVs1ZfhKjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/localization/messages_es_AR.min.js" integrity="sha512-HHnzo0ssMRoNapdoTaORwzLpemBFMsg7GA8fr0d9xS1rEXKHazYMTUAUka2abGFCfsdXgZPVVyv3LCkXP1Fhsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

jQuery.validator.addMethod("letras", function(value, element) {
     //return this.optional(element) || /^[a-z]+$/i.test(value);
     return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);

   }, "Este campo solo acepta letras");

</script>
<!-- importar file imput css clase 29/6/22-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/fileinput.min.js" integrity="sha512-C9i+UD9eIMt4Ufev7lkMzz1r7OV8hbAoklKepJW0X6nwu8+ZNV9lXceWAx7pU1RmksTb1VmaLDaopCsJFWSsKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/css/fileinput.min.css" integrity="sha512-XHMymTWTeqMm/7VZghZ2qYTdoJyQxdsauxI4dTaBLJa8d1yKC/wxUXh6lB41Mqj88cPKdr1cn10SCemyLcK76A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/es.js"></script>

<!-- fin-->
</head>
<body>
  <ul class="navbar-nav">
  <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
    <h1 class="welcome-text">Bienvenido <span class="text-black fw-bold"><?php echo $this->session->userdata("c0nectadoUTC")->nombre_usu; ?>
          <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usu; ?></span></h1>
    <h3 class="welcome-sub-text"><?php echo $this->session->userdata("c0nectadoUTC")->perfil_usu; ?> </h3>
  </li>
</ul>


  <!--Usuarios-->

  <!--Salir-->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url(); ?>/seguridades/cerrarSesion">
      <i class="typcn typcn-power text-primary menu-icon"></i>
      <span class="menu-title">SALIR</span>
    </a>
  </li>

</ul>
</nav>

forlumarioLogin.php
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div style="padding-top:10%">
<form class="" action="<?php echo site_url();?>/seguridades/validarAcceso" method= "post">
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(167, 50%, 84%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">


        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email_usu" id="email_usu" value="" placeholder="Ingrese su email" class="form-control" />
                  <label class="form-label" for="form3Example3">Correo Electronico</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <input type="password" name="password_usu" id="password_usu" value="" placeholder="Ingrese su contraseña" class="form-control">
                  <label class="form-label" for="form3Example4">Contraseña</label>
                </div>

                <!-- Checkbox -->


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Ingresar
                </button>


                <!-- Register buttons -->

              </form>
              <br>
              <form class="" action="<?php echo site_url("seguridades/recuperarPassword"); ?>" method="post"
              <h3>RECUPERAR CONTRASEÑA</h3>
              <label for="ingrese su email:"></label> <br>
              <input type="email" name="email" value="">
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Recuperar ahora
              </button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>



<?php if ($this->session->flashdata("error")):?>
<script type="text/javascript">
alert("<?php echo $this->session->flashdata("error");?>");
</script>
<?php endif;?>

</form>

</div>
