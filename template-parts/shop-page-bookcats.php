<?php
/**
 * The template for displaying the Shop Page book categories.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

if ( !function_exists('bp_wc_cat_short_slug') ) {
    function bp_wc_cat_short_slug( $catID ) {
        $catSlogans = array(
            'Books'             => 'From the stage to the page, our authors are among the best and most innovative poets working today.',
            'E-Books'           => 'Just like books, but they weigh less!',
            'Featured'          => 'Our featured items. Bundle deals, new books, and more!',
            'Bundles'           => 'Get more poetry for less with our discount packages.',
            'Merchandise'       => 'Share your love of poetry with the world.',
            'Forthcoming Books' => 'Be the first to read our upcoming books!');
            
        $catTitle = get_the_title( $catID );
        if( array_key_exists($catTitle, $catSlogans) )
        {
	        return $catSlogans[$catTitle];
        }
        else return null;
    }
}

if ( !function_exists('bp_shop_cat_card') ) {
    function bp_shop_cat_card( $catID, $catLead, $catCoverURL ) {
        $catSlug = get_the_title( $catID );
        $catURL = get_site_url(null, '/product-category/' . $catSlug);
        ?>        
        <div class="cell small-12 medium-4">
            <div class="grid-x grid-margin-x">
                <div class="cell shrink">
                    <a alt="" href="<?php echo $catURL ?>"><img src="<?php echo $catCoverURL ?>"></a>
                </div>
                <div class="cell auto">
                    <h3><?php echo $catSlug ?></h3>
                    <a href="<?php echo $product_link ?>"><?php echo $product_button_text; ?></a>
                </div>
            </div>
        <?php
    }
}

$bp_book_cats = array(
    '', // Forthcoming Books
    '', // E-Books
    '');  // Audiobooks

?>

<section class="showcase">
<h1>Books</h1>
<p>From the stage to the page, our authors are among the best and most innovative poets working today.</p>
<?php get_template_part('template-parts/book-showcase'); ?>
<div class="grid-container">
    <div class="grid-x">
        <div class="cell small-12 medium-4">Forthcoming Books</div>
        <div class="cell small-12 medium-4">E-Books</div>
        <div class="cell small-12 medium-4">Audiobooks</div>
    </div>
</div>
</section>