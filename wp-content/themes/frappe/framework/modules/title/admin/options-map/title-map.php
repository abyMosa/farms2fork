<?php

if ( ! function_exists( 'frappe_elated_get_title_types_options' ) ) {
	function frappe_elated_get_title_types_options() {
		$title_type_options = apply_filters( 'frappe_elated_filter_title_type_global_option', $title_type_options = array() );
		
		return $title_type_options;
	}
}

if ( ! function_exists( 'frappe_elated_get_title_type_default_options' ) ) {
	function frappe_elated_get_title_type_default_options() {
		$title_type_option = apply_filters( 'frappe_elated_filter_default_title_type_global_option', $title_type_option = '' );
		
		return $title_type_option;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists('frappe_elated_title_options_map') ) {
	function frappe_elated_title_options_map() {
		$title_type_options        = frappe_elated_get_title_types_options();
		$title_type_default_option = frappe_elated_get_title_type_default_options();

		frappe_elated_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'frappe'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = frappe_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'frappe')
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Title Area', 'frappe' ),
				'description'   => esc_html__( 'This option will enable/disable Title Area', 'frappe' ),
				'parent'        => $panel_title
			)
		);
		
			$show_title_area_container = frappe_elated_add_admin_container(
				array(
					'parent'          => $panel_title,
					'name'            => 'show_title_area_container',
					'dependency' => array(
						'show' => array(
							'show_title_area' => 'yes'
						)
					)
				)
			);
		
				frappe_elated_add_admin_field(
					array(
						'name'          => 'title_area_type',
						'type'          => 'select',
						'default_value' => $title_type_default_option,
						'label'         => esc_html__( 'Title Area Type', 'frappe' ),
						'description'   => esc_html__( 'Choose title type', 'frappe' ),
						'parent'        => $show_title_area_container,
						'options'       => $title_type_options
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'name'          => 'title_area_in_grid',
							'type'          => 'yesno',
							'default_value' => 'yes',
							'label'         => esc_html__( 'Title Area In Grid', 'frappe' ),
							'description'   => esc_html__( 'Set title area content to be in grid', 'frappe' ),
							'parent'        => $show_title_area_container
						)
					);
		
					frappe_elated_add_admin_field(
						array(
							'name'        => 'title_area_height',
							'type'        => 'text',
							'label'       => esc_html__( 'Height', 'frappe' ),
							'description' => esc_html__( 'Set a height for Title Area', 'frappe' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => 'px'
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'name'        => 'title_area_background_color',
							'type'        => 'color',
							'label'       => esc_html__( 'Background Color', 'frappe' ),
							'description' => esc_html__( 'Choose a background color for Title Area', 'frappe' ),
							'parent'      => $show_title_area_container
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'name'        => 'title_area_background_image',
							'type'        => 'image',
							'label'       => esc_html__( 'Background Image', 'frappe' ),
							'description' => esc_html__( 'Choose an Image for Title Area', 'frappe' ),
							'parent'      => $show_title_area_container
						)
					);
		
					frappe_elated_add_admin_field(
						array(
							'name'          => 'title_area_background_image_behavior',
							'type'          => 'select',
							'default_value' => '',
							'label'         => esc_html__( 'Background Image Behavior', 'frappe' ),
							'description'   => esc_html__( 'Choose title area background image behavior', 'frappe' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								''                  => esc_html__( 'Default', 'frappe' ),
								'responsive'        => esc_html__( 'Enable Responsive Image', 'frappe' ),
								'parallax'          => esc_html__( 'Enable Parallax Image', 'frappe' ),
								'parallax-zoom-out' => esc_html__( 'Enable Parallax With Zoom Out Image', 'frappe' )
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'name'          => 'title_area_vertical_alignment',
							'type'          => 'select',
							'default_value' => 'header-bottom',
							'label'         => esc_html__( 'Vertical Alignment', 'frappe' ),
							'description'   => esc_html__( 'Specify title vertical alignment', 'frappe' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								'header-bottom' => esc_html__( 'From Bottom of Header', 'frappe' ),
								'window-top'    => esc_html__( 'From Window Top', 'frappe' )
							)
						)
					);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'frappe_elated_action_additional_title_area_options_map', $show_title_area_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
		
		$panel_typography = frappe_elated_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'frappe' )
			)
		);
		
			frappe_elated_add_admin_section_title(
				array(
					'name'   => 'type_section_title',
					'title'  => esc_html__( 'Title', 'frappe' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_title_styles = frappe_elated_add_admin_group(
				array(
					'name'        => 'group_page_title_styles',
					'title'       => esc_html__( 'Title', 'frappe' ),
					'description' => esc_html__( 'Define styles for page title', 'frappe' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_title_styles_1 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_1',
						'parent' => $group_page_title_styles
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'name'          => 'title_area_title_tag',
							'type'          => 'selectsimple',
							'default_value' => 'h1',
							'label'         => esc_html__( 'Title Tag', 'frappe' ),
							'options'       => frappe_elated_get_title_tag( false, array( 'span' => esc_html__( 'Custom Heading', 'frappe' ) ) ),
							'parent'        => $row_page_title_styles_1
						)
					);
		
				$row_page_title_styles_2 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_2',
						'parent' => $group_page_title_styles
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_title_color',
							'label'  => esc_html__( 'Text Color', 'frappe' ),
							'parent' => $row_page_title_styles_2
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'frappe' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'frappe' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'frappe' ),
							'options'       => frappe_elated_get_text_transform_array(),
							'parent'        => $row_page_title_styles_2
						)
					);
		
				$row_page_title_styles_3 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_3',
						'parent' => $group_page_title_styles,
						'next'   => true
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_title_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'frappe' ),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'frappe' ),
							'options'       => frappe_elated_get_font_style_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'frappe' ),
							'options'       => frappe_elated_get_font_weight_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'frappe' ),
							'parent'        => $row_page_title_styles_3,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
		
			frappe_elated_add_admin_section_title(
				array(
					'name'   => 'type_section_subtitle',
					'title'  => esc_html__( 'Subtitle', 'frappe' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_subtitle_styles = frappe_elated_add_admin_group(
				array(
					'name'        => 'group_page_subtitle_styles',
					'title'       => esc_html__( 'Subtitle', 'frappe' ),
					'description' => esc_html__( 'Define styles for page subtitle', 'frappe' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_subtitle_styles_1 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_1',
						'parent' => $group_page_subtitle_styles
					)
				);
				
					frappe_elated_add_admin_field(
						array(
							'name' => 'title_area_subtitle_tag',
							'type' => 'selectsimple',
							'default_value' => 'h6',
							'label' => esc_html__('Subtitle Tag', 'frappe'),
							'options' => frappe_elated_get_title_tag(),
							'parent' => $row_page_subtitle_styles_1
						)
					);
		
				$row_page_subtitle_styles_2 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_2',
						'parent' => $group_page_subtitle_styles
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_subtitle_color',
							'label'  => esc_html__( 'Text Color', 'frappe' ),
							'parent' => $row_page_subtitle_styles_2
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'frappe' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'frappe' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'frappe' ),
							'options'       => frappe_elated_get_text_transform_array(),
							'parent'        => $row_page_subtitle_styles_2
						)
					);
		
				$row_page_subtitle_styles_3 = frappe_elated_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_3',
						'parent' => $group_page_subtitle_styles,
						'next'   => true
					)
				);
		
					frappe_elated_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_subtitle_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'frappe' ),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'frappe' ),
							'options'       => frappe_elated_get_font_style_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'frappe' ),
							'options'       => frappe_elated_get_font_weight_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'frappe' ),
							'args'          => array(
								'suffix' => 'px'
							),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
		
		/***************** Additional Title Typography Layout - start *****************/
		
		do_action( 'frappe_elated_action_additional_title_typography_options_map', $panel_typography );
		
		/***************** Additional Title Typography Layout - end *****************/
    }

	add_action( 'frappe_elated_action_options_map', 'frappe_elated_title_options_map', 5);
}