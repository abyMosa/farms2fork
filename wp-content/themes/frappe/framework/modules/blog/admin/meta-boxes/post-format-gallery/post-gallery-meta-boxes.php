<?php

if ( ! function_exists( 'frappe_elated_map_post_gallery_meta' ) ) {
	
	function frappe_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'frappe' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		frappe_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'frappe' ),
				'description' => esc_html__( 'Choose your gallery images', 'frappe' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_gallery_meta', 21 );
}
