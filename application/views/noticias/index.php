<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="mb-0">Listado de Noticias</h5>
    <a href="<?php echo site_url(); ?>/noticias/nuevo" class="btn btn-danger">
      <i class="fa fa-plus"></i>
      Nuevo Registro
    </a>
</div>
      <!--Cierre de ventana-->
<?php if ($listadoNoticias): ?>
  <div class="table-responsive">
  <div class="container mt-0">
  <table class="table display cellspacing="0" width="100%"" id="tbl-noticias">
        <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Fotografía</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Descripción</th>
              <th class="text-center">Fecha Ingreso</th>
              <th class="text-center">Fecha Actualización</th>
              <th class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoNoticias->result() as $noticia): ?>
                  <tr>
                    <td class="text-center">
                    <?php echo $noticia->id_noticia; ?>
                  </td>
                  <td class="text-center">
                  <?php if ($noticia->foto_noticia!=""): ?>
                  <img src="<?php echo base_url(); ?>/uploads/noticias/<?php echo $noticia->foto_noticia; ?>"
                  height="80px"
                  width="80px"
                  alt=""
                  class="rounded-circle">
                  <?php else: ?>
                  N/A
                  <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $noticia->nombre_noticia; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $noticia->descripcion_noticia; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $noticia->fecha_ingreso_noticia; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $noticia->fecha_actualizacion_noticia; ?>
                  </td>
                    <td class="text-center">
                        <a href="<?php echo site_url(); ?>/noticias/editar/<?php echo $noticia->id_noticia; ?>" class="btn btn-primary  ">
                          <i class="fa fa-edit"></i>
                        </a>

                        <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                          <a href="javascript:void(0)"
                           onclick="confirmarEliminacion('<?php echo $noticia->id_noticia; ?>');"
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
    <h3>No se encontraron noticias registradas</h3>
</div>
<?php endif; ?>

<script type="text/javascript">
    function confirmarEliminacion(id_noticia){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACIÓN',
              message: '¿Esta seguro de eliminar el noticia de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/noticias/procesarEliminacion/"+id_noticia;

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

<script type="text/javascript">
      $(document).ready(function() {
              } );
          $('#tbl-noticias').DataTable( {
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

<!--Cierre de ventana-->
</div>
</div>
