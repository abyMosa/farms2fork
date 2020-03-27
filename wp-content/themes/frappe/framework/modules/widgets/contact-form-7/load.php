<?php

if ( frappe_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_cf7_widget' );
}

if ( ! function_exists( 'frappe_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function frappe_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassContactForm7Widget';
		
		return $widgets;
	}
}