<div class="container-fluid pt-4 px-4">
  <div class="bg-light  rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="mb-0">Registro de Lecturas</h5>
    </div>

    <!--Cierre de ventana-->
    <form class="row g-3" name="f" action="<?php echo site_url(); ?>/lecturas/guardarLectura" method="post" id="frm_nuevo_lectura" enctype="multipart/form-data">
      <div class="col-md-8">
        <label for="">
          <h6>Busqueda de cliente</h6>
        </label>
        <select class="form-select" name="fk_id_cuenta" id="fk_id_cuenta" onchange="javascript:cargar_formulario();">
          <option selected disabled value="">Seleccione el cliente</option>
          <?php if ($listadoCuentas) : ?>
            <?php foreach ($listadoCuentas->result() as $cuenta) : ?>
              <option value="<?php echo $cuenta->id_cuenta; ?>">
                <?php echo $cuenta->numero_medidor_cuenta; ?> -
                <?php echo $cuenta->nombre_cliente; ?>
                <?php echo $cuenta->apellido_cliente; ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>


      <div class="form-group">
        <label for="result">Resultado</label>
        <input type="text" name="result" id="result" class="form-control" value="">
      </div>

      <?php date_default_timezone_set('America/Guayaquil');
      $fecha_actual = date("Y-m-d");
      ?>
      <div class="col-md-4">
        <label for="">
          <h6>Fecha Ingreso</h6>
        </label>
        <input class="form-control" type="date" name="fecha_lectura" id="fecha_lectura" value="<?= $fecha_actual; ?>" readonly=»readonly»>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Lectura Anterior</h6>
        </label>
        <!-- <?php if ($lectura_actual_lectura = !" ") : ?>
          <input class="form-control" type="number" value="<?php echo $ultimaLectura->lectura_actual_lectura; ?>" name="lectura_anterior_lectura" id="lectura_anterior_lectura" placeholder="El valor anterior de la lectura es:" onchange="cal()" onkeyup="cal()" readonly=»readonly»>
        <?php else : ?>
          <input class="form-control" type="number" value="0" name="lectura_anterior_lectura" id="lectura_anterior_lectura" onchange="cal()" onkeyup="cal()" readonly=»readonly»>
        <?php endif; ?> -->
        <input class="form-control" type="number" value="0" name="lectura_anterior_lectura" id="lectura_anterior_lectura" onchange="cal()" onkeyup="cal()" readonly=»readonly»>



      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Lectura Actual</h6>
        </label>
        <input class="form-control" type="number" name="lectura_actual_lectura" id="lectura_actual_lectura" placeholder="Ingrese el valor de la lectura" onchange="cal()" onkeyup="cal()" required>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Consumo</h6>
        </label>
        <input class="form-control" type="number" name="consumo_lectura" id="consumo_lectura" readonly=»readonly»>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Pago Estimado</h6>
        </label>
        <input class="form-control" type="number" step="0.01" min="0" name="pago_lectura" id="pago_lectura" readonly=»readonly»>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Estado</h6>
        </label>
        <select class="form-control" name="estado_lectura" id="estado_lectura" required>
          <option value="">Seleccione un estado</option>
          <option value="COMPLETADO">COMPLETADO</option>
          <option value="PENDIENTE">PENDIENTE</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Encargado lectura</h6>
        </label>
        <input class="form-control" type="text" name="encargado_lectura" id="encargado_lectura" value="<?php echo $this->session->userdata("c0nectadoUTC")->nombre_usuario; ?> <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usuario; ?>" placeholder="Ingrese el encargado de la lectura" readonly=»readonly»>
      </div>

      <div class="col-md-12">
        <label for="">
          <h6>Observación</h6>
        </label>
        <input class="form-control" type="text" name="observacion_lectura" id="observacion_lectura" placeholder="Ingrese la observación" required>
      </div>
      <div class="col-md-12">
        <button type="submit" name="button" class="btn btn-primary m-2">
          Guardar
        </button>
        <a href="<?php echo site_url(); ?>/lecturas/index" class="btn btn-danger m-2">
          Cancelar
        </a>
      </div>
    </form>

    <script type="text/javascript">
      $("#fk_id_cuenta").select2();
    </script>

    <script type="text/javascript">
      function cal() {
        try {
          var a = parseInt(document.f.lectura_actual_lectura.value),
            b = parseInt(document.f.lectura_anterior_lectura.value);
          document.f.consumo_lectura.value = a - b;
        } catch (e) {}
      }
    </script>
    <!--LLENAR FORMULARIO CON ELEMENTO SELECCIONADO POR SELECT-->
    <script type="text/javascript">
      function cargar_formulario() {
        const fk_id_cuenta = document.querySelector('#fk_id_cuenta');
        console.log(fk_id_cuenta)
        let valorOption = fk_id_cuenta.value;
        console.log(valorOption);

        var optionSelect = fk_id_cuenta.options[fk_id_cuenta.selectedIndex];

        console.log("Opción:", optionSelect.text);
        console.log("Valor:", optionSelect.value);

        /*Mostrando el resultado en el input*/
        inputResult = document.querySelector('#result').value = (optionSelect.text + ' - ' + optionSelect.value);

        /**Buscar Ultima Lectura */
        buscarUltimaLectura($("#fk_id_cuenta").val());
      }
      /**Buscar Ultima Lectura */
      function buscarUltimaLectura(id) {
        if (id) {
          $.ajax({
            url: "<?= base_url("index.php/lecturas/ultimaLecturaCuenta/") ?>" + id,
            success: function(data) {
              console.log(data);
              if(data){
                $("#lectura_anterior_lectura").val(data.lectura_actual_lectura)
              }else{
                $("#lectura_anterior_lectura").val('0')
              }
            }
          });
        }
      }
    </script>
    <script type="text/javascript">
      $("#frm_nuevo_lectura").validate({
        rules: {
          lectura_actual_lectura: {
            required: true,
            minlength: 4,
            maxlength: 4,
          },
          observación_lectura: {
            required: true
          },
          estado_lectura: {
            required: true
          },
          fk_id_cuenta: {
            required: true
          },
        },
        messages: {
          lectura_actual_lectura: {
            required: "Ingrese su lectura",
            minlength: "La lectura debe tener mínimo 4 digitos",
            maxlength: "La lectura debe tener máximo 4 digitos",
            digits: "La lectura solo acepta números"
          },
          observacion_lectura: {
            required: "Ingrese la observación"
          },
          estado_lectura: {
            required: "Por favor seleccione el estado"
          },
          fk_id_cuenta: {
            letras: "Seleccione una Cliente"
          },
        }
      });
    </script>
    <script type="text/javascript">
      function activarcaja() {
        document.getElementById('').disabled = true
      }
    </script>


    <!--Cierre de ventana-->
  </div>
</div>