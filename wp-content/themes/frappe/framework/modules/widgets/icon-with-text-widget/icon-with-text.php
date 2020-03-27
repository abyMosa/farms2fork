<?php

class FrappeElatedClassIconWithTextWidget extends FrappeElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_icon_with_text_widget',
			esc_html__( 'Frappe Icon With Text Widget', 'frappe' )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array_merge(
				frappe_elated_icon_collections()->getIconWidgetParamsArray(),
				array(
					array(
						'type'       => 'colorpicker',
						'name'       => 'icon_color',
						'title'      => esc_html__( 'Icon Color', 'frappe' )
					),
					array(
						'type'       => 'colorpicker',
						'name'       => 'icon_hover_color',
						'title'      => esc_html__( 'Icon Hover Color', 'frappe' )
					),
					array(
						'type'       => 'textfield',
						'name' 		 => 'custom_icon_size',
						'title'    	 => esc_html__( 'Custom Icon Size (px)', 'frappe' )
					),
					array(
						'type'       => 'textfield',
						'name' 		 => 'title',
						'title'      => esc_html__( 'Title', 'frappe' )
					),
					array(
						'type'        => 'dropdown',
						'name'        => 'title_tag',
						'title'       => esc_html__( 'Title Tag', 'frappe' ),
						'options'     => frappe_elated_get_title_tag( true, array( 'p' => 'p' ) )
					),
					array(
						'type'       => 'colorpicker',
						'name'       => 'title_color',
						'title'      => esc_html__( 'Title Color', 'frappe' )
					),
					array(
						'type'       => 'textfield',
						'name' 		 => 'title_top_margin',
						'title'    	 => esc_html__( 'Title Top Margin (px)', 'frappe' )
					),
					array(
						'type'        => 'textfield',
						'name'        => 'link',
						'title'       => esc_html__( 'Link', 'frappe' )
					),
					array(
						'type'        => 'dropdown',
						'name'        => 'target',
						'title'       => esc_html__( 'Target', 'frappe' ),
						'options'     => frappe_elated_get_link_target_array()
					),
				)
		    );
	}

	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}

		$instance['type']        = 'icon-left';
		$instance['icon_size']   = 'eltdf-icon-tiny';
		
		// Filter out all empty params
		$instance  = array_filter( $instance, function ( $array_options ) {
			return trim( $array_options ) != '';
		} );
		
		$params = '';

		//generate shortcode params
		foreach ( $instance as $key => $options ) {
			$params .= " $key='$options' ";
		}
		
		echo do_shortcode( "[eltdf_icon_with_text $params]" ); // XSS OK

	}
}