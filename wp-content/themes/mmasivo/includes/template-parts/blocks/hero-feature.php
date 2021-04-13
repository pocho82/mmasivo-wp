<?php
/**
 * Block Name: Hero Feature
 */

$title = get_field( 'title' ); // Text
$subtitle = get_field( 'subtitle' ); // WYSIWYG
$cta_link = get_field( 'cta_link' ); // Text
$cta_label = get_field( 'cta_label' ); // Text
$image = get_field( 'image' ); // Image

// create id attribute for specific styling
$id = 'hero-feature-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="hero-feature">
    <div class="container">
        <h1 class="hero-feature__title"><?php echo $title; ?></h1>
        <h2 class="hero-feature__subtitle"><?php echo $subtitle; ?></h2>
        
        <div class="hero-feature__cta">
            <a href="<?php echo $cta_link; ?>" class="a-button"><?php echo $cta_label; ?></a>
        </div><?php 
        
        if ( $image ) { ?>
            <img class="hero-feature__image" src="<?php echo esc_url( $image[ 'sizes' ][ 'fullscreen' ] ); ?>" alt="<?php echo esc_attr( $image[ 'alt' ] ); ?>"/><?php 
        } ?>

        <div class="a-scroll-indicator"></div>
    </div>
</section>
