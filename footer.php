<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
    <div class="footer-container">

        <div class="footer-social-icon-tray">
            <a class="footer-social-icon" href="https://www.instagram.com/buttonpoetry/?hl=en"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/theme/social/instagram.svg"></a>
            <a class="footer-social-icon" href="http://www.youtube.com/buttonpoetry/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/theme/social/youtube.svg"></a>
            <a class="footer-social-icon" href="http://buttonpoetry.tumblr.com/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/theme/social/tumblr.svg"></a>
            <a class="footer-social-icon" href="http://www.facebook.com/buttonpoetry"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/theme/social/facebook.svg"></a>
            <a class="footer-social-icon" href="https://twitter.com/buttonpoetry"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/theme/social/twitter.svg"></a>
        </div>

        <p>Copyright &copy; <?php echo date('Y'); ?> Button Poetry</p>
        <p>This site uses cookies. Take a look at Button's <a href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a>.</p>
        <!-- div class="footer-grid">
            <?php /*dynamic_sidebar( 'footer-widgets' );*/ ?>
        </div -->
    </div>
</footer>

<!-- Mini cart -->
<div class="dropdown-pane" id="bp-mini-cart" data-dropdown data-hover="true" data-hover-pane="true" data-position="bottom" data-alignment="right">
    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
</div>

</div><!-- Closes the width limit wrapper -->

</div><!-- Close off-canvas content -->

<?php wp_footer(); ?>
</body>
</html>
