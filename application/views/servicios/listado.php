<!-- inicio servicios -->
<div class="back_re">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="title">
               <h2>SERVICIOS</h2>
            </div>
         </div>
      </div>
   </div>
</div>


<div  class="our_room">
   <div class="container">
      <div class="row">
        <?php if ($listadoServicios): ?>
        <?php foreach ($listadoServicios->result() as $servicio): ?>
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover"  class="room">
               <div class="room_img">
                  <figure><img src="<?php echo base_url(); ?>/uploads/servicios/<?php echo $servicio->foto_servicio; ?>" alt="#"/></figure>
               </div>
               <div class="bed_room">
                 <h3><?php echo $servicio->nombre_servicio; ?></h3>
                 <p><?php echo $servicio->descripcion_servicio; ?></p>
               </div>
            </div>
         </div>
       <?php endforeach; ?>
       <?php else: ?>
       <div class="alert alert-danger">
           <h3>No se encontraron servicios registrados</h3>
       </div>
       <?php endif; ?>
      </div>
   </div>
</div>
<!-- fin servicios -->
