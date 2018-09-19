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

</div><!-- Closes the width limit wrapper -->

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
