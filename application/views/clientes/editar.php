<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Clientes</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/clientes/procesarActualizacion" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_cliente" id="id_cliente"value="<?php echo $cliente->id_cliente; ?>">
  <div class="col-md-4">
    <label for=""><h6>Nombres</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" value="<?php echo $cliente->nombre_cliente; ?>" name="nombre_cliente" id="nombre_cliente" placeholder="Ingrese su nombre">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Apellido</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" value="<?php echo $cliente->apellido_cliente; ?>" name="apellido_cliente" id="apellido_cliente" placeholder="Ingrese su apellido">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_cliente" id="fecha_ingreso_cliente" value="<?php echo $cliente->fecha_ingreso_cliente; ?>" readonly=»readonly»>
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha actualizacion</h6></label>
    <input class="form-control"  type="date" name="fecha_actualizacion_cliente" id="fecha_actualizacion_cliente" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Cédula</h6></label>
    <input class="form-control"  type="number" value="<?php echo $cliente->cedula_cliente; ?>"name="cedula_cliente" id="cedula_cliente" placeholder="INGRESE SU CÉDULA">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Teléfono</h6></label>
    <input class="form-control"  type="number" value="<?php echo $cliente->telefono_cliente; ?>" name="telefono_cliente" id="telefono_cliente" placeholder="INGRESE SU TELÉFONO">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Correo</h6></label>
    <input class="form-control"  type="email" value="<?php echo $cliente->correo_cliente; ?>" name="correo_cliente" id="correo_cliente" placeholder="INGRRESE SU CORREO">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Estado</h6></label>
    <select class="form-control" name="estado_cliente" id="estado_cliente">
      <option selected disabled value="">SELECCIONE UN ESTADO</option>
      <option value="ACTIVO">ACTIVO</option>
      <option value="INACTIVO">INACTIVO</option>
    </select>
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/clientes/index"
      class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
  </form>

<script type="text/javascript">
//activando el pais seleccionado para el usuario
  $('#estado_cliente').val('<?php echo $cliente->estado_cliente; ?>');
</script>
<!--Cierre de ventana-->
</div>
</div>
