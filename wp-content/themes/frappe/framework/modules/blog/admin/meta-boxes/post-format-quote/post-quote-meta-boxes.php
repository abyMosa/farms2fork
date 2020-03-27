<?php

if ( ! function_exists( 'frappe_elated_map_post_quote_meta' ) ) {
	function frappe_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'frappe' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'frappe' ),
				'description' => esc_html__( 'Enter Quote text', 'frappe' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'frappe' ),
				'description' => esc_html__( 'Enter Quote author', 'frappe' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_quote_meta', 25 );
}