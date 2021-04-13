<?php

namespace MMasivo\BaseTheme;

class AjaxHandler {

	public function __construct() {
		add_action( 'wp_ajax_lbs_theme_load_more_insights', [ $this, 'load_more_insights' ] );
		add_action( 'wp_ajax_nopriv_lbs_theme_load_more_insights', [ $this, 'load_more_insights' ] );
	}

	public function load_more_insights() {
		if ( ! check_ajax_referer( 'insights-load-more', 'lbs_theme_insights_load_more_nonce', FALSE ) ) {
			wp_send_json_error();
		}

		$data = [ 'paged' => FALSE, 'html' => '' ];
		$args = [
			'post_type' => 'insight',
			'post_status' => 'publish',
			'ignore_sticky_posts' => TRUE,
		];

		// set posts per page
		if ( ! empty( $_POST['posts_per_page'] ) ) {
			$args['posts_per_page'] = (int) $_POST['posts_per_page'];
		}

		// set page num
		if ( ! empty( $_POST['paged'] ) ) {
			$args['paged'] = (int) $_POST['paged'];
		}

		// exclude posts already seen
		if ( ! empty( $_POST['post__not_in'] ) ) {
			$exclude = [];

			// Ensure post IDs are numeric
			foreach ( explode( ',', $_POST['post__not_in'] ) as $post_id ) {
				if ( intval( $post_id ) == $post_id ) {
					$exclude[] = $post_id;
				}
			}

			if ( $exclude ) {
				$args['post__not_in'] = $exclude;
			}
		}

		// process filters
		$taxonomies = [ 'solution', 'industry', 'topic', 'insight_type' ];
		$tax_query = [];
		foreach ( $taxonomies as $tax_slug ) {
			if ( ! empty( $_POST[ $tax_slug ] ) ) {
				$tax_query[] = [
					'taxonomy' => $tax_slug,
					'field' => 'slug',
					'terms' => $_POST[ $tax_slug ],
				];
			};
		}
		if ( $tax_query ) {
			$args['tax_query'] = $tax_query;
		}

		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				ob_start();
				echo '<div class="cell small-12 tablet-6 laptop-4">';
				include get_theme_file_path( 'template-parts/parts/insight-large-card.php' );
				echo '</div>';
				$data['html'] .= ob_get_clean();
			}

			// If we have more pages add a page
			if ( ( $args['paged'] + 1 ) < $query->max_num_pages  ) {
				$data['paged'] = $args['paged'] + 1;
			}
		}

		wp_send_json_success( $data );
	}

}

new AjaxHandler();
