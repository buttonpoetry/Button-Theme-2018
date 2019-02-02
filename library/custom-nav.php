<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose. 
 * Adds custom menu items to Topbar and Offcanvas menus for login meta and cart.
 * 
 * Note: Button Theme removes this choice, favoring the offcanvas approach only.
 * 
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'mobile_nav_class' ) ) {
	
	// Add class to body to help w/ CSS
	add_filter( 'body_class', 'mobile_nav_class' );
	function mobile_nav_class( $classes ) {
		$classes[] = 'offcanvas';
		return $classes;
	}
}


/**
 * Allows users to add a Poet Login menu item to the main navigation from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
if ( ! function_exists( 'bp_register_theme_customizer_menu' ) ) {

	add_action( 'customize_register', 'bp_register_theme_customizer_menu' );
	function bp_register_theme_customizer_menu( $wp_customize ) {
		
		// Add a 'Poet Login' setting in the 'Menu's panel of the Customizer.		
		$wp_customize->add_setting(
			'main_menu_append_login',
			array(
				'default' => false,
			)
		);
		
		// Create custom section for the login setting		
		$wp_customize->add_section(
			'main_menu_append_login_section', array(
				'title'    => __( 'Login Custom Menu Item', 'foundationpress' ),
				'description' => __( 'Display Poet Login link in main navigation', 'foundationpress'),
				'panel'    => 'nav_menus',
				'priority' => 1000,
			)
		);		

		// Create the new control
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'main_menu_append_login_control',
				array(
					'section'  => 'main_menu_append_login_section',
					'label'	   => 'Display Poet Login link on main menu',
					'settings' => 'main_menu_append_login',
					'type'     => 'checkbox'
				)
			)
		);
	}
}