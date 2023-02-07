<div class="back_re">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="title">
                 <h2>NOTICIAS</h2>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="container">
<div class="row">
  <div class="col-md-8">
    <div class=" d-flex align-items-center justify-content-between p-4">
      <div class="card-body text-center">
        <img src="<?php echo base_url(); ?>/uploads/noticias/<?php echo $noticia->foto_noticia; ?>" alt="avatar"
          class="img-fluid" style="width: 100%;">
        <h3 class="my-3"><?php echo $noticia->nombre_noticia; ?></h3>
        <p class="text-muted mb-1" style="text-align: justify"><?php echo $noticia->descripcion_noticia; ?></p>
      </div>
    </div>
    <div class="meta-wrapper align-items-center ">
      <span class="author_post">
      <img  class="rounded-circle" alt="" src="https://secure.gravatar.com/avatar/4d92554a214a7c4a4f66f5d048251132?s=96&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/4d92554a214a7c4a4f66f5d048251132?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo" height="25" width="25" loading="lazy" decoding="async">
      <a href="">Comunicación /</a></span>
      <span><a href="<?php echo site_url(); ?>/contactos/listado" >Ingresar Comentario</a></span>
    </div>
  </div>

</div>
<br>
<div class="titlepage">
  <h2>Noticias Relacionadas</h2>
</div>
   <div class="container">
      <div class="row">
           <div class="slide-container swiper">
               <div class="slide-content">
                   <div class="card-wrapper swiper-wrapper">
                     <?php if ($listadoNoticias): ?>
                       <?php foreach ($listadoNoticias->result() as $noticia): ?>
                       <div class="card swiper-slide blog_box">
                           <div class="image-content blog_img">
                               <span class="overlay"></span>
                               <div class="card-image">
                                   <img src="<?php echo base_url(); ?>/uploads/noticias/<?php echo $noticia->foto_noticia; ?>" alt="" class="card-img">
                               </div>
                           </div>
                           <div class="blog_room">
                              <h4 class="text-center"><?php echo $noticia->nombre_noticia; ?></h4>
                              <center>
                              <a class="small" href="<?php echo site_url(); ?>/noticias/edit/<?php echo $noticia->id_noticia; ?>"><b>Leer más ...</b> <i class="fa fa-arrow-right ms-3"></i></a>
                            </center>
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
</div>
