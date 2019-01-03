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
 * @since Button-Theme-2018 0.1.0
 */
if ( ! function_exists( 'bp_empty_cart_class' ) ) {
	function bp_empty_cart_class() {
		if ( ! WC()->cart->get_cart_contents_count() ) { 
			return " cart-icon-empty";
		} 
		else return '';
	}
}