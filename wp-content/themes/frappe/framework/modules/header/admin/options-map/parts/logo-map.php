<?php

if ( ! function_exists( 'frappe_elated_logo_options_map' ) ) {
	function frappe_elated_logo_options_map() {
		
		frappe_elated_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'frappe' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = frappe_elated_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'frappe' )
			)
		);
		
		$hide_logo_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'frappe' ),
				'parent'        => $hide_logo_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'frappe' ),
				'parent'        => $hide_logo_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'frappe' ),
				'parent'        => $hide_logo_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'frappe' ),
				'parent'        => $hide_logo_container
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'frappe' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'frappe_elated_action_options_map', 'frappe_elated_logo_options_map', 2 );
}