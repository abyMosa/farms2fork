<?php

if ( ! function_exists( 'frappe_elated_map_general_meta' ) ) {
	function frappe_elated_map_general_meta() {
		
		$general_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'frappe' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'frappe' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'frappe' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'frappe' ),
				'parent'        => $general_meta_box
			)
		);
		
		$eltdf_content_padding_group = frappe_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'frappe' ),
				'description' => esc_html__( 'Define styles for Content area', 'frappe' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltdf_content_padding_row = frappe_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row',
					'next'   => true,
					'parent' => $eltdf_content_padding_group
				)
			);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'frappe' ),
						'parent' => $eltdf_content_padding_row,
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'    => 'eltdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'frappe' ),
						'parent'  => $eltdf_content_padding_row,
					)
				);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'frappe' ),
				'description' => esc_html__( 'Choose background color for page content', 'frappe' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'frappe' ),
				'parent'  => $general_meta_box,
				'options' => frappe_elated_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = frappe_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'frappe' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'frappe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'frappe' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'frappe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'frappe' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'frappe' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'frappe' ),
						'description'   => esc_html__( 'Choose background image attachment', 'frappe' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'frappe' ),
							'fixed'  => esc_html__( 'Fixed', 'frappe' ),
							'scroll' => esc_html__( 'Scroll', 'frappe' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'frappe' ),
				'parent'        => $general_meta_box,
				'options'       => frappe_elated_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = frappe_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'frappe' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'frappe' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'frappe' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'frappe' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'frappe' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'frappe' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				frappe_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'frappe' ),
						'options'       => frappe_elated_get_yes_no_select_array(),
					)
				);
		
				frappe_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'frappe' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'frappe' ),
						'options'       => frappe_elated_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'frappe' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'frappe' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'frappe' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'frappe' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'frappe' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'frappe' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'frappe' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'frappe' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'frappe' ),
				'parent'        => $general_meta_box,
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = frappe_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				frappe_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'frappe' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'frappe' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => frappe_elated_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = frappe_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'eltdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					frappe_elated_create_meta_box_field(
						array(
							'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'frappe' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = frappe_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'frappe' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'frappe' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = frappe_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					frappe_elated_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'frappe' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'frappe' ),
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
					
					frappe_elated_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'frappe' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					frappe_elated_create_meta_box_field(
						array(
							'name'        => 'eltdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'frappe' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'frappe' ),
							'options'     => frappe_elated_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'frappe' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'frappe' ),
				'parent'      => $general_meta_box,
				'options'     => frappe_elated_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_general_meta', 10 );
}