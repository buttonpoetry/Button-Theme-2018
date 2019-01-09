<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<script>
// Legacy Indies tracking from Headway
// Begin Tracking Function
function bp_indies_ga_setup () { 
    //Get the user's role (logged in role or 'guest') via AJAX
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var data = {url : ajaxurl, 
                action : 'bp_check_user_role' };
    
    jQuery.post( ajaxurl, data, function(userRole) {
        window.bpuserRole = window.bpuserRole || userRole;
        return false;
    });
}
bp_indies_ga_setup();

function bp_indies_ga_event (url) {
    var clickType = ""; 
    
    if (url.search(/.+buttonpoetry/) == -1) { 
        clickType = 'click_outbound_' + window.bpuserRole;
    }  
    else {
        clickType = 'click_internal_' + window.bpuserRole;
    }
    
    gtag('event', clickType, {
        'event_category': 'indies-affiliates',
        'event_label': url
    });
}

// Add onclick attributes to all page links
jQuery(document).ready(function($) {
    
    // Don't bother for Administrators
    if(window.bpuserRole == 'administrator')
    {
        console.log("Tracking error: Administrators cannot fire analytics events.");
        return false;
    }
    
    // Attach tracking onclick events to every normal link on the page
    $('.block-content a').each( function () {
        $(this).attr('onclick',"bp_indies_ga_event('" + $(this).attr('href') + "');"); 
        $(this).attr('target',"_blank"); 
    });
});

</script>
<?php get_footer();
