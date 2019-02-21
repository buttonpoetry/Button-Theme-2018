<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	
	<div class="limit-width-wrap">

	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar">
			<div class="title-bar-title">				
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
			<div class="title-bar-right">
			<?php /* This code is an in-progress/potential feature for a mini-cart on hover on small through medium screens. 
				set_query_var( 'bp_titlebar', true );
				ob_start();
				get_template_part('template-parts/bp-mini-cart', null, ['titlebar' => true]);
				$bp_mini_cart = ob_get_contents();
				ob_end_clean();
				set_query_var( 'bp_titlebar', false );
			*/?>
				<a href="<?php echo wc_get_cart_url(); ?>" data-toggle="bp-mini-cart"><img aria-label="Cart" class="title-bar-cart" src="<?php echo bp_mini_cart_src() ?>"></a><?php /* echo $bp_mini_cart */ ?>
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
			</div>
		</div>

		<nav class="site-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

			</div>
		</nav>

	</header>
