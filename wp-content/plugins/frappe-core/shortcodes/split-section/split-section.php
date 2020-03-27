<?php
namespace FrappeCore\CPT\Shortcodes\SplitSection;

use FrappeCore\Lib;

class SplitSection implements Lib\ShortcodeInterface {
    private $base;
	
    public function __construct() {
        $this->base = 'eltdf_split_section';

        add_action('vc_before_init', array($this, 'vcMap'));
    }
	
    public function getBase() {
        return $this->base;
    }
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Split Section', 'frappe-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by FRAPPE', 'frappe-core' ),
					'icon'     => 'icon-wpb-split-section extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'attach_image',
							'param_name' => 'image',
							'heading'    => esc_html__( 'Image', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_position',
							'heading'     => esc_html__( 'Image Position', 'frappe-core' ),
							'value'       => array(
								esc_html__( 'Left', 'frappe-core' )  => 'left',
								esc_html__( 'Right', 'frappe-core' ) => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'content_background',
							'heading'    => esc_html__( 'Content Background Color', 'frappe-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'frappe-core' ),
							'value'       => array_flip( frappe_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_tag',
							'heading'     => esc_html__( 'Text Tag', 'frappe-core' ),
							'value'       => array_flip( frappe_elated_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px or %)', 'frappe-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_text',
							'heading'    => esc_html__( 'Button Text', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_type',
							'heading'     => esc_html__( 'Button Type', 'frappe-core' ),
							'value'       => array(
								esc_html__( 'Solid', 'frappe-core' )   => 'solid',
								esc_html__( 'Outline', 'frappe-core' ) => 'outline',
								esc_html__( 'Text', 'frappe-core' )    => 'simple'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'       => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_size',
							'heading'     => esc_html__( 'Button Size', 'frappe-core' ),
							'value'       => array(
								esc_html__( 'Default', 'frappe-core' ) => '',
								esc_html__( 'Small', 'frappe-core' )   => 'small',
								esc_html__( 'Medium', 'frappe-core' )  => 'medium',
								esc_html__( 'Large', 'frappe-core' )   => 'large',
								esc_html__( 'Huge', 'frappe-core' )    => 'huge'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'       => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_link',
							'heading'    => esc_html__( 'Button Link', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_target',
							'heading'    => esc_html__( 'Button Link Target', 'frappe-core' ),
							'value'      => array_flip( frappe_elated_get_link_target_array() ),
							'dependency' => array( 'element' => 'button_link', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_color',
							'heading'    => esc_html__( 'Button Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_hover_color',
							'heading'    => esc_html__( 'Button Hover Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' ),
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_background_color',
							'heading'    => esc_html__( 'Button Background Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_type', 'value' => array( 'solid' ) ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' ),
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_hover_background_color',
							'heading'    => esc_html__( 'Button Hover Background Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_type', 'value' => array( 'solid' ) ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_border_color',
							'heading'    => esc_html__( 'Button Border Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_hover_border_color',
							'heading'    => esc_html__( 'Button Hover Border Color', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_top_margin',
							'heading'    => esc_html__( 'Button Top Margin (px or %)', 'frappe-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true ),
							'group'      => esc_html__( 'Button Style', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'breakpoint',
							'heading'     => esc_html__( 'Responsive Breakpoint', 'frappe-core' ),
							'value'       => array(
								esc_html__( 'Never', 'frappe-core' )        => '',
								esc_html__( 'Below 1366px', 'frappe-core' ) => '1366',
								esc_html__( 'Below 1024px', 'frappe-core' ) => '1024',
								esc_html__( 'Below 768px', 'frappe-core' )  => '768',
								esc_html__( 'Below 680px', 'frappe-core' )  => '680',
								esc_html__( 'Below 480px', 'frappe-core' )  => '480'
							),
							'description' => esc_html__( 'Choose on which stage you want to break image and text content to be one under other', 'frappe-core' ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'image'                         => '',
			'image_position'                => 'left',
			'content_background'            => '',
			'title'                         => '',
			'title_tag'                     => 'h2',
			'title_color'                   => '',
			'text'                          => '',
			'text_tag'                      => 'h5',
			'text_color'                    => '',
			'text_top_margin'               => '',
			'button_text'                   => '',
			'button_type'                   => 'outline',
			'button_size'                   => 'normal',
			'button_link'                   => '',
			'button_target'                 => '_self',
			'button_color'                  => '',
			'button_hover_color'            => '',
			'button_background_color'       => '',
			'button_hover_background_color' => '',
			'button_border_color'           => '',
			'button_hover_border_color'     => '',
			'button_top_margin'             => '',
			'breakpoint'                    => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content_style']  = $this->getContentStyles( $params );
		$params['image_styles']   = $this->getImageBackgroundStyles( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['text_tag']       = ! empty( $params['text_tag'] ) ? $params['text_tag'] : $default_atts['text_tag'];
		$params['text_styles']    = $this->getTextStyles( $params );
		
		$html = frappe_core_get_shortcode_module_template_part( 'templates/split-section', 'split-section', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'eltdf-ss-image-' . $params['image_position'];
		$holderClasses[] = ! empty( $params['breakpoint'] ) ? 'eltdf-ss-break-' . $params['breakpoint'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getImageBackgroundStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['image'] ) ) {
			$image_src = wp_get_attachment_image_src( $params['image'], 'full' );
			
			if ( is_array( $image_src ) ) {
				$image_src = $image_src[0];
			}
			
			$styles[] = 'background-image: url(' . $image_src . ')';
		}
		
		return implode( ';', $styles );
	}
	
	private function getContentStyles($params) {
		$styles   = array();

		if(!empty($params['content_background'])) {
			$styles[] = 'background-color:'. $params['content_background'];
		}

		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ( $params['text_top_margin'] !== '' ) {
			if ( frappe_elated_string_ends_with( $params['text_top_margin'], '%' ) || frappe_elated_string_ends_with( $params['text_top_margin'], 'px' ) ) {
				$styles[] = 'margin-top: ' . $params['width'];
			} else {
				$styles[] = 'margin-top: ' . $params['text_top_margin'] . 'px';
			}
		}

		return implode( ';', $styles );
	}
}