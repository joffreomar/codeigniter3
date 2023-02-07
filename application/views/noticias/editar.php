<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de noticia</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3" action="<?php echo site_url(); ?>/noticias/procesarActualizacion" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id_noticia" id="id_noticia" value="<?php echo $noticia->id_noticia; ?>">
    <div class="col-md-7">
      <label for=""><h6>Nombre</h6></label>
      <input class="form-control" value="<?php echo $noticia->nombre_noticia; ?>" type="text" name="nombre_noticia" id="nombre_noticia" placeholder="Ingrese el nombre">
    </div>      <?php date_default_timezone_set('America/Guayaquil');
          $fecha_actual=date("Y-m-d");
          ?>
    <div class="col-md-2">
      <label for=""><h6>Fecha Ingreso</h6></label>
      <input class="form-control"  type="date" name="fecha_ingreso_noticia" id="fecha_ingreso_noticia" value="<?php echo $noticia->fecha_ingreso_noticia; ?>" readonly=»readonly»>
    </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
    <div class="col-md-3">
      <label for=""><h6>Fecha Actualización</h6></label>
      <input class="form-control"  type="date" name="fecha_actualizacion_noticia" id="fecha_actualizacion_noticia" value="<?= $fecha_actual; ?>" readonly=»readonly»>
    </div>
    <div class="col-md-12">
      <label for=""><h6>Descripción</h6></label>
      <textarea class="form-control"  type="text" name="descripcion_noticia" id="descripcion_noticia" placeholder="Ingrese la descripción" rows="4" cols="80"><?php echo $noticia->descripcion_noticia; ?></textarea>
    </div>
    <div class="col-md-12">
      <label for=""><h6>Fotografía</h6></label>
      <input class="form-control" value="<?php echo $noticia->foto_noticia; ?>" type="file" name="foto_noticia" id="foto_noticia" placeholder="Ingrese la Fotografía">
    </div>
    <div class="col-md-12">
      <button type="submit" name="button" class="btn btn-primary m-2" >
        Guardar
      </button>
      <a href="<?php echo site_url(); ?>/noticias/index"
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

          $('#foto_noticia').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
