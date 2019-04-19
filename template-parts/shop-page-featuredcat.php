<?php
/**
 * The template for displaying the Shop Page featured category row.
 *
 * Uses the following theme mods:
 *  shop-page-feature-title
 *  shop-page-feature-copy
 *  shop-page-feature-url
 *  shop-page-feature-cta
 *  
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */

?>
<section class="featured-category-row" style="background-image: url('<?php echo get_theme_mod( 'shop-page-feature-image', get_stylesheet_directory_uri() . '/dist/assets/images/theme/shop-feature-bg.jpg' ); ?>');">
    <div class="featured-category-row--content">
     <span class="feature-section-title">Featured</span>
     <h1><?php echo get_theme_mod('shop-page-feature-title', "Button Poetry Gift Cards"); ?></h1>
     <p><?php echo get_theme_mod('shop-page-feature-copy', 'Give the gift of poetry to someone special with store credit that never expires!'); ?></p>
     <a href="<?php echo get_theme_mod('shop-page-feature-url', '/product/gift-certificate/'); ?>" class="button"><?php echo get_theme_mod('shop-page-feature-cta', 'Buy Now'); ?></a>
    </div>
</section>