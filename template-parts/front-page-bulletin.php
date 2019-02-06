<?php
/**
 * Front Page Bulletin template part.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
?>

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