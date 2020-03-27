<?php

if ( ! function_exists( 'frappe_elated_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function frappe_elated_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'frappe' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'frappe' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'frappe_elated_action_additional_title_area_meta_boxes', 'frappe_elated_breadcrumbs_title_type_options_meta_boxes' );
}