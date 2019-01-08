<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose. 
 * Adds custom menu items to Topbar and Offcanvas menus for login meta and cart.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'mobile_nav_class' ) ) {
	// Add class to body to help w/ CSS
	function mobile_nav_class( $classes ) {
		$classes[] = 'offcanvas';
		return $classes;
	}
	add_filter( 'body_class', 'mobile_nav_class' );
}