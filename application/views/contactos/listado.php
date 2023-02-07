     <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                      <h2>Contactos</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
        <br>
        <div class="row">
          <?php if ($listadoInformaciones): ?>
            <?php foreach ($listadoInformaciones->result() as $informacion): ?>
          <div class="col-md-6">
            <div class="titlepage text-left">
              <h4>Información</h4>
            </div>
            <span><b><h3><?php echo $informacion->nombre_informacion; ?></h3></b></span>
            <span><b><h4><i class="fa fa-map me-2"></i> <?php echo $informacion->direccion_informacion; ?></h4></b></span>
            <span><b><h4><i class="fa fa-phone me-2"></i> <?php echo $informacion->telefono_informacion; ?> / <?php echo $informacion->convencional_informacion; ?></h4></b></span>
            <span><b><h4><i class="fa fa-envelope me-2"></i> <?php echo $informacion->correo_informacion; ?></h4></b></span>
          </div>
          <?php endforeach; ?>
          <?php else: ?>
              <h2>No se encontró información registrada</h2>
          <?php endif; ?>
          <div class="col-md-6">
            <div class="titlepage text-left">
              <h4>Horario de atención</h4>
            </div>
            <span><b><h3>Secretaría - Recaudación</h3></b></span>
            <span><b><h4><i class="fa fa-calendar me-2"></i> Lunes - Viernes / 08:00 AM - 17:00 PM</h4></b></span>
          </div>
        </div>
      </div>
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                 <div class="titlepage text-left">
                   <h4>Formulario Contacto</h4>
                 </div>
                  <form class="main_form" action="<?php echo site_url(); ?>/contactos/guardarContacto" method="post" id="frm_nuevo_contacto" enctype="multipart/form-data">
                     <div class="row">
                       <div class="col-md-12 ">
                          <input class="contactus" placeholder="Ingrese el nombre" type="text" name="nombre_contacto" id="nombre_contacto" required>
                       </div>
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Ingrese el apellido" type="text" name="apellido_contacto" id="apellido_contacto" required>
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Ingrese el correo" type="email" name="correo_contacto" id="correo_contacto" required>
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Ingrese el Telefono" type="number" name="telefono_contacto" id="telefono_contacto" required>
                        </div>
                        <div class="col-md-12">
                           <textarea class="contactus" placeholder="Ingrese el mensaje" type="text" name="mensaje_contacto" id="mensaje_contacto" Message="Name"></textarea>
                        </div>
                        <div class="col-md-12">
                           <input style="display:none" class="contactus" type="text" name="estado_contacto" id="estado_contacto" value="PENDIENTE" readonly=»readonly»>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Enviar</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                 <div class="titlepage text-left">
                   <h4>Ubicación</h4>
                 </div>
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d997.3168885090312!2d-78.69975187086673!3d-0.95202805903665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwNTcnMDcuMyJTIDc4wrA0MSc1Ny4xIlc!5e0!3m2!1ses!2sec!4v1667256151004!5m2!1ses!2sec" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
