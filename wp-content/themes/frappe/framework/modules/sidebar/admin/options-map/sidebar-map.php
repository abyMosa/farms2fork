<?php

if ( ! function_exists( 'frappe_elated_sidebar_options_map' ) ) {
	function frappe_elated_sidebar_options_map() {
		
		frappe_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'frappe' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = frappe_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'frappe' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		frappe_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'frappe' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'frappe' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => frappe_elated_get_custom_sidebars_options()
		) );
		
		$frappe_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $frappe_custom_sidebars ) > 0 ) {
			frappe_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'frappe' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'frappe' ),
				'parent'      => $sidebar_panel,
				'options'     => $frappe_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'frappe_elated_action_options_map', 'frappe_elated_sidebar_options_map', 7 );
}