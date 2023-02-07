<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de Fotografías de carrusel</h5>
      </div>
      <!--Cierre de ventana-->
    <form class="row g-2" action="<?php echo site_url(); ?>/carruseles/guardarCarrusel" method="post" id="frm_nuevo_carrusel" enctype="multipart/form-data">
      <div class="col-md-8">
        <label for=""><h6>Descripción</h6></label>
        <input class="form-control" value="" type="text" name="descripcion_carrusel" id="descripcion_carrusel" placeholder="Ingrese la descripción">
      </div>
      <?php date_default_timezone_set('America/Guayaquil');
      $fecha_actual=date("Y-m-d");
      ?>
    <div class="col-md-4">
      <label for=""><h6>Fecha Ingreso</h6></label>
      <input class="form-control"  type="date" name="fecha_ingreso_carrusel" id="fecha_ingreso_carrusel" value="<?= $fecha_actual; ?>" readonly=»readonly»>
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

<script type="text/javascript">
    $("#frm_nuevo_carrusel").validate({
      rules:{
        foto_carrusel:{
          required:true
        },
        descripcion_carrusel:{
          required:true
        }
      },
      messages:{
        foto_carrusel:{
          required:"Por favor ingrese la foto"
        },
        descripcion_carrusel:{
          required:"Por favor ingrese la descripción"
        }
      }
    });
</script>

<script type="text/javascript">

          $('#foto_carrusel').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
<!--Cierre de ventana-->
</div>
</div>
