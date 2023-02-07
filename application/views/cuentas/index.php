<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
    <h5 class="mb-0">Listado de Cuentas</h5>
    <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
    <a href="<?php echo site_url(); ?>/cuentas/nuevo" class="btn btn-danger">
      <i class="fa fa-plus"></i>
      Nuevo Registro
    </a>
    <?php endif; ?>
</div>
      <!--Cierre de ventana-->

<?php if ($listadoCuentas): ?>
  <div class="table-responsive">
  <div class="container mt-0">
  <table class="table display cellspacing="0" width="100%"" id="tbl-cuentas">
        <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Cliente</th>
              <th class="text-center">Número de medidor</th>
              <th class="text-center">Número de cuenta</th>
              <th class="text-center">Dirección primaria</th>
              <th class="text-center">Dirección secundaria</th>
              <th class="text-center">Precio de agua</th>
              <th class="text-center">Nombre del sector</th>
              <th class="text-center">Tipo de cuenta</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Fecha Ingreso</th>
              <th class="text-center">Fecha Actualización</th>
              <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
              <th class="text-center">Opciones</th>
              <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoCuentas->result() as $cuenta): ?>
                  <tr>
                    <td class="text-center">
                    <?php echo $cuenta->id_cuenta; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->nombre_cliente; ?>
                    <?php echo $cuenta->apellido_cliente; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->numero_medidor_cuenta; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->numero_cuenta; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->direccion_primaria_cuenta; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->direccion_secundaria_cuenta; ?>
                  </td>
                  <td class="text-center">
                    $ <?php echo $cuenta->precio_consumo_tpcuenta; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->nombre_sector; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $cuenta->nombre_tpcuenta; ?>
                  </td>
                  <td class="text-center">
                      <?php if ($cuenta->estado_cuenta=='ACTIVA'): ?>
                      <span class="badge rounded-pill bg-success">ACTIVA</span>
                      <?php else: ?>
                      <span class="badge rounded-pill bg-danger">INACTIVA</span>
                      <?php endif; ?>
                  </td>
                 <td class="text-center">
                   <?php echo $cuenta->fecha_ingreso_cuenta; ?>
                 </td>
                 <td class="text-center">
                   <?php echo $cuenta->fecha_actualizacion_cuenta; ?>
                 </td>
                 <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                    <td class="text-center">
                        <a href="<?php echo site_url(); ?>/cuentas/editar/<?php echo $cuenta->id_cuenta; ?>" class="btn btn-primary  ">
                          <i class="fa fa-edit"></i>
                        </a>

                        <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                          <a href="javascript:void(0)"
                           onclick="confirmarEliminacion('<?php echo $cuenta->id_cuenta; ?>');"
                           class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </a>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>
                  </tr>
            <?php endforeach; ?>
        </tbody>
  </table>
  </div>
  </div>
<?php else: ?>
<div class="alert alert-danger">
    <h3>No se encontraron cuentas registrados</h3>
</div>
<?php endif; ?>

<script type="text/javascript">
    function confirmarEliminacion(id_cuenta){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACIÓN',
              message: '¿Esta seguro de eliminar el cuenta de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/cuentas/procesarEliminacion/"+id_cuenta;

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
          $('#tbl-cuentas').DataTable( {
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
