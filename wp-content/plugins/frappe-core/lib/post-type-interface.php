<?php

namespace FrappeCore\Lib;

/**
 * interface PostTypeInterface
 * @package FrappeCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}