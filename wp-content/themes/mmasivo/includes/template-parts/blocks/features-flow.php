<?php
/**
 * Block Name: Features Flow
 */

$title = get_field( 'title' ); // Text
$steps = get_field( 'steps' ); // Repeater

// create id attribute for specific styling
$id = 'features-flow-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="features-flow">
    <div class="container">
        <h3 class="features-flow__title"><?php echo $title; ?></h3><?php
        
        if( have_rows( 'steps' ) ) : ?>
            <div class="features-flow__container grid">
                <nav class="navigation col-4_xs-12_md-5">
                    <ul class="navigation__menu"><?php
                    
                        while ( have_rows( 'steps' ) ) : the_row(); 
                            $title = get_sub_field( 'title' );
                            $chevron_right_icon = file_get_contents( THEME_URI . '/images/icons/chevron-right.svg' ); ?>

                            <li class="navigation__item"><span><?php echo $title; ?></span> <?php echo $chevron_right_icon; ?></li><?php
                        endwhile; ?>

                    </ul>
                </nav>

                <article class="content col-8_xs-12_md-7"><?php

                    while ( have_rows( 'steps' ) ) : the_row(); 
                        $description = get_sub_field( 'description' ); ?>

                        <div class="content__element wysiwyg-field"><?php echo $description; ?></div><?php
                    endwhile; ?>

                </article>
            </div><?php
        endif; ?>
    </div>
</section>
