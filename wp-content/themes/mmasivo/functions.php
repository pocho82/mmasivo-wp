<?php

use MMasivo\BaseTheme\Main;

define( 'THEME_VERSION', wp_get_theme( 'mmasivo' )->get( 'Version' ) );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

/**
 * Gets the theme instance
 *
 * @return Main
 */
function init_theme(): Main {
	require_once THEME_DIR . '/includes/functions/Main.php';
	require_once THEME_DIR . '/options-config.php';

	return Main::instance();
}

init_theme();
