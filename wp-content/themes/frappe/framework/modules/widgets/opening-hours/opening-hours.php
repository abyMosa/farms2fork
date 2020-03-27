<?php

class FrappeElatedClassOpeningHoursWidget extends FrappeElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_opening_hours_widget',
			esc_html__( 'Frappe Opening Hours Widget', 'frappe' ),
			array( 'description' => esc_html__( 'Add a opening hours element to your widget areas', 'frappe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
            array(
                'type'        => 'textfield',
                'name'  => 'day',
                'title'     => esc_html__('Day of the Week', 'frappe'),
                'description' => esc_html__('eg: Monday ', 'frappe'),
            ),
            array(
                'type'       => 'textfield',
                'name' => 'day_color',
                'title'    => esc_html__('Day Label Color', 'frappe'),
                'save_always' => true,
            ),
            array(
                'type'        => 'textfield',
                'name'  => 'hours',
                'title'     => esc_html__('Hours', 'frappe'),
                'description' => esc_html__('eg: 9:00 - 22:00 ', 'frappe'),
            ),
            array(
                'type'       => 'textfield',
                'name' => 'hours_color',
                'title'    => esc_html__('Hours Label Color', 'frappe'),
                'save_always' => true,
            ),
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
		
		echo '<div class="widget eltdf-opening-hours-widget">';
			echo do_shortcode( "[eltdf_opening_hours $params]" ); // XSS OK
		echo '</div>';
	}
}