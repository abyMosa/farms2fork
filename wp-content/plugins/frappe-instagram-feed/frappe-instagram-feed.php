<?php
/*
Plugin Name: Frappe Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Elated Themes
Version: 1.0
*/
define('FRAPPE_INSTAGRAM_FEED_VERSION', '1.0');
define('FRAPPE_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('FRAPPE_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));

include_once 'load.php';

if ( ! function_exists( 'frappe_instagram_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function frappe_instagram_theme_installed() {
		return defined( 'ELATED_ROOT' );
	}
}

if(!function_exists('frappe_instagram_feed_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function frappe_instagram_feed_text_domain() {
        load_plugin_textdomain('frappe-instagram-feed', false, FRAPPE_INSTAGRAM_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'frappe_instagram_feed_text_domain');
}