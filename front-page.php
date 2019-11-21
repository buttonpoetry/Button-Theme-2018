<?php
/**
 * Front Page template.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */
get_header(); 

if ( get_theme_mod('front_page_top_section', 'Showcase') == 'Showcase' ) {
	$showcase_on_top = true;
} else {
	$showcase_on_top = false;
}
?>

<div class="main-container full-width">
	<div class="main-grid"<?php if(!$showcase_on_top) { echo ' style="margin-top: 0;"'; } ?>>
		<div class="main-content-full-width">

<?php 
do_action('bp_front_before_content');
if ( $showcase_on_top ) {
	get_template_part('template-parts/front-page-showcase');
	do_action('bp_front_after_section_one');
	get_template_part('template-parts/front-page-featured');
}
else {
	get_template_part('template-parts/front-page-featured');
	do_action('bp_front_after_section_one');
	get_template_part('template-parts/front-page-showcase');	
}

do_action('bp_front_after_section_two');
get_template_part('template-parts/front-page-bulletin'); 

do_action('bp_front_after_section_three');
get_template_part('template-parts/front-page-instagram'); 

do_action('bp_front_after_content'); ?>
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
				dots: true,
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
				arrows: true,
				dots: true,
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
