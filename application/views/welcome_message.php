<!-- carrusel -->
<section class="banner_main">
   <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
      <div class="carousel-inner">
        <?php if ($carruseles): ?>
          <?php $x=0; foreach ($carruseles->result() as $carrusel): ?>
         <div class="carousel-item <?php echo ($x==0)? "active":"" ?>">
            <img class="first-slide" src="<?php echo base_url(); ?>/uploads/carruseles/<?php echo $carrusel->foto_carrusel; ?>" alt="#">
            <div class="container-fluid">
            </div>
         </div>
         <?php $x++; endforeach; ?>
          <?php else: ?>
           <h1>No se encuentra fotografías de carrusel registradas</h1>
          <?php endif; ?>
      </div>
   </div>

</section>
<!-- fin carrusel -->
<!-- Nosotros -->
<div class="about">
   <div class="container-fluid">
      <div class="row">
        <?php if ($visiones): ?>
          <?php foreach ($visiones->result() as $vision): ?>
         <div class="col-md-5">
            <div class="titlepage">
               <h2><?php echo $vision->nombre_vision; ?></h2>
               <p style="text-align: justify"><?php echo $vision->descripcion_vision; ?></p>
               <a class="read_more" href="<?php echo site_url(); ?>/misiones/listado"> Leer mas</a>
            </div>
         </div>
         <div class="col-md-7">
            <div class="about_img">
               <figure><img src="<?php echo base_url(); ?>/uploads/visiones/<?php echo $vision->foto_vision; ?>" alt="#" /></figure>
            </div>
         </div>
       <?php endforeach; ?>
        <?php else: ?>
        <h1>No se encuentra visión registrada</h1>
        <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin Nosotros -->
<!-- Servicios -->
<div  class="our_room">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Servicios</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <?php if ($servicios): ?>
          <?php foreach ($servicios->result() as $servicio): ?>
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover"  class="room">
               <div class="room_img">
                  <figure><img src="<?php echo base_url(); ?>/uploads/servicios/<?php echo $servicio->foto_servicio; ?>" alt="#"/></figure>
               </div>
               <div class="bed_room">
                  <h3><?php echo $servicio->nombre_servicio; ?></h3>
               </div>
            </div>
         </div>
       <?php endforeach; ?>
        <?php else: ?>
        <h1>No se encuentran servicios registrados</h1>
        <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin servicios -->
<!-- galería -->
<div  class="gallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Galería</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <?php if ($galerias): ?>
        <?php foreach ($galerias->result() as $galeria): ?>
         <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
               <figure class="text-center"><img src="<?php echo base_url(); ?>/uploads/galerias/<?php echo $galeria->foto_galeria; ?>" alt="#"/></figure>
            </div>
         </div>
       <?php endforeach; ?>
        <?php else: ?>
        <h1>No se encuentran galerías registrados</h1>
        <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin galería -->
<!-- noticias -->
<div  class="blog">
   <div class="container">
      <div class="row">
           <div class="slide-container swiper">
               <div class="slide-content">
                   <div class="card-wrapper swiper-wrapper">
                     <?php if ($noticias): ?>
                       <?php foreach ($noticias->result() as $noticia): ?>
                       <div class="card swiper-slide blog_box">
                           <div class="image-content blog_img">
                               <span class="overlay"></span>
                               <div class="card-image">
                                   <img src="<?php echo base_url(); ?>/uploads/noticias/<?php echo $noticia->foto_noticia; ?>" alt="" class="card-img">
                               </div>
                           </div>
                           <div class="blog_room">
                              <span><?php echo $noticia->nombre_noticia; ?></span>
                              <p class="review_item_text" style="text-align: justify"><?php echo $noticia->descripcion_noticia; ?></p>
                              <a class="small" href="<?php echo site_url(); ?>/noticias/edit/<?php echo $noticia->id_noticia; ?>">Leer más ... <i class="fa fa-arrow-right ms-3"></i></a>
                           </div>
                       </div>
                     <?php endforeach; ?>
                      <?php else: ?>
                        <div class="alert alert-danger">
                        <h1>No se encuentran noticias registrados</h1>
                        </div>
                      <?php endif; ?>
                   </div>
               </div>

               <div class="swiper-button-next swiper-navBtn"></div>
               <div class="swiper-button-prev swiper-navBtn"></div>
               <div class="swiper-pagination"></div>
         </div>
      </div>
   </div>
</div>
<!-- fin noticias -->
<!--  contactos -->
<div class="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Contactos</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <form id="request" class="main_form">
               <div class="row">
                  <div class="col-md-12 ">
                     <input class="contactus" placeholder="Ingrese el nombre" type="text" name="nombre_contacto" id="nombre_contacto" required>
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Ingrese el apellido" type="text" name="apellido_contacto" id="apellido_contacto" required>
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Ingrese el correo" type="email" name="correo_contacto" id="correo_contacto" required>
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Ingrese el Teléfono" type="number" name="telefono_contacto" id="telefono_contacto" required>
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="Ingrese el correo" type="email" name="correo_contacto" id="correo_contacto" required>
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
            <div class="map_main">
               <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d997.3168885090312!2d-78.69975187086673!3d-0.95202805903665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwNTcnMDcuMyJTIDc4wrA0MSc1Ny4xIlc!5e0!3m2!1ses!2sec!4v1667256151004!5m2!1ses!2sec" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- fin contactos -->
