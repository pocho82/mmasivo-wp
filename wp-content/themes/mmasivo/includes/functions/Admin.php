<?php

namespace MMasivo\BaseTheme;

class Admin {

	/**
	 * Admin constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ], 100 );
		add_action( 'wp_before_admin_bar_render', [ $this, 'wp_before_admin_bar_render' ] );
		add_filter( 'block_categories', [ $this, 'block_categories' ], 10, 2 );
		add_filter( 'enter_title_here', [ $this, 'enter_title_here' ], 10, 2 );
		add_filter( 'register_post_type_args', [ $this, 'forbid_posts' ], 10, 2 );
	}

	/**
	 * Hides the built-in "post" post-type
	 *
	 * @param array  $args
	 * @param string $post_type
	 *
	 * @return array
	 */
	public function forbid_posts( array $args, string $post_type ): array {
		if ( $post_type === 'post' ) {
			$args['capabilities'] = [
				'edit_post' => FALSE,
				'read_post' => FALSE,
				'delete_post' => FALSE,
				'edit_posts' => FALSE,
				'edit_others_posts' => FALSE,
				'publish_posts' => FALSE,
				'read' => FALSE,
				'delete_posts' => FALSE,
				'delete_private_posts' => FALSE,
				'delete_published_posts' => FALSE,
				'delete_others_posts' => FALSE,
				'edit_private_posts' => FALSE,
				'edit_published_posts' => FALSE,
				'create_posts' => FALSE,
			];
		}

		return $args;
	}

	/**
	 * Alters the placeholder text for the title field on post-edit screens
	 *
	 * Uses "enter_title_here" filter.
	 *
	 * @param string   $title
	 * @param \WP_Post $post
	 *
	 * @return string
	 */
	public function enter_title_here( string $title, \WP_Post $post ): string {
		if ( $post->post_type === 'contact' ) {
			$title = __( 'First/Last Name', 'mmasivo-theme' );
		}

		return $title;
	}

	/**
	 * Runs on "admin_menu" hook
	 */
	public function admin_menu() {
		remove_menu_page( 'edit-comments.php' );
	}

	/**
	 * Runs on "wp_before_admin_bar_render" hook
	 */
	public function wp_before_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'comments' );
	}

	/**
	 * Register Gutenberg Block Categories
	 *
	 * Uses "block_categories" filter.
	 *
	 * @param array    $categories
	 * @param \WP_Post $post
	 *
	 * @return array
	 */
	public function block_categories( array $categories, \WP_Post $post ): array {
		return array_merge(
			$categories,
			[
				[
					'slug' => 'mmasivo-content',
					'title' => __( 'Mmasivo - Content', 'mmasivo-theme' ),
					'icon' => 'layout',
				],
			]
		);
	}

}

new Admin();
