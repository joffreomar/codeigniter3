<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Enable/Disable Migrations
|--------------------------------------------------------------------------
|
| Migrations are disabled by default for security reasons.
| You should enable migrations whenever you intend to do a schema migration
| and disable it back when you're done.
|
*/
$config['migration_enabled'] = FALSE;

/*
|--------------------------------------------------------------------------
| Migration Type
|--------------------------------------------------------------------------
|
| Migration file names may be based on a sequential identifier or on
| a timestamp. Options are:
|
|   'sequential' = Sequential migration naming (001_add_blog.php)
|   'timestamp'  = Timestamp migration naming (20121031104401_add_blog.php)
|                  Use timestamp format YYYYMMDDHHIISS.
|
| Note: If this configuration value is missing the Migration library
|       defaults to 'sequential' for backward compatibility with CI2.
|
*/
$config['migration_type'] = 'timestamp';

/*
|--------------------------------------------------------------------------
| Migrations table
|--------------------------------------------------------------------------
|
| This is the name of the table that will store the current migrations state.
| When migrations runs it will store in a database table which migration
| level the system is at. It then compares the migration level in this
| table to the $config['migration_version'] if they are not the same it
| will migrate up. This must be set.
|
*/
$config['migration_table'] = 'migrations';

/*
|--------------------------------------------------------------------------
| Auto Migrate To Latest
|--------------------------------------------------------------------------
|
| If this is set to TRUE when you load the migrations class and have
| $config['migration_enabled'] set to TRUE the system will auto migrate
| to your latest migration (whatever $config['migration_version'] is
| set to). This way you do not have to call migrations anywhere else
| in your code to have the latest migration.
|
*/
$config['migration_auto_latest'] = FALSE;

/*
|--------------------------------------------------------------------------
| Migrations version
|--------------------------------------------------------------------------
|
| This is used to set migration version that the file system should be on.
| If you run $this->migration->current() this is the version that schema will
| be upgraded / downgraded to.
|
*/
$config['migration_version'] = 0;

/*
|--------------------------------------------------------------------------
| Migrations Path
|--------------------------------------------------------------------------
|
| Path to your migrations folder.
| Typically, it will be within your application path.
| Also, writing permission is required within the migrations path.
|
*/
$config['migration_path'] = APPPATH.'migrations/';

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




<!--  -->
