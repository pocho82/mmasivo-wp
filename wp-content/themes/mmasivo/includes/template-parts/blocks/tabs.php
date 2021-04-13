<?php
/**
 * Block Name: Tabs
 */

$title = get_field( 'title' ); // Repeater
$tabs = get_field( 'tabs' ); // Repeater

// create id attribute for specific styling
$id = 'tabs-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="tabs">
    <div class="container"><?php
        if ( !empty( $title ) ) : ?>
            <h3 class="tabs__title"><?php echo $title ?></h3><?php
        endif;
        
        if( have_rows( 'tabs' ) ): ?>
            <div class="container">
                <div class="tabs__container">
                    <nav class="tabs__navigation">
                        <ul class="tabs__navigation__menu"><?php

                            while( have_rows( 'tabs' ) ) : the_row(); 
                                $title = get_sub_field( 'title' ); ?>
                                
                                <li class="tabs__navigation__menu-item col"><?php echo $title; ?></li><?php
                            endwhile; ?>

                        </ul>
                    </nav>
                    
                    <article class="tabs__content"><?php

                        while( have_rows( 'tabs' ) ) : the_row(); 
                            $title = get_sub_field( 'title' );
                            $description = get_sub_field( 'description' );
                            $image = get_sub_field( 'image' );
                            $video = get_sub_field( 'video' ); ?>
                            
                            <div class="content-element grid">
                                <figure class="content-element__media col-4_xs-12_md-5" data-push-right="off-1_xs-0_md-0"><?php
                                    if ( empty($video) && !empty($image) ) : ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>"><?php
                                    endif;

                                    if ( !empty($video) ) : ?>
                                        <video src="<?php echo $video['url']; ?>" loop <?php if ( !empty($image) ) { echo 'poster="'. $image['url'] .'"'; } ?>></video><?php
                                    endif; ?>
                                </figure>

                                <div class="content-element__content wysiwyg-field col-7_xs-12"><?php echo $description; ?></div>
                            </div><?php
                        endwhile; ?>

                    </article>
                </div>
            </div><?php
        endif; ?>
    </div>
</section>
