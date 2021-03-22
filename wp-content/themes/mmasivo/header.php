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

    <header class="o-header">
      <div class="container">
        <div class="grid-middle">
          <div class="o-header__logo col-shrink">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flogos-download.com%2Fwp-content%2Fuploads%2F2016%2F03%2FFiat_logo.png&f=1&nofb=1" alt="">
          </div>

          <nav class="o-header__navigation col-expand">
            <ul>
              <li><a href="#"> Productos </a></li>
              <li><a href="#"> Precios </a></li>
              <li><a href="#"> Nosotros </a></li>
              <li><a href="#"> Crear cuenta </a></li>
              <li><a href="#"> Contacto </a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
        
    <div id="wrapper">
      <main id="main" role="main">
