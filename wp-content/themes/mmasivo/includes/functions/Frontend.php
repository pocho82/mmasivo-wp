<?php

namespace MMasivo\BaseTheme;

class Frontend {

	/**
	 * Frontend constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
		add_filter( 'script_loader_tag', [ $this, 'script_loader_tag' ], 10, 3 );
	}

	/**
	 * Filters script tags prior to output.
	 *
	 * Uses {@see 'script_loader_tag'} filter.
	 *
	 * @param string $tag
	 * @param string $handle
	 * @param string $src
	 *
	 * @return string
	 */
	public function script_loader_tag( string $tag, string $handle, string $src ): string {
		// If script handle includes "-async" add async attribute to script tag
		if ( strpos( $handle, '-async' ) !== FALSE ) {
			$tag = str_replace( '></script>', ' async></script>', $tag );
		}

		return $tag;
	}

	/**
	 * Enqueue scripts & styles
	 */
	public function enqueue() {
		wp_enqueue_style( 'mmasivo-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap', [], NULL );
		wp_enqueue_style( 'mmasivo-theme-vendors/styles', THEME_URI . '/css/vendors.min.css', [], $this->get_last_modified( THEME_URI . '/css/vendors.min.css' ) );
		wp_enqueue_style( 'mmasivo-theme-styles', THEME_URI . '/css/styles.min.css', ['mmasivo-theme-google-fonts', 'mmasivo-theme-vendors/styles'], $this->get_last_modified( THEME_URI . '/css/styles.min.css' ) );
		
		wp_enqueue_script( 'mmasivo-theme-vendors-scripts', THEME_URI . '/js/vendors.min.js', [ 'jquery' ], $this->get_last_modified( THEME_URI . '/js/vendors.min.js' ), TRUE );
		wp_enqueue_script( 'mmasivo-theme-scripts', THEME_URI . '/js/main.min.js', [ 'jquery', 'mmasivo-theme-vendors-scripts' ], $this->get_last_modified( THEME_URI . '/js/main.min.js' ), TRUE );
		
		$this->enqueue_adobe_analytics_js();
	}

	/**
	 * Enqueue Adobe Analytics Javascript
	 */
	protected function enqueue_adobe_analytics_js() {
		// $domain = parse_url( home_url(), PHP_URL_HOST );
		// $is_prod = preg_match( '/\.lmig\.com|\.libertymutual(group)?\.com$/', $domain ) === 1 && preg_match( '/^dev|test|local/', $domain ) !== 1;
		// $script_src = $is_prod ? get_field( 'lmg_adobe_analytics_prod_source', 'options' ) : get_field( 'lmg_adobe_analytics_dev_source', 'options' );

		// if ( $script_src ) {
		// 	wp_enqueue_script( 'mmasivo-theme-adobe-analytics-async', $script_src, [], NULL );
		// }
	}

	/**
	 * Gets the last modified time of the given file.
	 *
	 * @param string $relpath
	 *
	 * @return int
	 */
	protected function get_last_modified( string $relpath ): int {
		$modified = 0;
		$abspath = THEME_DIR . '/' . ltrim( $relpath, '/' );

		if ( is_readable( $abspath ) ) {
			$modified = filemtime( $abspath );
		}

		return $modified;
	}

}

if ( ! is_admin() ) {
	new Frontend();
}
