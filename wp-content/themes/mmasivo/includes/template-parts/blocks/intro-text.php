<?php
/**
 * Block Name: Intro text
 */

$text = get_field( 'text' ); // WYSIWYG

// create id attribute for specific styling
$id = 'intro-text-' . $block[ 'id' ]; ?>

<section id="<?php echo $id; ?>" class="intro-text wysiwyg-field">
    <div class="container"><?php
        echo $text; ?>
    </div>
</section>
