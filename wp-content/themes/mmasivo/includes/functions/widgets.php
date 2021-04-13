<?php

namespace MMasivo\BaseTheme;

class Widgets {

	/**
	 * Allowed widgets
	 *
	 * Any widget not in this list will be removed.
	 *
	 * @var array
	 */
	const ALLOWED_WIDGETS = [
		'WP_Widget_Media_Image',
		'WP_Widget_Text',
		'WP_Nav_Menu_Widget',
		'WP_Widget_Custom_HTML',
		'MMasivo\Search\SearchFormWidget',
		'FrmShowForm',
		'AddThisWidgetByDomClass'
	];

	/**
	 * Widgets constructor
	 */
	public function __construct() {
		add_action( 'widgets_init', [ $this, 'remove_widgets' ], 11 );
	}

	/**
	 * Removes any widgets that aren't specifically allowed
	 *
	 * @global \WP_Widget_Factory $wp_widget_factory
	 */
	public function remove_widgets() {
		global $wp_widget_factory;

		foreach ( array_keys( $wp_widget_factory->widgets ) as $widget ) {
			if ( ! in_array( $widget, self::ALLOWED_WIDGETS ) ) {
				$wp_widget_factory->unregister( $widget );
			}
		}
	}

}

if ( is_admin() ) {
	new Widgets();
}
