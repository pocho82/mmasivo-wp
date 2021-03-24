<?php
  get_header();
  global $post, $project_options;

  if( is_home() || is_front_page() ) {
    $homePageID = $project_options['general_settings_homepage']; ?>

    <section class="p-home-page">
      <header class="p-home-page__header">
        <div class="container">
          <h1>Simplifique la complejidad Global de la Comunicación</h1>
          <h2>Lleve su mensajeria global al siguiente nivel con una plataforma creada para escala, velocidad y capacidad de entrega</h2>
          <img src="<?php echo get_template_directory_uri() . '/images/header-homepage.png' ?>" alt="">
        </div>
      </header>

      <div class="p-home-page__features">
        <div class="container">
          <div class="grid-3_xs-1_md-2"><?php
            for ($i = 0; $i <= 2; $i++) { ?>
              <div class="item col">
                <h3>Canales de Comnunicacion</h3>
                <p>Crea una experiencia para tu usuario</p>
              </div><?php
            } ?>
          </div>
        </div>
      </div>

      <section class="p-home-page__content">
        <div class="container">
          <h2 class="title-content">Canales de comunicación</h2>
          <h3 class=sub-title-content>Crea una experiencia de charla perfecta</h3>
          
          <div class="grid-3_xs-1_md-2"><?php
            for ($i = 0; $i <= 9; $i++) { ?>
              <div class="item col">
                <img src="<?php echo get_template_directory_uri() . '/images/icons/sms.svg' ?>" alt="">
                <h3> SMS </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
              </div><?php
            } ?>
          </div>
        </div>
      </section>
    </section> <?php
  }

  get_footer(); ?>
