<?php

class FrappeElatedClassSeparatorWidget extends FrappeElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_separator_widget',
			esc_html__( 'Frappe Separator Widget', 'frappe' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'frappe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'frappe' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'frappe' ),
					'full-width' => esc_html__( 'Full Width', 'frappe' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'frappe' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'frappe' ),
					'left'   => esc_html__( 'Left', 'frappe' ),
					'right'  => esc_html__( 'Right', 'frappe' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'frappe' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'frappe' ),
					'dashed' => esc_html__( 'Dashed', 'frappe' ),
					'dotted' => esc_html__( 'Dotted', 'frappe' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'frappe' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'frappe' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'frappe' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'frappe' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'frappe' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltdf-separator-widget">';
			echo do_shortcode( "[eltdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}