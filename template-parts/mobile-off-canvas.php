<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
	<div class="off-canvas-logo-container"><img class="off-canvas-logo" src="<?php echo get_stylesheet_directory_uri() ?>/dist/assets/images/theme/button-logo-transparant-white.png"></div>
	<?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
