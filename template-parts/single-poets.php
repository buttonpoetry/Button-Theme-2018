<?php
/**
 * The template for displaying Poet pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Button-Theme-2018
 * @since Button-Theme-2018 0.1.0
 */
 ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="grid-container">	
					<div class="grid-x">
						<div class="cell small-12 medium-6">
							<img src="<?php the_post_thumbnail_url( 'featured-small' ) ?>">
						</div>
						<div class="cell  small-12 medium-6 entry-content">
							<header>
								<?php
									if ( is_single() ) {
										the_title( '<h1 class="entry-title">', '</h1>' );
									} else {
										the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
									}
								?>
							</header>
							<?php the_content(); ?>
							<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>
				</section>
				<section class="grid-container">	
					<div class="grid-x">
						<div class="cell  small-12 medium-6 ">
							<h2>The Future</h2>
							<p>Filled with nostalgia, love, heartbreak, and the author’s signature wry examinations of mental health, Neil Hilborn’s second book helps explain what lives inside us, what we struggle to define. Written on the road over two years of touring, The Future is rugged, genuine, and relatable. Grabbing attention like gravity, Hilborn reminds readers that no matter how far away we get, we eventually all drift back together. These poems are fireworks for the numb. In the author’s own words, The Future is a blue sky and a full tank of gas, and in it, we are alive.</p>
						</div>
						<div class="cell small-12 medium-6">
							<img src="https://via.placeholder.com/150x300/">
						</div>
					</div>
				</section>
				<section class="grid-container">	
					<div class="grid-xy">
						<div class="cell  small-6 medium-4 large-3">
							<img src="https://via.placeholder.com/280x140/">
						</div>
						<div class="cell  small-6 medium-4 large-3">
							<img src="https://via.placeholder.com/280x140/">
						</div>
						<div class="cell  small-6 medium-4 large-3">
							<img src="https://via.placeholder.com/280x140/">
						</div>
						<div class="cell  small-6 medium-4 large-3">
							<img src="https://via.placeholder.com/280x140/">
						</div>
						<div class="cell  small-6 medium-4 large-3">
							<img src="https://via.placeholder.com/280x140/">
						</div>
					</div>
				</section>
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
			</article>
			<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php
