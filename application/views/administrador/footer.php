

<!-- Recent Sales End -->

<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; EPAPAP, Todos los derechos reservados.
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->


<!--Cierre de ventana-->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/chart/chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>

<?php if ($this->session->flashdata('confirmacion')): ?>
  <script type="text/javascript">
    iziToast.info({
  tittle: 'CONFIRMACION',
  message: '<?php echo $this->session->flashdata('confirmacion'); ?>',
  position: 'topRight',
});
</script>
<?php endif; ?>


<?php if ($this->session->flashdata("error")): ?>
  <script type="text/javascript">
    iziToast.error({
         title: 'ADVERTENCIA',
         message: '<?php echo $this->session->flashdata("error"); ?>',
         position: 'topRight',
       });
  </script>
<?php endif; ?>

<style media="screen">
  .error{
    color:red;
    font-size: 16px;

  }
  textarea.error, input.error, select.error{
    border: 2px solid red;
  }
</style>

<?php if ($this->session->flashdata("bienvenida")): ?>
  <script type="text/javascript">
    iziToast.info({
         title: 'CONFIRMACIÓN',
         message: '<?php echo $this->session->flashdata("bienvenida"); ?>',
         position: 'topRight',
       });
  </script>
<?php endif; ?>
</body>

</html>
