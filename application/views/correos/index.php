<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Listado de correos enviados</h5>
          <a href="<?php echo site_url(); ?>/correos/nuevo" class="btn btn-danger">
            <i class="fa fa-plus"></i>
            Nuevo Registro
          </a>
      </div>
      <!--Cierre de ventana-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/correo/css/material.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/correo/css/home.css">
      <?php
      $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
        $QueryInmuebleDetalle = ("SELECT * FROM correo WHERE correo_correo !='' limit 50 ");
        $resultadoInmuebleDetalle = mysqli_query($con, $QueryInmuebleDetalle);
        $cantidad = mysqli_num_rows($resultadoInmuebleDetalle);
      ?>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/correo/css/home.css">

      <form action="<?php echo site_url(); ?>/correos/enviarEmail" method="post" enctype="multipart/form-data">

        <div class="row mb-5">
          <div class="col-4">
            <input type="checkbox" onclick="marcarCheckbox(this);"/>
            <label id="marcas"><h6>Seleccionar todos</h6></label>
          </div>
          <div class="col-4">
             <p id="resp"></p>
          </div>
           <div class="col-4">
            <input type="submit" style="display: none;" name="enviarform" id="enviarform" class="btn btn-round btn-primary btn-block" value="Enviar Correo">
          </div>
        </div>

        <?php if ($listadoCorreos): ?>
          <div class="table-responsive">
          <div class="container mt-0">
          <table class="table display cellspacing="0" width="100%"" id="tbl-correos">
                 <thead class="thead-dark">
                   <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Correo</th>
                        <th>Estado de Notificación</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  while ($dataCorreos = mysqli_fetch_array($resultadoInmuebleDetalle)) { ?>
                    <tr>
                        <td>
                          <?php echo $i; ?>
                            <input type="checkbox"  name="correo_correo[]" class="CheckedAK" correo="<?php echo $dataCorreos['correo_correo']; ?>" value="<?php echo $dataCorreos['correo_correo']; ?>"/>
                          </td>
                        <td><?php echo $dataCorreos['cliente_correo']; ?></td>
                        <td><?php echo $dataCorreos['correo_correo']; ?></td>
                        <td>
                          <?php
                          echo ($dataCorreos['notificacion_correo']) ? '<i class="zmdi zmdi-check-all zmdi-hc-2x green"></i>' : '<i class="zmdi zmdi-check zmdi-hc-2x black"></i>';
                          ?>
                        </td>
                    </tr>
                  <?php $i++; } ?>
                </tbody>
            </table>
        </div>
      </div>
    <?php else: ?>
    <div class="alert alert-danger">
        <h3>No se encontraron correos registrados</h3>
    </div>
    <?php endif; ?>
      </form>


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
                $('#tbl-correos').DataTable( {
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
      <script src="<?php echo base_url(); ?>/assets/correo/js/script.js"></script>
      <script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="<?php echo base_url(); ?>/assets/correo/js/script.js"></script>
<!--Cierre de ventana-->
    </div>
</div>
