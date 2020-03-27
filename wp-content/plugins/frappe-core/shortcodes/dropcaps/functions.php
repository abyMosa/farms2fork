<?php

if ( ! function_exists( 'frappe_core_add_dropcaps_shortcodes' ) ) {
	function frappe_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'FrappeCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'frappe_core_filter_add_vc_shortcode', 'frappe_core_add_dropcaps_shortcodes' );
}