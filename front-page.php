<?php
/*
Template Name: Front
*/
get_header(); ?>

<div class="main-container wide">
	<div class="main-grid">
		<div class="main-content-full-width">
<section class="showcase">
<p class="lead"><?php 
	echo get_theme_mod('front_page_showcase_lead', __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ));
?></p>
<div class="showcase-shelf grid-container">
	<div class="grid-x grid-margin-x">
		<div class="row expanded">
		<?php for($i = 0; $i < 6; $i++ ) { 
			$book_id = get_theme_mod('front_page_showcase_books_' . $i, '35546'); 
			$book_title = get_the_title( $book_id );
			if( metadata_exists( 'product', $book_id, 'linked-author' ) ) { 
				$book_author = get_post_meta( $book_id, 'linked-author', true); 
			} else $book_author = null;	?>
			<div class="cell small-4 medium-2">
				<a href="<?php echo get_permalink( $book_id ); ?>" class="showcase-book">
					<img src="<?php echo get_the_post_thumbnail_url($book_id); 
						?>" title="View <?php echo $book_title ?> in the Button Shop" alt="<?php 
						echo $book_title;
						if( $book_author ) echo " by " . $book_author;
						?>">
					<h2 class="title"><?php echo $book_title; ?></h2>
					<?php if( $book_author ) { ?> <p class="author"><?php echo $book_author; ?></p> <?php } ?>
				</a>
			</div> 
		<?php } ?>
		</div>
	</div>
</div>
<a class="button large" href="<?php echo get_permalink('88'); ?>">Shop all books</a>
</section>

<?php 
$feature_slides_query_args = array (
	'post_type' 	=> array( 'feature_slide' ),
	'post_status'	=> array( 'publish' ),
	'posts_per_page'=> 5,
	'order'			=> 'DESC',
	'order-by'		=> 'date-published'
);

$feature_slides = new WP_Query( $feature_slides_query_args );

