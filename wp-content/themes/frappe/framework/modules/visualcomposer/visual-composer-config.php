<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'frappe_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function frappe_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'frappe_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'frappe_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function frappe_elated_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'frappe' ),
				'value'      => array(
					esc_html__( 'Full Width', 'frappe' ) => 'full-width',
					esc_html__( 'In Grid', 'frappe' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Elated Anchor ID', 'frappe' ),
				'description' => esc_html__( 'For example "home"', 'frappe' ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'frappe' ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'frappe' ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'background_image_size',
				'heading'     => esc_html__( 'Elated Background Image Size', 'frappe' ),
				'value'       => array(
					esc_html__( 'Default', 'frappe' )    => '',
					esc_html__( 'Contain', 'frappe' ) => 'contain',
					esc_html__( 'Cover', 'frappe' ) => 'cover'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose background image size', 'frappe' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'frappe' ),
				'value'       => array(
					esc_html__( 'Never', 'frappe' )        => '',
					esc_html__( 'Below 1280px', 'frappe' ) => '1280',
					esc_html__( 'Below 1024px', 'frappe' ) => '1024',
					esc_html__( 'Below 768px', 'frappe' )  => '768',
					esc_html__( 'Below 680px', 'frappe' )  => '680',
					esc_html__( 'Below 480px', 'frappe' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'frappe' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Elated Parallax Background Image', 'frappe' ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_overlay_image',
				'heading'    => esc_html__( 'Elated Parallax Overlay Image', 'frappe' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' ),
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Elated Parallax Speed', 'frappe' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'frappe' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'frappe' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'frappe' ),
				'value'      => array(
					esc_html__( 'Default', 'frappe' ) => '',
					esc_html__( 'Left', 'frappe' )    => 'left',
					esc_html__( 'Center', 'frappe' )  => 'center',
					esc_html__( 'Right', 'frappe' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);

		vc_add_param('vc_row', 

			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Enable Cut-off Effect on Row','frappe'),
				'param_name' => 'enable_cut_off_effect',
				'value'      => array(
					esc_html__('No','frappe') => 'no',
					esc_html__('Yes','frappe') => 'yes'
				),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);

		vc_add_param('vc_row', 

			array(
				'type'		 => 'dropdown',
				'heading'    => esc_html__('Cut-off Effect Top','frappe'),
				'param_name' => 'cut_off_effect_top',
				'value'      => array(
					esc_html__('No','frappe') => 'no',
					esc_html__('Yes','frappe') => 'yes'
				),
				'dependency' => array('element' => 'enable_cut_off_effect', 'value' => array('yes')),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);

		vc_add_param('vc_row', 

			array(
				'type'		 => 'dropdown',
				'heading'    => esc_html__('Cut-off Effect Bottom','frappe'),
				'param_name' => 'cut_off_effect_bottom',
				'value'      => array(
					esc_html__('No','frappe') => 'no',
					esc_html__('Yes','frappe') => 'yes'
				),
				'dependency' => array('element' => 'enable_cut_off_effect', 'value' => array('yes')),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);

		vc_add_param('vc_row',

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__('Cut-off Effect Background','frappe'),
				'param_name' => 'cut_off_effect_background',
				'dependency' => Array('element' => 'enable_cut_off_effect', 'value' => array('yes')),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'frappe' ),
				'value'      => array(
					esc_html__( 'Full Width', 'frappe' ) => 'full-width',
					esc_html__( 'In Grid', 'frappe' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'frappe' ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'frappe' ),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'background_image_size',
				'heading'     => esc_html__( 'Elated Background Image Size', 'frappe' ),
				'value'       => array(
					esc_html__( 'Default', 'frappe' )    => '',
					esc_html__( 'Contain', 'frappe' ) => 'contain',
					esc_html__( 'Cover', 'frappe' ) => 'cover'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose background image size', 'frappe' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'frappe' ),
				'value'       => array(
					esc_html__( 'Never', 'frappe' )        => '',
					esc_html__( 'Below 1280px', 'frappe' ) => '1280',
					esc_html__( 'Below 1024px', 'frappe' ) => '1024',
					esc_html__( 'Below 768px', 'frappe' )  => '768',
					esc_html__( 'Below 680px', 'frappe' )  => '680',
					esc_html__( 'Below 480px', 'frappe' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'frappe' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'frappe' ),
				'value'      => array(
					esc_html__( 'Default', 'frappe' ) => '',
					esc_html__( 'Left', 'frappe' )    => 'left',
					esc_html__( 'Center', 'frappe' )  => 'center',
					esc_html__( 'Right', 'frappe' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'frappe' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( frappe_elated_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Elated Enable Passepartout', 'frappe' ),
					'value'       => array_flip( frappe_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Elated Settings', 'frappe' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Elated Passepartout Size', 'frappe' ),
					'value'       => array(
						esc_html__( 'Tiny', 'frappe' )   => 'tiny',
						esc_html__( 'Small', 'frappe' )  => 'small',
						esc_html__( 'Normal', 'frappe' ) => 'normal',
						esc_html__( 'Large', 'frappe' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'frappe' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Elated Disable Side Passepartout', 'frappe' ),
					'value'       => array_flip( frappe_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'frappe' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Elated Disable Top Passepartout', 'frappe' ),
					'value'       => array_flip( frappe_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'frappe' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'frappe_elated_vc_row_map' );
}