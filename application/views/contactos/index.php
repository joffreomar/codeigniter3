<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="mb-0">Listado de Contactos</h5>
</div>
      <!--Cierre de ventana-->

<?php if ($listadoContactos): ?>
  <div class="table-responsive">
  <table class="table" id="tbl-contactos">
        <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">CORREO</th>
              <th class="text-center">TELEFONO</th>
              <th class="text-center">MENSAJE</th>
              <th class="text-center">ESTADO</th>
              <th class="text-center">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoContactos->result() as $contacto): ?>
                  <tr>
                    <td class="text-center">
                    <?php echo $contacto->id_contacto; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $contacto->correo_contacto; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $contacto->telefono_contacto; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $contacto->mensaje_contacto; ?>
                  </td>
                  <td class="text-center">
                  <?php if ($contacto->estado_contacto=="LEIDO"): ?>
                    <div class="alert alert-success">
                    <?php echo $contacto->estado_contacto; ?>
                    </div>
                    <?php else: ?>
                      <div class="alert alert-danger ">
                        <?php  echo $contacto->estado_contacto ?>
                      </div>
                    <?php endif; ?>
                  </td>
                    <td class="text-center">
                        <a href="<?php echo site_url(); ?>/contactos/editar/<?php echo $contacto->id_contacto; ?>" class="btn btn-primary  ">
                          <i class="fa fa-edit"></i>
                        </a>

                        <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                          <a href="javascript:void(0)"
                           onclick="confirmarEliminacion('<?php echo $contacto->id_contacto; ?>');"
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
<?php else: ?>
<div class="alert alert-danger">
    <h3>No se encontraron contactos registrados</h3>
</div>
<?php endif; ?>

<script type="text/javascript">
    function confirmarEliminacion(id_contacto){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACI??N',
              message: '??Esta seguro de eliminar el contacto de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/contactos/procesarEliminacion/"+id_contacto;

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

<script type="text/javascript">
      $(document).ready(function() {
              } );
          $('#tbl-contactos').DataTable( {
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


<!--Cierre de ventana-->
</div>
</div>
