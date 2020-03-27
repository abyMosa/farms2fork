<?php

if ( ! function_exists('frappe_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function frappe_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'frappe'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'frappe') => 'default',
				esc_html__('Custom Style 1', 'frappe') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'frappe') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'frappe') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'frappe')
		));
	}
	
	add_action('vc_after_init', 'frappe_elated_contact_form_map');
}