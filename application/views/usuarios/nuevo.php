<div class="container-fluid pt-4 px-4">
  <div class="bg-light  rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="mb-0">Registro de Usuarios</h5>
    </div>
    <!--Cierre de ventana-->
    <form class="row g-3" action="<?php echo site_url(); ?>/usuarios/guardarUsuario" method="post" id="frm_nuevo_usuario" enctype="multipart/form-data">
      <div class="col-md-4">
        <label for="">
          <h6>Nombres</h6>
        </label>
        <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Ingrese su nombre">
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Apellidos</h6>
        </label>
        <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="" type="text" name="apellido_usuario" id="apellido_usuario" placeholder="Ingrese su apellido">
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Teléfono</h6>
        </label>
        <input class="form-control" value="" type="number" name="telefono_usuario" id="telefono_usuario" placeholder="INGRESE EL TELÉFONO">
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Correo</h6>
        </label>
        <input class="form-control" value="" type="email" name="correo_usuario" id="correo_usuario" placeholder="INGRESE SU CORREO">
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Contraseña</h6>
        </label>
        <input class="form-control" value="" onkeyup="checkPasswordStrength();" type="password" name="password_usuario" id="password_usuario" placeholder="INGRESE SU CONTRASEÑA">
        <div id="password-strength-status"></div>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Estado</h6>
        </label>
        <select class="form-control" name="estado_usuario" id="estado_usuario">
          <option selected disabled value="">SELECCIONE UN ESTADO</option>
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="">
          <h6>Perfil</h6>
        </label>
        <select class="form-control" name="tipo_usuario" id="tipo_usuario">
          <option selected disabled value="">SELECCIONE UN PERFIL</option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="LECTOR">LECTOR</option>
        </select>
      </div>
      <div class="col-md-4">
        <b><label for="">
            <h6>Sector</h6>
          </label></b>
        <select class="form-control" name="fk_id_sector" id="fk_id_sector" required>
          <option selected disabled value="">SELECCIONE UN SECTOR</option>
          <?php if ($listadoSectores) : ?>
            <?php foreach ($listadoSectores->result() as $sector) : ?>
              <option value="<?php echo $sector->id_sector; ?>">
                <?php echo $sector->nombre_sector; ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <?php date_default_timezone_set('America/Guayaquil');
      $fecha_actual = date("Y-m-d");
      ?>
      <div class="col-md-4">
        <label for="">
          <h6>Fecha Ingreso</h6>
        </label>
        <input class="form-control" type="date" name="fecha_ingreso_usuario" id="fecha_ingreso_usuario" value="<?= $fecha_actual; ?>" readonly=»readonly»>
      </div>
      <div class="col-md-12">
        <label for="">
          <h6>Descripción</h6>
        </label>
        <textarea name="name" rows="4" cols="80" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="descripcion_usuario" id="descripcion_usuario" placeholder="Ingrese su descripción"></textarea>
      </div>
      <div class="col-md-12">
        <label for="" class="form-label">
          <h6>Fotografía</h6>
        </label>
        <input class="form-control" value="" type="file" name="foto_usuario" id="foto_usuario" placeholder="Ingrese la fotografía">
      </div>
      <div class="col-md-12">
        <button type="submit" name="button" class="btn btn-primary m-2">
          Guardar
        </button>
        <a href="<?php echo site_url(); ?>/usuarios/index" class="btn btn-danger m-2">
          Cancelar
        </a>
      </div>
    </form>

    <script type="text/javascript">
      $("#frm_nuevo_usuario").validate({
        rules: {
          nombre_usuario: {
            letras: true,
            required: true
          },
          apellido_usuario: {
            letras: true,
            required: true
          },
          telefono_usuario: {
            required: true,
            minlength: 10,
            maxlength: 10,
          },
          correo_usuario: {
            email: true,
            required: true
          },
          password_usuario: {
            required: true
          },
          descripcion_usuario: {
            required: true
          },
          estado_usuario: {
            required: true
          },
          tipo_usuario: {
            required: true
          },
          fk_id_sector: {
            required: true
          },
          estado_usuario: {
            required: true
          },
          foto_usuario: {
            required: true
          }
        },
        messages: {
          apellido_usuario: {
            letras: "Apellido Incorrecto",
            required: "Ingrese el apellido"
          },
          nombre_usuario: {
            letras: "Nombre Incorrecto",
            required: "Por favor Ingrese el nombre"
          },
          correo_usuario: {
            required: "Ingrese su correo",
            email: "Email no valido utiliza un @ en el email"
          },
          telefono_usuario: {
            required: "Ingrese su telefono",
            minlength: "El telefono debe tener mínimo 10 digitos",
            maxlength: "El telefono debe tener máximo 10 digitos",
            digits: "El telefono solo acepta números"
          },
          descripcion_usuario: {
            required: "Ingrese la descripción"
          },
          password_usuario: {
            required: "Ingrese su contraseña"
          },
          tipo_usuario: {
            letras: "Seleccione una Opcion"
          },
          fk_id_sector: {
            required: "Seleccione el sector"
          },
          estado_usuario: {
            required: "Seleccione el estado"
          },
          foto_usuario: {
            required: "Seleccione una fotografia"
          }
        }
      });
    </script>
    <script type="text/javascript">
      $('#foto_usuario').fileinput({
        allowedFileExtensions: ['jpeg', 'jpg', 'png'],
        dropZoneEnable: true,
        language: 'es'
      });
    </script>
    <script type="text/javascript" src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script>
      /** VERIFICADOR DE CONTRASEÑAS FUERTES*/
      function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<,(,)])/;
        var password = $('#password_usuario').val().trim();
        if (password.length < 6) {
          $('#password-strength-status').removeClass();
          $('#password-strength-status').addClass('text-danger');
          $('#password-strength-status').html("Contraseña débil (debe tener al menos 6 letras.)");
        } else {
          if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('text-success');
            $('#password-strength-status').html("Contraseña Fuerte");
          } else {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('text-warning');
            $('#password-strength-status').html("Dureza media (incluya letras,mayúsculas , números y símbolos (#$@..etc)).)");
          }
        }
      }
    </script>
    <!--Cierre de ventana-->
  </div>
</div>