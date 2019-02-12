<?php
/**
 * Front Page Bulletin template part.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */

$news_page_id = 71273; // The ID of the 'In the News' page.
$poetCat = 15; // Poet category ID
?>

<section class="bulletin-row">
	<div class="grid-x">	
		<div class="cell large-6 small-order-1 large-order-2 latest-news">
			<h2>Latest News</h2>
			<p>We love seeing our poets getting the recognition they deserve. See more articles and interviews at our <a href="/in-the-news/">In the News</a> section, and follow us on <a href="https://twitter.com/buttonpoetry">Twitter</a> for more news about what goes on behind the scenes.</p>
			<blockquote>
			<?php 
			
			if( metadata_exists( 'post', $news_page_id, 'front-page-excerpt' ) ) {
				echo get_metadata( 'post', $news_page_id, 'front-page-excerpt', true );
			}
			else {
				// If there is no excerpt for the News page, create a loop of recent blog posts.
				$bulletinFeed = new WP_Query( array ( 	'post_type' => 'post', 
														'category__not_in' => array( 1, 15, 1488 ), 
														'no_found_rows' => true, 
														'posts_per_page' => 4) );
				if ( $bulletinFeed->have_posts() ) {
					while ( $bulletinFeed->have_posts() ) {
						$bulletinFeed->the_post();
						echo '<div class="latest-news-headline"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
					}
									} else {
					// no posts found? Do nothing.
				}
				// Restore original post data.
				wp_reset_postdata();
			}
			?>				
			</blockquote>
			<a class="button secondary" href="/in-the-news/">More News</a>
		</div>
		<div class="cell large-6 small-order-2 large-order-1">
			<div class="meet-our-poets">
				<a href="/category/poets/">
				<?php 	
				// Loop through the newest three Poets for pictures.			
				$poetPics = new WP_Query( array ( 	'post_type' => 'post', 
													'category__in' => array($poetCat), 
													'no_found_rows' => true, 													
													'posts_per_page' => 3) );
				
				if ( $poetPics->have_posts() ) {
					while ( $poetPics->have_posts() ) {
						$poetPics->the_post();
						echo '<div class="meet-our-poet-pic" style="background-image: url(\'' . get_the_post_thumbnail_url() . '\');"></div>';
					}
				}
				// Restore original post data.
				wp_reset_postdata();
				?><span class="meet-our-poets-link-text">Meet our poets</span></a>
			</div>
		</div>
	</div>
</section>