<?php
/**
 * Block Name: Section Features
 */

$title = get_field( 'title' ); // Text
$description = get_field( 'description' ); // Text Area
$items = get_field( 'items' ); // Repeater

// create id attribute for specific styling
$id = 'features-section-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="features-section"><?php
    if ( !empty( $title ) || !empty( $description ) ) : ?>
        <div class="container"><?php
            if ( !empty($title) ) : ?>
                <h2 class="features-section__title <?php if ( empty($description) ) { echo 'only-title'; } ?>"><?php echo $title; ?></h2><?php
            endif;
            if ( !empty($description) ) : ?>
                <h3 class="features-section__description"><?php echo $description; ?></h3><?php
            endif; ?>
        </div><?php
    endif;

    if( have_rows( 'items' ) ) : ?>
        <div class="features-section__container-items <?php if ( count($items) < 7 ) { echo 'no-bg'; } ?>">
            <div class="container">
                <div class="grid-3_xs-1_md-2-center"><?php
                    while ( have_rows( 'items' ) ) : the_row(); 
                        $title = get_sub_field( 'title' );
                        $description = get_sub_field( 'description' );
                        $icon = get_sub_field( 'icon' ); ?>
                        <div class="col">
                            <div class="item"><?php
                                if ( $icon ) : 
                                    $src = $icon[ 'url' ];
                                    $alt = $icon[ 'alt' ]; ?>

                                    <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>"><?php
                                endif; ?>
                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $description; ?></p>
                            </div>
                        </div><?php
                    endwhile; ?>
                </div>
            </div>
        </div><?php
    endif; ?>
</section>
