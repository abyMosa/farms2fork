<?php

if(!function_exists('frappe_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function frappe_elated_design_styles() {
	    $font_family = frappe_elated_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && frappe_elated_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo frappe_elated_dynamic_css( $font_family_selector, array( 'font-family' => frappe_elated_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = frappe_elated_options()->getOptionValue('first_color');
	    if ( ! empty( $first_main_color ) ) {
		    $color_selector = $color_important_selector = $background_color_selector = $background_color_important_selector = $border_color_selector = $border_color_important_selector = array();
		
		    // Include first main color selectors
		    include_once 'parts/first-main-color.php';
		
		    if ( frappe_elated_is_woocommerce_installed() ) {
			    $woo_color_selector = $woo_color_important_selector = $woo_background_color_selector = $woo_background_color_important_selector = $woo_border_color_selector = $woo_border_color_important_selector = array();
			
			    // Include first main color WooCommerce selectors
			    include_once 'parts/woocommerce-first-main-color.php';
			
			    if ( isset( $woo_color_selector ) && ! empty( $woo_color_selector ) ) {
				    $color_selector = array_merge( $color_selector, $woo_color_selector );
			    }
			
			    if ( isset( $woo_color_important_selector ) && ! empty( $woo_color_important_selector ) ) {
				    $color_important_selector = array_merge( $color_important_selector, $woo_color_important_selector );
			    }
			
			    if ( isset( $woo_background_color_selector ) && ! empty( $woo_background_color_selector ) ) {
				    $background_color_selector = array_merge( $background_color_selector, $woo_background_color_selector );
			    }
			
			    if ( isset( $woo_background_color_important_selector ) && ! empty( $woo_background_color_important_selector ) ) {
				    $background_color_important_selector = array_merge( $background_color_important_selector, $woo_background_color_important_selector );
			    }
			
			    if ( isset( $woo_border_color_selector ) && ! empty( $woo_border_color_selector ) ) {
				    $border_color_selector = array_merge( $border_color_selector, $woo_border_color_selector );
			    }
			
			    if ( isset( $woo_border_color_important_selector ) && ! empty( $woo_border_color_important_selector ) ) {
				    $border_color_important_selector = array_merge( $border_color_important_selector, $woo_border_color_important_selector );
			    }
		    }
		
		    if ( isset( $color_selector ) && ! empty( $color_selector ) ) {
			    echo frappe_elated_dynamic_css( $color_selector, array( 'color' => $first_main_color ) );
		    }
		
		    if ( isset( $color_important_selector ) && ! empty( $color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $color_important_selector, array( 'color' => $first_main_color . '!important' ) );
		    }
		
		    if ( isset( $background_color_selector ) && ! empty( $background_color_selector ) ) {
			    echo frappe_elated_dynamic_css( $background_color_selector, array( 'background-color' => $first_main_color ) );
		    }
		
		    if ( isset( $background_color_important_selector ) && ! empty( $background_color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $background_color_important_selector, array( 'background-color' => $first_main_color . '!important' ) );
		    }
		
		    if ( isset( $border_color_selector ) && ! empty( $border_color_selector ) ) {
			    echo frappe_elated_dynamic_css( $border_color_selector, array( 'border-color' => $first_main_color ) );
		    }
		
		    if ( isset( $border_color_important_selector ) && ! empty( $border_color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $border_color_important_selector, array( 'border-color' => $first_main_color . '!important' ) );
		    }
	    }
	
	    $second_main_color = frappe_elated_options()->getOptionValue('second_color');
	    if ( ! empty( $second_main_color ) ) {
		    $color_selector = $color_important_selector = $background_color_selector = $background_color_important_selector = $border_color_selector = $border_color_important_selector = array();
		
		    // Include second main color selectors
		    
		    $color_selector = array(
			    '.eltdf-search-widget-holder .eltdf-search-opener',
			    '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li a'
		    );
		    
		    $background_color_selector = array(
			    '#submit_comment:hover',
			    '.post-password-form input[type=submit]:hover',
			    'input.wpcf7-form-control.wpcf7-submit:hover',
			    '#eltdf-back-to-top>span.eltdf-btt-front',
			    '.eltdf-drop-down .second .inner ul li a .item_outer:before',
			    '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>a:before',
			    '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-active a',
			    '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-hover a',
			    '.eltdf-team-holder .eltdf-team-position.eltdf-standard-style'
		    );
		
		    $background_color_important_selector = array(
			    '.eltdf-btn.eltdf-btn-solid:not(.eltdf-btn-custom-hover-bg):hover'
		    );
		
		    $border_color_selector = array(
			    '#eltdf-back-to-top>span.eltdf-btt-front',
			    '.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li a'
		    );
		
		    $border_color_important_selector = array(
			    '.eltdf-btn.eltdf-btn-solid:not(.eltdf-btn-custom-border-hover):hover'
		    );
		
		    if ( frappe_elated_is_woocommerce_installed() ) {
			    $woo_color_selector = $woo_color_important_selector = $woo_background_color_selector = $woo_background_color_important_selector = $woo_border_color_selector = $woo_border_color_important_selector = array();
			
			    // Include second main color WooCommerce selectors
			    
			    $woo_color_selector = array(
				    '.eltdf-pl-holder .eltdf-pli .eltdf-pli-rating',
				    '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-rating',
				    '.eltdf-pls-holder .eltdf-pls-text .eltdf-pls-rating',
				    '.eltdf-product-info .eltdf-pi-rating',
				    '.eltdf-woo-single-page .eltdf-accordion-holder #reviews .comment-respond .stars a.active:after',
				    '.eltdf-woo-single-page .eltdf-accordion-holder #reviews .comment-respond .stars a:before',
				    '.woocommerce .star-rating',
				    '.eltdf-shopping-cart-holder .eltdf-header-cart'
			    );
			    
			    $woo_background_color_selector = array(
				    '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
				    '.woocommerce-page .eltdf-content a.added_to_cart:hover',
				    '.woocommerce-page .eltdf-content a.button:hover',
				    '.woocommerce-page .eltdf-content button[type=submit]:not(.eltdf-woo-search-widget-button):hover',
				    '.woocommerce-page .eltdf-content input[type=submit]:hover',
				    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
				    'div.woocommerce a.added_to_cart:hover',
				    'div.woocommerce a.button:hover',
				    'div.woocommerce button[type=submit]:not(.eltdf-woo-search-widget-button):hover',
				    'div.woocommerce input[type=submit]:hover',
				    '.woocommerce .eltdf-onsale',
				    'ul.products>.product .price del .woocommerce-Price-amount:after',
				    'ul.products>.product .added_to_cart',
				    'ul.products>.product .button',
				    '.eltdf-woo-single-page .eltdf-single-product-summary .price del .woocommerce-Price-amount:after',
				    '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart',
				    '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-image-outer .eltdf-plc-image .eltdf-plc-onsale',
				    '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-price del .woocommerce-Price-amount:after',
				    '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart:hover',
				    '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button:hover',
				    '.eltdf-pls-holder .eltdf-pls-text .eltdf-pls-price del .woocommerce-Price-amount:after',
				    '.eltdf-pl-holder .eltdf-pli .eltdf-pli-price del .woocommerce-Price-amount:after',
				    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-pli-onsale',
				    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
				    '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button'
			    );
			    
			    $woo_text_decoration_color = array(
			    	'.widget.woocommerce.widget_products ul li del',
				    '.widget.woocommerce.widget_products ul li ins',
				    '.widget.woocommerce.widget_recent_reviews ul li del',
				    '.widget.woocommerce.widget_recent_reviews ul li ins',
				    '.widget.woocommerce.widget_recently_viewed_products ul li del',
				    '.widget.woocommerce.widget_recently_viewed_products ul li ins',
				    '.widget.woocommerce.widget_top_rated_products ul li del',
				    '.widget.woocommerce.widget_top_rated_products ul li ins'
			    );
			
			    if ( isset( $woo_color_selector ) && ! empty( $woo_color_selector ) ) {
				    $color_selector = array_merge( $color_selector, $woo_color_selector );
			    }
			
			    if ( isset( $woo_color_important_selector ) && ! empty( $woo_color_important_selector ) ) {
				    $color_important_selector = array_merge( $color_important_selector, $woo_color_important_selector );
			    }
			
			    if ( isset( $woo_background_color_selector ) && ! empty( $woo_background_color_selector ) ) {
				    $background_color_selector = array_merge( $background_color_selector, $woo_background_color_selector );
			    }
			
			    if ( isset( $woo_background_color_important_selector ) && ! empty( $woo_background_color_important_selector ) ) {
				    $background_color_important_selector = array_merge( $background_color_important_selector, $woo_background_color_important_selector );
			    }
			
			    if ( isset( $woo_border_color_selector ) && ! empty( $woo_border_color_selector ) ) {
				    $border_color_selector = array_merge( $border_color_selector, $woo_border_color_selector );
			    }
			
			    if ( isset( $woo_border_color_important_selector ) && ! empty( $woo_border_color_important_selector ) ) {
				    $border_color_important_selector = array_merge( $border_color_important_selector, $woo_border_color_important_selector );
			    }
			
			    if ( isset( $woo_text_decoration_color ) && ! empty( $woo_text_decoration_color ) ) {
				    echo frappe_elated_dynamic_css( $woo_text_decoration_color, array( 'text-decoration-color' => $second_main_color ) );
			    }
		    }
		
		    if ( isset( $color_selector ) && ! empty( $color_selector ) ) {
			    echo frappe_elated_dynamic_css( $color_selector, array( 'color' => $second_main_color ) );
		    }
		
		    if ( isset( $color_important_selector ) && ! empty( $color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $color_important_selector, array( 'color' => $second_main_color . '!important' ) );
		    }
		
		    if ( isset( $background_color_selector ) && ! empty( $background_color_selector ) ) {
			    echo frappe_elated_dynamic_css( $background_color_selector, array( 'background-color' => $second_main_color ) );
		    }
		
		    if ( isset( $background_color_important_selector ) && ! empty( $background_color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $background_color_important_selector, array( 'background-color' => $second_main_color . '!important' ) );
		    }
		
		    if ( isset( $border_color_selector ) && ! empty( $border_color_selector ) ) {
			    echo frappe_elated_dynamic_css( $border_color_selector, array( 'border-color' => $second_main_color ) );
		    }
		
		    if ( isset( $border_color_important_selector ) && ! empty( $border_color_important_selector ) ) {
			    echo frappe_elated_dynamic_css( $border_color_important_selector, array( 'border-color' => $second_main_color . '!important' ) );
		    }
	    }
	
	    $page_background_color = frappe_elated_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.eltdf-content'
		    );
		    echo frappe_elated_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = frappe_elated_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo frappe_elated_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo frappe_elated_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( frappe_elated_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . frappe_elated_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo frappe_elated_dynamic_css( '.eltdf-preload-background', $preload_background_styles );
    }

    add_action('frappe_elated_action_style_dynamic', 'frappe_elated_design_styles');
}

if ( ! function_exists( 'frappe_elated_content_styles' ) ) {
	function frappe_elated_content_styles() {
		$content_style = array();
		
		$padding = frappe_elated_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
		);
		
		echo frappe_elated_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = frappe_elated_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
		);
		
		echo frappe_elated_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_content_styles' );
}

if ( ! function_exists( 'frappe_elated_h1_styles' ) ) {
	function frappe_elated_h1_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h1_styles' );
}

if ( ! function_exists( 'frappe_elated_h2_styles' ) ) {
	function frappe_elated_h2_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h2_styles' );
}

if ( ! function_exists( 'frappe_elated_h3_styles' ) ) {
	function frappe_elated_h3_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h3_styles' );
}

if ( ! function_exists( 'frappe_elated_h4_styles' ) ) {
	function frappe_elated_h4_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h4_styles' );
}

if ( ! function_exists( 'frappe_elated_h5_styles' ) ) {
	function frappe_elated_h5_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h5_styles' );
}

if ( ! function_exists( 'frappe_elated_h6_styles' ) ) {
	function frappe_elated_h6_styles() {
		$margin_top    = frappe_elated_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = frappe_elated_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = frappe_elated_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = frappe_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = frappe_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_h6_styles' );
}

if ( ! function_exists( 'frappe_elated_text_styles' ) ) {
	function frappe_elated_text_styles() {
		$item_styles = frappe_elated_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_text_styles' );
}

if ( ! function_exists( 'frappe_elated_link_styles' ) ) {
	function frappe_elated_link_styles() {
		$link_styles      = array();
		$link_color       = frappe_elated_options()->getOptionValue( 'link_color' );
		$link_font_style  = frappe_elated_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = frappe_elated_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = frappe_elated_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo frappe_elated_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_link_styles' );
}

if ( ! function_exists( 'frappe_elated_link_hover_styles' ) ) {
	function frappe_elated_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = frappe_elated_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = frappe_elated_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo frappe_elated_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo frappe_elated_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_link_hover_styles' );
}

if ( ! function_exists( 'frappe_elated_smooth_page_transition_styles' ) ) {
	function frappe_elated_smooth_page_transition_styles( $style ) {
		$id            = frappe_elated_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = frappe_elated_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.eltdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= frappe_elated_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = frappe_elated_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.eltdf-st-loader .eltdf-rotate-circles > div',
			'.eltdf-st-loader .pulse',
			'.eltdf-st-loader .double_pulse .double-bounce1',
			'.eltdf-st-loader .double_pulse .double-bounce2',
			'.eltdf-st-loader .cube',
			'.eltdf-st-loader .rotating_cubes .cube1',
			'.eltdf-st-loader .rotating_cubes .cube2',
			'.eltdf-st-loader .stripes > div',
			'.eltdf-st-loader .wave > div',
			'.eltdf-st-loader .two_rotating_circles .dot1',
			'.eltdf-st-loader .two_rotating_circles .dot2',
			'.eltdf-st-loader .five_rotating_circles .container1 > div',
			'.eltdf-st-loader .five_rotating_circles .container2 > div',
			'.eltdf-st-loader .five_rotating_circles .container3 > div',
			'.eltdf-st-loader .atom .ball-1:before',
			'.eltdf-st-loader .atom .ball-2:before',
			'.eltdf-st-loader .atom .ball-3:before',
			'.eltdf-st-loader .atom .ball-4:before',
			'.eltdf-st-loader .clock .ball:before',
			'.eltdf-st-loader .mitosis .ball',
			'.eltdf-st-loader .lines .line1',
			'.eltdf-st-loader .lines .line2',
			'.eltdf-st-loader .lines .line3',
			'.eltdf-st-loader .lines .line4',
			'.eltdf-st-loader .fussion .ball',
			'.eltdf-st-loader .fussion .ball-1',
			'.eltdf-st-loader .fussion .ball-2',
			'.eltdf-st-loader .fussion .ball-3',
			'.eltdf-st-loader .fussion .ball-4',
			'.eltdf-st-loader .wave_circles .ball',
			'.eltdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= frappe_elated_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'frappe_elated_filter_add_page_custom_style', 'frappe_elated_smooth_page_transition_styles' );
}