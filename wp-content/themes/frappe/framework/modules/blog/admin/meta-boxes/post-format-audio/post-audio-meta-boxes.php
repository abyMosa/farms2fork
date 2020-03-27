<?php

if ( ! function_exists( 'frappe_elated_map_post_audio_meta' ) ) {
	function frappe_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'frappe' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'frappe' ),
				'description'   => esc_html__( 'Choose audio type', 'frappe' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'frappe' ),
					'self'            => esc_html__( 'Self Hosted', 'frappe' )
				)
			)
		);
		
		$eltdf_audio_embedded_container = frappe_elated_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'eltdf_audio_embedded_container'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'frappe' ),
				'description' => esc_html__( 'Enter audio URL', 'frappe' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'frappe' ),
				'description' => esc_html__( 'Enter audio link', 'frappe' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_audio_meta', 23 );
}