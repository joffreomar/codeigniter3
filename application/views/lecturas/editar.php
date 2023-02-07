<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Edición de Lecturas</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3"action="<?php echo site_url(); ?>/lecturas/procesarActualizacion" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_lectura" id="id_lectura"value="<?php echo $lectura->id_lectura; ?>">
<div class="col-md-8">
  <label for=""><h6>Cliente</h6></label>
  <select class="form-control" name="fk_id_cuenta" id="fk_id_cuenta" required>
    <option value=""selected disabled value>Seleccione el cliente</option>
    <?php if ($listadoCuentas): ?>
    <?php foreach ($listadoCuentas->result() as $cuenta): ?>
      <option selected disabled value="<?php echo $cuenta->id_cuenta; ?>">
        <?php echo $cuenta->numero_medidor_cuenta; ?> -
        <?php echo $cuenta->nombre_cliente; ?>
        <?php echo $cuenta->apellido_cliente; ?>
      </option>
    <?php endforeach; ?>
  <?php endif; ?>
  </select>
</div>

<div class="col-md-4">
  <label for=""><h6>Fecha</h6></label>
  <input class="form-control"  type="date" name="fecha_lectura" id="fecha_lectura" value="<?php echo $lectura->fecha_lectura; ?>" readonly=»readonly»>
</div>
<div class="col-md-4">
  <label for=""><h6>Consumo</h6></label>
  <input class="form-control"  type="text" value="<?php echo $lectura->consumo_lectura; ?>" name="consumo_lectura" id="consumo_lectura" placeholder="El consumo es de:" readonly=»readonly» required >
</div>
<div class="col-md-4">
  <label for=""><h6>Lectura Anterior</h6></label>
  <input class="form-control" type="number" name="lectura_anterior_lectura" id="lectura_anterior_lectura" value="<?php echo $ultimaLectura->lectura_actual_lectura; ?>" placeholder="Ingrese el valor de la lectura" required readonly=»readonly» required>
</div>
<div class="col-md-4">
  <label for=""><h6>Lectura Actual</h6></label>
  <input class="form-control" type="number" value="<?php echo $lectura->lectura_actual_lectura; ?>" name="lectura_actual_lectura" id="lectura_actual_lectura" placeholder="Ingrese el valor de la lectura" required>
</div>
<div class="col-md-4">
  <label for=""><h6>Pago Estimado</h6></label>
  <input class="form-control"  type="number" step="0.01" min="0" value="<?php echo $lectura->pago_lectura; ?>" name="pago_lectura" id="pago_lectura" placeholder="El pago estimado es:" readonly=»readonly» required>
</div>
<div class="col-md-4">
  <label for=""><h6>Estado</h6></label>
  <select class="form-control" name="estado_lectura" id="estado_lectura" required>
    <option value="">Seleccione un estado</option>
    <option value="COMPLETADO">COMPLETADO</option>
    <option value="PENDIENTE">PENDIENTE</option>
  </select>
</div>
<div class="col-md-4">
  <label for=""><h6>Encargado lectura</h6></label>
  <input class="form-control" type="text" name="encargado_lectura" id="encargado_lectura" value="<?php echo $lectura->encargado_lectura; ?>" placeholder="Ingrese el encargado de la lectura" readonly=»readonly»>
</div>
<div class="col-md-12">
  <label for=""><h6>Observación</h6></label>
  <input class="form-control"  type="text" value="<?php echo $lectura->observacion_lectura; ?>" name="observacion_lectura" id="observacion_lectura" placeholder="Ingrese la observación" required>
</div>
<div class="col-md-12">
  <button type="submit" name="button" class="btn btn-primary m-2" >
    Guardar
  </button>
  <a href="<?php echo site_url(); ?>/lecturas/index"
    class="btn btn-danger m-2">
    Cancelar
  </a>
</div>
</form>

<script type="text/javascript">
$("#fk_id_cuenta").select2();
</script>

<script type="text/javascript">
//activando el pais seleccionado para el usuario
  $('#fk_id_cuenta').val('<?php echo $lectura->fk_id_cuenta; ?>');
  $('#estado_lectura').val('<?php echo $lectura->estado_lectura; ?>');
</script>

<!--Cierre de ventana-->
</div>
</div>
