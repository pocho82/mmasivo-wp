<?php

namespace MMasivo\BaseTheme;

class Images {

	/**
	 * Images constructor
	 */
	public function __construct() {
		add_filter( 'wp_get_attachment_image_attributes', [ $this, 'wp_get_attachment_image_attributes' ], 10, 3 );
		add_filter( 'get_image_tag', [ $this, 'get_image_tag' ], 10, 6 );
		add_action( 'after_setup_theme', [ $this, 'add_image_sizes' ] );
		// svg configurations
		add_filter( 'wp_check_filetype_and_ext', [ $this, 'check_filetype_and_ext' ], 10, 4 );
		add_filter( 'upload_mimes', [ $this, 'cc_mime_types' ] );
		add_action( 'admin_head', [ $this, 'fix_svg' ] );
	}

	/**
	 * Adds custom image sizes.
	 *
	 * Uses "after_setup_theme" hook.
	 */
	public function add_image_sizes() {
		add_image_size( 'fullscreen', 1920, 1080 );
		add_image_size( 'halfwidth', 768, 432 );
		add_image_size( 'square', 768, 768, [ 'center', 'center' ] );
	}

	/**
	 * Removes image/width attributes from all img tags.
	 *
	 * Uses "wp_get_attachment_image_attributes" filter.
	 *
	 * @param string[]     $attr       Array of attribute values for the image markup, keyed by attribute name.
	 *                                 See wp_get_attachment_image().
	 * @param \WP_Post     $attachment Image attachment post.
	 * @param string|int[] $size       Requested image size. Can be any registered image size name, or
	 *                                 an array of width and height values in pixels (in that order).
	 *
	 * @return array
	 */
	public function wp_get_attachment_image_attributes( array $attr, $attachment, $size ): array {
		// Remove height attribute from all images.
		if ( array_key_exists( 'height', $attr ) ) {
			unset( $attr['height'] );
		}

		// Remove width attribute from all images.
		if ( array_key_exists( 'width', $attr ) ) {
			unset( $attr['width'] );
		}

		return $attr;
	}

	/**
	 * Uses "get_image_tag" filter.
	 *
	 * @param string       $html  HTML content for the image.
	 * @param int          $id    Attachment ID.
	 * @param string       $alt   Image description for the alt attribute.
	 * @param string       $title Image description for the title attribute.
	 * @param string       $align Part of the class name for aligning the image.
	 * @param string|int[] $size  Requested image size. Can be any registered image size name, or
	 *                            an array of width and height values in pixels (in that order).
	 *
	 * @return string
	 */
	public function get_image_tag( $html, $id, $alt, $title, $align, $size ): string {
		// Remove width & height attributes from all images.
		$html = preg_replace( '/width|height="\d+"/', '', $html );

		return $html;
	}

	public function check_filetype_and_ext($data, $file, $filename, $mimes) {
		global $wp_version;
		if ( $wp_version !== '4.7.1' ) {
			return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );
		return [
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename']
		];
	}

	public function cc_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
  		return $mimes;
	}
	public function fix_svg() {
		echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
	}

}

new Images();
