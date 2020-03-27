<?php

if ( ! function_exists( 'frappe_elated_map_sidebar_meta' ) ) {
	function frappe_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'frappe' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'frappe' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'frappe' ),
				'parent'      => $eltdf_sidebar_meta_box,
                'options'       => frappe_elated_get_custom_sidebars_options( true )
			)
		);
		
		$eltdf_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			frappe_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'frappe' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'frappe' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_sidebar_meta', 31 );
}