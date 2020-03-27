<?php

if ( ! function_exists( 'frappe_elated_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function frappe_elated_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'frappe' );
		
		return $templates;
	}
	
	add_filter( 'frappe_elated_filter_register_blog_templates', 'frappe_elated_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'frappe_elated_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function frappe_elated_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'frappe' );
		
		return $options;
	}
	
	add_filter( 'frappe_elated_filter_blog_list_type_global_option', 'frappe_elated_set_blog_masonry_type_global_option' );
}