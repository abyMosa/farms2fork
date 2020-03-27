<?php

if ( ! function_exists( 'frappe_elated_get_title_types_meta_boxes' ) ) {
	function frappe_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'frappe_elated_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'frappe' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'frappe_elated_map_title_meta' ) ) {
	function frappe_elated_map_title_meta() {
		$title_type_meta_boxes = frappe_elated_get_title_types_meta_boxes();
		
		$title_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'frappe' ),
				'name'  => 'title_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'frappe' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'frappe' ),
				'parent'        => $title_meta_box,
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = frappe_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'eltdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'frappe' ),
						'description'   => esc_html__( 'Choose title type', 'frappe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'frappe' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'frappe' ),
						'options'       => frappe_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'frappe' ),
						'description' => esc_html__( 'Set a height for Title Area', 'frappe' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'frappe' ),
						'description' => esc_html__( 'Choose a background color for title area', 'frappe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'frappe' ),
						'description' => esc_html__( 'Choose an Image for title area', 'frappe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'frappe' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'frappe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'frappe' ),
							'hide'                => esc_html__( 'Hide Image', 'frappe' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'frappe' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'frappe' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'frappe' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'frappe' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'frappe' )
						)
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'frappe' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'frappe' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'frappe' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'frappe' ),
							'window-top'    => esc_html__( 'From Window Top', 'frappe' )
						)
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'frappe' ),
						'options'       => frappe_elated_get_title_tag( true, array( 'span' => esc_html__( 'Custom Heading', 'frappe' ) ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'frappe' ),
						'description' => esc_html__( 'Choose a color for title text', 'frappe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'frappe' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'frappe' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'frappe' ),
						'options'       => frappe_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'frappe' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'frappe' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'frappe_elated_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_title_meta', 60 );
}