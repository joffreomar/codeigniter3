<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Usuarios</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/sectores/procesarActualizacion" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id_sector" id="id_sector" value="<?php echo $sector->id_sector; ?>">
  <div class="col-md-4">
    <label for=""><h6>Nombre</h6></label>
    <input class="form-control" value="<?php echo $sector->nombre_sector; ?>" type="text" name="nombre_sector" id="nombre_sector" placeholder="Ingrese su nombre">
  </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_sector" id="fecha_ingreso_sector" value="<?php echo $sector->fecha_ingreso_sector; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Fecha Actualización</h6></label>
    <input class="form-control"  type="date" name="fecha_actualizacion_sector" id="fecha_actualizacion_sector" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-12">
    <label for=""><h6>Descripción</h6></label>
    <input class="form-control" value="<?php echo $sector->descripcion_sector; ?>" type="text" name="descripcion_sector" id="descripcion_sector" placeholder="Por favor Ingrese la descripción">
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/sectores/index"
    class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
</form>



<!--Cierre de ventana-->
</div>
</div>
