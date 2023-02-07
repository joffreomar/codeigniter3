  <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de cuentas</h5>
      </div>
      <!--Cierre de ventana-->

<form class="row g-3" action="<?php echo site_url(); ?>/cuentas/procesarActualizacion" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_cuenta" id="id_cuenta"value="<?php echo $cuenta->id_cuenta; ?>">
    <div class="col-md-4">
      <label for=""><h6>Cliente</h6></label>
      <select class="form-control" name="fk_id_cliente" id="fk_id_cliente" required >
        <option selected disabled value="">SELECCIONE UN CLIENTE</option>
        <?php if ($listadoClientes): ?>
        <?php foreach ($listadoClientes->result() as $clienteTemporal): ?>
          <option value="<?php echo $clienteTemporal->id_cliente; ?>">
            <?php echo $clienteTemporal->nombre_cliente; ?>
            <?php echo $clienteTemporal->apellido_cliente; ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
      </select>
    </div>
    <div class="col-md-4">
      <label for=""><h6>Número de cuenta</h6></label>
      <input class="form-control" value="<?php echo $cuenta->numero_cuenta; ?>" type="number" name="numero_cuenta" id="numero_cuenta" placeholder="INGRESE EL NÚMERO DE CUENTA">
    </div>
    <div class="col-md-4">
      <label for=""><h6>Fecha Ingreso</h6></label>
      <input class="form-control"  type="date" name="fecha_ingreso_cuenta" id="fecha_ingreso_cuenta" value="<?php echo $cuenta->fecha_ingreso_cuenta; ?>" readonly=»readonly»>
    </div>
    <div class="col-md-4">
      <label for=""><h6>Número de medidor</h6></label>
      <input class="form-control" value="<?php echo $cuenta->numero_medidor_cuenta; ?>" type="number" name="numero_medidor_cuenta" id="numero_medidor_cuenta" placeholder="INGRESE EL NÚMERO DE MEDIDOR">
    </div>
    <div class="col-md-4">
      <label for=""><h6>Dirección primaria</h6></label>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $cuenta->direccion_primaria_cuenta; ?>" type="text" name="direccion_primaria_cuenta" id="direccion_primaria_cuenta" placeholder="Ingrese la dirección primaria">
    </div>
    <div class="col-md-4">
      <label for=""><h6>Dirección secundaria</h6></label>
      <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $cuenta->direccion_secundaria_cuenta; ?>" type="text" name="direccion_secundaria_cuenta" id="direccion_secundaria_cuenta" placeholder="Ingrese la dirección secundaria">
    </div>
    <div class="col-md-4">
      <label for=""><h6>Sector</h6></label>
      <select class="form-control" name="fk_id_sector" id="fk_id_sector" required >
        <option selected disabled value="">SELECCIONE UN SECTOR</option>
        <?php if ($listadoSectores): ?>
        <?php foreach ($listadoSectores->result() as $sector): ?>
          <option value="<?php echo $sector->id_sector; ?>">
            <?php echo $sector->nombre_sector; ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
      </select>
    </div>
    <div class="col-md-4">
      <label for=""><h6>Tipo de cuenta</h6></label>
      <select class="form-control" name="fk_id_tpcuenta" id="fk_id_tpcuenta" required >
        <option selected disabled value="">SELECCIONE EL TIPO DE CUENTA</option>
        <?php if ($listadoTpcuentas): ?>
        <?php foreach ($listadoTpcuentas->result() as $tpcuentaTemporal): ?>
          <option value="<?php echo $tpcuentaTemporal->id_tpcuenta; ?>">
            <?php echo $tpcuentaTemporal->nombre_tpcuenta; ?> -
            Precio: $<?php echo $tpcuentaTemporal->precio_consumo_tpcuenta; ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
      </select>
    </div>
    <div class="col-md-4">
      <label for=""><h6>Estado</h6></label>
      <select class="form-control" name="estado_cuenta" id="estado_cuenta">
        <option selected disabled value="">Seleccione un estado</option>
        <option value="ACTIVA">ACTIVA</option>
        <option value="INACTIVA">INACTIVA</option>
      </select>
    </div>
    <?php date_default_timezone_set('America/Guayaquil');
    $fecha_actual=date("Y-m-d");
    ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha Actualización</h6></label>
    <input class="form-control"  type="date" name="fecha_actualizacion_cuenta" id="fecha_actualizacion_cuenta" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
    <div class="col-md-12">
      <button type="submit" name="button" class="btn btn-primary m-2">
        Guardar
      </button>
      <a href="<?php echo site_url(); ?>/cuentas/index"
        class="btn btn-danger m-2">
        Cancelar
      </a>
    </div>
</form>

<script type="text/javascript">
  $('#fk_id_cliente').val('<?php echo $cuenta->fk_id_cliente; ?>');
  $('#fk_id_sector').val('<?php echo $cuenta->fk_id_sector; ?>');
  $('#fk_id_tpcuenta').val('<?php echo $cuenta->fk_id_tpcuenta; ?>');
  $('#estado_cuenta').val('<?php echo $cuenta->estado_cuenta; ?>');
</script>

<!--Cierre de ventana-->
</div>
</div>
