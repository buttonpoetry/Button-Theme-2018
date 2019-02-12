<?php
/**
 * Front Page template.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */
get_header(); ?>

<div class="main-container full-width">
	<div class="main-grid">
		<div class="main-content-full-width">

<?php 

if ( get_theme_mod('front_page_top_section', 'Showcase') == 'Showcase' ) {
	get_template_part('template-parts/front-page-showcase'); 
	get_template_part('template-parts/front-page-featured'); 
}
else {
	get_template_part('template-parts/front-page-featured'); 
	get_template_part('template-parts/front-page-showcase'); 	
}
?>

<?php get_template_part('template-parts/front-page-bulletin'); ?>

<?php get_template_part('template-parts/front-page-instagram'); ?>

</div></div></div>

<div id="y-badges" class="yotpo yotpo-badge badge-init">&nbsp;</div>

<?php
// Function to trigger the slick sliders on the front page.
if ( !function_exists('bp_front_page_slider') ) {

	add_action( 'wp_footer', 'bp_front_page_slider', 100 );
	function bp_front_page_slider() {
		?><script type="text/javascript"> 
			$(".dummy-slide").remove();
			
			$("#featured-slider").slick( {
				arrows: true,
				autoplay: true,
				autoplaySpeed: 6000,
				useTransform: false,
				responsive: [{
					breakpoint: 600,
					settings: {
						arrows: false
					}}]
			}); 

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

get_footer();
