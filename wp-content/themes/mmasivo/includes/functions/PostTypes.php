<?php

namespace MMasivo\BaseTheme;

class PostTypes {

	/**
	 * PostTypes constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	/**
	 * Runs on "init" hook
	 */
	public function init() {
		// Remove comments support on posts and pages
		remove_post_type_support( 'post' , 'comments' );
		remove_post_type_support( 'page' , 'comments' );

		// Register "Products" post type
		register_post_type( 'products', [
			'label' => __( 'Products', 'mmasivo-theme' ),
			'labels' => [
				'name' => __( 'Products', 'mmasivo-theme' ),
				'singular_name' => __( 'Product', 'mmasivo-theme' ),
				'add_new' => __( 'Add New', 'mmasivo-theme' ),
				'add_new_item' => __( 'Add New Product', 'mmasivo-theme' ),
				'edit_item' => __( 'Edit Product', 'mmasivo-theme' ),
				'new_item' => __( 'New Product', 'mmasivo-theme' ),
				'view_item' => __( 'View Product', 'mmasivo-theme' ),
				'view_items' => __( 'View Products', 'mmasivo-theme' ),
				'search_items' => __( 'Search Products', 'mmasivo-theme' ),
				'not_found' => __( 'No Products found', 'mmasivo-theme' ),
				'not_found_in_trash' => __( 'No Products found in trash', 'mmasivo-theme' ),
				'all_items' => __( 'All Products', 'mmasivo-theme' ),
				'archives' => __( 'Product Archives', 'mmasivo-theme' ),
				'attributes' => __( 'Product Attributes', 'mmasivo-theme' ),
				'insert_into_item' => __( 'Insert into Product', 'mmasivo-theme' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Product', 'mmasivo-theme' ),
				'filter_items_list' => __( 'Filter Products', 'mmasivo-theme' ),
				'items_list_navigation' => __( 'Products list navigation', 'mmasivo-theme' ),
				'items_list' => __( 'Products list', 'mmasivo-theme' ),
				'item_published' => __( 'Product published', 'mmasivo-theme' ),
				'item_published_privately' => __( 'Product published privately', 'mmasivo-theme' ),
				'item_reverted_to_draft' => __( 'Product reverted to draft', 'mmasivo-theme' ),
				'item_scheduled' => __( 'Product scheduled', 'mmasivo-theme' ),
				'item_updated' => __( 'Product updated', 'mmasivo-theme' ),
			],
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'show_in_admin_bar' => TRUE,
			'show_in_rest' => TRUE,
			'menu_icon' => 'dashicons-editor-help',
			'supports' => [ 'title', 'content', 'thumbnail', 'revisions' ],
			'taxonomies' => [ 'product_types' ],
		] );

		// Register "Solutions" post type
		register_post_type( 'solutions', [
			'label' => __( 'Solutions', 'mmasivo-theme' ),
			'labels' => [
				'name' => __( 'Solutions', 'mmasivo-theme' ),
				'singular_name' => __( 'Solution', 'mmasivo-theme' ),
				'add_new' => __( 'Add New', 'mmasivo-theme' ),
				'add_new_item' => __( 'Add New Solution', 'mmasivo-theme' ),
				'edit_item' => __( 'Edit Solution', 'mmasivo-theme' ),
				'new_item' => __( 'New Solution', 'mmasivo-theme' ),
				'view_item' => __( 'View Solution', 'mmasivo-theme' ),
				'view_items' => __( 'View Solutions', 'mmasivo-theme' ),
				'search_items' => __( 'Search Solutions', 'mmasivo-theme' ),
				'not_found' => __( 'No Solutions found', 'mmasivo-theme' ),
				'not_found_in_trash' => __( 'No Solutions found in trash', 'mmasivo-theme' ),
				'all_items' => __( 'All Solutions', 'mmasivo-theme' ),
				'archives' => __( 'Solution Archives', 'mmasivo-theme' ),
				'attributes' => __( 'Solution Attributes', 'mmasivo-theme' ),
				'insert_into_item' => __( 'Insert into Solution', 'mmasivo-theme' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Solution', 'mmasivo-theme' ),
				'filter_items_list' => __( 'Filter Solutions', 'mmasivo-theme' ),
				'items_list_navigation' => __( 'Solutions list navigation', 'mmasivo-theme' ),
				'items_list' => __( 'Solutions list', 'mmasivo-theme' ),
				'item_published' => __( 'Solution published', 'mmasivo-theme' ),
				'item_published_privately' => __( 'Solution published privately', 'mmasivo-theme' ),
				'item_reverted_to_draft' => __( 'Solution reverted to draft', 'mmasivo-theme' ),
				'item_scheduled' => __( 'Solution scheduled', 'mmasivo-theme' ),
				'item_updated' => __( 'Solution updated', 'mmasivo-theme' ),
			],
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'show_in_admin_bar' => TRUE,
			'show_in_rest' => TRUE,
			'menu_icon' => 'dashicons-editor-help',
			'supports' => [ 'title', 'content', 'thumbnail', 'revisions' ],
			'taxonomies' => [ ],
		] );

		// Register "Partnerships" post type
		register_post_type( 'partnerships', [
			'label' => __( 'Partnerships', 'mmasivo-theme' ),
			'labels' => [
				'name' => __( 'Partnerships', 'mmasivo-theme' ),
				'singular_name' => __( 'Partnership', 'mmasivo-theme' ),
				'add_new' => __( 'Add New', 'mmasivo-theme' ),
				'add_new_item' => __( 'Add New Partnership', 'mmasivo-theme' ),
				'edit_item' => __( 'Edit Partnership', 'mmasivo-theme' ),
				'new_item' => __( 'New Partnership', 'mmasivo-theme' ),
				'view_item' => __( 'View Partnership', 'mmasivo-theme' ),
				'view_items' => __( 'View Partnerships', 'mmasivo-theme' ),
				'search_items' => __( 'Search Partnerships', 'mmasivo-theme' ),
				'not_found' => __( 'No Partnerships found', 'mmasivo-theme' ),
				'not_found_in_trash' => __( 'No Partnerships found in trash', 'mmasivo-theme' ),
				'all_items' => __( 'All Partnerships', 'mmasivo-theme' ),
				'archives' => __( 'Partnership Archives', 'mmasivo-theme' ),
				'attributes' => __( 'Partnership Attributes', 'mmasivo-theme' ),
				'insert_into_item' => __( 'Insert into Partnership', 'mmasivo-theme' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Partnership', 'mmasivo-theme' ),
				'filter_items_list' => __( 'Filter Partnerships', 'mmasivo-theme' ),
				'items_list_navigation' => __( 'Partnerships list navigation', 'mmasivo-theme' ),
				'items_list' => __( 'Partnerships list', 'mmasivo-theme' ),
				'item_published' => __( 'Partnership published', 'mmasivo-theme' ),
				'item_published_privately' => __( 'Partnership published privately', 'mmasivo-theme' ),
				'item_reverted_to_draft' => __( 'Partnership reverted to draft', 'mmasivo-theme' ),
				'item_scheduled' => __( 'Partnership scheduled', 'mmasivo-theme' ),
				'item_updated' => __( 'Partnership updated', 'mmasivo-theme' ),
			],
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'show_in_admin_bar' => TRUE,
			'show_in_rest' => TRUE,
			'menu_icon' => 'dashicons-editor-help',
			'supports' => [ 'title', 'content', 'thumbnail', 'revisions' ],
			'taxonomies' => [ ],
		] );

		// Register "Integrations" post type
		register_post_type( 'integrations', [
			'label' => __( 'Integrations', 'mmasivo-theme' ),
			'labels' => [
				'name' => __( 'Integrations', 'mmasivo-theme' ),
				'singular_name' => __( 'Integration', 'mmasivo-theme' ),
				'add_new' => __( 'Add New', 'mmasivo-theme' ),
				'add_new_item' => __( 'Add New Integration', 'mmasivo-theme' ),
				'edit_item' => __( 'Edit Integration', 'mmasivo-theme' ),
				'new_item' => __( 'New Integration', 'mmasivo-theme' ),
				'view_item' => __( 'View Integration', 'mmasivo-theme' ),
				'view_items' => __( 'View Integrations', 'mmasivo-theme' ),
				'search_items' => __( 'Search Integrations', 'mmasivo-theme' ),
				'not_found' => __( 'No Integrations found', 'mmasivo-theme' ),
				'not_found_in_trash' => __( 'No Integrations found in trash', 'mmasivo-theme' ),
				'all_items' => __( 'All Integrations', 'mmasivo-theme' ),
				'archives' => __( 'Integration Archives', 'mmasivo-theme' ),
				'attributes' => __( 'Integration Attributes', 'mmasivo-theme' ),
				'insert_into_item' => __( 'Insert into Integration', 'mmasivo-theme' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Integration', 'mmasivo-theme' ),
				'filter_items_list' => __( 'Filter Integrations', 'mmasivo-theme' ),
				'items_list_navigation' => __( 'Integrations list navigation', 'mmasivo-theme' ),
				'items_list' => __( 'Integrations list', 'mmasivo-theme' ),
				'item_published' => __( 'Integration published', 'mmasivo-theme' ),
				'item_published_privately' => __( 'Integration published privately', 'mmasivo-theme' ),
				'item_reverted_to_draft' => __( 'Integration reverted to draft', 'mmasivo-theme' ),
				'item_scheduled' => __( 'Integration scheduled', 'mmasivo-theme' ),
				'item_updated' => __( 'Integration updated', 'mmasivo-theme' ),
			],
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'show_in_admin_bar' => TRUE,
			'show_in_rest' => TRUE,
			'menu_icon' => 'dashicons-editor-help',
			'supports' => [ 'title', 'content', 'thumbnail', 'revisions' ],
			'taxonomies' => [ ],
		] );

		// Register "Clients" post type
		register_post_type( 'clients', [
			'label' => __( 'clients', 'mmasivo-theme' ),
			'labels' => [
				'name' => __( 'Clients', 'mmasivo-theme' ),
				'singular_name' => __( 'Client', 'mmasivo-theme' ),
				'add_new' => __( 'Add New', 'mmasivo-theme' ),
				'add_new_item' => __( 'Add New Client', 'mmasivo-theme' ),
				'edit_item' => __( 'Edit Client', 'mmasivo-theme' ),
				'new_item' => __( 'New Client', 'mmasivo-theme' ),
				'view_item' => __( 'View Client', 'mmasivo-theme' ),
				'view_items' => __( 'View Clients', 'mmasivo-theme' ),
				'search_items' => __( 'Search Clients', 'mmasivo-theme' ),
				'not_found' => __( 'No Clients found', 'mmasivo-theme' ),
				'not_found_in_trash' => __( 'No Clients found in trash', 'mmasivo-theme' ),
				'all_items' => __( 'All Clients', 'mmasivo-theme' ),
				'archives' => __( 'Client Archives', 'mmasivo-theme' ),
				'attributes' => __( 'Client Attributes', 'mmasivo-theme' ),
				'insert_into_item' => __( 'Insert into Client', 'mmasivo-theme' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Client', 'mmasivo-theme' ),
				'filter_items_list' => __( 'Filter Clients', 'mmasivo-theme' ),
				'items_list_navigation' => __( 'Clients list navigation', 'mmasivo-theme' ),
				'items_list' => __( 'Clients list', 'mmasivo-theme' ),
				'item_published' => __( 'Client published', 'mmasivo-theme' ),
				'item_published_privately' => __( 'Client published privately', 'mmasivo-theme' ),
				'item_reverted_to_draft' => __( 'Client reverted to draft', 'mmasivo-theme' ),
				'item_scheduled' => __( 'Client scheduled', 'mmasivo-theme' ),
				'item_updated' => __( 'Client updated', 'mmasivo-theme' ),
			],
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'show_in_admin_bar' => TRUE,
			'show_in_rest' => TRUE,
			'menu_icon' => 'dashicons-editor-help',
			'supports' => [ 'title', 'content', 'thumbnail', 'revisions' ],
			'taxonomies' => [ ],
		] );
	}

}

new PostTypes();