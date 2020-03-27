<?php

if ( ! function_exists( 'frappe_core_register_widgets' ) ) {
	function frappe_core_register_widgets() {
		$widgets = apply_filters( 'frappe_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'frappe_core_register_widgets' );
}