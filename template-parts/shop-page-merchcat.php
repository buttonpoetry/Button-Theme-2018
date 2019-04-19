<?php
/**
 * The template for displaying the Shop Page merchandise category.
 *
 * Uses 3 customizer options
 * shop_page_merch_image -> Image Control
 * shop_page_merch_description -> Text
 * shop_page_merch_caption -> Text
 * 
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */

?>

<section class="merchandise-category-row" style="background-image: url('<?php echo get_theme_mod( 'shop_page_merch_image', get_stylesheet_directory_uri() . '/dist/assets/images/theme/shop-merch-bg.jpg' ); ?>');">
    <div class="merchandise-category-row--content">
    <h1>Merchandise</h1>
     <p><?php echo get_theme_mod( 'shop_page_merch_desc', 'Share your love of poetry with the world.' ); ?></p>
     <p><em><?php echo get_theme_mod( 'shop_page_merch_caption', 'Pictured: Neil Hilborn "Clatter" Unisex T-shirt' ); ?> </em></p>
     <a href="#" class="button secondary large">Shop Merch</a>
    </div>
</section>