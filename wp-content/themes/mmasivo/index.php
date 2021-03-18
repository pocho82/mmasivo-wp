<?php
  get_header();
  global $post, $project_options;

  if( is_home() || is_front_page() ) {
    $homePageID = $project_options['general_settings_homepage']; ?>

    <!-- Code -->
    <?php
  }

  get_footer();
?>
