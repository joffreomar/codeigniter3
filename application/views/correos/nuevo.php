<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Formulario de envio de correo</h5>
      </div>
      <!--Cierre de ventana-->


      <form action="<?php echo site_url(); ?>/assets/carga/recibe_excel_validando.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataCliente" id="file-input" class="file-input__input"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo Excel</span></label
            >
          </div>
      <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/>
      </div>
      </form>

      <?php
      header("Content-Type: text/html;charset=utf-8");
      include('config.php');
      $sqlClientes = ("SELECT * FROM correo ORDER BY id ASC");
      $queryData   = mysqli_query($con, $sqlCorreos);
      $total_correo = mysqli_num_rows($queryData);
      ?>

          <h6 class="text-center">
            Lista de Clientes <strong>(<?php echo $total_correo; ?>)</strong>
          </h6>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                   <th>Nombre</th>
                  <th>Correo</th>
                  <th>observacion</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                while ($data = mysqli_fetch_array($queryData)) { ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $data['cliente_correo']; ?></td>
                  <td><?php echo $data['correo_correo']; ?></td>
                  <td><?php echo $data['notificacio_Correo']; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
<!--Cierre de ventana-->
    </div>
</div>
