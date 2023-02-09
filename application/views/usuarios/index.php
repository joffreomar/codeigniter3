<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Listado de Usuarios</h5>
          <a href="<?php echo site_url(); ?>/usuarios/nuevo" class="btn btn-danger">
            <i class="fa fa-plus"></i>
            Nuevo Registro
          </a>
      </div>

      <!--Cierre de ventana-->
<?php if ($listadoUsuarios): ?>
  <div class="table-responsive">
  <div class="container mt-0">
    <table class="table display cellspacing="0" width="100%"" id="tbl-usuarios">
          <thead>
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nombres</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Perfil</th>
                <th class="text-center">Sector</th>
                <th class="text-center">Fecha Ingreso</th>
                <th class="text-center">Fecha Actualización</th>
                <th class="text-center">Fotografía</th>
                <th class="text-center">Opciones</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($listadoUsuarios->result()
              as $usuario): ?>
                    <tr>
                      <td class="text-center">
                      <?php echo $usuario->id_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->nombre_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->apellido_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->telefono_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->correo_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->descripcion_usuario; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($usuario->estado_usuario=='1'): ?>
                        <span class="badge rounded-pill bg-success">ACTIVO</span>
                        <?php else: ?>
                        <span class="badge rounded-pill bg-danger">INACTIVO</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->tipo_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->nombre_sector; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->fecha_ingreso_usuario; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $usuario->fecha_actualizacion_usuario; ?>
                    </td>
                    <td class="text-center">
                    <?php if ($usuario->foto_usuario!=""): ?>
                    <img src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $usuario->foto_usuario; ?>"
                    height="80px"
                    width="80px"
                    alt=""
                    class="rounded-circle">
                    <?php else: ?>
                    N/A
                    <?php endif; ?>
                    </td>
                      <td class="text-center">
                          <a href="<?php echo site_url(); ?>/usuarios/editar/<?php echo $usuario->id_usuario; ?>" class="btn btn-primary  ">
                            <i class="fa fa-edit"></i>
                          </a>
                          <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                            <a href="javascript:void(0)"
                             onclick="confirmarEliminacion('<?php echo $usuario->id_usuario; ?>');"
                             class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </a>
                          <?php endif; ?>
                      </td>
                    </tr>
              <?php endforeach; ?>
          </tbody>
    </table>
  </div>
  </div>
<?php else: ?>
<div class="alert alert-danger">
    <h3>No se encontraron usuarios registrados</h3>
</div>
<?php endif; ?>
<div class="container-fluid mt-3 text-start">
  <div class="card">
    <div class="card-header">
      Carga Masiva de Usuarios
    </div>
    <div class="card-body">
      <form method="post" id="carga_masiva" name="carga_masiva">
        <div class="mt-2">
          <label for="matriz_usuarios">Archivo excel de Usuarios</label>
          <input id="matriz_usuarios" class="form-control-file" type="file" name="matriz_usuarios">
        </div>
        <div class="mt-2">
          <input class="btn btn-success" type="submit" id="guardar_datos" value="Cargar">
        </div>
        <div id="resultados">

        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    function confirmarEliminacion(id_usuario){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACIÓN',
              message: '¿Esta seguro de eliminar el usuario de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/usuarios/procesarEliminacion/"+id_usuario;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>


<script type="text/javascript" src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>


</script>
<script type="text/javascript">
      $(document).ready(function() {
              } );
          $('#tbl-usuarios').DataTable( {
            responsive:true,
            dom: 'Blfrtip',
            buttons: [
              {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i>",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success"
              },
              {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i>",
                "titleAttr": "Exportar a PDF",
                "className": "btn btn-danger"
              },
              {
                "extend": "print",
                "text": "<i class='fa fa-print'></i>",
                "titleAttr": "Imprimir",
                "className": "btn btn-info"
              },
            ],
              language: {
                  url: '<?php echo base_url(); ?>/assets/datatables/Spanish.json'
              }
          } );

</script>
<script>
  $("#carga_masiva").submit(function(e) {
    e.preventDefault();
    $('#guardar_datos').attr("disabled", true);
    var formData = new FormData($("#carga_masiva")[0]);
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "<?= base_url("index.php/usuarios/cargamasiva") ?>",
      dataType: "html",
      data: formData,
      //necesario para subir archivos via ajax
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function(objeto) {
        $("#resultados").html("Enviando...")
      },
      success: function(datos) {
        $("#resultados").html(datos)
        $('#guardar_datos').attr("disabled", false);
        location.reload();
      }
    });
  });
</script>

<!--Cierre de ventana-->
</div>
</div>
