<?php

if ( ! function_exists( 'frappe_elated_get_hide_dep_for_header_standard_options' ) ) {
	function frappe_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'frappe_elated_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'frappe_elated_header_standard_map' ) ) {
	function frappe_elated_header_standard_map( $parent ) {
		$hide_dep_options = frappe_elated_get_hide_dep_for_header_standard_options();
		
		frappe_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'frappe' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'frappe' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'frappe' ),
					'left'   => esc_html__( 'Left', 'frappe' ),
					'center' => esc_html__( 'Center', 'frappe' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'yesno',
				'name'            => 'enable_cut_off_effect_bottom',
				'default_value'   => 'no',
				'label'           => esc_html__( 'Enable Cut Off Efect', 'frappe' ),
				'description'     => esc_html__( 'Cut Off efect will be shown on the bottom of header area', 'frappe' ),
				'options'         => array(
					'no'    => esc_html__( 'No', 'frappe' ),
					'yes'   => esc_html__( 'Yes', 'frappe' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'parent'        => $parent,
				'type'          => 'color',
				'name'          => 'cut_off_effect_background',
				'default_value' => '',
				'label'         => esc_html__( 'Cut-off Effect Background', 'frappe' ),
				'description'   => esc_html__( 'Set grid background color for cut off effect', 'frappe' ),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'frappe_elated_action_additional_header_menu_area_options_map', 'frappe_elated_header_standard_map' );
}