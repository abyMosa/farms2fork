<?php

if ( ! function_exists( 'frappe_elated_map_post_video_meta' ) ) {
	function frappe_elated_map_post_video_meta() {
		$video_post_format_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'frappe' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'frappe' ),
				'description'   => esc_html__( 'Choose video type', 'frappe' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'frappe' ),
					'self'            => esc_html__( 'Self Hosted', 'frappe' )
				)
			)
		);
		
		$eltdf_video_embedded_container = frappe_elated_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'eltdf_video_embedded_container'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'frappe' ),
				'description' => esc_html__( 'Enter Video URL', 'frappe' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'frappe' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'frappe' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'frappe' ),
				'description' => esc_html__( 'Enter video image', 'frappe' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_video_meta', 22 );
}