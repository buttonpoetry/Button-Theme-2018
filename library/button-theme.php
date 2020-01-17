<?php
/**
 * Button Theme PHP functions
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

 /**
 * Function to display a list of products for Poets on archives and single pages.
 * Utilizes a new custom post meta field 'bp_carousel_product'.
 *
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_poet_carousel' ) ) {
	function bp_poet_carousel($poet_id, $archive = false) {
		$carousel_products = get_post_meta( $poet_id, 'bp_carousel_product', false );
		if ( $carousel_products )
		{
			$product_count = count( $carousel_products );
			if( $product_count > 1) {
				$titleSuffix = " in the Button Store";
				$archive ? $cardClass = 'poet-product-carousel-card cell small-12 large-6' : $cardClass = 'poet-product-carousel-card cell small-12 medium-6 large-4';
			}
			else {
				$titleSuffix = " in the Button Store";
				$archive ? $cardClass = 'poet-product-carousel-card cell small-12 large-6' : $cardClass = 'poet-product-carousel-card cell small-12 medium-6 medium-offset-3 large-4 large-offset-4';
			}
			global $woocommerce;
			$cart_url = wc_get_cart_url();
			?>
			<section class="poet-product-carousel grid-container full">
				<?php if( ! $archive ) { echo "<h2 class='poet-product-carousel-title'>" . get_the_title() . $titleSuffix . "</h2>"; }?>
				<div class="grid-x grid-margin-x grid-margin-y">
				<?php
				global $product;
				$initial_global_product = $product;
				if( $archive && $product_count > 2) { $product_count = 2; } // Prevent more than 2 products displaying on poets archive.
				foreach ( $carousel_products as $product_id) {
					$product = wc_get_product( $product_id );
					$product_link = get_the_permalink($product->get_id());
					$product_thumbnail_src = get_the_post_thumbnail_url( $product->get_id(), 'post-thumbnail' );
					$product_button_text = $product->add_to_cart_text();
					if($product_button_text === "Add to cart") {
						$product_button_text = __("Buy Now", "woocoomerce");
					}
					?>
						<div class="<?php echo $cardClass ?>">
							<div class="grid-x grid-margin-x">
								<div class="cell shrink">
									<a alt="" href="<?php echo $product_link ?>"><img src="<?php echo $product_thumbnail_src ?>"></a>
								</div>
								<div class="cell auto">
									<h3><?php echo $product->get_title(); ?></h3>
									<a href="<?php echo $product_link ?>"><?php echo $product_button_text; ?></a>
								</div>
							</div>
						</div>
					<?php
					$product_count--;
					if($product_count <= 0) break;
				}
				$product = $initial_global_product;
				?> </div>
			</section> <?php
		}
	}
}

/**
 * Function to return the appropriate mini cart image.
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
 * Function to return the site logo image.
 *
 * @since ButtonTheme 1.0.0
 */
