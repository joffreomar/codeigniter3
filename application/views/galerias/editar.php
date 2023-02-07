<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Fotografías de galería</h5>
      </div>
<form class="row g-3" action="<?php echo site_url(); ?>/galerias/procesarActualizacion" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id_galeria" id="id_galeria" value="<?php echo $galeria->id_galeria; ?>">
  <div class="col-md-4">
    <label for=""><h6>Nombre</h6></label>
    <input class="form-control" value="<?php echo $galeria->nombre_galeria; ?>" type="text" name="nombre_galeria" id="nombre_galeria" placeholder="Ingrese el nombre">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
  <label for=""><h6>Fecha Ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_galeria" id="fecha_ingreso_galeria" value="<?php echo $galeria->fecha_ingreso_galeria; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
  <label for=""><h6>Fecha Actualización</h6></label>
  <input class="form-control"  type="date" name="fecha_actualizacion_galeria" id="fecha_actualizacion_galeria" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-12">
  <label for=""><h6>Fotografía</h6></label>
    <input lass="form-control" value="<?php echo $galeria->foto_galeria; ?>" type="file" name="foto_galeria" id="foto_galeria" placeholder="Ingrese la Fotografía">
  </div>
  <div class="col-md-12">
  <button type="submit" name="button" class="btn btn-primary m-2" >
    Guardar
  </button>
  <a href="<?php echo site_url(); ?>/galerias/index"
    class="btn btn-danger m-2">
    Cancelar
  </a>
  </div>
</form>
</div>
</div>

<!--Cierre de ventana-->
</div>
</div>

<script type="text/javascript">

          $('#foto_galeria').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
