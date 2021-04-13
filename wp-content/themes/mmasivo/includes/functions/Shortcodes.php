<?php

namespace MMasivo\BaseTheme;

class Shortcodes {

	public function __construct() {
		add_filter( 'widget_text', 'do_shortcode' );
		add_shortcode( 'year', [ $this, 'year'] );
	}

	/**
	 * [year] shortcode handler that returns the current year.
	 *
	 * @return string
	 */
	public function year(): string {
		return date_i18n( 'Y' );
	}

}

new Shortcodes();
