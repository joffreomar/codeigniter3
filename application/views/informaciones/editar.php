<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de información</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/informaciones/procesarActualizacion" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_informacion" id="id_informacion"value="<?php echo $informacion->id_informacion; ?>">
<div class="col-md-4">
  <label for=""><h6>Nombres</h6></label>
  <input class="form-control"  type="text" value="<?php echo $informacion->nombre_informacion; ?>" name="nombre_informacion" id="nombre_informacion" placeholder="Ingrese su nombre">
</div>
<div class="col-md-4">
  <label for=""><h6>Dirección</h6></label>
  <input class="form-control"  type="text" value="<?php echo $informacion->direccion_informacion; ?>" name="direccion_informacion" id="direccion_informacion" placeholder="Ingrese su apellido">
</div>
<div class="col-md-4">
  <label for=""><h6>Fecha ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_informacion" id="fecha_ingreso_informacion" value="<?php echo $informacion->fecha_ingreso_informacion; ?>" readonly=»readonly»>
</div>
<?php date_default_timezone_set('America/Guayaquil');
$fecha_actual=date("Y-m-d");
?>
<div class="col-md-4">
  <label for=""><h6>Fecha actualización</h6></label>
  <input class="form-control"  type="date" name="fecha_actualizacion_informacion" id="fecha_actualizacion_informacion" value="<?= $fecha_actual; ?>" readonly=»readonly»>
</div>
<div class="col-md-4">
  <label for=""><h6>Télefono convencional</h6></label>
  <input class="form-control"  type="number" value="<?php echo $informacion->convencional_informacion; ?>"  name="convencional_informacion" id="convencional_informacion" placeholder="Ingrese su teléfono">
</div>
<div class="col-md-4">
  <label for=""><h6>Télefono celular</h6></label>
  <input class="form-control"  type="number" value="<?php echo $informacion->telefono_informacion; ?>" name="telefono_informacion" id="telefono_informacion" placeholder="Ingrese su teléfono">
</div>
<div class="col-md-4">
  <label for=""><h6>Correo</h6></label>
  <input class="form-control"  type="email" value="<?php echo $informacion->correo_informacion; ?>" name="correo_informacion" id="correo_informacion" placeholder="Ingrese su correo">
</div>
<div class="col-md-12">
  <button type="submit" name="button" class="btn btn-primary m-2">
    Guardar
  </button>
  <a href="<?php echo site_url(); ?>/informaciones/index"
    class="btn btn-danger m-2">
    Cancelar
  </a>
</div>
  </form>

<!--Cierre de ventana-->
</div>
</div>
