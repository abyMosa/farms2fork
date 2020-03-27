<?php

if ( ! function_exists( 'frappe_core_reviews_map' ) ) {
	function frappe_core_reviews_map() {
		
		$reviews_panel = frappe_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'frappe-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'frappe-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating for each room', 'frappe-core' ),
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'frappe-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating for each room', 'frappe-core' ),
			)
		);
	}
	
	add_action( 'frappe_elated_action_additional_page_options_map', 'frappe_core_reviews_map', 75 ); //one after elements
}