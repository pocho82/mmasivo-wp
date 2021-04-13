<?php
/**
 * Block Name: Informative Teaser
 */

$itmes = get_field( 'items' ); // Repeater

// create id attribute for specific styling
$id = 'informative-teaser-' . $block[ 'id' ]; 

if( have_rows( 'items' ) ): ?>
    <section id="<?php echo $id; ?>" class="informative-teaser">
        <div class="container">
            <div class="grid-4_xs-1_md-2-center"><?php
                while( have_rows( 'items' ) ) : the_row();
                    $title = get_sub_field( 'title' );
                    $description = get_sub_field( 'description' ); ?>

                    <div class="col">
                        <div class="item">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                        </div>
                    </div><?php
                endwhile; ?>
            </div>
        </div>
    </section><?php
endif; ?>
