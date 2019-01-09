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
<script>
// Legacy Instalinks tracking from Headway
// Begin Tracking Function
function bp_instalinks_ga_setup () { 
    //Get the user's role (logged in role or 'guest') via AJAX
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var data = {url : ajaxurl, 
                action : 'bp_check_user_role' };
    
    jQuery.post( ajaxurl, data, function(userRole) {
        window.bpILuserRole = window.bpILuserRole || userRole;
        return false;
    });
}
bp_instalinks_ga_setup();

function bp_il_ga_event (url) {
    var clickType = ""; 
    
    if (url.search(/.+buttonpoetry/) == -1) { 
        clickType = 'click_outbound_' + window.bpILuserRole;
    }  
    else {
        clickType = 'click_internal_' + window.bpILuserRole;
    }
    
    gtag('event', clickType, {
        'event_category': 'instalinks',
        'event_label': url
    });
}

// Add onclick attributes to all page links
jQuery(document).ready(function($) {
    
    // Don't bother for Administrators
    if(window.bpILuserRole == 'administrator')
    {
        console.log("Tracking error: Administrators cannot fire analytics events.");
        return false;
    }
    
    // Attach tracking onclick events to every normal link on the page
    $('.block-content a').each( function () {
        $(this).attr('onclick',"bp_il_ga_event('" + $(this).attr('href') + "');"); 
        $(this).attr('target',"_blank"); 
    });
});

</script>
<?php get_footer();
