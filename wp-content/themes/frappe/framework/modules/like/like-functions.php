<?php

if ( ! function_exists( 'frappe_elated_like' ) ) {
	/**
	 * Returns FrappeElatedClassLike instance
	 *
	 * @return FrappeElatedClassLike
	 */
	function frappe_elated_like() {
		return FrappeElatedClassLike::get_instance();
	}
}

function frappe_elated_get_like() {
	
	echo wp_kses( frappe_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}