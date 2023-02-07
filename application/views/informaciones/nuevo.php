<div class="container-fluid pt-4 px-4">
    <div class="bg-light  rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Registro de información</h5>
      </div>
      <!--Cierre de ventana-->
<form class="row g-3" action="<?php echo site_url(); ?>/informaciones/guardarInformacion" method="post" id="frm_nuevo_informaciones" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for=""><h6>Nombres</h6></label>
    <input class="form-control"  type="text" name="nombre_informacion" id="nombre_informacion" placeholder="Ingrese su nombre">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Dirección</h6></label>
    <input class="form-control"  type="text" name="direccion_informacion" id="direccion_informacion" placeholder="Ingrese su apellido">
  </div>
  <?php date_default_timezone_set('America/Guayaquil');
  $fecha_actual=date("Y-m-d");
  ?>
  <div class="col-md-4">
    <label for=""><h6>Fecha ingreso</h6></label>
    <input class="form-control"  type="date" name="fecha_ingreso_informacion" id="fecha_ingreso_informacion" value="<?= $fecha_actual; ?>" readonly=»readonly»>
  </div>
  <div class="col-md-4">
    <label for=""><h6>Télefono convecional</h6></label>
    <input class="form-control"  type="number" name="convencional_informacion" id="convencional_informacion" placeholder="Ingrese su teléfono">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Télefono celular</h6></label>
    <input class="form-control"  type="number"  name="telefono_informacion" id="telefono_informacion" placeholder="Ingrese su teléfono">
  </div>
  <div class="col-md-4">
    <label for=""><h6>Correo</h6></label>
    <input class="form-control"  type="email" name="correo_informacion" id="correo_informacion" placeholder="Ingrese su correo">
  </div>
  <div class="col-md-12">
    <button type="submit" name="button" class="btn btn-primary m-2">
      Guardar
    </button>
    <a href="<?php echo site_url(); ?>/informaciones/index"
      class="btn btn-danger m-2">
      Cancelar
    </a>
  </div>
</form>

<script type="text/javascript">
    $("#frm_nuevo_informaciones").validate({
      rules:{
        nombre_informacion:{
          letras:true,
          required:true
        },
        direccion_informacion:{
          required:true
        },
        telefono_informacion:{
          required:true,
          minlength:10,
          maxlength:10,
        },
        convencional_informacion:{
          required:true,
          minlength:9,
          maxlength:9,
        },
        correo_informacion:{
          email:true,
          required:true
        }
      },
      messages:{
        nombre_informacion:{
          letras:"Nombre Incorrecto",
          required:"Ingrese el nombre"
        },
        direccion_informacion:{
          letras:"Apellido Incorrecto",
          required:"Ingrese el apellido"
        },
        telefono_informacion:{
          required:"Ingrese su telefono",
          minlength:"El telefono debe tener mínimo 10 digitos",
          maxlength:"El telefono debe tener máximo 10 digitos",
          digits:"El telefono solo acepta números"
        },
        convencional_informacion:{
          required:"Ingrese su telefono",
          minlength:"El telefono debe tener mínimo 9 digitos",
          maxlength:"El telefono debe tener máximo 9 digitos",
          digits:"El telefono solo acepta números"
        },
        correo_informacion:{
          required:"Ingrese su correo",
          email:"Email no valido utiliza un @ en el email"
        },
      }
    });
</script>


<!--Cierre de ventana-->
</div>
</div>
