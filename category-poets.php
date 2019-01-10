<?php
/**
 * The template for displaying the poets archive page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
		<header class="cell medium-10 large-8 large-offset-1">
			<h1>Poets</h1>
			<p class="poet-archive-lead">By encouraging and broadcasting the best and brightest performance poets of today, Button Poetry hopes to broaden poetry’s audience, to expand its reach and develop a greater level of cultural appreciation for the art form.</p>
		</header>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'poets' ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
			if ( function_exists( 'foundationpress_pagination' ) ) :
				foundationpress_pagination();
			elseif ( is_paged() ) :
			?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; ?>

		</main>
		

	</div>
</div>

<?php get_footer();