if ( ! function_exists( 'bp_site_logo_src' ) ) {
	function bp_site_logo_src() {
		return get_stylesheet_directory_uri() . apply_filters('bp_site_logo_src', '/dist/assets/images/theme/button-site-logo.svg');
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
	add_filter( 'woocommerce_product_add_to_cart_text', 'bp_swap_select_options_text', 100 );
	function bp_swap_select_options_text( $text ) {
		global $product;
		if ( $product->is_type( 'variable' ) && strpos($text, 'Pre-Order Now') === false ) {
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

if ( ! function_exists( 'bp_wrap_preorder_message' ) ) {
	add_filter('wc_pre_orders_product_message', 'bp_wrap_preorder_message', 100);
	function bp_wrap_preorder_message($message) {
		return '<span class="bp-wc-preorder-message">' . $message . '</span>';
	}
}

 /**
 * Wrap YouTube video iframes and embeds with responsive div in the_content
 *
 * @since ButtonTheme 0.2.0
 */
if( ! function_exists( 'bp_responsive_wrap_iframes' ) ) {
	add_filter( 'the_content', 'bp_responsive_wrap_iframes' );
	function bp_responsive_wrap_iframes( $content ) {
		// Match any iframes or embeds
		$pattern = '/<iframe.*youtu.*<\/iframe>|<embed.*<\/embed>/';
		preg_match_all( $pattern, $content, $matches );
		foreach ( $matches[0] as $match ) {
			$wrappedframe = '<div class="responsive-embed widescreen">' . $match . '</div>';
			$content = str_replace($match, $wrappedframe, $content);
		}
		return $content;
	}
}

 /**
 * Dynamically remove inline formatting from legacy content
 *
 * @since ButtonTheme 0.2.0
 */
if( ! function_exists( 'bp_clean_legacy_content' ) ) {
	add_filter( 'the_content', 'bp_clean_legacy_content', 9);
	function bp_clean_legacy_content( $content ) {
		// If this isn't a post or isn't using Gutenberg , get outta here!
		if (get_post_type() != 'post' || has_blocks() ) return $content;

		// Remove header and other tags.
		$content = trim(strip_tags($content, '<br><p><div><span><em><strong><u><b><i><a><img><iframe><embed><blockquote>'));

		// Remove '&nbsp'.
		$content = str_replace("&nbsp;", "", $content);

		return $content;

	}
}

/**
 * Limit excerpt size.
 *
 * @since ButtonTheme 0.2.0
 */
if( ! function_exists( 'bp_limit_excerpt' ) ) {
	add_filter( 'excerpt_length', 'bp_limit_excerpt', 100 );
	function bp_limit_excerpt( $length ) {
		return 38;
	}
}

/**
 * Function to filter 'more' links to be inline, and adds them to excerpts.
 *
 * @since ButtonTheme 0.2.0
 */
if( ! function_exists( 'bp_generate_custom_content_more' ) ) {
	add_filter( 'the_content_more_link', 'bp_generate_custom_content_more', 100 );
	function bp_generate_custom_content_more( $more ) {
		return '... <a class="read-more content-read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('MORE', 'foundationpress') . '</a>';
	}
}

if( ! function_exists( 'bp_excerpt_more' ) ) {
	add_filter('excerpt_more', 'bp_excerpt_more');
	function bp_excerpt_more($more) {
		return '... <a class="read-more excerpt-read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('MORE', 'foundationpress') . '</a>';
	}
}

/**
 * Function to add Yotpo sliders to the product pages
 *
 * @since ButtonTheme 0.2.0
 */

if( ! function_exists( 'bp_add_yotpo_carousel' ) ) {
	add_filter( 'woocommerce_after_single_product_summary', 'bp_add_yotpo_carousel', 9);
	function bp_add_yotpo_carousel() {
		global $product;
		?><div
		class="yotpo yotpo-pictures-widget"
		data-gallery-id="5cc3433fe7a2dc45d0b8b9dd"
		data-product-id="<?php echo $product->get_id(); ?>">
   		</div><?php
	}
}

/**
 * Function to add Author Bios sliders to the product pages
 *
 * @since ButtonTheme 0.2.0
 */

if( ! function_exists( 'bp_add_linked_author_bio' ) ) {
	add_filter( 'the_content', 'bp_add_linked_author_bio', 5);
	function bp_add_linked_author_bio($the_content) {
		if ( is_single() && metadata_exists( 'post', get_the_ID(), 'bp_linked_author' )) {
			$bio_content = null;
			$poetCat = 15; // Poet category ID
			$author_name = get_post_meta( get_the_ID(), 'bp_linked_author', true);
			//$author_id = get_page_by_title($author_name);
			//if($author_id != null || get_the_category($author_id) != $poetCat ) {
			$poetPage = new WP_Query( array ( 'post_type' 	=> 'post',
											  'category__in'=> array( $poetCat ),
											  'title'		=> $author_name) );
			if ( $poetPage->have_posts() ) {
				while ( $poetPage->have_posts() ) {
					$poetPage->the_post();
					ob_start();
					?><h3>About <?php echo $author_name ?></h3><?php
					the_excerpt();
					$bio_content = ob_get_contents();
					ob_end_clean();
				}
				// Restore original post data.
				wp_reset_postdata();
			}
			return $the_content . $bio_content;
		}
		else return $the_content;
	}
}

/**
 * Function to conditionally show the Free Shipping offer on the Store page.
 *
 * @since ButtonTheme 1.2.0
 */

if(!function_exists('bp_shipping_banner')) {
	function bp_shipping_banner() {
	  $location = WC_Geolocation::geolocate_ip();
	  $country = $location['country'];
	  if($country == 'US') {
			$offer = "Free " . $country . " shipping over $35";
			$titlemsg = null;
	  }
	  else {
			$offer = "Free " . $country . " shipping over $50";
			$titlemsg = " Please note that bundle deals are not eligible for international free shipping.";
	  }
	  $html = '<div class="bp-free-shipping-banner" title="OMG FREE SHIPPING!' . $titlemsg. '">' . $offer . '</div>';
	  echo $html;
	}
}

/**
 * Adds AJAX functions to return the role of the current user, or 'Guest' for non-logged in users.
 * Implemented for use on the Indies and Instalinks page teplates to facilitate finer tracking.
 * Migrated from a Code Snippet.
 *
 * @since ButtonTheme 1.5.0
 */
if( is_admin() && !function_exists('bp_check_user_role') ) {
  function bp_check_user_role() {
  	if( is_user_logged_in() ) {
    	$user = wp_get_current_user();
    	$role = ( array ) $user->roles;
    	echo $role[0];
  	} else {
	    echo "guest";
  	}
    die();
  }

  add_action('wp_ajax_bp_check_user_role', 'bp_check_user_role');
  add_action('wp_ajax_nopriv_bp_check_user_role', 'bp_check_user_role');
}

/**
 * Hide Dashboard for Customers & Subscribers. Resolves a few security concerns.
 * Migrated from a Code Snippet.
 *
 * @since ButtonTheme 1.5.0
 */
if ( !function_exists('bp_disable_dashboard') ) {
  function bp_disable_dashboard() {
    if (!is_user_logged_in()) {
        return null;
    }
    if (current_user_can('customer') || current_user_can('subscriber')) {
        wp_redirect(home_url());
        exit;
    }
  }

	add_action('admin_init', 'bp_disable_dashboard');
}

/**
 * Show Currency Code on Cart & Checkout after totals
 * Snippet adapted from http://www.codemyownroad.com/add-currency-code-suffix-prices-woocommerce/
 * Migrated from a Code Snippet.
 *
 * @since ButtonTheme 1.5.0
 */
if ( !function_exists('bp_addPriceSuffix') ) {
  function bp_addPriceSuffix($format, $currency_pos) {
	switch ( $currency_pos ) {
		case 'left' :
			$currency = get_woocommerce_currency();
			$format = '%1$s%2$s&nbsp;' . $currency;
		break;
	}
	return $format;
  }
}

if ( !function_exists('bp_addPriceSuffixAction') ) {
  function bp_addPriceSuffixAction() {
	add_action('woocommerce_price_format', 'bp_addPriceSuffix', 1, 2);
  }

  add_action('woocommerce_cart_totals_before_order_total', 'bp_addPriceSuffixAction');
  add_action('woocommerce_review_order_before_order_total', 'bp_addPriceSuffixAction');
}

/**
 * Simulate Shop Thumbnail Borders
 * This code simulates borders without making 'extra thick' borders on legacy images which have rasterized borders directly on them.
 * Migrated from a Code Snippet.
 *
 * @since ButtonTheme 1.5.0
 */

if( !function_exists('bp_outline_shop_thumbs')) {
	add_filter('woocommerce_product_get_image', 'bp_outline_shop_thumbs', 10, 5);
	function bp_outline_shop_thumbs($imageHTML, $product) {
	  if ( is_product() || get_post_meta( $product->get_id(), 'bp_no_thumb_border', true ))
		return $imageHTML;
	  return "<div class='bp-wc-thumb-border'>" . $imageHTML . "</div>";
	}
}
