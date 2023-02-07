<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de Sectores</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/sectores/guardarSector" method="post" id="frm_nuevo_sector" enctype="multipart/form-data">
  <div class="col-md-8">
    <label for=""><h6>Nombre</h6></label>
    <input class="form-control" type="text" name="nombre_sector" id="nombre_sector" placeholder="Ingrese su nombre">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
<div class="col-md-4">
  <label for=""><h6>Fecha Ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_sector" id="fecha_ingreso_sector" value="<?= $fecha_actual; ?>" readonly=»readonly»>
</div>
  <div class="col-md-12">
    <label for=""><h6>Descripción</h6></label>
    <input class="form-control"  type="text" name="descripcion_sector" id="descripcion_sector" placeholder="Por favor Ingrese la descripción">
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/sectores/index"
    class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
</form>

<script type="text/javascript">
    $("#frm_nuevo_sector").validate({
      rules:{
        nombre_sector:{
          required:true
        },
        descripcion_sector:{
          required:true
        }
      },
      messages:{
        nombre_sector:{
          required:"Ingrese el nombre"
        },
        descripcion_sector:{
          required:"Ingrese la descripción"
        }
      }
    });
</script>



<!--Cierre de ventana-->
</div>
</div>
