<?php

/*** Child Theme Function  ***/

if ( !function_exists( 'frappe_elated_child_theme_enqueue_scripts' ) ) {
	function frappe_elated_child_theme_enqueue_scripts() {
		$parent_style = 'frappe-elated-default-style';
		
		wp_enqueue_style( 'frappe-elated-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'frappe_elated_child_theme_enqueue_scripts' );
}