<?php
namespace FrappeCore\CPT\Shortcodes\PricingTable;

use FrappeCore\Lib;

class PricingTableItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_table_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Pricing Table Item', 'frappe-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-pricing-table-item extended-custom-icon',
					'category'                  => esc_html__( 'by FRAPPE', 'frappe-core' ),
					'allowed_container_element' => 'vc_row',
					'as_child'                  => array( 'only' => 'eltdf_pricing_table' ),
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'frappe-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'frappe-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'content_background_image',
							'heading'    => esc_html__( 'Content Background Image', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'content_background_color',
							'heading'    => esc_html__( 'Content Background Color', 'frappe-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'frappe-core' ),
							'value'       => esc_html__( 'Basic Plan', 'frappe-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_border_color',
							'heading'    => esc_html__( 'Title Bottom Border Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'price',
							'heading'    => esc_html__( 'Price', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_color',
							'heading'    => esc_html__( 'Price Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'price', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'currency',
							'heading'     => esc_html__( 'Currency', 'frappe-core' ),
							'description' => esc_html__( 'Default mark is $', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'currency_color',
							'heading'    => esc_html__( 'Currency Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'currency', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'price_period',
							'heading'     => esc_html__( 'Price Period', 'frappe-core' ),
							'description' => esc_html__( 'Default label is monthly', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_period_color',
							'heading'    => esc_html__( 'Price Period Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'price_period', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__( 'Button Text', 'frappe-core' ),
							'value'       => esc_html__( 'BUY NOW', 'frappe-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Button Link', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea_html',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Content', 'frappe-core' ),
							'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'             => '',
			'content_background_image' => '',
			'content_background_color' => '',
			'title'                    => '',
			'title_color'              => '',
			'title_border_color'       => '',
			'price'                    => '100',
			'price_color'              => '',
			'currency'                 => '$',
			'currency_color'           => '',
			'price_period'             => 'monthly',
			'price_period_color'       => '',
			'button_text'              => '',
			'link'                     => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']              = preg_replace( '#^<\/p>|<p>$#', '', $content ); // delete p tag before and after content
		$params['holder_classes']       = $this->getHolderClasses( $params );
		$params['holder_styles']        = $this->getHolderStyles( $params );
		$params['title_styles']         = $this->getTitleStyles( $params );
		$params['price_styles']         = $this->getPriceStyles( $params );
		$params['currency_styles']      = $this->getCurrencyStyles( $params );
		$params['price_period_styles']  = $this->getPricePeriodStyles( $params );
		

		// var_dump($params['background_image_url']);
		
		$html = frappe_core_get_shortcode_module_template_part( 'templates/pricing-table-template', 'pricing-table', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['content_background_color'] ) ) {
			$itemStyle[] = 'background-color: ' . $params['content_background_color'];
		}

		$background_image_url = '';

		$background_image_url = wp_get_attachment_url( $params['content_background_image'] );

		if ( ! empty( $params['content_background_image'] ) ) {
			$itemStyle[] = 'background-image:url(' . $background_image_url .')';
			$itemStyle[] = 'background-position: center center';
			$itemStyle[] = 'background-repeat: no-repeat';
			$itemStyle[] = 'background-size: cover';
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getTitleStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_border_color'] ) ) {
			$itemStyle[] = 'border-color: ' . $params['title_border_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getPriceStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['price_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getCurrencyStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['currency_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['currency_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getPricePeriodStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['price_period_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_period_color'];
		}
		
		return implode( ';', $itemStyle );
	}
}