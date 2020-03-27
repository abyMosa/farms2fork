<?php

if ( ! function_exists( 'frappe_core_map_testimonials_meta' ) ) {
	function frappe_core_map_testimonials_meta() {
		$testimonial_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'frappe-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'frappe-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'frappe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'frappe-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'frappe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'frappe-core' ),
				'description' => esc_html__( 'Enter author name', 'frappe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'frappe-core' ),
				'description' => esc_html__( 'Enter author job position', 'frappe-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_core_map_testimonials_meta', 95 );
}