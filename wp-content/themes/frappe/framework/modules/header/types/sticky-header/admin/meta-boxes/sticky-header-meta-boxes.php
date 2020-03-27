<?php

if ( ! function_exists( 'frappe_elated_sticky_header_meta_boxes_options_map' ) ) {
	function frappe_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'eltdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'frappe' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'frappe' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		$sticky_style_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_style_container_meta_container',
				'hidden_property' => 'eltdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
				)
			)
		);

		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_enable_header_style_on_scroll_meta',
				'type'        => 'select',
				'options'     => frappe_elated_get_yes_no_select_array(),
				'label'       => esc_html__( 'Enable Header Style on Scroll', 'frappe' ),
				'description' => esc_html__( 'Enabling this option, sticky header will have the same skin as main header', 'frappe' ),
				'parent'      => $sticky_style_container
			)
		);
		
		
		$frappe_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $frappe_custom_sidebars ) > 0 ) {
			frappe_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'frappe' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'frappe' ),
					'parent'      => $header_meta_box,
					'options'     => $frappe_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'eltdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'frappe_elated_action_additional_header_area_meta_boxes_map', 'frappe_elated_sticky_header_meta_boxes_options_map', 8, 1 );
}