<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de tipos de cuentas</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/tpcuentas/procesarActualizacion" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id_tpcuenta" id="id_tpcuenta" value="<?php echo $tpcuenta->id_tpcuenta; ?>">
  <div class="col-md-8">
    <label for=""><h6>Nombre</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $tpcuenta->nombre_tpcuenta; ?>" type="text" name="nombre_tpcuenta" id="nombre_tpcuenta" placeholder="Ingrese su nombre">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Fecha Ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_tpcuenta" id="fecha_ingreso_tpcuenta" value="<?php echo $tpcuenta->fecha_ingreso_tpcuenta; ?>" readonly=»readonly»>
  </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Actualización</h6></label>
    <input class="form-control"  type="date" name="fecha_actualizacion_tpcuenta" id="fecha_actualizacion_tpcuenta" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Precio por m3</h6></label>
    <input class="form-control" step="0.01" min="0" value="<?php echo $tpcuenta->precio_consumo_tpcuenta; ?>" type="number" name="precio_consumo_tpcuenta" id="precio_consumo_tpcuenta" placeholder="Ingrese el precio">
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


<!--Cierre de ventana-->
</div>
</div>
