<?php

if ( ! function_exists( 'frappe_core_import_object' ) ) {
	function frappe_core_import_object() {
		$frappe_core_import_object = new FrappeCoreImport();
	}
	
	add_action( 'init', 'frappe_core_import_object' );
}

if ( ! function_exists( 'frappe_core_data_import' ) ) {
	function frappe_core_data_import() {
		$importObject = FrappeCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "frappe/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_frappe_core_data_import', 'frappe_core_data_import' );
}

if ( ! function_exists( 'frappe_core_widgets_import' ) ) {
	function frappe_core_widgets_import() {
		$importObject = FrappeCoreImport::getInstance();
		
		$folder = "frappe/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_frappe_core_widgets_import', 'frappe_core_widgets_import' );
}

if ( ! function_exists( 'frappe_core_options_import' ) ) {
	function frappe_core_options_import() {
		$importObject = FrappeCoreImport::getInstance();
		
		$folder = "frappe/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_frappe_core_options_import', 'frappe_core_options_import' );
}

if ( ! function_exists( 'frappe_core_other_import' ) ) {
	function frappe_core_other_import() {
		$importObject = FrappeCoreImport::getInstance();
		
		$folder = "frappe/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->eltdf_update_meta_fields_after_import($folder);
		$importObject->eltdf_update_options_after_import($folder);

		if ( frappe_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_frappe_core_other_import', 'frappe_core_other_import' );
}