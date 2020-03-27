<?php

if ( ! function_exists( 'frappe_elated_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function frappe_elated_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'frappe' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'frappe' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'frappe_elated_register_sidebars', 1 );
}

if ( ! function_exists( 'frappe_elated_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates FrappeElatedClassSidebar object
	 */
	function frappe_elated_add_support_custom_sidebar() {
		add_theme_support( 'FrappeElatedClassSidebar' );
		
		if ( get_theme_support( 'FrappeElatedClassSidebar' ) ) {
			new FrappeElatedClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'frappe_elated_add_support_custom_sidebar' );
}