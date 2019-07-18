<?php
/**
 * Front Page Feature template part.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */

$feature_slides_query_args = array (
	'post_type' 	=> array( 'bp_feature_slide' ),
	'post_status'	=> array( 'publish' ),
	'meta_key'   	=> 'bp_feature_slide_options_is_enabled',
	'meta_value' 	=> 'Yes',
	'posts_per_page'=> 5,
	'order'			=> 'DESC',
	'order-by'		=> 'date-published'
);

$feature_slides = new WP_Query( $feature_slides_query_args );

if ( $feature_slides->have_posts() )
{ 
	$dummy_placed = false; ?>
<section class="feature-row" role="region" aria-label="Button Poetry Featured Content">
	<div id="featured-slider">
		<?php while ( $feature_slides->have_posts() ) : 
		$feature_slides->the_post(); 
		$f_quote =		bp_feature_slide_options_get_meta( 'bp_feature_slide_options_is_quote' );		
		$f_lead = 		bp_feature_slide_options_get_meta( 'bp_feature_slide_options_lead' );
		$f_author = 	bp_feature_slide_options_get_meta( 'bp_feature_slide_options_followup' );
		$f_action_lbl = bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_label' );
		$f_action_url =	bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_url' );

		if( $f_quote == "Yes" ) {
			$f_lead_class = "lead quote";
			$f_follow_class = "feature-author";
		} else {
			$f_lead_class = "lead";
			$f_follow_class = "";
		}

		if ( has_post_thumbnail() ) {
			$f_img_src = get_the_post_thumbnail_url();
			$f_img_tag = get_the_post_thumbnail( the_ID(), 'full', array('feature-hero') );
		} else {
			$f_img_src = 'https://via.placeholder.com/800/74B6B8/EBE9DD?text=' . $f_action_lbl;
            $f_img_tag = '<img class="feature-hero" src="https://via.placeholder.com/800/74B6B8/EBE9DD?text=' . $f_action_lbl . '" alt="">';
		}

		if( ! $dummy_placed ) { 
			$dummy_placed = true; ?>
			<div class="dummy-slide">
				<div class="grid-x align-middle feature-slide">
                <div class="feature-link-cell cell medium-6 large-auto small-order-1 medium-order-2">
					<a class="feature-link" href="<?php echo $f_action_url ?>"><?php echo $f_img_tag ?></a>
					</div>
					<div class="cell medium-6 small-order-2 medium-order-1">
						<div class="feature-text">
							<h2 class="feature-section-title">Featured</h2>
							<p class="<?php echo $f_lead_class ?>"><?php echo $f_lead ?></p>
							<p class="<?php echo $f_follow_class ?>"><?php echo nl2br($f_author) ?></p>
							<div class="button-wrap"><a class="button" href="<?php echo $f_action_url ?>"><?php echo $f_action_lbl ?></a></div>
						</div>
					</div>
				</div>
			</div><?php
		}
		?>
		
		<div class="slick-slide">
			<div class="grid-x align-middle feature-slide">
				<div class="feature-link-cell cell medium-6 large-auto small-order-1 medium-order-2">
					<a class="feature-link" href="<?php echo $f_action_url ?>"><?php echo $f_img_tag ?></a>
				</div>
				<div class="cell medium-6 small-order-2 medium-order-1">
					<div class="feature-text">
						<h2 class="feature-section-title">Featured <?php edit_post_link( __( '(Edit slide)', 'foundationpress' ), '<br><span class="edit-link">', '</span>' ) ?></h2>
						<p class="<?php echo $f_lead_class ?>"><?php echo $f_lead ?></p>
						<p class="<?php echo $f_follow_class ?>"><?php echo nl2br($f_author) ?></p>
						<div class="button-wrap"><a class="button" href="<?php echo $f_action_url ?>"><?php echo $f_action_lbl ?></a></div>
						
					</div>
				</div>
			</div>
		</div>			
		<?php endwhile; ?>
	</div>	
</section>
<?php } 
else { 
	//If no slides exist, put up a functional demo slide.
	?>
<section class="feature-row <?php echo $extra_class; ?>" role="region" aria-label="Button Poetry Featured Content">
	<div class="grid-x align-middle feature-slide">
		<div class="feature-link-cell cell medium-6 large-auto small-order-1 medium-order-2">
			<a class="feature-link" href="/product/depression-other-magic-tricks/"><img class="feature-hero" src="<?php echo get_stylesheet_directory_uri() . '/dist/assets/images/theme/depression-demo-slide.jpg'; ?>" alt=""></a>
		</div>
		<div class="cell medium-6 small-order-2 medium-order-1">
			<div class="feature-text">
				<h2 class="feature-section-title">Featured <?php edit_post_link( __( '(Edit slide)', 'foundationpress' ), '<br><span class="edit-link">', '</span>' ) ?></h2>
				<p class="lead quote">I have kissed love on the lips & it did not fill me with anything other than smoke.</p>
				<p class="feature-author">Sabrina Benaim<br>Depression & Other Magic Tricks</p>
				<div class="button-wrap"><a class="button" href="/product/depression-other-magic-tricks/">Buy Now</a></div>	
			</div>
		</div>
	</div>	
</section>
<?php }

// If the feature shows first, add a div.
if(!$showcase_on_top) {
	echo '<div class="featured-on-top"></div>'; 
}
