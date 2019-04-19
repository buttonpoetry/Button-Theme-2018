<?php
/**
 * Adds shop page functionality and allows users to edit Shop Page features 
 * from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */

/**
 * Function to display a custom string for a product category.
 */
if ( !function_exists('bp_wc_cat_short_slug') ) {
    function bp_wc_cat_short_slug( $catTitle ) {
        $catSlogans = array(
            'Books'             => 'From the stage to the page, our authors are among the best and most innovative poets working today.',
            'E-Books'           => 'Just like books, but they weigh less!',
            'Featured'          => 'Our featured items. Bundle deals, new books, and more!',
            'Bundles'           => 'Get more poetry for less with our discount packages.',
            'Merchandise'       => 'Share your love of poetry with the world.',
            'Forthcoming Books' => 'Be the first to read our upcoming books!');
                    
        if( array_key_exists($catTitle, $catSlogans) )
        {
	        return $catSlogans[$catTitle];
        }
        else return null;
    }
}