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
<!-- noticias -->
<div  class="blog">
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
<!-- end noticias -->
