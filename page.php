<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 

// Skip the sidebar on some pages
if ( is_page( array( 'cart', 'checkout', 'my-account') ) ) {
?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		</main>
	</div>
</div> 
<?php } else { 
get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>				
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php }

get_footer();
