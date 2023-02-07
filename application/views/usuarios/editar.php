<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Usuarios</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/usuarios/procesarActualizacion" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_usuario" id="id_usuario"value="<?php echo $usuario->id_usuario; ?>">
<div class="col-md-4">
  <label for=""><h6>Nombres</h6></label>
  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $usuario->nombre_usuario; ?>" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Ingrese su nombre">
</div>
<div class="col-md-4">
  <label for=""><h6>Apellidos</h6></label>
  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $usuario->apellido_usuario; ?>" type="text" name="apellido_usuario" id="apellido_usuario" placeholder="Ingrese su apellido">
</div>
<div class="col-md-4">
  <label for=""><h6>Teléfono</h6></label>
  <input class="form-control" value="<?php echo $usuario->telefono_usuario; ?>" type="number" name="telefono_usuario" id="telefono_usuario" placeholder="Ingrese su teléfono">
</div>
<div class="col-md-4">
  <label for=""><h6>Correo</h6></label>
  <input class="form-control" value="<?php echo $usuario->correo_usuario; ?>" type="email" name="correo_usuario" id="correo_usuario" placeholder="Ingrese su correo">
</div>
<div class="col-md-4">
  <label for=""><h6>Contraseña</h6></label>
  <input class="form-control" value="<?php echo $usuario->password_usuario; ?>" type="password" name="password_usuario" id="password_usuario" placeholder="Ingrese su correo">
</div>
<div class="col-md-4">
  <label for=""><h6>Estado</h6></label>
  <select class="form-control" name="estado_usuario" id="estado_usuario">
    <option selected disabled value="">Seleccione un estado</option>
    <option value="1">Activo</option>
    <option value="0">Inactivo</option>
  </select>
</div>
<div class="col-md-4">
  <label for=""><h6>Perfil</h6></label>
  <select class="form-control" name="tipo_usuario" id="tipo_usuario">
    <option selected disabled value="">Seleccione un perfil</option>
     <option value="ADMINISTRADOR">ADMINISTRADOR</option>
     <option value="LECTOR">LECTOR</option>
  </select>
</div>
<div class="col-md-4">
  <b><label for=""><h6>Sector</h6></label></b>
  <select class="form-control" name="fk_id_sector" id="fk_id_sector" required >
    <option selected disabled value="">Selecciones un sector</option>
    <?php if ($listadoSectores): ?>
    <?php foreach ($listadoSectores->result() as $sector): ?>
      <option value="<?php echo $sector->id_sector; ?>">
        <?php echo $sector->nombre_sector; ?>
      </option>
    <?php endforeach; ?>
  <?php endif; ?>
  </select>
</div>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_usuario" id="fecha_ingreso_usuario" value="<?php echo $usuario->fecha_ingreso_usuario; ?>" readonly=»readonly»>
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Actualización</h6></label>
    <input class="form-control"  type="date" name="fecha_actualizacion_usuario" id="fecha_actualizacion_usuario" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
<div class="col-md-12">
  <label for=""><h6>Descripción</h6></label>
  <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $usuario->descripcion_usuario; ?>" name="descripcion_usuario" id="descripcion_usuario" placeholder="Ingrese su descripción">
</div>
<div class="col-md-12">
  <label for="" class="form-label"><h6>Fotografía</h6></label>
  <input class="form-control input-sm" value="<?php echo $usuario->foto_usuario; ?>" type="file" name="foto_usuario" id="foto_usuario" placeholder="Ingrese la fotografia" accept="image/*">
</div>
<div class="col-md-12">
  <button type="submit" name="button" class="btn btn-primary m-2">
    Guardar
  </button>
  <a href="<?php echo site_url(); ?>/usuarios/index"
    class="btn btn-danger m-2">
    Cancelar
  </a>
</div>
</form>


<script type="text/javascript">
//activando el pais seleccionado para el usuario
  $('#fk_id_sector').val('<?php echo $usuario->fk_id_sector; ?>');
  $('#estado_usuario').val('<?php echo $usuario->estado_usuario; ?>');
  $('#tipo_usuario').val('<?php echo $usuario->tipo_usuario; ?>');
</script>

<script type="text/javascript">
  $('#foto_usuario').fileinput({
    allowedFileExtensions:['jpeg','jpg','png'],
    dropZoneEnable:true,
    language:'es'

  });
</script>
<!--Cierre de ventana-->
</div>
</div>
