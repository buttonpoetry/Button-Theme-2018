<?php
/**
 * Button Theme PHP functions
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'bp_poet_carousel' ) ) {
	function bp_poet_carousel($poet_id) {
		$carousel_products = get_post_meta( $poet_id, 'carousel-product', false );

		if ( $carousel_products )
		{
			global $woocommerce;
			$cart_url = wc_get_cart_url();
			?> 
				<section class="poet-product-carousel grid-container"> 
				<div class="grid-x">
			<?php 
			foreach ( $carousel_products as $product_id) {
				$product = wc_get_product( $product_id )
				?>
					<div class="poet-product-carousel-card cell small-12 medium-6 large-4">
						<div class="grid-x">
							<div class="cell small-4">
								<img src="<?php echo get_the_post_thumbnail_url( $product->get_id(), 'post-thumbnail' ); ?>">
							</div>
							<div class="cell small-offset-1 small-7">
								<h3><?php echo $product->get_title(); ?></h3>
								<a href="<?php $cart_url . '?add-to-cart=' . $product->get_id(); ?>">BUY NOW</a>
							</div>
						</div>
					</div>
				<?php
			} 
			?> </div></section> <?php 
		}
	}
}

/**
 * Function to return an empty cart class name or an empty string if the current cart is empty.
 * 
 * @since Button-Theme 0.1.0
 */
if ( ! function_exists( 'bp_mini_cart_src' ) ) {
	function bp_mini_cart_src() {
		if ( ! WC()->cart->get_cart_contents_count() ) { 
			return get_stylesheet_directory_uri() . '/dist/assets/images/theme/cart-icon-empty.svg';
		} 
		else return get_stylesheet_directory_uri() . '/dist/assets/images/theme/cart-icon-full.svg';
	}
}

// Remove Result Count from WooCommerce archive and search pages
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

/**
 * Function to filter out ebooks from onsale price badges.
 * 
 * @since Button-Theme 0.1.0
 */

if ( ! function_exists( 'bp_no_ebooks_sales_flash' ) ) {
	function bp_no_ebooks_sales_flash($on_sale, $product) {
		
		if ( $product->get_type() == 'variable' )
		{
			if ( in_array( 'E-Book', $product->get_variation_attributes() ) )
				print_r ( $product->get_variation_attributes() );
				return false;
		}		
		return $on_sale;
	}
	add_filter( 'woocommerce_product_is_on_sale', 'bp_no_ebooks_sales_flash', 10, 2 );
}