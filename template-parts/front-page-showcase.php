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
<div class="showcase-shelf">
    <div id="showcase-slider">
    <?php 
        // Setup default books array. Mirrored as defaults in custom-front.php
        $default_book_ids = bp_showcase_default_books();

        for($i = 0; $i < 6; $i++ ) { 

        $book_id = get_theme_mod('front_page_showcase_books_' . $i, $default_book_ids[$i]); 
        $book_title = get_the_title( $book_id );
        if( metadata_exists( 'post', $book_id, 'bp_linked_author' ) ) { 
            $book_author = get_post_meta( $book_id, 'bp_linked_author', true); 
        } else $book_author = null;	?>
        <div class="slick-slide">
            <a href="<?php echo get_permalink( $book_id ); ?>" class="showcase-book" title="Go to <?php echo $book_title;
                if( $book_author ) echo " by " . $book_author; ?> in the Button Shop">
                <div class="showcase-cover" 
                    style="background-image: url('<?php echo get_the_post_thumbnail_url($book_id, 'thumbnail'); ?>')">
                    <div class="showcase-cover-stroke"></div>
                </div>
                <span class="title"><?php echo $book_title; ?></span>
                <?php if( $book_author ) { ?> <p class="author"><?php echo $book_author; ?></p> <?php } ?>
            </a>
        </div> 
    <?php } ?>
    </div>
</div>
<a class="button large" href="<?php echo get_permalink('88'); ?>">Shop all books</a>
</section>