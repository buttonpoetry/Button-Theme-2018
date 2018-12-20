<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('grid-x', 'poet-archive-listing') ); ?>>
<div class="poet-archive-bio-pic cell small-12 medium-5 large-4 large-offset-1">
	<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">
		<img src="<?php the_post_thumbnail_url( 'full' ) ?>">
	</a>
</div>
<div class="poet-archive-content cell small-12 medium-7 large-6">
<header>
	<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		<?php bp_poet_carousel(get_the_ID()); ?>
	</div>	
</div>
</article>