if ( $feature_slides->have_posts() )
{ 
	$dummy_placed = false; ?>
<section class="feature-row" role="region" aria-label="Button Poetry Featured Content">
	<div class="slick-slider">
		<?php while ( $feature_slides->have_posts() ) : 
		$feature_slides->the_post(); 
		$f_quote =	feature_slide_options_get_meta( 'feature_slide_options_is_this_a_quote_' );		
		$f_lead = 		feature_slide_options_get_meta( 'feature_slide_options_lead_paragraph' );
		$f_author = 	feature_slide_options_get_meta( 'feature_slide_options_followup_paragraph' );
		$f_action_lbl = feature_slide_options_get_meta( 'feature_slide_options_call_to_action_label' );
		$f_action_url =	feature_slide_options_get_meta( 'feature_slide_options_call_to_action_url' );

		if( $f_quote == "Yes" ) {
			$f_lead_class = "lead quote";
			$f_follow_class = "feature-author";
		} else {
			$f_lead_class = "lead";
			$f_follow_class = "";
		}

		if ( has_post_thumbnail() ) {
			$f_img_src = get_the_post_thumbnail( the_ID(), 'full' );
		} else {
			$f_img_src = 'https://via.placeholder.com/800/74B6B8/EBE9DD?text=' . get_the_title();
		}

		if( ! $dummy_placed ) { 
			$dummy_placed = true; ?>
			<div class="dummy-slide">
				<div class="grid-x align-middle feature-slide">
					<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
						<a class="feature-link" href="<?php echo $f_action_url ?>"><img class="feature-hero" src="<?php echo $f_img_src ?>"></a>
					</div>
					<div class="cell medium-6 large-auto small-order-2 medium-order-1">
						<div class="feature-text">
							<h2 class="feature-section-title">Featured</h2>
							<p class="<?php echo $f_lead_class ?>"><?php echo $f_lead ?></p>
							<p class="<?php echo $f_follow_class ?>"><?php echo nl2br($f_author) ?></p>
							<div class="button-wrap"><a class="button" href="<?php echo $f_action_url ?>"><?php echo $f_action_lbl ?></a></div>
						</div>
					</div>
				</div>
			</div><?php
		}
		?>

		<div class="slick-slide">
			<div class="grid-x align-middle feature-slide">
				<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
					<a class="feature-link" href="<?php echo $f_action_url ?>"><img class="feature-hero" src="<?php echo $f_img_src ?>"></a>
				</div>
				<div class="cell medium-6 large-auto small-order-2 medium-order-1">
					<div class="feature-text">
						<h2 class="feature-section-title">Featured</h2>
						<p class="<?php echo $f_lead_class ?>"><?php echo $f_lead ?></p>
						<p class="<?php echo $f_follow_class ?>"><?php echo nl2br($f_author) ?></p>
						<div class="button-wrap"><a class="button" href="<?php echo $f_action_url ?>"><?php echo $f_action_lbl ?></a></div>
					</div>
				</div>
			</div>
		</div>			
		<?php endwhile; ?>
	</div>	
</section>
<?php } else { ?>
<!-- Sample Slider Data, create Feature Slides for a real slider -->
<section class="feature-row" role="region" aria-label="Button Poetry Featured Content">
<div class="dummy-slide">
	<div class="grid-x align-middle feature-slide">
		<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
			<a class="feature-link" href="#"><img class="feature-hero" src="https://via.placeholder.com/800/74B6B8/EBE9DD?text=Feature"></a>
		</div>
		<div class="cell medium-6 large-auto small-order-2 medium-order-1">
			<div class="feature-text">
				<h2 class="feature-section-title">Featured</h2>
				<p class="lead quote">I have kissed love on the lips & it did not fill me with anything other than smoke.</p>
				<p class="feature-author">Sabrina Benaim<br>Depression & Other Magic Tricks</p>
				<div class="button-wrap"><a class="button" href="#">Buy Now</a></div>
			</div>
		</div>
	</div>
</div>
<div class="slick-slider">
<div class="slick-slide">
		<div class="grid-x align-middle feature-slide">
			<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
				<a class="feature-link" href="#"><img class="feature-hero" src="https://via.placeholder.com/800/74B6B8/EBE9DD?text=Feature"></a>
			</div>
			<div class="cell medium-6 large-auto small-order-2 medium-order-1">
				<div class="feature-text">
					<h2 class="feature-section-title">Featured</h2>
					<p class="lead<?php ?>">I have kissed love on the lips & it did not fill me with anything other than smoke.</p>
					<p class="feature-author">Sabrina Benaim<br>Depression & Other Magic Tricks</p>
					<div class="button-wrap"><a class="button" href="#">Buy Now</a></div>
					<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ) ?>
				</div>
			</div>
		</div>
	</div>
	<div class="slick-slide">
		<div class="grid-x align-middle feature-slide">
			<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
				<a class="feature-link" href="#"><img class="feature-hero" src="https://via.placeholder.com/800/444668/EBE9DD?text=Feature 2"></a>
			</div>
			<div class="cell medium-6 large-auto small-order-2 medium-order-1">
				<div class="feature-text">
					<h2 class="feature-section-title">Featured</h2>
					<p class="lead">Rudy Francisco on The Tonight Show</p>
					<p>Congratulations to Button author Rudy Francisco on his phenomenal performance on The Tonight Show Starring Jimmy Fallon!</p>
					<div class="button-wrap"><a class="button" href="#">Get Rudy's Book Here</a></div>
				</div>
			</div>
		</div>
	</div>
</div>	
</section>
<!-- End Sample Slider Data -->
<?php } ?>

<section class="bulletin-row">
	<div class="grid-x">	
		<div class="cell medium-7 large-6 small-order-1 medium-order-2 latest-news">
			<h2>Latest News</h2>
			<p>We love seeing our poets getting the recognition they deserve. Follow us on <a href="#">Twitter</a> for more news about what goes on behind the scenes.</p>
			
			<?php 
				$bulletinFeed = new WP_Query( array ( 	'post_type' => 'post', 
														'category__not_in' => array( 1, 15, 1488 ), 
														'no_found_rows' => true, 
														'posts_per_page' => 5) );
				if ( $bulletinFeed->have_posts() ) {
					echo '<blockquote>';
					while ( $bulletinFeed->have_posts() ) {
						$bulletinFeed->the_post();
						echo '<div class="latest-news-headline"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
					}
					echo '</blockquote>';
				} else {
					// no posts found? Do nothing.
				}

				/* Restore original Post Data */
				wp_reset_postdata();
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

if ( !function_exists('bp_front_page_slider') ) {
	function bp_front_page_slider() {
		?><script type="text/javascript"> 
			$(".dummy-slide").remove();
			$(".slick-slider").slick( {
				arrows: false
			}); 
		</script><?php
	}
	add_action( 'wp_footer', 'bp_front_page_slider', 100 );
}

get_footer();
