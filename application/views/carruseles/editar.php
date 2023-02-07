<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de fotografías de carrusel</h5>
      </div>
      <!--Cierre de ventana-->
          <form class="row g-3" action="<?php echo site_url(); ?>/carruseles/procesarActualizacion" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_carrusel" id="id_carrusel"value="<?php echo $carrusel->id_carrusel; ?>">
            <div class="col-md-4">
              <label for=""><h6>Descripción</h6></label>
              <input class="form-control" value="<?php echo $carrusel->descripcion_carrusel; ?>" type="text" name="descripcion_carrusel" id="descripcion_carrusel" placeholder="Ingrese la descripción">
            </div>
          <div class="col-md-4">
            <label for=""><h6>Fecha Ingreso</h6></label>
            <input class="form-control"  type="date" name="fecha_ingreso_carrusel" id="fecha_ingreso_carrusel" value="<?php echo $carrusel->fecha_ingreso_carrusel; ?>" readonly=»readonly»>
          </div>
          <?php date_default_timezone_set('America/Guayaquil');
          $fecha_actual=date("Y-m-d");
          ?>
          <div class="col-md-4">
            <label for=""><h6>Fecha Actualización</h6></label>
            <input class="form-control"  type="date" name="fecha_actualizacion_carrusel" id="fecha_actualizacion_carrusel" value="<?= $fecha_actual; ?>" readonly=»readonly»>
          </div>
            <div class="col-md-12">
              <label for="">Foto</label>
                <input class="form-control" value="" type="file" name="foto_carrusel" id="foto_carrusel" placeholder="Ingrese la Fotografía">
            </div>
            <div class="col-md-12">
              <button type="submit" name="button" class="btn btn-primary m-2" >
                Guardar
              </button>
              <a href="<?php echo site_url(); ?>/carruseles/index"
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

          $('#foto_carrusel').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
