<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 

// Display the Poets single page.
if ( in_category( 'Poets' ) ) { 
	get_template_part( 'template-parts/single-poets' );
}

//Otherwise, display the default single page template.
else {?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php get_template_part( 'template-parts/featured-image' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<?php the_post_navigation(); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php }
get_footer();
