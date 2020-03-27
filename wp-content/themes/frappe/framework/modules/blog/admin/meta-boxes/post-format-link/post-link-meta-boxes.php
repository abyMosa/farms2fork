<?php

if ( ! function_exists( 'frappe_elated_map_post_link_meta' ) ) {
	function frappe_elated_map_post_link_meta() {
		$link_post_format_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'frappe' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'frappe' ),
				'description' => esc_html__( 'Enter link', 'frappe' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_link_meta', 24 );
}