<?php
/**
 * The template for displaying individual Poet pages.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

 remove_action('the_content', 'bp_render_footer');
 ?>
<div class="poet-bio-wrapper">
	<div class="main-container full-width-padded">
		<div class="main-grid">
			<main class="main-content-full-width">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="grid-container wide">	
						<div class="grid-x">
							<div class="poet-bio-content cell entry-content">
								<img class="poet-bio-pic" src="<?php the_post_thumbnail_url( 'full' ) ?>">
									<?php										
										the_title( '<h1 class="poet-name entry-title">', '</h1>' );
										edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' );
										/* Poet Social (ps) links code.
											Could be enhanced with a table of options with network/site names, url formats, and display formats.
											For now, these keys work with the associated values:
											bp_poet_social_website : site URL
											bp_poet_social_instagram : handle
											bp_poet_social_youtube : handle
											bp_poet_social_tumblr : handle
											bp_poet_social_facebook : handle
											bp_poet_social_twitter : handle
										**/

										$psLinks = [];
										//Website
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_website' ) ) {
											$psURL = trim(get_post_meta(get_the_ID(), 'bp_poet_social_website', true));
											$psLinks[] = '<a href="' . $psURL . '">Website</a>';
										}
										//Instagram
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_instagram' ) ) {
											$psNetwork = 'Instagram';
											$psHandle = trim(get_post_meta(get_the_ID(), 'bp_poet_social_instagram', true));
											$psURL = 'https://www.instagram.com/' . $psHandle . '/';
											$psDisplayHandle = '@' . $psHandle;
											$psLinks[] = $psNetwork . ' <a href="' . $psURL . '">' . $psDisplayHandle . '</a>';
										}										
										//YouTube
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_youtube' ) ) {
											$psNetwork = 'YouTube';
											$psHandle = trim(get_post_meta(get_the_ID(), 'bp_poet_social_youtube', true));
											$psURL = 'https://www.youtube.com/' . $psHandle;											
											$psDisplayHandle = $psHandle;
											$psLinks[] = $psNetwork . ' <a href="' . $psURL . '">' . $psDisplayHandle . '</a>';
										}
										//Tumblr
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_tumblr' ) ) {
											$psNetwork = 'Tumblr';
											$psHandle = trim(get_post_meta(get_the_ID(), 'bp_poet_social_tumblr', true));
											$psURL = 'https://' . $psHandle . '.tumblr.com';
											$psDisplayHandle = $psHandle;
											$psLinks[] = $psNetwork . ' <a href="' . $psURL . '">' . $psDisplayHandle . '</a>';
										}										
										//Facebook
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_facebook' ) ){
											$psNetwork = 'Facebook';
											$psHandle = trim(get_post_meta(get_the_ID(), 'bp_poet_social_facebook', true));
											$psURL = 'https://facebook.com/' . $psHandle;
											$psDisplayHandle = '@' . $psHandle;
											$psLinks[] = $psNetwork . ' <a href="' . $psURL . '">' . $psDisplayHandle . '</a>';
										}
										//Twitter
										if( metadata_exists( 'post', get_the_ID(), 'bp_poet_social_twitter' ) ){
											$psNetwork = 'Twitter';
											$psHandle = trim(get_post_meta(get_the_ID(), 'bp_poet_social_twitter', true));
											$psURL = 'https://twitter.com/' . $psHandle;
											$psDisplayHandle = '@' . $psHandle;
											$psLinks[] = $psNetwork . ' <a href="' . $psURL . '">' . $psDisplayHandle . '</a>';
										}
										if ( ! empty($psLinks) ) {
											echo '<p class="poet-bio-social">' . implode(' | ', $psLinks) . '</p>';											
										}
									?>
								<?php the_content(); ?>								
							</div>
						</div>
					</section>
				</article>
			</main>
		</div>
	</div>
</div>

<?php if ( metadata_exists( 'post', get_the_ID(), 'bp_featured_product' ) ) : ?>
<div class="poet-featured-wrapper">
	<div class="main-container">
		<div class="main-grid">
			<div class="main-content-full-width"><?php
				$featuredID = get_post_meta( get_the_ID(), 'bp_featured_product', true );
				$fProduct = wc_get_product( $featuredID ); ?>
				<section class="poet-featured-item grid-container">
					<div class="grid-x">
						<div class="poet-featured-item-copy cell small-12 medium-8 medium-order-1 small-order-2">
							<h2><?php echo $fProduct->get_name(); ?></h2>
							<?php echo $fProduct->get_description(); ?>
							<a class="button poet-featured-item-buy-button" href="<?php echo get_permalink( $featuredID ) ?>">Buy Now</a>
						</div>
						<div class="poet-featured-item-pic cell small-12 medium-4 medium-order-2 small-order-1">
							<a href="<?php echo get_permalink( $featuredID ) ?>"><img src="<?php echo get_the_post_thumbnail_url( $featuredID, 'full' ) ?>"></a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>		
<?php endif ?>

<div class="main-container">
	<div class="main-grid">
		<div class="main-content-full-width">			
			<?php bp_poet_carousel(get_the_ID()); ?>
			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
				?>
			</footer>						
		</div>
	</div>
</div>

<?php
