<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de cuentas</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3" action="<?php echo site_url(); ?>/cuentas/guardarCuenta" method="post" id="frm_nuevo_cuenta" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for=""><h6>Cliente</h6></label>
    <select class="form-control" name="fk_id_cliente" id="fk_id_cliente" required >
      <option selected disabled value="">SELECCIONE EL CLIENTE</option>
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
    <input class="form-control"  type="number" name="numero_cuenta" id="numero_cuenta" placeholder="INGRESE EL NÚMERO DE CUENTA">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
    <label for=""><h6>Número de medidor</h6></label>
    <input class="form-control"  type="number" name="numero_medidor_cuenta" id="numero_medidor_cuenta" placeholder="INGRESE EL NÚMERO DE MEDIDOR">
  </div>
<div class="col-md-4">
  <label for=""><h6>Fecha Ingreso</h6></label>
  <input class="form-control"  type="date" name="fecha_ingreso_cuenta" id="fecha_ingreso_cuenta" value="<?= $fecha_actual; ?>" readonly=»readonly»>
</div>
  <div class="col-md-4">
    <label for=""><h6>Dirección primaria</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" name="direccion_primaria_cuenta" id="direccion_primaria_cuenta" placeholder="Ingrese la dirección primaria">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Dirección secundaria</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" name="direccion_secundaria_cuenta" id="direccion_secundaria_cuenta" placeholder="Ingrese la dirección secundaria">
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
      <option selected disabled value="">SELECCIONE UN ESTADO</option>
      <option value="ACTIVA">ACTIVA</option>
      <option value="INACTIVA">INACTIVA</option>
    </select>
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
    $("#frm_nuevo_cuenta").validate({
      rules:{
        tipo_cuenta:{
          required:true
        },
        numero_cuenta:{
          required:true
        },
        numero_medidor_cuenta:{
          required:true
        },
        direccion_primaria_cuenta:{
          required:true
        },
        direccion_secundaria_cuenta:{
          required:true
        },
        fk_id_sector:{
          required:true
        },
        fk_id_tpcuenta:{
          required:true
        },
        fk_id_cliente:{
          required:true
        },
        estado_cuenta:{
          required:true
        }
      },
      messages:{
        tipo_cuenta:{
          letras:"Seleccione un Cliente",
        },
        numero_cuenta:{
          required:"Ingrese el numero de cuenta"
        },
        numero_medidor_cuenta:{
          required:"Ingrese el numero de medidor"
        },
        direccion_primaria_cuenta:{
          required:"Por favor ingrese la direccion primaria de la cuenta"
        },
        direccion_secundaria_cuenta:{
          required:"Por favor ingrese la direccion secundaria de la cuenta"
        },
        fk_id_sector:{
          required:"Por favor seleccione el sector"
        },
        fk_id_tpcuenta:{
          required:"Por favor seleccione el tipo de cuenta"
        },
        fk_id_cliente:{
          required:"Por favor seleccione un cliente"
        },
        estado_cuenta:{
          required:"Por favor seleccione el estado"
        }
      }
    });
</script>


<!--Cierre de ventana-->
</div>
</div>
