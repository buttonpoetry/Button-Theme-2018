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

$shop_hero_query_args = array (
	'post_type' 	=> array( 'bp_shop_hero' ),
	'post_status'	=> array( 'publish' ),
	'meta_key'   	=> 'bp_shop_hero_options_is_enabled',
	'meta_value' 	=> 'Yes',
	'posts_per_page'=> 1,
	'order'			=> 'DESC',
	'order-by'		=> 'date-published'
);

$shop_hero = new WP_Query( $shop_hero_query_args );

if ( $shop_hero->have_posts() )
{ 
    global $post;
    $backupPost = $post;
    // Do not initiate a loop, as we only want a single post.
    $shop_hero->the_post(); 
	$sh_header =	bp_shop_hero_options_get_meta( 'bp_shop_hero_options_header' );		
	$sh_adcopy = 	bp_shop_hero_options_get_meta( 'bp_shop_hero_options_adcopy' );	
	$sh_action_lbl = bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_label' );
    $sh_action_url =	bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_url' );
    
    if ( has_post_thumbnail() ) {
        $sh_img_src = get_the_post_thumbnail_url();        
    } else {
        $sh_img_src = get_stylesheet_directory_uri() . '/dist/assets/images/theme/shop-feature-bg.jpg'; // Fallback hero image        
    }
?>
<section class="featured-category-row" style="background-image: url('<?php echo $sh_img_src; ?>');">
    <div class="featured-category-row--content">
     <span class="feature-section-title">Featured</span>
     <h1><?php echo $sh_header; ?></h1>
     <p><?php echo $sh_adcopy; ?></p>
     <a href="<?php echo $sh_action_url?>" class="button"><?php echo $sh_action_lbl ?></a>
     <?php edit_post_link( __( '(Edit this shop hero)', 'foundationpress' ), '<div class="edit-link">', '</div>' ) ?>
    </div>
</section>

<?php 
    wp_reset_postdata();
}
else { 
?>

<section class="featured-category-row" style="background-image: url('<?php echo get_theme_mod( 'shop-page-feature-image', get_stylesheet_directory_uri() . '/dist/assets/images/theme/shop-feature-bg.jpg' ); ?>');">
    <div class="featured-category-row--content">
     <span class="feature-section-title">Featured</span>
     <h1><?php echo get_theme_mod('shop-page-feature-title', "Button Poetry Gift Cards"); ?></h1>
     <p><?php echo get_theme_mod('shop-page-feature-copy', 'Give the gift of poetry to someone special with store credit that never expires!'); ?></p>
     <a href="<?php echo get_theme_mod('shop-page-feature-url', '/product/gift-certificate/'); ?>" class="button"><?php echo get_theme_mod('shop-page-feature-cta', 'Buy Now'); ?></a>
    </div>
</section>

<?php } ?>
