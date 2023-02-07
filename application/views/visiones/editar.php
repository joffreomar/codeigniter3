<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de visión</h5>
      </div>
      <!--Cierre de ventana-->
          <form class="row g-3" action="<?php echo site_url(); ?>/visiones/procesarActualizacion" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_vision" id="id_vision"value="<?php echo $vision->id_vision; ?>">
            <div class="col-md-7">
              <label for=""><h6>Nombre</h6></label>
              <input class="form-control" value="<?php echo $vision->nombre_vision; ?>" type="text" name="nombre_vision" id="nombre_vision" placeholder="Ingrese el nombre">
            </div>
            <?php date_default_timezone_set('America/Guayaquil');
            $fecha_actual=date("Y-m-d");
            ?>
          <div class="col-md-2">
            <label for=""><h6>Fecha Ingreso</h6></label>
            <input class="form-control"  type="date" name="fecha_ingreso_vision" id="fecha_ingreso_vision" value="<?php echo $vision->fecha_ingreso_vision; ?>" readonly=»readonly»>
          </div>
          <div class="col-md-3">
            <label for=""><h6>Fecha Actualización</h6></label>
            <input class="form-control"  type="date" name="fecha_actualizacion_vision" id="fecha_actualizacion_vision" value="<?= $fecha_actual; ?>" readonly=»readonly»>
          </div>
          <div class="col-md-12">
            <label for=""><h6>Descripción</h6></label>
            <textarea class="form-control" value="" type="text" name="descripcion_vision" id="descripcion_vision" rows="4" cols="80" placeholder="Ingrese la descripción"><?php echo $vision->descripcion_vision; ?></textarea>
          </div>
          <div class="col-md-12">
            <label for=""><h6>Fotografía</h6></label>
              <input class="form-control" value="<?php echo $vision->foto_vision; ?>" type="file" name="foto_vision" id="foto_vision" placeholder="Ingrese la Fotografía">
          </div>
          <div class="col-md-12">
            <button type="submit" name="button" class="btn btn-primary m-2" >
              Guardar
            </button>
            <a href="<?php echo site_url(); ?>/visiones/index"
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

          $('#foto_vision').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
