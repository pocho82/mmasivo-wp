<?php
      global $project_options;
      $logo = $project_options['general_settings_logo'];
      $logo = file_get_contents( wp_get_attachment_url( $logo['id'] ) );
      $menu_items = $project_options['menu_settings_menu_items']; ?>

      </main>
    </div>

    <footer class="o-footer">
      <div class="container">
        <div class="grid">
          <div class="o-footer__logo col-3_xs-12_md-4"><?php
            echo $logo; ?>
          </div><?php

          if ( !empty( $menu_items ) ) : ?>
            <div class="o-footer__menus col-9_xs-12_md-8"><?php
              foreach ( $menu_items as $menu_item ) : 
                $post_type = get_post_type_object( $menu_item );
                $posts_by_post_type = get_posts( array(
                  'post_type' => $menu_item,
                  'posts_per_page' => -1,
                  'orderby'    => 'menu_order',
                  'sort_order' => 'asc'
                ) );
                  if ( !empty($posts_by_post_type) ) : ?>
                    <div class="menu">
                      <h3 class="menu__title"><?php echo $post_type->labels->name; ?></h3>
                      <ul class="menu__container"><?php
                        foreach ( $posts_by_post_type as $post_by_post_type ) : 
                          $permalink = get_permalink($post_by_post_type->ID);
                          $title = get_the_title($post_by_post_type->ID); ?>
                          <li class="menu__item"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></li><?php 
                        endforeach; ?>
                      </ul>
                    </div><?php
                  endif;
              endforeach; ?>
            </div><?php
          endif; ?>
        </div>
      </div>
    </footer><?php 
    
    wp_footer(); ?>
  </body>
</html>
