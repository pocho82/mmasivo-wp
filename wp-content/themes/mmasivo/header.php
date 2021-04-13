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

    <script>
      var pathTheme = '<?php echo get_stylesheet_directory_uri() ?>';
    </script><?php 
    
    wp_head(); ?>
  </head>

  <body>
    <div id="wptime-plugin-preloader"></div><?php

    global $project_options;
    $logo = $project_options['general_settings_logo'];
    $logo = file_get_contents( wp_get_attachment_url( $logo['id'] ) );
    $menu_items = $project_options['menu_settings_menu_items'];
    $login_label = $project_options['menu_settings_login_label']; 
    $login_url = $project_options['menu_settings_login_url']; 
    $contact_page_label = $project_options['menu_settings_contact_page_label'];
    $contact_page = $project_options['menu_settings_contact_page'];
    $contact_page_url = get_permalink($contact_page); ?>

    <header class="o-header">
      <div class="container">
        <div class="grid-middle">
          <div class="o-header__logo col-shrink">
            <a href="<?php echo home_url(); ?>"><?php echo $logo; ?></a>
          </div>
          
          <div class="o-header__menu-action">
            <button class="button-collapse" type="button">
              <div class="hamburger hamburger--spring">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
              </div>
            </button>
          </div><?php 

          if ( !empty( $menu_items ) ) : ?>
            <nav class="o-header__navigation col-expand">
              <ul class="o-header__navigation__menu"><?php
                
                foreach ( $menu_items as $menu_item ) : 
                  $post_type = get_post_type_object( $menu_item );
                  $chevron_right_icon = file_get_contents( THEME_URI . '/images/icons/chevron-right.svg' );

                  switch ( $menu_item ) :
                    case 'products':
                      $title = $project_options[ 'menu_settings_products_title' ];
                      $subtitle = $project_options[ 'menu_settings_products_subtitle' ];
                      $description = $project_options[ 'menu_settings_products_description' ];
                      $cta_link = $project_options[ 'menu_settings_products_cta_link' ];
                      $cta_label = $project_options[ 'menu_settings_products_cta_label' ];
                      break;

                      case 'solutions':
                      $title = $project_options[ 'menu_settings_solutions_title' ];
                      $subtitle = $project_options[ 'menu_settings_solutions_subtitle' ];
                      $description = $project_options[ 'menu_settings_solutions_description' ];
                      $cta_link = $project_options[ 'menu_settings_solutions_cta_link' ];
                      $cta_label = $project_options[ 'menu_settings_solutions_cta_label' ];
                      break;

                    case 'partnerships':
                      $title = $project_options[ 'menu_settings_partnerships_title' ];
                      $subtitle = $project_options[ 'menu_settings_partnerships_subtitle' ];
                      $description = $project_options[ 'menu_settings_partnerships_description' ];
                      $cta_link = $project_options[ 'menu_settings_partnerships_cta_link' ];
                      $cta_label = $project_options[ 'menu_settings_partnerships_cta_label' ];
                      break;

                    case 'integrations':
                      $title = $project_options[ 'menu_settings_integrations_title' ];
                      $subtitle = $project_options[ 'menu_settings_integrations_subtitle' ];
                      $description = $project_options[ 'menu_settings_integrations_description' ];
                      $cta_link = $project_options[ 'menu_settings_integrations_cta_link' ];
                      $cta_label = $project_options[ 'menu_settings_integrations_cta_label' ];
                      break;

                    default:
                      $title = '';
                      $subtitle = '';
                      $description = '';
                      $cta_link = '';
                      $cta_label = '';
                  endswitch; ?>

                  <li class="menu-item">
                    <span><?php echo $post_type->labels->name; ?></span><?php
                    echo $chevron_right_icon ?>
                    
                    <div class="menu-item__submenu">
                      <div class="grid">
                        <div class="menu-item__submenu__text col-3_xs-12"><?php
                          if ( !empty($title) ) : ?>
                            <h3 class="title"><?php echo $title; ?></h3><?php
                          endif;
                          
                          if ( !empty($subtitle) ) : ?>
                            <h4 class="subtitle"><?php echo $subtitle; ?></h4><?php
                          endif;
                          
                          if ( !empty($description) ) : ?>
                            <p class="description"><?php echo $description; ?></p><?php
                          endif;
                          
                          if ( !empty($cta_link) ) : ?>
                            <a class="cta grid-middle-noGutter" href="<?php echo $cta_link; ?>"><span><?php echo $cta_label; ?></span><?php echo $chevron_right_icon; ?></a><?php
                          endif; ?>
                        </div><?php

                        $taxonomies_by_post_type = get_object_taxonomies( $menu_item );
                        if ( !empty( $taxonomies_by_post_type ) ) : ?>
                          <div class="menu-item__submenu__menus col-9_xs-12"><?php
                            foreach ( $taxonomies_by_post_type as $tax ) :
                              
                              $terms_by_taxonomy = get_terms($tax);
                              foreach ( $terms_by_taxonomy as $term ) : ?>
                                <div class="menu">
                                  <h4 class="menu__title"><?php echo $term->name; ?></h4><?php

                                  $posts_by_term = get_posts(
                                    array(
                                      'numberposts' => -1,
                                      'post_type' => $menu_item,
                                      'tax_query' => array(
                                        array(
                                          'taxonomy' => $tax,
                                          'field' => 'term_id',
                                          'terms' => $term->term_id,
                                          'include_children' => false
                                        )
                                      )
                                    )
                                  );
                                  if ( !empty( $posts_by_term ) ) : ?>
                                    <ul class="menu__container"><?php
                                      
                                      foreach ( $posts_by_term as $post ) : ?>
                                        <li class="menu__item"><?php
                                          $permalink = get_permalink($post->ID);
                                          $icon_url = get_the_post_thumbnail_url($post->ID, 'full');
                                          $icon = file_get_contents($icon_url); ?>

                                          <a class="grid-middle-noGutter" href="<?php echo $permalink; ?>"><?php
                                            echo $icon; ?>
                                            <span><?php echo $post->post_title; ?></span>
                                          </a>
                                        </li><?php
                                      endforeach; ?>

                                    </ul>
                                  </div><?php
                                endif;
                              endforeach;

                            endforeach; ?>
                          </div><?php
                        endif; ?>
                      </div>
                    </div>
                  </li><?php
                endforeach; ?>

                <!-- login -->
                <li class="menu-item">
                  <a href="<?php echo $login_url; ?>"><?php echo $login_label; ?></a>
                </li>
                <!-- contact -->
                <li class="menu-item menu-item--contact">
                  <a href="<?php echo $contact_page_url; ?>"><?php echo $contact_page_label; ?></a>
                </li>
              </ul>
            </nav><?php
          endif; ?>
        </div>
      </div>
    </header>
        
    <div id="wrapper">
      <main id="main" role="main">
