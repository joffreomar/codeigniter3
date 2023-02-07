<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Servicios</h5>
      </div>
      <!--Cierre de ventana-->
        <form class="row g-3" action="<?php echo site_url(); ?>/servicios/procesarActualizacion" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $servicio->id_servicio; ?>">
          <div class="col-md-7">
            <label for=""><h6>Nombre</h6></label>
            <input class="form-control" value="<?php echo $servicio->nombre_servicio; ?>" type="text" name="nombre_servicio" id="nombre_servicio" placeholder="Por favor Ingrese el nombre">
          </div>
          <?php date_default_timezone_set('America/Guayaquil');
          $fecha_actual=date("Y-m-d");
          ?>
          <div class="col-md-2">
            <label for=""><h6>Fecha Ingreso</h6></label>
            <input class="form-control"  type="date" value="<?php echo $servicio->fecha_ingreso_servicio; ?>" name="fecha_ingreso_servicio" id="fecha_ingreso_servicio" readonly=»readonly»>
          </div>
          <div class="col-md-3">
            <label for=""><h6>Fecha Actualización</h6></label>
            <input class="form-control"  type="date" value="<?= $fecha_actual; ?>" name="fecha_actualizacion_servicio" id="fecha_actualizacion_servicio" value="<?= $fecha_actual; ?>" readonly=»readonly»>
          </div>
          <div class="col-md-12">
            <label for=""><h6>Descripción</h6></label>
            <input class="form-control" value="<?php echo $servicio->descripcion_servicio; ?>" type="text" name="descripcion_servicio" id="descripcion_servicio" placeholder="Por favor Ingrese la descripcion">
          </div>
          <div class="col-md-12">
            <label for=""><h6>Fotografía</h6></label>
            <input class="form-control" value="" type="file" name="foto_servicio" id="foto_servicio" placeholder="Por favor Ingrese la foto">
          </div>
            <div class="col-md-12">
              <button type="submit" name="button" class="btn btn-primary m-2" >
                Guardar
              </button>
              <a href="<?php echo site_url(); ?>/servicios/index"
                class="btn btn-danger m-2">
                Cancelar
              </a>
            </div>
        </form>

<!--Cierre de ventana-->
</div>
</div>


<script type="text/javascript">

          $('#foto_servicio').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
