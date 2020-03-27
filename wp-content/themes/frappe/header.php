<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * frappe_elated_action_header_meta hook
	 *
	 * @see frappe_elated_header_meta() - hooked with 10
	 * @see frappe_elated_user_scalable_meta - hooked with 10
	 * @see frappe_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'frappe_elated_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * frappe_elated_action_after_body_tag hook
	 *
	 * @see frappe_elated_get_side_area() - hooked with 10
	 * @see frappe_elated_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'frappe_elated_action_after_body_tag' ); ?>

    <div class="eltdf-wrapper">
        <div class="eltdf-wrapper-inner">
            <?php
            /**
             * frappe_elated_action_after_wrapper_inner hook
             *
             * @see frappe_elated_get_header() - hooked with 10
             * @see frappe_elated_get_mobile_header() - hooked with 20
             * @see frappe_elated_back_to_top_button() - hooked with 30
             * @see frappe_elated_get_header_minimal_full_screen_menu() - hooked with 40
             * @see frappe_elated_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'frappe_elated_action_after_wrapper_inner' ); ?>
	        
            <div class="eltdf-content" <?php frappe_elated_content_elem_style_attr(); ?>>
                <div class="eltdf-content-inner">