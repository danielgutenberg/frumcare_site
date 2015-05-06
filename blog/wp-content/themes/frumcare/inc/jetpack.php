<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package frumcare
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function frumcare_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'frumcare_jetpack_setup' );
