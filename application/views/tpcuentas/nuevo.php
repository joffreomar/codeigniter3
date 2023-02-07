<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de tipos de cuentas</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3" action="<?php echo site_url(); ?>/tpcuentas/guardarTpcuenta" method="post" id="frm_nuevo_tpcuenta" enctype="multipart/form-data">
  <div class="col-md-8">
    <label for=""><h6>Nombre</h6></label>
    <input  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"class="form-control"  type="text" name="nombre_tpcuenta" id="nombre_tpcuenta" placeholder="Ingrese su nombre">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
<div class="col-md-4">
  <label for=""><h6>Fecha Ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_tpcuenta" id="fecha_ingreso_tpcuenta" value="<?= $fecha_actual; ?>" readonly=»readonly»>
</div>
  <div class="col-md-12">
    <label for=""><h6>Precio por m3</h6></label>
    <input class="form-control"  type="number" step="0.01" min="0" name="precio_consumo_tpcuenta" id="precio_consumo_tpcuenta" placeholder="Ingrese el precio">
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/tpcuentas/index"
      class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
</form>

<script type="text/javascript">
    $("#frm_nuevo_tpcuenta").validate({
      rules:{
        nombre_tpcuenta:{
          required:true
        },
        precio_consumo_tpcuenta:{
          required:true
        }
      },
      messages:{
        nombre_tpcuenta:{
          required:"Ingrese el nombre"
        },
        descripcion_tpcuenta:{
          required:"Ingrese el precio por m3 de agua"
        }
      }
    });
</script>



<!--Cierre de ventana-->
</div>
</div>
