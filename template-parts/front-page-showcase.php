<?php
/**
 * Front Page Showcase template part.
 *
 * Uses 'bp_linked_author' meta field on Product pages, if available.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
?>

<section class="showcase">
<p class="lead hide-for-large"><?php 
    echo get_theme_mod('front_page_showcase_lead_small', __( 'Showcasing diverse voices because poetry is for everyone.', 'foundationpress' ));
?></p>
<p class="lead show-for-large"><?php 
    echo get_theme_mod('front_page_showcase_lead', __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ));
?></p>
<?php get_template_part('template-parts/book-showcase'); ?>
</section>