<?php
/**
 * Front Page template.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */
get_header(); ?>

<div class="main-container wide">
	<div class="main-grid">
		<div class="main-content-full-width">

<?php get_template_part('template-parts/front-page-showcase'); ?>

<?php get_template_part('template-parts/front-page-featured'); ?>

<section class="bulletin-row">
	<div class="grid-x">	
		<div class="cell medium-7 large-6 small-order-1 medium-order-2 latest-news">
			<h2>Latest News</h2>
			<p>We love seeing our poets getting the recognition they deserve. See more articles and interviews at our <a href="/in-the-news/">In the News</a> section, and follow us on <a href="https://twitter.com/buttonpoetry">Twitter</a> for more news about what goes on behind the scenes.</p>
			<blockquote>
			<?php 
			$news_page_id = 71273; // The ID of the 'In the News' page.
			if( metadata_exists( 'post', $news_page_id, 'front-page-excerpt' ) ) {
				echo get_metadata( 'post', $news_page_id, 'front-page-excerpt', true );
			}
			else {
				$bulletinFeed = new WP_Query( array ( 	'post_type' => 'post', 
														'category__not_in' => array( 1, 15, 1488 ), 
														'no_found_rows' => true, 
														'posts_per_page' => 5) );
				if ( $bulletinFeed->have_posts() ) {
					while ( $bulletinFeed->have_posts() ) {
						$bulletinFeed->the_post();
						echo '<div class="latest-news-headline"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
					}
									} else {
					// no posts found? Do nothing.
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			}
			?>				
			</blockquote>
			<a class="button secondary" href="#">More News</a>
		</div>
		<div class="cell medium-5 large-6 small-order-1 medium-order-1">
			<div class="meet-our-poets">
				<a href="#">Meet our poets</a>
			</div>
		</div>
	</div>
</section>

<section class="instagram-row">
	<h2>Instagram</h2>
	<div class="yotpo yotpo-pictures-widget"
		data-album-id="5b333b8dc3eb964c0b2acb79"
		data-layout="num_of_rows"
		data-layout-rows="2"
		data-spacing="0"
		data-title="0"
		data-hover-color="#ffffff"
		data-hover-opacity="0.8"
		data-hover-icon="true"
		data-cta-text="Shop Now"
		data-cta-color="#2f84ed"></div>
</section>
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
