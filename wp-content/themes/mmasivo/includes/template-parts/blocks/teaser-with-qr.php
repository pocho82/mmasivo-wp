<?php
/**
 * Block Name: Teaser with QR
 */

$title = get_field( 'title' ); // Text
$description = get_field( 'description' ); // WYSIWYG
$background_color = get_field( 'background_color' ); // "normal" or "blue" or "purple"
$qr = get_field( 'qr' ); // Image

// create id attribute for specific styling
$id = 'teaser-with-qr-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="teaser-qr">
    <div class="container">
        <div class="teaser-qr__container grid-spaceAround teaser-qr__container--bg-<?php echo $background_color; ?>">
            <div class="teaser-qr__content col-expand"><?php
                if ( !empty($title) ) : ?>
                    <h3 class="teaser-qr__content__title"><?php echo $title; ?></h3><?php
                endif;
                
                if ( !empty($description) ) : ?>
                    <div class="teaser-qr__content__description wysiwyg-field"><?php echo $description; ?></div><?php
                endif; ?>
            </div><?php

            if ( !empty($qr) ) : ?>
                <figure class="teaser-qr__image col-shrink">
                    <img src="<?php echo $qr['url']; ?>" alt="<?php echo $title; ?>">
                </figure><?php
            endif; ?>
        </div>
    </div>
</section>
