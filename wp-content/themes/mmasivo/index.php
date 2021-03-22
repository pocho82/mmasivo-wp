<?php
  get_header();
  global $post, $project_options;

  if( is_home() || is_front_page() ) {
    $homePageID = $project_options['general_settings_homepage']; ?>

    <section class="p-home-page">
      <header class="p-home-page__header">
        <h1>Simplifique la complejidad Global de la Comunicación</h1>
        <h2>Lleve su mensajeria global al siguiente nivel con una plataforma creada para escala, velocidad y capacidad de entrega</h2>
        <img src="<?php echo get_template_directory() . '' ?>" alt="">
      
      </header>

      <section class="p-home-page__content">
        <h2 class="title-content">Canales de comunicación</h2>
        <h3 class=sub-title-content>Crea una experiencia de charla perfecta</h3>
        <div class="grid-3_xs-1_md-2">
          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>

          <div class="item">
            <img src="<?php echo get_template_directory() . '/images/icons/sms.svg' ?>" alt="">
            <h3> SMS </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi facere quisquam nesciunt!</p>
          </div>
        </div>
    </section>

    <?php
  }

  get_footer();
?>
