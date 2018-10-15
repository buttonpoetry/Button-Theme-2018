<?php
/*
Template Name: Front
*/
get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<div class="main-content-full-width">
<section class="showcase">
<p class="lead"><?php 
	if( get_theme_mod( 'bp_front_page_showcase_lead' ) ) 
	{
		echo get_theme_mod( 'bp_front_page_showcase_lead' );
	}
	else {
		_e( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' );
	} ?></p>
<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="row expanded">
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/EBE9DD?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">Book Title</h3><h4 class="author">Author Name</h4></a></div>
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/000/fff?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">Book Title</h3><h4 class="author">Author Name</h4></a></div>
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/17272E?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">Book Title</h3><h4 class="author">Author Name</h4></a></div>
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/E4DED1?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">A Love Song A Death Rattle A Battle Cry</h3><h4 class="author">Kyle "Guante" Tran Myhre</h4></a></div>
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/F1F0EF?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">Book Title</h3><h4 class="author">Author Name</h4></a></div>
			<div class="cell small-4 medium-2"><a href="#" class="showcase-book"><img src="https://via.placeholder.com/160x240/666/fff?text=Poems" title="Go to Book Title's product page" alt="Book Title by Author"><h3 class="title">Book Title</h3><h4 class="author">Author Name</h4></a></div>
		</div>
	</div>
</div>
<a class="button large" href="#">Shop all books</a>
</section>

<section class="feature-row orbit" role="region" aria-label="Button Poetry Featured Content" data-orbit>
	<div class="orbit-wrapper">
		<div class="orbit-controls hide">
		<button class="orbit-previous"><span class="show-for-sr">Previous Feature</span>&#9664;&#xFE0E;</button>
		<button class="orbit-next"><span class="show-for-sr">Next Feature</span>&#9654;&#xFE0E;</button>
		</div>
		<ul class="orbit-container">
			<li class="orbit-slide">
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
			<li class="orbit-slide">
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
	<div class="row collapse small-up-2 medium-up-4 large-up-5 wide">
	<div class="column"><img src="https://via.placeholder.com/350/000/ffffff?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/E0E7AD/000000?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/000/ffffff?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/CFB49A/000000?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/6D3E30/ffffff?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/973C2D/ffffff?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/747F99/000000?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/ddd/000000?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/000/ffffff?text=%20"></div>
	<div class="column"><img src="https://via.placeholder.com/350/DBCC3B/000000?text=%20"></div>
	</div>
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
