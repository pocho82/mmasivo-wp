<?php
/**
 * Block Name: Contact Section
 */

$title = get_field( 'title' ); // Text
$description = get_field( 'description' ); // Text Area
$form = get_field( 'form' ); // Post Object

// create id attribute for specific styling
$id = 'contact-section-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="contact-section">
    <div class="container"><?php
        if( have_rows( 'contact_reason' ) ) : ?>
            <ul class="contact-section__contact-reasons grid-spaceBetween"><?php
                while ( have_rows( 'contact_reason' ) ) : the_row(); 
                    $title = get_sub_field( 'title' );?>
                    <li class="col"><span><?php echo $title; ?></span></li><?php
                endwhile; ?>
            </ul><?php
        endif; ?>

        <article class="contact-section__description"><?php
            echo $description; ?>
        </article>

        <div class="contact-section__form o-forms"><?php
            echo do_shortcode( '[wpforms id="'. $form. '" title="false"]' ); ?>
        </div>
    </div>
</section>
