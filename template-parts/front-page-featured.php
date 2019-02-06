<?php
/**
 * Front Page Feature template part.
 *
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
  
$feature_slides_query_args = array (
	'post_type' 	=> array( 'feature_slide' ),
	'post_status'	=> array( 'publish' ),
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
		$f_quote =		feature_slide_options_get_meta( 'feature_slide_options_is_this_a_quote_' );		
		$f_lead = 		feature_slide_options_get_meta( 'feature_slide_options_lead_paragraph' );
		$f_author = 	feature_slide_options_get_meta( 'feature_slide_options_followup_paragraph' );
		$f_action_lbl = feature_slide_options_get_meta( 'feature_slide_options_call_to_action_label' );
		$f_action_url =	feature_slide_options_get_meta( 'feature_slide_options_call_to_action_url' );

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
			$f_img_src = 'https://via.placeholder.com/800/74B6B8/EBE9DD?text=' . get_the_title();
            $f_img_tag = '<img class="feature-hero" src="https://via.placeholder.com/800/74B6B8/EBE9DD?text=' . get_the_title() . '">';
		}

		if( ! $dummy_placed ) { 
			$dummy_placed = true; ?>
			<div class="dummy-slide">
				<div class="grid-x align-middle feature-slide">
                <div class="feature-link-cell cell medium-6 large-auto small-order-1 medium-order-2"> <!-- style="background-image: url('<?php //echo $f_img_src ?>')"> -->
					<a class="feature-link" href="<?php echo $f_action_url ?>"><?php echo $f_img_tag ?></a>
					</div>
					<div class="cell medium-6 large-shrink small-order-2 medium-order-1">
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
				<div class="feature-link-cell cell large-6 xlarge-auto small-order-1 large-order-2"> <!-- style="background-image: url('<?php //echo $f_img_src ?>')"> -->
					<a class="feature-link" href="<?php echo $f_action_url ?>"><?php echo $f_img_tag ?></a>
				</div>
				<div class="cell large-6 xlarge-shrink small-order-2 large-order-1">
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
<?php } ?>