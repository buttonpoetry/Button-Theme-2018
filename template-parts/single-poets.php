<?php
/**
 * The template for displaying Poet pages.
 *
 * @package Button-Theme
 * @since Button-Theme 0.1.0
 */
 ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="poet-bio-wrapper">
	<div class="main-container wide">
		<div class="main-grid">
			<main class="main-content-full-width">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="grid-container">	
						<div class="grid-x">
							<div class="poet-bio-content cell entry-content">
								<img class="poet-bio-pic" src="<?php the_post_thumbnail_url( 'full' ) ?>">
								<header>
									<?php
										if ( is_single() ) {
											the_title( '<h1 class="poet-name entry-title">', '</h1>' );
										} else {
											the_title( '<h2 class="poet-name entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
										}									
									?>
									<p class="poet-bio-social">Twitter <a href="#social1">@Neilicorn</a> | Facebook <a href="#social1">@neilhilborn</a></p>
								</header>
								<?php the_content(); ?>
								<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
						</div>
					</section>
				</article>
			</main>
		</div>
	</div>
</div>

<div class="main-container">
	<div class="main-grid">
		<div class="main-content-full-width">
			<section class="poet-featured-item grid-container">	
				<div class="grid-x">
					<div class="poet-featured-item-copy cell small-12 medium-8 medium-order-1 small-order-2">
						<h2>The Future</h2>
						<h3>Now available for order!</h3>
						<p>Neil Hilborn's highly anticipated second collection of poems, The Future, invites readers to find comfort in hard nights and better days. Filled with nostalgia, love, heartbreak, and the author’s signature wry examinations of mental health, Neil Hilborn’s second book helps explain what lives inside us, what we struggle to define. Written on the road over two years of touring, The Future is rugged, genuine, and relatable. Grabbing attention like gravity, Hilborn reminds readers that no matter how far away we get, we eventually all drift back together. These poems are fireworks for the numb. In the author’s own words, The Future is a blue sky and a full tank of gas, and in it, we are alive.</p>
						<a class="button" href="product-link">Buy Now</a>
					</div>
					<div class="poet-featured-item-pic cell small-12 medium-4 medium-order-2 small-order-1">
						<img src="https://via.placeholder.com/160x240/">
					</div>
				</div>
			</section>
	
			<?php bp_poet_carousel(get_the_ID()); ?>

			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
				?>
				<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
			</footer>			
			<?php comments_template(); ?>	
		</div>
	</div>
</div>

<?php endwhile; ?>

<?php
