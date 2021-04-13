<?php

namespace MMasivo\BaseTheme;

class Acf {

	/**
	 * Acf constructor.
	 */
	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_blocks' ] );
		add_filter( 'render_block', [ $this, 'render_block' ], 10, 2 );
	}

	/**
	 * Render ACF blocks that don't have any fields.
	 *
	 * Uses {@see 'render_block'} filter.
	 *
	 * @param string $block_content
	 * @param array  $block
	 *
	 * @return string
	 */
	public function render_block( string $block_content, array $block ): string {
		return $block_content;
	}

	/**
	 * Render Gutenberg Blocks
	 *
	 * @param array $block
	 */
	public function block_render_callback( array $block ) {
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace( 'acf/', '', $block['name'] );

		// include a template part from within the "includes/template-parts/blocks" folder
		if ( file_exists( get_theme_file_path( "/includes/template-parts/blocks/{$slug}.php" ) ) ) {
			$classname = sanitize_html_class( 'block--' . $slug );
			echo "<div class=\"block $classname\">";
			include( get_theme_file_path( "/includes/template-parts/blocks/{$slug}.php" ) );
			echo "</div>";
		}
	}

	/**
	 * Register Gutenberg Blocks
	 *
	 * Runs on {@see 'acf/init'} hook.
	 */
	public function register_blocks() {
		if ( ! function_exists( 'acf_register_block' ) ) {
			return;
		}

		/**
		 * Content Blocks
		 */

		 // Client Stories
		acf_register_block( [
			'name' => 'client-stories',
			'title' => __( 'Client Stories', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'title'   			=> 'Client Stories',
						'background_color'  => 'blue',
						// 'stories'    		=> array(
						// 	'title'   	   => 'Client Stories',
						// 	'description'  => 'blue',
						// 	'client'  	   => '113',
						// )
					)
				)
			)
		] );
		
		// Clients
		acf_register_block( [
			'name' => 'clients',
			'title' => __( 'Clients', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Contact Section
		acf_register_block( [
			'name' => 'contact-section',
			'title' => __( 'Contact Section', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// CTA
		acf_register_block( [
			'name' => 'cta',
			'title' => __( 'CTA', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Features Flow
		acf_register_block( [
			'name' => 'features-flow',
			'title' => __( 'Features Flow', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );
		
		// Features Section
		acf_register_block( [
			'name' => 'features-section',
			'title' => __( 'Features Section', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Features
		acf_register_block( [
			'name' => 'features',
			'title' => __( 'Features', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Hero Feature
		acf_register_block( [
			'name' => 'hero-feature',
			'title' => __( 'Hero Feature', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Hero Page
		acf_register_block( [
			'name' => 'hero-page',
			'title' => __( 'Hero Page', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Informative Teaser
		acf_register_block( [
			'name' => 'informative-teaser',
			'title' => __( 'Informative Teaser', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Intro text
		acf_register_block( [
			'name' => 'intro-text',
			'title' => __( 'Intro text', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Tabs
		acf_register_block( [
			'name' => 'tabs',
			'title' => __( 'Tabs', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Teaser with QR
		acf_register_block( [
			'name' => 'teaser-with-qr',
			'title' => __( 'Teaser with QR', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );

		// Testimonials
		acf_register_block( [
			'name' => 'testimonials',
			'title' => __( 'Testimonials', 'mmasivo-theme' ),
			'render_callback' => [ $this, 'block_render_callback' ],
			'category' => 'mmasivo-content',
			'icon' => 'block-default',
			'mode' => 'edit',
			'supports' => [
				'align' => FALSE,
			],
		] );
	}

}

new Acf();

