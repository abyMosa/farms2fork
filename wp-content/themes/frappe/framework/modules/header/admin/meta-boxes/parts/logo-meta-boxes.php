<?php

if ( ! function_exists( 'frappe_elated_logo_meta_box_map' ) ) {
	function frappe_elated_logo_meta_box_map() {
		
		$logo_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'frappe' ),
				'name'  => 'logo_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'frappe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'frappe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'frappe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'frappe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'frappe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'frappe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'frappe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'frappe' ),
				'parent'      => $logo_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'frappe' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'frappe' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_logo_meta_box_map', 47 );
}