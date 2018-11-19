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
			$book_id = get_theme_mod('front_page_showcase_books_' . $i, '35546'); ?>
			<div class="cell small-4 medium-2">
				<a href="<?php echo get_permalink( $book_id ); ?>" class="showcase-book">
					<img src="<?php echo get_the_post_thumbnail_url($book_id); ?>" title="Go to <?php get_the_title( $book_id ); ?>'s product page" alt="Book Title by Author">
					<h2 class="title"><?php echo get_the_title( $book_id ); ?></h2>
					<p class="author"><?php echo get_post_meta( $book_id, 'linked-author', true); ?></p>
				</a>
			</div> 
		<?php } ?>
		</div>
	</div>
</div>
<a class="button large" href="<?php echo get_permalink('88'); ?>">Shop all books</a>
</section>

<section class="feature-row orbit" role="region" aria-label="Button Poetry Featured Content" data-orbit data-options="animInFromLeft:bp-feature-slide-in-left; animInFromRight:bp-feature-slide-in-right; animOutToLeft:bp-feature-slide-out-left; animOutToRight:bp-feature-slide-out-right;">
	<div class="orbit-wrapper">
		<div class="orbit-controls">
		<button class="orbit-previous"><span class="show-for-sr">Previous Feature</span>&#9664;&#xFE0E;</button>
		<button class="orbit-next"><span class="show-for-sr">Next Feature</span>&#9654;&#xFE0E;</button>
		</div>
		<ul class="orbit-container" >
			<li class="orbit-slide" >
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
			</li>
			<li class="orbit-slide" >
				<div class="grid-x align-middle feature-slide">
					<div class="cell medium-6 large-shrink small-order-1 medium-order-2">
						<a class="feature-link" href="#"><img class="feature-hero" src="https://via.placeholder.com/800/444668/EBE9DD?text=Feature 2"></a>
					</div>
					<div class="cell medium-6 large-auto small-order-2 medium-order-1">
						<div class="feature-text">
							<h2 class="feature-section-title">Featured</h2>
							<p class="lead">Rudy Franscisco on The Tonight Show</p>
							<p>Congratulations to Button author Rudy Francisco on his phenomenal performance on The Tonight Show Starring Jimmy Fallon!</p>
							<div class="button-wrap"><a class="button" href="#">Get Rudy's Book Here</a></div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>

<section class="bulletin-row">
	<div class="grid-x">	
		<div class="cell medium-7 large-6 small-order-1 medium-order-2 latest-news">
			<h2>Latest News</h2>
			<p>We love seeing our poets getting the recognition they deserve. Follow us on <a href="#">Twitter</a> for more news about what goes on behind the scenes.</p>
			<blockquote>
				Congratulations to Denice Fohman on topping 3,000,000 views on their poem, "Dear Straight People"<br/><br />
				Best of Button: Diksha Bijlani & Neil Hilborn<br /><br />
				Best of Button: Kevin Kantor & Steven Willis<br /><br />
				Congratulations to Omar Holmon on topping 100,000 views on "Batman's superpower is white privilege."
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

<?php get_footer();
