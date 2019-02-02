<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'top-bar-r'  => esc_html__( 'Right Top Bar', 'foundationpress' ),
		'mobile-nav' => esc_html__( 'Mobile', 'foundationpress' ),
		'instalinks' => esc_html__( 'Instalinks', 'foundationpress'),
	)
);


/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_r' ) ) {
	function foundationpress_top_bar_r() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu data-position="bottom" data-alignment="left" data-hover-delay="50">%3$s</ul>',
				'theme_location' => 'top-bar-r',
				'depth'          => 3,
				'fallback_cb'    => false,
				'link_before'    => '<span class="nav-link-text">',
				'link_after'     => '</span>',
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			)
		);
	}
}

/**
 * Mobile navigation - topbar 
 */
if ( ! function_exists( 'foundationpress_mobile_nav' ) ) {
	function foundationpress_mobile_nav() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'mobile-nav', 'foundationpress' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Mobile_Walker(),
			)
		);
	}
}

/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {

	add_filter( 'wp_nav_menu', 'foundationpress_add_menuclass' );
	function foundationpress_add_menuclass( $ulclass ) {
		$find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
		$replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

		return preg_replace( $find, $replace, $ulclass, 1 );
	}
}

// Add login and cart items to main navigation.
if ( ! function_exists( 'bp_main_menu_append' ) ) {

	add_filter( 'wp_nav_menu_items', 'bp_main_menu_append', 10, 2 );
	function bp_main_menu_append ( $items, $args ) {
		if ( get_theme_mod( 'main_menu_append_login' ) == true ) {			
			if ($args->theme_location == 'top-bar-r' || $args->theme_location == 'mobile-nav') {
				if (is_user_logged_in()) {
					$items .= '<li><a href="'. wp_logout_url() .'" class="nav-unweighted"><span class="nav-link-text">Log Out</span></a></li>';
				}
				elseif (!is_user_logged_in()) {
					$items .= '<li><a href="'. site_url('wp-login.php') .'" class="nav-unweighted"><span class="nav-link-text">Poet Login</span></a></li>';
				}
			}
		}
		if ($args->theme_location == 'top-bar-r') {
			ob_start();
			get_template_part('template-parts/bp-mini-cart');
			$bp_mini_cart = ob_get_contents();
			ob_end_clean();
			$items .= '<li><a href="' . wc_get_cart_url() . '" class="nav-cart" data-toggle="bp-mini-cart"><img class="desktop-cart-img" src="'. bp_mini_cart_src() . '"></a>' . $bp_mini_cart . '</li>';					
		}
	    return $items;
	}
}

/**
 * Show cart contents / total Ajax
 * Adapted from https://docs.woocommerce.com/document/show-cart-contents-total/ 
 */

if ( ! function_exists('bp_woocommerce_header_add_to_cart_fragment') ) {

	add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
	function bp_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		?>
		<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		<?php
		$fragments['a.cart-customlocation'] = ob_get_clean();
		return $fragments;
	}
}