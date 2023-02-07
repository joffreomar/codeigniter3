<!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                    <h2>GALERIA</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- gallery -->
      <div  class="gallery">
         <div class="container">

            <div class="row">
              <?php if ($listadoGalerias): ?>
              <?php foreach ($listadoGalerias->result() as $galeria): ?>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="<?php echo base_url(); ?>/uploads/galerias/<?php echo $galeria->foto_galeria; ?>"
                     height="80px"
                     width="100px"
                     alt=""></figure>
                  </div>
               </div>
               <?php endforeach; ?>
             <?php else: ?>
             <h1>No se encuentran galerías registrados</h1>
             <?php endif; ?>
            </div>

         </div>
      </div>
      <!-- end gallery -->
