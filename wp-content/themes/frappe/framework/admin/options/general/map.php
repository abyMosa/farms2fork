<?php

if ( ! function_exists( 'frappe_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function frappe_elated_general_options_map() {
		
		frappe_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'frappe' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = frappe_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'frappe' ),
				'parent'        => $panel_design_style
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'frappe' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'frappe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'frappe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'frappe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'frappe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'frappe' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'frappe' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'frappe' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'frappe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'frappe' ),
					'100i' => esc_html__( '100 Thin Italic', 'frappe' ),
					'200'  => esc_html__( '200 Extra-Light', 'frappe' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'frappe' ),
					'300'  => esc_html__( '300 Light', 'frappe' ),
					'300i' => esc_html__( '300 Light Italic', 'frappe' ),
					'400'  => esc_html__( '400 Regular', 'frappe' ),
					'400i' => esc_html__( '400 Regular Italic', 'frappe' ),
					'500'  => esc_html__( '500 Medium', 'frappe' ),
					'500i' => esc_html__( '500 Medium Italic', 'frappe' ),
					'600'  => esc_html__( '600 Semi-Bold', 'frappe' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'frappe' ),
					'700'  => esc_html__( '700 Bold', 'frappe' ),
					'700i' => esc_html__( '700 Bold Italic', 'frappe' ),
					'800'  => esc_html__( '800 Extra-Bold', 'frappe' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'frappe' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'frappe' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'frappe' )
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'frappe' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'frappe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'frappe' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'frappe' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'frappe' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'frappe' ),
					'greek'        => esc_html__( 'Greek', 'frappe' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'frappe' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'frappe' )
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'frappe' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #abe9b0', 'frappe' ),
				'parent'      => $panel_design_style
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'second_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Second Main Color', 'frappe' ),
				'description' => esc_html__( 'Choose the second dominant theme color. Default color is #fbbcc0', 'frappe' ),
				'parent'      => $panel_design_style
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'frappe' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'frappe' ),
				'parent'      => $panel_design_style
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'frappe' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'frappe' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'frappe' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = frappe_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				frappe_elated_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'frappe' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'frappe' ),
						'parent'      => $boxed_container
					)
				);
				
				frappe_elated_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'frappe' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'frappe' ),
						'parent'      => $boxed_container
					)
				);
				
				frappe_elated_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'frappe' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'frappe' ),
						'parent'      => $boxed_container
					)
				);
				
				frappe_elated_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'frappe' ),
						'description'   => esc_html__( 'Choose background image attachment', 'frappe' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'frappe' ),
							'fixed'  => esc_html__( 'Fixed', 'frappe' ),
							'scroll' => esc_html__( 'Scroll', 'frappe' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'frappe' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = frappe_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				frappe_elated_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'frappe' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'frappe' ),
						'parent'      => $paspartu_container
					)
				);
				
				frappe_elated_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'frappe' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'frappe' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				frappe_elated_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'frappe' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'frappe' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				frappe_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'frappe' )
					)
				);
		
				frappe_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'frappe' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'frappe' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'frappe' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'frappe' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1100' => esc_html__( '1100px - default', 'frappe' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'frappe' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'frappe' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'frappe' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'frappe' )
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'frappe' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'frappe' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = frappe_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'frappe' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'frappe' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'frappe' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = frappe_elated_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				frappe_elated_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'frappe' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'frappe' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = frappe_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					frappe_elated_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'frappe' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = frappe_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'frappe' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'frappe' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = frappe_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'frappe' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'frappe' ),
								'pulse'                 => esc_html__( 'Pulse', 'frappe' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'frappe' ),
								'cube'                  => esc_html__( 'Cube', 'frappe' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'frappe' ),
								'stripes'               => esc_html__( 'Stripes', 'frappe' ),
								'wave'                  => esc_html__( 'Wave', 'frappe' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'frappe' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'frappe' ),
								'atom'                  => esc_html__( 'Atom', 'frappe' ),
								'clock'                 => esc_html__( 'Clock', 'frappe' ),
								'mitosis'               => esc_html__( 'Mitosis', 'frappe' ),
								'lines'                 => esc_html__( 'Lines', 'frappe' ),
								'fussion'               => esc_html__( 'Fussion', 'frappe' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'frappe' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'frappe' ),
								'frappe_loader'         => esc_html__( 'Frappe Loader', 'frappe' )
							)
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'frappe' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					frappe_elated_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'frappe' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'frappe' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'frappe' ),
				'parent'        => $panel_settings
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'frappe' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = frappe_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'frappe' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'frappe' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = frappe_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'frappe' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'frappe' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'frappe_elated_action_options_map', 'frappe_elated_general_options_map', 1 );
}

if ( ! function_exists( 'frappe_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function frappe_elated_page_general_style( $style ) {
		$current_style = '';
		$page_id       = frappe_elated_get_page_id();
		$class_prefix  = frappe_elated_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = frappe_elated_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = frappe_elated_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = frappe_elated_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = frappe_elated_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= frappe_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.eltdf-paspartu-enabled .eltdf-page-header .eltdf-fixed-wrapper.fixed',
			'.eltdf-paspartu-enabled .eltdf-sticky-header',
			'.eltdf-paspartu-enabled .eltdf-mobile-header.mobile-header-appear .eltdf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-page-header .eltdf-fixed-wrapper.fixed',
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-sticky-header.header-appear',
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-mobile-header.mobile-header-appear .eltdf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = frappe_elated_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = frappe_elated_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( frappe_elated_string_ends_with( $paspartu_width, '%' ) || frappe_elated_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = frappe_elated_string_ends_with( $paspartu_width, '%' ) ? frappe_elated_filter_suffix( $paspartu_width, '%' ) : frappe_elated_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = frappe_elated_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.eltdf-paspartu-enabled .eltdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= frappe_elated_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= frappe_elated_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= frappe_elated_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = frappe_elated_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( frappe_elated_string_ends_with( $paspartu_responsive_width, '%' ) || frappe_elated_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = frappe_elated_string_ends_with( $paspartu_responsive_width, '%' ) ? frappe_elated_filter_suffix( $paspartu_responsive_width, '%' ) : frappe_elated_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = frappe_elated_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . frappe_elated_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . frappe_elated_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . frappe_elated_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'frappe_elated_filter_add_page_custom_style', 'frappe_elated_page_general_style' );
}