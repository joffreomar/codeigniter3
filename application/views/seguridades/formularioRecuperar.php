<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>RECUPERAR CONTRASEÑA - Bienvenido a EPAPAP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>/assets/img/epapap.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <!-- jquery deley para que se vea bonito -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js">-- >

</script>

<!-- cdn font awesome para iconos pequeños  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- cdn izitoast para alertas  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- cdn dattable 8/6/20022  -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json">



<!-- importar jquery validation clase 8/6 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js" integrity="sha512-XJiEiB5jruAcBaVcXyaXtApKjtNie4aCBZ5nnFDIEFrhGIAvitoqQD6xd9ayp5mLODaCeaXfqQMeVs1ZfhKjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/localization/messages_es_AR.min.js" integrity="sha512-HHnzo0ssMRoNapdoTaORwzLpemBFMsg7GA8fr0d9xS1rEXKHazYMTUAUka2abGFCfsdXgZPVVyv3LCkXP1Fhsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

jQuery.validator.addMethod("letras", function(value, element) {
     //return this.optional(element) || /^[a-z]+$/i.test(value);
     return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);

   }, "Este campo solo acepta letras");

</script>
<!-- importar file imput css clase 29/6/22-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/fileinput.min.js" integrity="sha512-C9i+UD9eIMt4Ufev7lkMzz1r7OV8hbAoklKepJW0X6nwu8+ZNV9lXceWAx7pU1RmksTb1VmaLDaopCsJFWSsKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/css/fileinput.min.css" integrity="sha512-XHMymTWTeqMm/7VZghZ2qYTdoJyQxdsauxI4dTaBLJa8d1yKC/wxUXh6lB41Mqj88cPKdr1cn10SCemyLcK76A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/es.js"></script>

<meta name="theme-color" content="#009cff">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="shortcut icon" type="image/png" href="./img/EPAPAP.png">
  <link rel="apple-touch-icon" href="./EPAPAP.png">
  <link rel="apple-touch-startup-image" href="./EPAPAP.png">
  <meta name="apple-mobile-web-app-title" content="App de Ventas">
  <link rel="manifest" href="<?php echo base_url(); ?>manifest.json">
  <script type="text/javascript" src="<?php echo base_url('script.js'); ?>"></script>
  <script type="text/javascript">
  if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("sw.js");
  }
</script>
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                      <h5 class="text-primary text-center">INGRESAR AL SISTEMA</h5>
                      <br>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="<?php echo site_url(); ?>" class="">
                                <h3 class="text-primary text-center"><img src="<?php echo base_url(); ?>/assets/img/logo-epapap.png" alt="" width="70%" height="100%"></h3>
                            </a>
                        </div>
												<form class="login100-form validate-form"  id="frm_formularioRecuperar" action="<?php echo site_url(); ?>/seguridades/recuperarPassword" method="post">
                        <div class="form-floating mb-4">
                            <input class="form-control" type="correo_usuario" name="correo_usuario" placeholder="name@example.com" required>
                            <label for="floatingInput"><i class="fa fa-envelope me-2"></i>Ingrese su correo</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="<?php echo site_url(); ?>/seguridades/formularioLogin">Iniciar Sesion</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Recuperar ahora</button>
											</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <script type="text/javascript">
        $("#frm_formularioRecuperar").validate({
          rules:{
            email:{
              email:true,
              required:true
            }
          },
          messages:{
            correo_usuario:{
              required:"Porfavor ingrese su email",
              email:"Email no valido utiliza un @ en el email precioso porfavor"
            }
          }
        });
    </script>


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




    <style media="screen">
      .error{
        color:red;
        font-size: 16px;

      }
      input.error, select.error{
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


    <?php if ($this->session->flashdata("error")): ?>
      <script type="text/javascript">
        iziToast.error({
             title: 'ADVERTENCIA',
             message: '<?php echo $this->session->flashdata("error"); ?>',
             position: 'topRight',
           });
      </script>
    <?php endif; ?>
    </body>

    </html>
