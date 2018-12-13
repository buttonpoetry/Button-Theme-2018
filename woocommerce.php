<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 
/* Comment out to differentiate products and archives.
if (is_singular( 'product' )) {
?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php woocommerce_content(); ?>
		</main>
	</div>
</div> 
<?php }
else {
*/
?> 
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php woocommerce_content(); ?>
		</main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php /* } */ 
get_footer();
