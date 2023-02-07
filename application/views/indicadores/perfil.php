<div class="container-fluid pt-4 px-4">
  <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="mb-0">Perfil Usuario</h5>
  </div>
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <div class="card-body text-center">
                <img src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $this->session->userdata("c0nectadoUTC")->foto_usuario; ?>" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo $this->session->userdata("c0nectadoUTC")->nombre_usuario; ?> <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usuario; ?></h5>
                <p class="text-muted mb-1"><?php echo $this->session->userdata("c0nectadoUTC")->tipo_usuario; ?></p>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-8">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nombre</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $this->session->userdata("c0nectadoUTC")->nombre_usuario; ?> <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usuario; ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Correo</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $this->session->userdata("c0nectadoUTC")->correo_usuario; ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Teléfono</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $this->session->userdata("c0nectadoUTC")->telefono_usuario; ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Fecha Creación</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $this->session->userdata("c0nectadoUTC")->fecha_ingreso_usuario; ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Descripcion:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $this->session->userdata("c0nectadoUTC")->descripcion_usuario; ?></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
