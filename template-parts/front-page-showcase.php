<?php
/**
 * Front Page Showcase template part.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
?>

<section class="showcase">
<p class="lead hide-for-large"><?php 
    echo get_theme_mod('front_page_showcase_lead_short', __( 'Poetry is for everyone!', 'foundationpress' ));
?></p>
<p class="lead show-for-large"><?php 
    echo get_theme_mod('front_page_showcase_lead', __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ));
?></p>
<div class="showcase-shelf">
<!-- div class="grid-x grid-margin-x" -->
    <!-- div class="row expanded" -->
        <div id="showcase-slider">
        <?php for($i = 0; $i < 6; $i++ ) { 
            $book_id = get_theme_mod('front_page_showcase_books_' . $i, '35546'); 
            $book_title = get_the_title( $book_id );
            if( metadata_exists( 'product', $book_id, 'linked-author' ) ) { 
                $book_author = get_post_meta( $book_id, 'linked-author', true); 
            } else $book_author = null;	?>
            <!-- div class="cell small-4 medium-2" -->
            <div class="slick-slide">
                <a href="<?php echo get_permalink( $book_id ); ?>" class="showcase-book">
                    <div class="showcase-cover" 
                        style="background-image: url('<?php echo get_the_post_thumbnail_url($book_id); ?>')">
                        <div class="showcase-cover-stroke"
                            title="View <?php echo $book_title ?> in the Button Shop" 
                            alt="<?php echo $book_title; 
                        if( $book_author ) echo " by " . $book_author; ?>"></div>
                    </div>
                    <h2 class="title"><?php echo $book_title; ?></h2>
                    <?php if( $book_author ) { ?> <p class="author"><?php echo $book_author; ?></p> <?php } ?>
                </a>
            </div> 
        <?php } ?>
        </div>
    <!-- /div -->
<!-- /div -->
</div>
<a class="button large" href="<?php echo get_permalink('88'); ?>">Shop all books</a>
</section>