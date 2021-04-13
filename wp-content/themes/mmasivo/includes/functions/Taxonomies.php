<?php

namespace MMasivo\BaseTheme;

class Taxonomies {

	/**
	 * Taxonomies constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
		// Unregister default taxonomies
		unregister_taxonomy_for_object_type( 'category', 'post' );
		unregister_taxonomy_for_object_type( 'post_tag', 'post' );

		// Register "Product Types" taxonomy
		register_taxonomy(
			'product_types',
			'products',
			[
				'labels' => [
					'name' => __( 'Product Types', 'mmasivo-theme' ),
					'singular_name' => __( 'Product Type', 'mmasivo-theme' ),
					'search_items' => __( 'Search Product Types', 'mmasivo-theme' ),
					'all_items' => __( 'All Product Types', 'mmasivo-theme' ),
					'parent_item' => __( 'Parent Product Type', 'mmasivo-theme' ),
					'parent_item_colon' => __( 'Parent Product Type:', 'mmasivo-theme' ),
					'edit_item' => __( 'Edit Product Type', 'mmasivo-theme' ),
					'view_item' => __( 'View Product Type', 'mmasivo-theme' ),
					'update_item' => __( 'Update Product Type', 'mmasivo-theme' ),
					'new_item_name' => __( 'New Product Type', 'mmasivo-theme' ),
					'not_found' => __( 'No Product Types found', 'mmasivo-theme' ),
					'no_terms' => __( 'No Product Types', 'mmasivo-theme' ),
					'items_list_navigation' => __( 'Product Types list navigation', 'mmasivo-theme' ),
					'items_list' => __( 'Product Types list', 'mmasivo-theme' ),
					'back_to_items' => __( 'Back to Product Types', 'mmasivo-theme' ),
				],
				'public' => TRUE,
				'publicly_queryable' => TRUE,
				'hierarchical' => TRUE,
				'show_ui' => TRUE,
				'show_in_nav_menus' => TRUE,
				'show_in_rest' => TRUE,
			]
		);
	}

}

new Taxonomies();

