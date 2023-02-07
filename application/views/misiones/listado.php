<div class="back_re">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="title">
               <h2>Sobre Nosotros</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- misión -->
<div class="about">
   <div class="container-fluid">
      <div class="row">
        <?php if ($listadoMisiones): ?>
          <?php foreach ($listadoMisiones->result() as $mision): ?>
         <div class="col-md-5">
            <div class="titlepage">
              <h2><?php echo $mision->nombre_mision; ?></h2>
               <p class="margin_0" style="text-align: justify"><?php echo $mision->descripcion_mision; ?></p>
            </div>
         </div>
         <div class="col-md-7">
            <div class="about_img">
               <figure><img src="<?php echo base_url(); ?>/uploads/misiones/<?php echo $mision->foto_mision; ?>" alt="#"/></figure>
            </div>
         </div>
       <?php endforeach; ?>
        <?php else: ?>
        <h1>No se encuentra mision registrada</h1>
        <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin misión -->

<!-- misión -->
<div class="about">
   <div class="container-fluid">
      <div class="row">
        <?php if ($listadoVisiones): ?>
            <?php foreach ($listadoVisiones->result() as $vision): ?>
         <div class="col-md-5">
            <div class="titlepage">
              <h2><?php echo $vision->nombre_vision; ?></h2>
               <p class="margin_0" style="text-align: justify"><?php echo $vision->descripcion_vision; ?></p>
            </div>
         </div>
         <div class="col-md-7">
            <div class="about_img">
               <figure><img src="<?php echo base_url(); ?>/uploads/visiones/<?php echo $vision->foto_vision; ?>" alt="#"/></figure>
            </div>
         </div>
       <?php endforeach; ?>
       <?php else: ?>
         <div class="alert alert-danger">
         <h1>No se encuentra mision registrada</h1>
         </div>
       <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin misión -->
