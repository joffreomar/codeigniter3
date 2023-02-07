<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de noticias</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-2" action="<?php echo site_url(); ?>/noticias/guardarNoticia" method="post" id="frm_nuevo_noticia" enctype="multipart/form-data">
  <div class="col-md-8">
    <label for=""><h6>Nombre</h6></label>
    <input class="form-control" value="" type="text" name="nombre_noticia" id="nombre_noticia" placeholder="Ingrese el nombre">
  </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_noticia" id="fecha_ingreso_noticia" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-12">
    <label for=""><h6>Descripción</h6></label>
    <textarea class="form-control"  type="text" name="descripcion_noticia" id="descripcion_noticia" placeholder="Ingrese la descripción" rows="4" cols="80"></textarea>
  </div>
  <div class="col-md-12">
    <label for=""><h6>Fotografía</h6></label>
    <input class="form-control" value="" type="file" name="foto_noticia" id="foto_noticia" placeholder="Ingrese la foto">
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
<script type="text/javascript">
    $("#frm_nuevo_noticia").validate({
      rules:{
        foto_noticia:{
          required:true
        },
        nombre_noticia:{
          required:true,
          letras:true
        },
        descripcion_noticia:{
          required:true
        }
      },
      messages:{
        foto_noticia:{
          required:"Ingrese la Fotografía"
        },
        nombre_noticia:{
          required:"Ingrese el nombre"
        },
        descripcion_noticia:{
          required:"Ingrese la descripción"
        }
      }
    });
</script>
<script type="text/javascript">

          $('#foto_noticia').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
</script>


<!--Cierre de ventana-->
</div>
</div>
