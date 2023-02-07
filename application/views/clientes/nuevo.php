<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro Clientes</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3" action="<?php echo site_url(); ?>/clientes/guardarCliente" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for=""><h6>Nombres</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Ingrese su nombre">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Apellido</h6></label>
    <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  type="text" name="apellido_cliente" id="apellido_cliente" placeholder="Ingrese su apellido">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_cliente" id="fecha_ingreso_cliente" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Cédula</h6></label>
    <input class="form-control"  type="number" name="cedula_cliente" id="cedula_cliente" placeholder="INGRESE SU CÉDULA">
    <div id="respuesta"></div>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Télefono</h6></label>
    <input class="form-control"  type="number" name="telefono_cliente" id="telefono_cliente" placeholder="INGRESE SU TELÉFONO">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Correo</h6></label>
    <input class="form-control"  type="email" name="correo_cliente" id="correo_cliente" placeholder="INGRESE SU CORREO">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Estado</h6></label>
    <select class="form-control" name="estado_cliente" id="estado_cliente">
      <option selected disabled value="">SELECCIONE UN ESTADO</option>
      <option value="ACTIVO">ACTIVO</option>
      <option value="INACTIVO">INACTIVO</option>
    </select>
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/clientes/index"
      class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
</form>

<script type="text/javascript">
    $("#frm_nuevo_cliente").validate({
      rules:{
        nombre_cliente:{
          letras:true,
          required:true
        },
        apellido_cliente:{
          letras:true,
          required:true
        },
        cedula_cliente:{
          required:true,
          minlength:10,
          maxlength:10,
        },
        telefono_cliente:{
          required:true,
          minlength:10,
          maxlength:10,
        },
        correo_cliente:{
          email:true,
          required:true
        },
        estado_cliente:{
          required:true
        }
      },
      messages:{
        nombre_cliente:{
          letras:"Nombre Incorrecto",
          required:"Por favor Ingrese el nombre"
        },
        apellido_cliente:{
          letras:"Apellido Incorrecto",
          required:"Ingrese el apellido"
        },
        cedula_cliente:{
          required:"Ingrese su cedula",
          minlength:"La cedula debe tener mínimo 10 digitos",
          maxlength:"La cedula debe tener máximo 10 digitos",
          digits:"La cedula solo acepta números"
        },
        telefono_cliente:{
          required:"Ingrese su telefono",
          minlength:"El telefono debe tener mínimo 10 digitos",
          maxlength:"El telefono debe tener máximo 10 digitos",
          digits:"El telefono solo acepta números"
        },
        correo_cliente:{
          required:"Ingrese su correo",
          email:"Email no valido utiliza un @ en el email"
        },
        estado_cliente:{
          required:"Seleccione el estado"
        },
      }
    });
</script>


<!--Cierre de ventana-->
</div>
</div>
