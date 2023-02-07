<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de misión</h5>
      </div>
      <!--Cierre de ventana-->
        <form class="row g-3" action="<?php echo site_url(); ?>/misiones/procesarActualizacion" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_mision" id="id_mision"value="<?php echo $mision->id_mision; ?>">
            <div class="col-md-7">
              <label for=""><h6>Nombre</h6></label>
              <input class="form-control" value="<?php echo $mision->nombre_mision; ?>" type="text" name="nombre_mision" id="nombre_mision" placeholder="Ingrese el nombre">
            </div>
            <?php date_default_timezone_set('America/Guayaquil');
            $fecha_actual=date("Y-m-d");
            ?>
          <div class="col-md-2">
            <label for=""><h6>Fecha Ingreso</h6></label>
            <input class="form-control"  type="date" name="fecha_ingreso_mision" id="fecha_ingreso_mision" value="<?php echo $mision->fecha_ingreso_mision; ?>" readonly=»readonly»>
          </div>
          <div class="col-md-3">
            <label for=""><h6>Fecha Actualización</h6></label>
            <input class="form-control"  type="date" name="fecha_actualizacion_mision" id="fecha_actualizacion_mision" value="<?= $fecha_actual; ?>" readonly=»readonly»>
          </div>
            <div class="col-md-12">
              <label for=""><h6>Descripción</h6></label>
              <textarea class="form-control" type="text" name="descripcion_mision" id="descripcion_mision" rows="5" cols="80" placeholder="Ingrese la descripción"><?php echo $mision->descripcion_mision; ?></textarea>
            </div>
          <div class="col-md-12">
            <label for=""><h6>Fotografía</h6></label>
              <input class="form-control" value="<?php echo $mision->foto_mision; ?>" type="file" name="foto_mision" id="foto_mision" placeholder="Ingrese la Fotografía">
          </div>
          <div class="col-md-12">
            <button type="submit" name="button" class="btn btn-primary m-2" >
              Guardar
            </button>
            <a href="<?php echo site_url(); ?>/misiones/index"
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

          $('#foto_mision').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
