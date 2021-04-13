<?php
/**
 * Block Name: Client Stories
 */

$link = get_field( 'link' ); // Link

// create id attribute for specific styling
$id = 'cta-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="cta">
    <div class="container"><?php
        $chevron_right_icon = file_get_contents( THEME_URI . '/images/icons/chevron-right.svg' ); ?>
        <a href="<?php echo $link['url']; ?>" class="cta__link grid-middle-center"><span><?php echo $link['title']; ?></span> <?php echo $chevron_right_icon; ?></a>
    </div>
</section>
