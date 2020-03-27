<?php

if ( ! function_exists( 'frappe_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function frappe_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'frappe_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'frappe_elated_header_standard_meta_map' ) ) {
	function frappe_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = frappe_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		frappe_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'frappe' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'frappe' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'frappe' ),
					'left'   => esc_html__( 'Left', 'frappe' ),
					'right'  => esc_html__( 'Right', 'frappe' ),
					'center' => esc_html__( 'Center', 'frappe' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);

		frappe_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_enable_cut_off_effect_bottom_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Enable Cut Off Efect', 'frappe' ),
				'description'     => esc_html__( 'Cut Off efect will be shown on the bottom of header area', 'frappe' ),
				'options'         => array(
					''      => esc_html__( 'Default', 'frappe' ),     
					'yes'   => esc_html__( 'Yes', 'frappe' ),
					'no'    => esc_html__( 'No', 'frappe' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);

		frappe_elated_create_meta_box_field(
			array(
				'parent'        => $parent,
				'type'          => 'color',
				'name'          => 'eltdf_cut_off_effect_background_meta',
				'label'         => esc_html__( 'Cut-off Effect Background', 'frappe' ),
				'description'   => esc_html__( 'Set grid background color for cut off effect', 'frappe' ),
				'dependency' => array(
					'hide' => array(
						'eltdf_enable_cut_off_effect_bottom_meta'  => 'no'
					)
				)
			)
		);
	}
	
	add_action( 'frappe_elated_action_additional_header_area_meta_boxes_map', 'frappe_elated_header_standard_meta_map' );
}