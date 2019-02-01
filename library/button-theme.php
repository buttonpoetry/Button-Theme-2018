<?php
/**
 * Button Theme PHP functions
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

 /**
 * Function to display a list of products for Poets on archives and single pages.
 * Utilizes a new custom post meta field 'carousel-product'.
 * 
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_poet_carousel' ) ) {
	function bp_poet_carousel($poet_id, $archive = false) {
		$carousel_products = get_post_meta( $poet_id, 'carousel-product', false );		
		if ( $carousel_products )
		{
			if( count( $carousel_products ) > 1) {
				$titlePrefix = "Books from ";				
				$archive ? $cardClass = 'poet-product-carousel-card cell small-12 large-6' : $cardClass = 'poet-product-carousel-card cell small-12 medium-6 large-4';
			}
			else {
				$titlePrefix = "Written by ";
				$archive ? $cardClass = 'poet-product-carousel-card cell small-12 large-6' : $cardClass = 'poet-product-carousel-card cell small-12 medium-6 medium-offset-3 large-4 large-offset-4';
			}
			global $woocommerce;
			$cart_url = wc_get_cart_url();
			?> 
				<section class="poet-product-carousel grid-container">
				<?php if( ! $archive ) { echo "<h2 class='poet-product-carousel-title'>" . $titlePrefix . get_the_title() . "</h2>"; }?>
				<div class="grid-x grid-margin-x grid-margin-y">
			<?php 
		
			foreach ( $carousel_products as $product_id) {
				$product = wc_get_product( $product_id )
				?>
					<div class="<?php echo $cardClass ?>">
						<div class="grid-x grid-margin-x">
							<div class="cell shrink">
								<img src="<?php echo get_the_post_thumbnail_url( $product->get_id(), 'post-thumbnail' ); ?>">
							</div>
							<div class="cell auto">
								<h3><?php echo $product->get_title(); ?></h3>
								<a href="<?php echo get_the_permalink($product->get_id()) ?>">BUY NOW</a>
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
 * Function to return an empty cart class name or an empty string if the current cart is empty for displaying the correct mini cart icon.
 * 
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_mini_cart_src' ) ) {
	function bp_mini_cart_src() {
		if ( ! WC()->cart->get_cart_contents_count() ) { 
			return get_stylesheet_directory_uri() . apply_filters('bp_cart_src', '/dist/assets/images/theme/cart-icon-empty.svg');
		} 
		else return get_stylesheet_directory_uri() . apply_filters('bp_cart_src', '/dist/assets/images/theme/cart-icon-full.svg');
	}
}

/**
 * Function to filter out ebooks from onsale price badges.
 * 
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_no_ebooks_sales_flash' ) ) {
	
	add_filter( 'woocommerce_product_is_on_sale', 'bp_no_ebooks_sales_flash', 10, 2 );

	function bp_no_ebooks_sales_flash($on_sale, $product) {
		
		if ( $product->get_type() == 'variable' )
		{
			if ( in_array( 'E-Book', $product->get_variation_attributes() ) )
				print_r ( $product->get_variation_attributes() );
				return false;
		}		
		return $on_sale;
	}
}

 /**
 * Snippet to alter the 'Select Options' text
 * 
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_swap_select_options_text' ) )
{
	add_filter( 'woocommerce_product_add_to_cart_text', 'bp_swap_select_options_text', 10 );
	function bp_swap_select_options_text( $text ) {
		global $product;
		if ( $product->is_type( 'variable' ) ) {
			$text = $product->is_purchasable() ? __( 'Add to cart', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
		}
		return $text;
	}
}

 /**
 * Remove Result Count from WooCommerce archive and search pages
 * 
 * @since ButtonTheme 0.1.0
 */
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

 /**
 * Remove the description from the Category pages from WooCommerce.
 * 
 * @since ButtonTheme 0.2.0
 */
if ( ! function_exists( 'bp_remove_list_grid_description' ) )
{
	add_action('woocommerce_before_shop_loop', 'bp_remove_list_grid_description', 100);
	function bp_remove_list_grid_description()
	{
		global $WC_List_Grid;
		remove_action( 'woocommerce_after_subcategory', array( $WC_List_Grid, 'gridlist_cat_desc' ) );
	}
}

 /**
 * Always add a span tag to the pre-order message.
 * 
 * @since ButtonTheme 0.2.0
 */

if ( ! function_exists('bp_wrap_preorder_message') ) {
	add_filter('wc_pre_orders_product_message', 'bp_wrap_preorder_message', 100);
	function bp_wrap_preorder_message($message) 
	{ 
		return '<span class="bp-wc-preorder-message">' . $message . '</span>';
	}
}