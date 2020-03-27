<?php

if ( ! function_exists( 'frappe_elated_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function frappe_elated_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'frappe_elated_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'frappe_elated_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function frappe_elated_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'frappe_elated_filter_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'frappe_elated_header_menu_area_meta_options_map' ) ) {
	function frappe_elated_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = frappe_elated_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = frappe_elated_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = frappe_elated_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		frappe_elated_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'frappe' )
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'frappe' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$frappe_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $frappe_custom_sidebars ) > 0 ) {
			frappe_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'frappe' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area', 'frappe' ),
					'parent'      => $menu_area_container,
					'options'     => $frappe_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'eltdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'frappe' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'frappe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = frappe_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'eltdf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'frappe' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'frappe' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'frappe' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'frappe' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'frappe' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'frappe' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'frappe' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'frappe' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = frappe_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'eltdf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'frappe' ),
				'description' => esc_html__( 'Set border color for grid area', 'frappe' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'frappe' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'frappe' ),
				'parent'      => $menu_area_container
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'frappe' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'frappe' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'frappe' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'frappe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'frappe' ),
				'description'   => esc_html__( 'Set border on menu area', 'frappe' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = frappe_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'eltdf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'frappe' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'frappe' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'eltdf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'frappe' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'frappe' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'eltdf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'frappe' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'frappe' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

        frappe_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_wide_dropdown_menu_in_grid_meta',
                'type'          => 'select',
                'label'         => esc_html__( 'Wide Dropdown Menu In Grid', 'frappe' ),
                'description'   => esc_html__( 'Set wide dropdown menu to be in grid', 'frappe' ),
                'parent'        => $menu_area_container,
                'default_value' => '',
                'options'       => frappe_elated_get_yes_no_select_array()
            )
        );

        $wide_dropdown_menu_in_grid_container = frappe_elated_add_admin_container(
            array(
                'type'            => 'container',
                'name'            => 'wide_dropdown_menu_in_grid_container',
                'parent'          => $menu_area_container,
                'dependency' => array(
                    'show' => array(
                        'eltdf_wide_dropdown_menu_in_grid_meta'  => 'no'
                    )
                )
            )
        );

        frappe_elated_create_meta_box_field(
            array(
                'name'        => 'eltdf_wide_dropdown_menu_content_in_grid_meta',
                'type'          => 'select',
                'label'       => esc_html__( 'Wide Dropdown Menu Content In Grid', 'frappe' ),
                'description' => esc_html__( 'Set wide dropdown menu content to be in grid', 'frappe' ),
                'parent'      => $wide_dropdown_menu_in_grid_container,
                'default_value' => '',
                'options'       => frappe_elated_get_yes_no_select_array()
            )
        );
		
		do_action( 'frappe_elated_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'frappe_elated_action_header_menu_area_meta_boxes_map', 'frappe_elated_header_menu_area_meta_options_map', 10, 1 );
}