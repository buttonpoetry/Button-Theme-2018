<?php
/**
 * The template for displaying the Shop page book showcase and categories.
 * It includes some functions only used on the Shop page.
 *
 * Uses the following theme mods:
 * shop-page-bookcat1
 * shop-page-bookcat2
 * shop-page-bookcat3
 * 
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */

/**
 * Function to display the shop list of category cards.
 * 
 * @since ButtonTheme 1.1.0
 */
if ( ! function_exists( 'bp_shop_bookcats' ) ) {
	function bp_shop_bookcats() {
        $cardClass = 'poet-product-carousel-card cell small-12 medium-6 large-4';
        $bp_book_cats = array(
            get_theme_mod( "shop-page-bookcat1", 1761),  // Forthcoming Books
            get_theme_mod( "shop-page-bookcat2", 25),    // E-Books
            get_theme_mod( "shop-page-bookcat3", 1750));  // Featured items
                           
        ?> 
        <div class="bookcats">
        <div class="poet-product-carousel grid-container">
        <div class="grid-x grid-margin-x grid-margin-y">
        <?php 
        
        foreach ($bp_book_cats as $book_cat_id) 
        {
            $book_cat_slug = get_the_category_by_ID($book_cat_id);            
            $book_cat_slogan = bp_wc_cat_short_slug($book_cat_slug);
            $book_cat_image = wp_get_attachment_image_src(get_term_meta( $book_cat_id, 'thumbnail_id', true ), 'thumbnail');
            $book_cat_link = get_category_link($book_cat_id);
            $book_cat_slug_short = explode(' ',trim($book_cat_slug));
            $book_cat_button_text = "Shop " . $book_cat_slug_short[0];

            ?>
                    <div class="<?php echo $cardClass ?>">
                        <div class="grid-x grid-margin-x align-middle">
                            <div class="cell shrink">
                                <a alt="" href="<?php echo $book_cat_link ?>"><img src="<?php echo $book_cat_image[0] ?>"></a>
                            </div>
                            <div class="cell auto text-left">
                                <h3><?php echo $book_cat_slug; ?></h3>
                                <p><?php echo $book_cat_slogan?></p>
                                <a href="<?php echo $book_cat_link ?>"><?php echo $book_cat_button_text; ?></a>                           
                            </div>
                        </div>
                    </div>
                <?php					
        } 
                            
        ?> </div>
        </div> 
    </div><?php 
    }
} ?>

<section class="showcase">
<h1>Books</h1>
<p><?php echo bp_wc_cat_short_slug('Books'); ?></p>
<br>
<?php 
    get_template_part('template-parts/book-showcase'); 
    bp_shop_bookcats(); ?>
</section>