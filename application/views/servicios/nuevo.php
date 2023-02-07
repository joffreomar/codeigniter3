<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de Servicios</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-2" action="<?php echo site_url(); ?>/servicios/guardarServicio" method="post" id="frm_nuevo_servicio" enctype="multipart/form-data">
<div class="col-md-8">
  <label for=""><h6>Nombre</h6></label>
  <input class="form-control" value="" type="text" name="nombre_servicio" id="nombre_servicio" placeholder="Por favor Ingrese el nombre">
</div>
<?php date_default_timezone_set('America/Guayaquil');
$fecha_actual=date("Y-m-d");
?>
<div class="col-md-4">
  <label for=""><h6>Fecha Ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_servicio" id="fecha_ingreso_servicio" value="<?= $fecha_actual; ?>" readonly=»readonly»>
</div>
<div class="col-md-12">
  <label for=""><h6>Descripción</h6></label>
  <input class="form-control" value="" type="text" name="descripcion_servicio" id="descripcion_servicio" placeholder="Por favor Ingrese la descripcion">
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
</div>
</div>
</div>
<script type="text/javascript">
    $("#frm_nuevo_servicio").validate({
      rules:{
        nombre_servicio:{
          letras:true,
          required:true
        },
        descripcion_servicio:{
          letras:false,
          required:true
        },
        foto_servicio:{
          required:true
        }
      },
      messages:{
        nombre_servicio:{
          required:"Ingrese el nombre del servicio"
        },
        foto_servicio:{
          required:"Seleccione una fotografía"
        },
        descripcion_servicio:{
          required:"Ingrese la cédula"
        },
      }
    });
</script>

<script type="text/javascript">

          $('#foto_servicio').fileinput({
            allowedFileExtensions:['jpeg','jpg','png'],
            dropZoneEnable:true,
            language:'es'
          });
        </script>
<!--Cierre de ventana-->
</div>
</div>
