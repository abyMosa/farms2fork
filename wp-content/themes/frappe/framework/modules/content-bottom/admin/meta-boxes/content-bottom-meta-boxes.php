<?php

if ( ! function_exists( 'frappe_elated_map_content_bottom_meta' ) ) {
	function frappe_elated_map_content_bottom_meta() {
		
		$content_bottom_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'frappe' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'frappe' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'frappe' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltdf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'frappe' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'frappe' ),
				'options'       => frappe_elated_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'frappe' ),
				'options'       => frappe_elated_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'frappe' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'frappe' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_content_bottom_meta', 71 );
}