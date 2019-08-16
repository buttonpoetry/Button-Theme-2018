<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 

if(is_shop()) {	?>
	<div class="main-container full-width">
		<?php bp_shipping_banner() ?>
		<div class="main-grid">
			<div class="main-content-full-width">
			<?php		
			get_template_part('template-parts/shop-page-featuredcat');
			do_action('bp_shop_after_featuredcat');
			get_template_part('template-parts/shop-page-bookcats');
			get_template_part('template-parts/shop-page-merchcat');				
			?>		
			</div>
		</div>
	</div>
	<?php get_template_part('template-parts/shop-page-products'); ?>
	
	<?php
	// Function to trigger the slick slider on the shop page.
	if ( !function_exists('bp_shop_page_slider') ) {

		add_action( 'wp_footer', 'bp_shop_page_slider', 100 );
		function bp_shop_page_slider() {
			?><script type="text/javascript"> 
				
				$("#showcase-slider").slick( {
					arrows: false,
					slidesToShow: 6,
					adaptiveHeight: true,
					responsive: [{
						breakpoint: 900,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
						}},
						{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							infinite: true,
						}
					}]
				});			
			</script><?php
		}	
	}
}
else {
?> 
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php
				//Append format attribute to loop product links on the Audiobooks and E-Books pages.
				if ( ! function_exists('bp_get_format_URL_att') && ( is_product_category('E-Books') || is_product_category('Audiobooks') ) ) { 
					function bp_get_format_URL_att() {
						$format_URL_att = "?attribute_format=";
						if( is_product_category('E-Books') ) { return $format_URL_att .= "E-book"; }
						else { return $format_URL_att .= "Audiobook"; }								
					};
									
					add_filter('woocommerce_loop_product_link', function( $title ) {
						return $title . bp_get_format_URL_att();
					}); 

					add_filter('woocommerce_loop_add_to_cart_link', function( $atc_html ) {
						$insert_pos = strpos( $atc_html, '" ');
						$new_atc_html = substr($atc_html, 0, $insert_pos) . bp_get_format_URL_att() . substr($atc_html, $insert_pos);
						return $new_atc_html;
					});						
				}
					
				//Add breadcrumbs.
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}				
				woocommerce_content(); ?>				
		</main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php }
get_footer();
