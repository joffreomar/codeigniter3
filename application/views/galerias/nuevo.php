<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de Fotografías de galería</h5>
      </div>
      <!--Cierre de ventana-->
  <form class="row g-2" action="<?php echo site_url(); ?>/galerias/guardarGaleria" method="post" id="frm_nuevo_galeria" enctype="multipart/form-data">
    <div class="col-md-8">
      <label for=""><h6>Nombre</h6></label>
      <input class="form-control" value="" type="text" name="nombre_galeria" id="nombre_galeria" placeholder="Ingrese el nombre">
    </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_galeria" id="fecha_ingreso_galeria" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-12">
    <label for=""><h6>Fotografía</h6></label>
      <input lass="form-control" value="" type="file" name="foto_galeria" id="foto_galeria" placeholder="Ingrese la Fotografía">
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
<script type="text/javascript">
    $("#frm_nuevo_galeria").validate({
      rules:{
        foto_galeria:{
          required:true
        },
        nombre_galeria:{
          required:true
        }
      },
      messages:{
        foto_galeria:{
          required:"Ingrese la Fotografía"
        },
        nombre_galeria:{
          required:"Ingrese el nombre"
        }
      }
    });
</script>
<script type="text/javascript">

          $('#foto_galeria').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>
<!--Cierre de ventana-->
</div>
</div>
