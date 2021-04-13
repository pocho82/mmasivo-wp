<?php
/**
 * Block Name: Client Stories
 */

$title = get_field( 'title' ); // Text
$background_color = get_field( 'background_color' ); // "normal" or "blue" or "purple"
$stories = get_field( 'stories' ); // Repeater

// create id attribute for specific styling
$id = 'client-stories-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="client-stories client-stories--bg-<?php echo $background_color; ?>">
    <div class="container">
        <h3 class="client-stories__title"><?php echo $title; ?></h3><?php

        if( have_rows( 'stories' ) ) : ?>
            <div class="client-stories__wrapper">
                <div class="client-stories__container items-<?php echo count( $stories ); ?>">
                    <div class="swiper-wrapper"><?php
                        
                        while ( have_rows( 'stories' ) ) : the_row(); 
                            $title = get_sub_field( 'title' );
                            $description = get_sub_field( 'description' ); ?>
                            
                            <article class="story swiper-slide">
                                <h4 class="story__title"><?php echo $title; ?></h4>
                                <p class="story__description"><?php echo $description; ?></p>
                            </article><?php
                        endwhile; ?>

                    </div>
                </div>
            </div><?php
        endif; ?>
    </div>
</section>
