<?php

namespace MMasivo\BaseTheme;

class Main {
	/**
	 * The private singleton instance of this class
	 *
	 * @var static
	 */
	private static $instance;

	/**
	 * Gets the instance of this class.
	 *
	 * @return Main
	 */
	public static function instance(): Main {
		if ( self::$instance === NULL ) {
			self::$instance = new static();
		}

		return self::$instance;
	}

	/**
	 * Add theme support
	 *
	 * Fires on "after_setup_theme" hook.
	 */
	public function add_theme_support() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5' );
	}

	/**
	 * Register nav menus
	 *
	 * Fires on "after_setup_theme" hook.
	 */
	public function register_nav_menus() {
		register_nav_menus( [
			'mega_menu' => __( 'Mega Menu', 'mmasivo-theme' ),
		] );
	}

	/**
	 * Main constructor
	 */
	private function __construct() {
		$this->includes();

		add_action( 'after_setup_theme', [ $this, 'add_theme_support' ] );
		add_action( 'after_setup_theme', [ $this, 'register_nav_menus' ] );
	}



	/**
	 * Include all theme files
	 */
	private function includes() {
		require_once THEME_DIR . '/includes/functions/PostTypes.php';
		require_once THEME_DIR . '/includes/functions/Taxonomies.php';
		require_once THEME_DIR . '/includes/functions/Acf.php';
		require_once THEME_DIR . '/includes/functions/Admin.php';
		require_once THEME_DIR . '/includes/functions/Widgets.php';
		require_once THEME_DIR . '/includes/functions/Images.php';
		require_once THEME_DIR . '/includes/functions/Frontend.php';
		require_once THEME_DIR . '/includes/functions/Shortcodes.php';
		require_once THEME_DIR . '/includes/functions/AjaxHandler.php';
	}

}
