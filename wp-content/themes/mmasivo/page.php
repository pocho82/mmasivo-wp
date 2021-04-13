<?php

get_header();
global $post, $project_options;

if( !is_home() && !is_front_page() ) : ?>

  <section class="t-content"><?php

    while ( have_posts() ) : the_post();
      the_content();
    endwhile; ?>

  </section> <?php

endif;

get_footer(); ?>
