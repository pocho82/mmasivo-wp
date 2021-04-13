<?php
/**
 * Block Name: Hero Page
 */

$show_breadcrumb = get_field( 'show_breadcrumb' ); // "true" or "false"
$background_color = get_field( 'background_color' ); // Text
$title = get_field( 'title' ); // Text
$description = get_field( 'description' ); // Textarea
$actions = get_field( 'actions' ); // Repeater
$image = get_field( 'image' ); // Image

// create id attribute for specific styling
$id = 'hero-page-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="hero-page hero-page--bg-<?php echo $background_color; ?>">
    <div class="container">
        <div class="grid">
            <div class="hero-page__content col-6_xs-12_md-6"><?php 
                if ( $show_breadcrumb === TRUE ) : ?>
                    <div class="hero-page__breadcrumb">
                        <!-- breadcrumb -->
                    </div><?php
                endif;

                if ( !empty( $title ) ) : ?>
                    <h2 class="hero-page__title"><?php echo $title; ?></h2><?php
                endif;

                if ( !empty( $description ) ) : ?>
                    <div class="hero-page__description wysiwyg-field"><?php echo $description; ?></div><?php
                endif;
                
                if ( !empty( $actions ) ) : ?>
                    <div class="hero-page__actions"><?php
                        foreach( $actions as $link ) : ?>
                            <a class="a-button a-button--<?php echo $link[ 'cta_style' ]; ?>" href="<?php echo $link[ 'cta' ][ 'url' ]; ?>"><?php echo $link[ 'cta' ][ 'title' ]; ?></a><?php
                        endforeach; ?>
                    </div><?php
                endif; ?>
            </div>
            
            <figure class="hero-page__image col-6_xs-12_md-6">
                <img src="<?php echo esc_url( $image[ 'sizes' ][ 'fullscreen' ] ); ?>" alt="<?php echo esc_attr( $image[ 'alt' ] ); ?>"/>
            </figure>
        </div>
    </div>
</section>
