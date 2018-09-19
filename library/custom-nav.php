<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose. 
 * Adds custom menu items to Topbar and Offcanvas menus for login meta and cart.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'wpt_register_theme_customizer' ) ) :
	function wpt_register_theme_customizer( $wp_customize ) {

		// Create custom panels
		$wp_customize->add_panel(
			'mobile_menu_settings', array(
				'priority'       => 1000,
				'theme_supports' => '',
				'title'          => __( 'Mobile Menu Settings', 'foundationpress' ),
				'description'    => __( 'Controls the mobile menu', 'foundationpress' ),
			)
		);

		// Create custom field for mobile navigation layout
		$wp_customize->add_section(
			'mobile_menu_layout', array(
				'title'    => __( 'Mobile navigation layout', 'foundationpress' ),
				'panel'    => 'mobile_menu_settings',
				'priority' => 1000,
			)
		);

		// Set default navigation layout
		$wp_customize->add_setting(
			'wpt_mobile_menu_layout',
			array(
				'default' => __( 'topbar', 'foundationpress' ),
			)
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mobile_menu_layout',
				array(
					'type'     => 'radio',
					'section'  => 'mobile_menu_layout',
					'settings' => 'wpt_mobile_menu_layout',
					'choices'  => array(
						'topbar'    => 'Topbar',
						'offcanvas' => 'Offcanvas',
					),
				)
			)
		);

	}

	add_action( 'customize_register', 'wpt_register_theme_customizer' );

	// Add class to body to help w/ CSS
	add_filter( 'body_class', 'mobile_nav_class' );
	function mobile_nav_class( $classes ) {
		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) :
			$classes[] = 'topbar';
		elseif ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) :
			$classes[] = 'offcanvas';
		endif;
		return $classes;
	}
endif;

function bp_main_menu_append ( $items, $args ) {
	if ($args->theme_location == 'top-bar-r' || $args->theme_location == 'mobile-nav') {
		if (is_user_logged_in()) {
			$items .= '<li><a href="'. wp_logout_url() .'" class="nav-unweighted">Log Out</a></li>';
		}
		elseif (!is_user_logged_in()) {
			$items .= '<li><a href="'. site_url('wp-login.php') .'" class="nav-unweighted">Poet Log In</a></li>';
		}
	}
	if ($args->theme_location == 'top-bar-r') {
		$items .= '<li><a href="#" class="nav-cart"><img src="'. get_stylesheet_directory_uri() . '/dist/assets/images/theme/cart.svg"></a></li>';
	}
    return $items;
}
add_filter( 'wp_nav_menu_items', 'bp_main_menu_append', 10, 2 );
