<?php
/**
 * Block Name: Features
 */

$title = get_field( 'title' ); // Text
$view = get_field( 'view' ); // "normal" or "compact"
$background_color = get_field( 'background_color' ); // "normal" or "blue" or "purple"
$features = get_field( 'features' ); // Repeater

// create id attribute for specific styling
$id = 'features-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="features features--bg-<?php echo $background_color; ?>">
    <div class="container"><?php
        if ( !empty( $title ) ) : ?>
            <h3 class="features__title"><?php echo $title; ?></h3><?php
        endif;

        if( have_rows( 'features' ) ) : ?>
            <div class="features__container <?php if ( empty( $view ) || $view !== 'compact' ) { echo 'grid-2_xs-1'; } ?>"><?php
                if ( $view === 'compact' ) : ?>
                    <div class="swiper-wrapper"><?php
                endif;

                while ( have_rows( 'features' ) ) : the_row();
                    $icon = get_sub_field( 'icon' );
                    $icon =  file_get_contents( $icon[ 'url' ] );
                    $title = get_sub_field( 'title' );
                    $description = get_sub_field( 'description' ); ?>

                    <div class="<?php if ( $view === 'compact' ) { echo 'swiper-slide'; } else { echo 'col'; } ?>">
                        <div class="feature feature--<?php echo $view; ?> <?php if ( empty( $icon ) ) { echo 'feature--no-icon'; } ?>"><?php
                            if ( !empty($icon) ) : ?>
                                <figure class="feature__icon"><?php
                                    echo $icon; ?>
                                </figure><?php
                            endif;
                            
                            if ( !empty($title) ) : ?>
                                <h4 class="feature__title"><?php echo $title; ?></h4><?php
                            endif;
                            
                            if ( !empty($description) && $view !== 'compact' ) : ?>
                                <p class="feature__description"><?php echo $description; ?></p><?php
                            endif; ?>
                        </div>
                    </div><?php
                endwhile;

                if ( $view === 'compact' ) : ?>
                    </div><?php
                endif; ?>
            </div><?php
        endif; ?>
    </div>
</section>
