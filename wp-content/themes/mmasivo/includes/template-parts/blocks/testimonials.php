<?php
/**
 * Block Name: Testimonials
 */

$testimonials = get_field( 'testimonials' ); // Repeater

// create id attribute for specific styling
$id = 'testimonial-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="testimonials"><?php
    if( have_rows( 'testimonials' ) ): ?>
        <div class="container">
            <div class="testimonials__container">
                <div class="swiper-wrapper"><?php
                    while( have_rows( 'testimonials' ) ) : the_row(); 
                        $client = get_sub_field( 'client' );
                        $client_image_id = get_post_thumbnail_id( $client->ID );
                        $client_image_url = wp_get_attachment_url( $client_image_id );
                        $client_logo = file_get_contents( $client_image_url );
                        $description = get_sub_field( 'description' );
                        $by = get_sub_field( 'by' );
                        $position = get_sub_field( 'position' ); ?>
                        
                        <article class="testimonial swiper-slide">
                            <figure class="testimonial__client"><?php
                                echo $client_logo; ?>
                            </figure>

                            <p class="testimonial__description"><?php echo $description; ?></p>
                            <p class="testimonial__by"><?php echo $by; ?></p>
                            <p class="testimonial__position"><?php echo $position; ?></p>
                        </article><?php
                    endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div><?php
    endif; ?>
</section>
