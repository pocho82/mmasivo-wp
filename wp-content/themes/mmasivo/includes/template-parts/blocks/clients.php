<?php
/**
 * Block Name: Clients
 */

$clients = get_field( 'clients' ); // Repeater

// create id attribute for specific styling
$id = 'clients-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="clients"><?php
    if( have_rows( 'clients' ) ) : ?>
        <div class="container">
            <div class="clients__container">
                <div class="swiper-wrapper"><?php

                    foreach( $clients as $client ) :
                        $client_image_id = get_post_thumbnail_id( $client->ID );
                        $client_image_url = wp_get_attachment_url( $client_image_id );
                        $client_logo = file_get_contents( $client_image_url ); ?>

                        <figure class="client swiper-slide"><?php
                            echo $client_logo; ?>
                        </figure><?php
                    endforeach; ?>

                </div>
            </div>
        </div><?php
    endif; ?>
</section>
