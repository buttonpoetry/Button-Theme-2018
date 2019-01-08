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
        <p>Copyright &copy; <?php echo date('Y'); ?> Button Poetry</p>
        <p>This site uses cookies. Take a look at Button's <a href="#">Privacy Policy</a>.</p>
        <!-- div class="footer-grid">
            <?php /*dynamic_sidebar( 'footer-widgets' );*/ ?>
        </div -->
    </div>
</footer>

<!-- Mini cart -->
<div class="dropdown-pane" id="bp-mini-cart" data-dropdown data-hover="true" data-hover-pane="true" data-position="bottom" data-alignment="right">
  Mini cart src: <?php echo bp_mini_cart_src(); ?>
  <br># Items in cart: <?php echo WC()->cart->get_cart_contents_count(); ?>
</div>

</div><!-- Closes the width limit wrapper -->

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
