<?php
/*
Template Name: Instalinks
*/
add_filter('bp_cart_src', function($cartSrc) { return str_replace('.svg', '-white.svg', $cartSrc); } );
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
            <div class="instalinks-container">            
                <img class="instalinks-logo" src="<?php echo get_stylesheet_directory_uri() ?>/dist/assets/images/theme/button-logo-transparent-white.png">
                <h1>Button Poetry</h1>
                <?php
                    wp_nav_menu(
                        array(
                        'container'      => false,
                        'menu_class'     => 'instalinks-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'theme_location' => 'instalinks',
                        'depth'          => 0,
                        'fallback_cb'    => false)
                    ); ?>
            </div>
        </main>        
	</div>
</div>
<?php get_footer();
