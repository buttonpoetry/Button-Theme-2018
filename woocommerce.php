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
	<div class="main-grid" style="margin-top:0;">
		<div class="main-content-full-width">
		<?php		
		get_template_part('template-parts/shop-page-featuredcat');
		get_template_part('template-parts/shop-page-bookcats');
		get_template_part('template-parts/shop-page-merchcat');
		?>
		</div>
	</div>
</div>
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
