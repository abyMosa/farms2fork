<?php
namespace FrappeCore\CPT\Shortcodes\InteractiveImages;

use FrappeCore\Lib;

class InteractiveImages implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'eltdf_interactive_images';

        add_action( 'vc_before_init', array( $this, 'vcMap' ) );
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                      => esc_html__( 'Interactive Images', 'frappe-core' ),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__( 'by FRAPPE', 'frappe-core' ),
                    'icon'                      => 'icon-wpb-interactive-images extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'custom_class',
                            'heading'     => esc_html__( 'Custom CSS Class', 'frappe-core' ),
                            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image',
                            'heading'     => esc_html__( 'Main Image', 'frappe-core' ),
                            'description' => esc_html__( 'Select image from media library', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image_middle',
                            'heading'     => esc_html__( 'Middle Image', 'frappe-core' ),
                            'description' => esc_html__( 'Select image from media library', 'frappe-core' ),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'orientation',
                            'heading'    => esc_html__( 'Image Behavior', 'frappe-core' ),
                            'value'      => array(
                                esc_html__( 'Main Image Left', 'frappe-core' )    => 'midleft',
                                esc_html__( 'Main Image Right', 'frappe-core' ) => 'midright'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__( 'Title', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle',
                            'heading'    => esc_html__( 'Subtitle', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'title_image',
                            'heading'     => esc_html__( 'Title Image', 'frappe-core' ),
                            'description' => esc_html__( 'Select image from media library', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text',
                            'heading'    => esc_html__( 'Text Field', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_parallax_animation',
                            'heading'     => esc_html__( 'Enable Parallax Animation', 'frappe-core' ),
                            'value'       => array_flip( frappe_elated_get_yes_no_select_array( false, true ) ),
                            'description' => esc_html__( 'Enabling this option will trigger parallax scrolling effect for selected images.', 'frappe-core' ),
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'custom_link',
                            'heading'    => esc_html__( 'Custom Link', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'custom_link_target',
                            'heading'    => esc_html__( 'Custom Link Target', 'frappe-core' ),
                            'value'      => array_flip( frappe_elated_get_link_target_array()),
                            'dependency' => array( 'element' => 'custom_link', 'not_empty' => true )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_button',
                            'heading'     => esc_html__( 'Enable Button', 'frappe-core' ),
                            'value'       => array_flip( frappe_elated_get_yes_no_select_array( false, true ) ),
                            'save_always' => true,
                            'description' => esc_html__( 'If you set "yes" button will be shown below text area.', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'button_text',
                            'heading'     => esc_html__( 'Button Text', 'frappe-core' ),
                            'description' => esc_html__( 'Enter Button text here. Default is "Purchase".', 'frappe-core' ),
                            'dependency'  => array( 'element' => 'enable_button', 'value' => 'yes' )
                        ) 

                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args   = array(
            'custom_class'              => '',
            'image'                     => '',
            'image_middle'              => '',
            'image_bottom'              => '',
            'orientation'               => 'midleft',
            'title'                     => '',
            'subtitle'                  => '',
            'title_image'               => '',
            'image_position'            => '',
            'text'                      => '',
            'custom_link'               => '',
            'enable_parallax_animation' => 'yes',
            'custom_link_target'        => '_self',
            'enable_button'             => '',
            'button_text'               => 'purchase'
        );
        $params = shortcode_atts( $args, $atts );

        $params['holder_classes']  = $this->getHolderClasses( $params );
        $params['image']           = $this->getImage( $params['image'] );
        $params['image_middle']    = $this->getImage( $params['image_middle'] );
        $params['title_image']     = $this->getImage( $params['title_image'] );

        $params['this_object'] = $this;

        $html = frappe_core_get_shortcode_module_template_part( 'templates/interactive-images', 'interactive-images', '', $params );

        return $html;
    }

    private function getHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
        $holderClasses[] = ! empty( $params['orientation'] ) ? 'eltdf-interactive-images-' . esc_attr( $params['orientation'] ) : '';
        $holderClasses[] = $params['enable_parallax_animation'] === 'yes' ? 'eltdf-parallax-holder' : '';

        return implode( ' ', $holderClasses );
    }

    private function getImage( $image_src ) {
        $image = array();

        if ( ! empty( $image_src ) ) {
            $id = $image_src;

            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src( $id, 'full' );
            $image['url']      = $image_original[0];
            $image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
        }

        return $image;
    }

    public function getParallaxDataOne( $params ) {
        $parallaxDataOne = array();

        if ($params['enable_parallax_animation'] === 'yes') {
            $y_absolute = rand(-27, -75);
            $smoothness = 20; //1 is for linear, non-animated parallax

            $parallaxDataOne['data-parallax']= '{&quot;y&quot;: '.$y_absolute.', &quot;smoothness&quot;: '.$smoothness.'}';
        }

        return $parallaxDataOne;
    }
}