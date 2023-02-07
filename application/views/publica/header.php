<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>INICIO - Bienvenido a EPAPAP</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/publica/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/publica/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/publica/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo base_url(); ?>/assets/publica/images/epapap.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/publica/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <!-- style boton flotante-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/publica/btn-flotante/estilos.css">
      <!--reducir texto-->
      <style media="screen">
      .review_item_text{
        display:  -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        overflow: hidden;
      }
      .review__item__text:active{
        display: block;
      }
    </style>

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <!--Para los carruceles de noticias-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/carrusel/css/swiper-bundle.min.css">

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
   <!-- body -->
   <body class="main-layout">
      <!-- boton flotante  -->
        <!--
      <div class="loader_bg">
         <div class="loader"><img src="<?php echo base_url(); ?>/assets/publica/images/loading.gif" alt="#"/></div>
      </div>
    -->
      <!-- fin boton flotante -->
      <!-- header -->
      <header>
        <!-- boton flotante -->
        <!--
        <a href="<?php echo site_url(); ?>/seguridades/formularioLogin" class="btn-wsp" target="_blank">
        <i class="fas fa-sign-in-alt"></i>
        </a>
      -->
        <!-- fin boton flotante -->
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>/assets/publica/images/logo-epapap.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="<?php echo site_url(); ?>">Inicio</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url(); ?>/misiones/listado">Nosotros</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url(); ?>/servicios/listado">Servicios</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url(); ?>/galerias/listado">Galería</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url(); ?>/noticias/listado">Noticias</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url(); ?>/contactos/listado">Contactos</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" target="_blank" href="<?php echo site_url(); ?>/seguridades/formularioLogin">Iniciar Sesion</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
