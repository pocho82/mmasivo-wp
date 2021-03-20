<?php global $post; ?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
  <head>
    <?php $site_name = get_bloginfo( 'name' ); ?>
    <title><?php echo $site_name; ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name=”robots” content="index, follow">

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script>
      var pathTheme = '<?php echo get_stylesheet_directory_uri() ?>';
    </script>
    <?php wp_head(); ?>
    </head>

    <body>
    <div id="wptime-plugin-preloader"></div> <?php

    global $project_options; ?>

    <header class=¨o-header¨>
      <div class="grid-middle">
        <div class="o-header__logo">
          <img src="" alt="">
        </div>

        <nav class=¨o-header__navigation¨>
          <ul>
            <li><a href="#"> Productos </a></li>
            <li><a href="#"> Precios </a></li>
            <li><a href="#"> Nosotros </a></li>
            <li><a href="#"> Crear cuenta </a></li>
            <li><a href="#"> Contacto </a></li>
          </ul>
        </nav>
      </div>
    </header>
        
    <!--   

      <section class="textos-header">
        <h1>Simplifique la complejidad Global de la Comunicación</h1>
        <h6>Lleve su mensajeria global al siguiente nivel con una plataforma creada para escala, velocidad y capacidad de entrega</h6>
        <img src="" alt="">
      </section> 
      </div>

        <main>  
        <section class:¨contenedor canales de comunicacion>
        <h2>Canales de comunicación</h2>
        <h6>Crea una experiencia de charla perfecta</h6>
        <div class="imagenes-canales-de-comunicacion">
        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> SMS </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Voz </h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde harum dolorum totam? Quo, minus saepe?</p>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Email </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        
        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> WhatsApp Bussiness </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Viber Bussiness </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        
        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> RCS </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Aplicaciones del chat </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Facebook Messenger </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> LINEA </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Mensajeria de aplicaciones moviles </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>

        <div class="imagenes-individuales">
        <img src="" alt="">
        <h3> Chat en vivo </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
        </div>
        </section>
        </main>
      
-->
    

    <div id="wrapper">
      <main id="main" role="main">
