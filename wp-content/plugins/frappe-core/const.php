<?php

define( 'FRAPPE_CORE_VERSION', '1.3' );
define( 'FRAPPE_CORE_ABS_PATH', dirname( __FILE__ ) );
define( 'FRAPPE_CORE_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'FRAPPE_CORE_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'FRAPPE_CORE_ASSETS_PATH', FRAPPE_CORE_ABS_PATH . '/assets' );
define( 'FRAPPE_CORE_ASSETS_URL_PATH', FRAPPE_CORE_URL_PATH . 'assets' );
define( 'FRAPPE_CORE_CPT_PATH', FRAPPE_CORE_ABS_PATH . '/post-types' );
define( 'FRAPPE_CORE_CPT_URL_PATH', FRAPPE_CORE_URL_PATH . 'post-types' );
define( 'FRAPPE_CORE_SHORTCODES_PATH', FRAPPE_CORE_ABS_PATH . '/shortcodes' );
define( 'FRAPPE_CORE_SHORTCODES_URL_PATH', FRAPPE_CORE_URL_PATH . 'shortcodes' );