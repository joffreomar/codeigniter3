<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pagina Principal - Bienvenido a EPAPAP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- cdn dattable 8/6/20022  -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">

<!-- para el buscar del select -->
<script src="<?php echo base_url(); ?>/assets/library/dselect.js"></script>
<!-- estilo de check  -->
<link href="<?php echo base_url(); ?>/assets/check/css/style.css" rel="stylesheet">

<!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?php echo site_url(); ?>" class="navbar-brand mx-4 mb-3">

                    <h3 class="text-primary text-center"><img src="<?php echo base_url(); ?>/assets/img/logo-epapap.png" alt="" width="70%" height="100%"></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $this->session->userdata("c0nectadoUTC")->foto_usuario; ?>" alt="avatar" alt="" style="width: 50px; height: 50px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                          <?php echo $this->session->userdata("c0nectadoUTC")->nombre_usuario; ?>
                          <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usuario; ?>
                        </h6>
                        <span>
                          <?php echo $this->session->userdata("c0nectadoUTC")->tipo_usuario; ?>
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo site_url(); ?>/indicadores/index" class="nav-item nav-link "><i class="fa fa-line-chart me-2"></i>Indicadores</a>
                    <div class="nav-item dropdown">
                      <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Página Web</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?php echo site_url(); ?>/carruseles/index" class="dropdown-item ">Inicio</a>
                            <a href="<?php echo site_url(); ?>/misiones/index" class="dropdown-item">Misión</a>
                            <a href="<?php echo site_url(); ?>/visiones/index" class="dropdown-item">Visión</a>
                            <a href="<?php echo site_url(); ?>/servicios/index" class="dropdown-item">Servicios</a>
                            <a href="<?php echo site_url(); ?>/noticias/index" class="dropdown-item">Noticias</a>
                            <a href="<?php echo site_url(); ?>/galerias/index" class="dropdown-item">Galería</a>
                            <a href="<?php echo site_url(); ?>/contactos/index" class="dropdown-item">Contactos</a>
                            <a href="<?php echo site_url(); ?>/informaciones/index" class="dropdown-item">Información</a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-tint me-2"></i>Lectura Agua</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?php echo site_url(); ?>/clientes/index" class="dropdown-item">Clientes</a>
                            <a href="<?php echo site_url(); ?>/lecturas/index" class="dropdown-item">Lecturas</a>
                            <a href="<?php echo site_url(); ?>/sectores/index" class="dropdown-item">Sectores</a>
                            <a href="<?php echo site_url(); ?>/cuentas/index" class="dropdown-item">Cuentas</a>
                            <a href="<?php echo site_url(); ?>/tpcuentas/index" class="dropdown-item">Tipo de cuenta</a>
                        </div>
                    </div>
                    <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-user me-2"></i>Administración</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?php echo site_url(); ?>/usuarios/index" class="dropdown-item">Usuarios</a>
                        </div>

                    </div>
                    <?php endif; ?>
                    <a href="<?php echo site_url(); ?>/reportes/index"  class="nav-item nav-link"><i class="fa fa-file me-2"></i>Reportes</a>
                    <a href="<?php echo site_url(); ?>/correos/index"  class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Envio Correos</a>
                    <?php if ($this->session->userdata("c0nectadoUTC")->tipo_usuario=="ADMINISTRADOR"): ?>
                    <a href="<?php echo site_url(); ?>" target="_blank" class="nav-item nav-link"><i class="fa fa-globe me-2"></i>Ver Sitio Web</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
              <!-- logo de pantalla resonsiva -->
                <a href="<?php echo site_url(); ?>/indicadores/index" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-tint"></i></h2>
                </a>
                <!-- fin de logo de pantalla resonsiva -->
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $this->session->userdata("c0nectadoUTC")->foto_usuario; ?>" alt="avatar" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
                              <?php echo $this->session->userdata("c0nectadoUTC")->nombre_usuario; ?>
                              <?php echo $this->session->userdata("c0nectadoUTC")->apellido_usuario; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                          <a href="<?php echo site_url(); ?>/indicadores/perfil" class="dropdown-item "><i class="fa fa-user me-2"></i>Perfil</a>
                            <a href="<?php echo site_url(); ?>/seguridades/cerrarSesion" class="dropdown-item "><i class="fa fa-share me-2"></i>Salir</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
