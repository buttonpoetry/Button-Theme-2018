<?php
/**
 * This libray adds shop page functionality and allows users to edit Shop Page features 
 * from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */
 
 /**
 * Adds 'bp_shop_hero' post type to populate the shop hero with content.
 * 
 * @since ButtonTheme 1.4.0
 */
if ( ! function_exists( 'bp_shop_hero_post_type' ) ) {
	// Register Shop Hero Custom Post Type
	add_action( 'init', 'bp_shop_hero_post_type', 0 );
	function bp_shop_hero_post_type() {
		
		$labels = array(
			'name'                  => _x( 'Shop Heroes', 'Post Type General Name', 'foundationpress' ),
			'singular_name'         => _x( 'Shop Hero', 'Post Type Singular Name', 'foundationpress' ),
			'menu_name'             => __( 'Shop Heroes', 'foundationpress' ),
			'name_admin_bar'        => __( 'Shop Heroes', 'foundationpress' ),
			'archives'              => __( 'Shop Hero Archives', 'foundationpress' ),
			'attributes'            => __( 'Shop Hero Attributes', 'foundationpress' ),
			'parent_item_colon'     => __( 'Parent Shop Hero:', 'foundationpress' ),
			'all_items'             => __( 'All Shop Heroes', 'foundationpress' ),
			'add_new_item'          => __( 'Add New Shop Hero', 'foundationpress' ),
			'add_new'               => __( 'Add New', 'foundationpress' ),
			'new_item'              => __( 'New Shop Hero', 'foundationpress' ),
			'edit_item'             => __( 'Edit Shop Hero', 'foundationpress' ),
			'update_item'           => __( 'Update Shop Hero', 'foundationpress' ),
			'view_item'             => __( 'View Shop Hero', 'foundationpress' ),
			'view_items'            => __( 'View Shop Heroes', 'foundationpress' ),
			'search_items'          => __( 'Shop Hero', 'foundationpress' ),
			'not_found'             => __( 'Not found', 'foundationpress' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'foundationpress' ),
			'featured_image'        => __( 'Hero Image', 'foundationpress' ),
			'set_featured_image'    => __( 'Set hero image', 'foundationpress' ),
			'remove_featured_image' => __( 'Remove hero image', 'foundationpress' ),
			'use_featured_image'    => __( 'Use as hero image', 'foundationpress' ),
			'insert_into_item'      => __( 'Insert into Shop Hero', 'foundationpress' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Shop Hero', 'foundationpress' ),
			'items_list'            => __( 'Shop Heroes list', 'foundationpress' ),
			'items_list_navigation' => __( 'Shop Heroes list navigation', 'foundationpress' ),
			'filter_items_list'     => __( 'Filter Shop Heroes list', 'foundationpress' ),
		);
		$args = array(
			'label'                 => __( 'Shop Hero', 'foundationpress' ),
			'description'           => __( 'The hero content featured on the main shop page.', 'foundationpress' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),			
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-megaphone',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'bp_shop_hero', $args );

	}
	

	/**
	 * Additionally, generate a metabox for the post type.
 	 * Generated by the WordPress Meta Box generator
 	 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
	  */
	
	/*
		Usage: bp_shop_hero_options_get_meta( 'bp_shop_hero_options_header' )
		Usage: bp_shop_hero_options_get_meta( 'bp_shop_hero_options_adcopy' )
		Usage: bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_label' )
		Usage: bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_url' )
	*/
	function bp_shop_hero_options_get_meta( $value ) {
		global $post;

		$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
	}

	add_action( 'add_meta_boxes', 'bp_shop_hero_options_add_meta_box' );
	function bp_shop_hero_options_add_meta_box() {
		add_meta_box(
			'bp_shop_hero_options-feature-slide-options',
			__( 'Shop Hero Options', 'bp_shop_hero_options' ),
			'bp_shop_hero_options_html',
			'bp_shop_hero',
			'normal',
			'default'
		);
	}
	
	function bp_shop_hero_options_html( $post) {
		wp_nonce_field( '_bp_shop_hero_options_nonce', 'bp_shop_hero_options_nonce' ); ?>

		<p>Set these options and set a hero image to create your shop page hero ad. <br> Images should be 1400x700px and compressed via tinyPNG crisp text/sharp graphics is preferred for Retina/4X/UHD displays.</p>

		<table style="width:100%;">
			<thead>
				<tr>
					<th style="text-align:left;"><label for="bp_shop_hero_options_header"><?php _e( 'Header Text', 'bp_shop_hero_options' ); ?></label></th>					
					<th style="text-align:left;"><label for="bp_shop_hero_options_adcopy"><?php _e( 'Smaller ad copy', 'bp_shop_hero_options' ); ?></label></th>
					<th style="text-align:left;"><label for="bp_shop_hero_options_call_to_action_label"><?php _e( 'Call to action Label', 'bp_shop_hero_options' ); ?></label><br></th>
					<th style="text-align:left;"><label for="bp_shop_hero_options_call_to_action_url"><?php _e( 'Call to action URL', 'bp_shop_hero_options' ); ?></label></th>
					<th style="text-align:left;"><label for="bp_shop_hero_options_is_enabled"><?php _e( 'Enable?', 'bp_shop_hero_options' ); ?></label></th>
				</tr>
			</thead>
			<tbody>
				<tr style="min-height:140px;">					
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="bp_shop_hero_options_header" id="bp_shop_hero_options_header" ><?php echo bp_shop_hero_options_get_meta( 'bp_shop_hero_options_header' ); ?></textarea></td>
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="bp_shop_hero_options_adcopy" id="bp_shop_hero_options_adcopy" ><?php echo bp_shop_hero_options_get_meta( 'bp_shop_hero_options_adcopy' ); ?></textarea></td>
					<td style="vertical-align:top;"><input type="text" name="bp_shop_hero_options_call_to_action_label" id="bp_shop_hero_options_call_to_action_label" value="<?php echo bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_label' ); ?>"></td>
					<td style="vertical-align:top;"><input type="text" name="bp_shop_hero_options_call_to_action_url" id="bp_shop_hero_options_call_to_action_url" value="<?php echo bp_shop_hero_options_get_meta( 'bp_shop_hero_options_call_to_action_url' ); ?>"></td>
					<td style="vertical-align:top;"><input type="radio" name="bp_shop_hero_options_is_enabled" id="bp_shop_hero_options_is_enabled_0" value="Yes" <?php echo ( bp_shop_hero_options_get_meta( 'bp_shop_hero_options_is_enabled' ) === 'Yes' ) ? 'checked' : ''; ?>><label for="bp_shop_hero_options_is_enabled_0">Yes</label><br><input type="radio" name="bp_shop_hero_options_is_enabled" id="bp_shop_hero_options_is_enabled_1" value="No" <?php echo ( bp_shop_hero_options_get_meta( 'bp_shop_hero_options_is_enabled' ) === 'No' ) ? 'checked' : ''; ?>><label for="bp_shop_hero_options_is_enabled_1">No</label><br></td>
				</tr>
			</tbody>
		</table><?php
	}
	
	add_action( 'save_post', 'bp_shop_hero_options_save' );
	function bp_shop_hero_options_save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['bp_shop_hero_options_nonce'] ) || ! wp_verify_nonce( $_POST['bp_shop_hero_options_nonce'], '_bp_shop_hero_options_nonce' ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['bp_shop_hero_options_header'] ) )
			update_post_meta( $post_id, 'bp_shop_hero_options_header', esc_attr( $_POST['bp_shop_hero_options_header'] ) );		
		if ( isset( $_POST['bp_shop_hero_options_adcopy'] ) )
			update_post_meta( $post_id, 'bp_shop_hero_options_adcopy', esc_attr( $_POST['bp_shop_hero_options_adcopy'] ) );
		if ( isset( $_POST['bp_shop_hero_options_call_to_action_label'] ) )
			update_post_meta( $post_id, 'bp_shop_hero_options_call_to_action_label', esc_attr( $_POST['bp_shop_hero_options_call_to_action_label'] ) );
		if ( isset( $_POST['bp_shop_hero_options_call_to_action_url'] ) )
			update_post_meta( $post_id, 'bp_shop_hero_options_call_to_action_url', esc_url( $_POST['bp_shop_hero_options_call_to_action_url'] ) );
		if ( isset( $_POST['bp_shop_hero_options_is_enabled'] ) )
			update_post_meta( $post_id, 'bp_shop_hero_options_is_enabled', esc_attr( $_POST['bp_shop_hero_options_is_enabled'] ) );
	}
	
	add_action('add_meta_boxes', 'bp_shop_hero_toast_yoast', 100);
	function bp_shop_hero_toast_yoast() {
		remove_meta_box('wpseo_meta', 'bp_shop_hero', 'normal');
	}
}

/**
 * Function to display a custom string for a product category.
 * @since ButtonTheme 1.2.0
 */
if ( !function_exists('bp_wc_cat_short_slug') ) {
    function bp_wc_cat_short_slug( $catTitle ) {
        $catSlogans = array(
            'Books'             => 'From the stage to the page, our authors are among the best and most innovative poets working today.',
            'E-Books'           => 'Just like books, but they weigh less!',
            'Featured'          => 'Our featured items. Bundle deals, new books, and more!',
            'Bundles'           => 'Get more poetry for less with our discount packages.',
            'Merchandise'       => 'Share your love of poetry with the world.',
            'Forthcoming Books' => 'Be the first to read our upcoming books!');
                    
        if( array_key_exists($catTitle, $catSlogans) )
        {
	        return $catSlogans[$catTitle];
        }
        else return null;
	}
}

/**
 * Function to add shop customizer options.
 * 
 * @since ButtonTheme 1.2.1
 */
if ( ! function_exists( 'bp_shop_page_register_customizer' ) ) {

	add_action( 'customize_register', 'bp_shop_page_register_customizer' );
	function bp_shop_page_register_customizer( $wp_customize ) {

		// Create Shop Page Settings panel
		$wp_customize->add_panel(
			'shop_page_settings', array(
				'priority'       => 2,
				'theme_supports' => '',
				'title'          => __( 'Shop Page Settings', 'foundationpress' ),
				'description'    => __( 'Controls copy for the shop page.', 'foundationpress' ),
			)
		);

		// Create Showcase section
		$wp_customize->add_section(
			'shop_page_feature', array(
				'title'    => __( 'Feature Section', 'foundationpress' ),
				'description' => __( 'Alter the default featured item on the Shop page. This is only the fallback display in case no Shop Hero post is published and enabled.', 'foundationpress'),
				'panel'    => 'shop_page_settings',
				'priority' => 1000,
			)
		);

        // Create settings and controls for featured product copy settings    
        $wp_customize->add_setting('shop-page-feature-image', array('default' => get_stylesheet_directory_uri() . '/dist/assets/images/theme/shop-feature-bg.jpg' ));
        $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize,
            'shop_page_feature_image_control', array(
				'section'  => 'shop_page_feature',
				'label'	   => 'Featured section hero. Should be at least 1400x700px:',
				'settings' => 'shop-page-feature-image')));
        $wp_customize->add_setting('shop-page-feature-title', array('default' => 'Gift Certificates'));
        $wp_customize->add_control(new WP_Customize_Control( $wp_customize,
            'shop_page_feature_title_control', array(
				'section'  => 'shop_page_feature',
				'label'	   => 'Featured link title:',
				'settings' => 'shop-page-feature-title',
				'type'     => 'textarea')));
        $wp_customize->add_setting('shop-page-feature-copy', array('default' => 'Give the gift of poetry to someone special with store credit that never expires!'));
        $wp_customize->add_control(new WP_Customize_Control( $wp_customize,
            'shop_page_feature_copy_control', array(
				'section'  => 'shop_page_feature',
				'label'	   => 'Featured link copy:',
				'settings' => 'shop-page-feature-copy',
				'type'     => 'textarea')));
        $wp_customize->add_setting('shop-page-feature-url', array('default' => '/product/gift-certificate/'));
        $wp_customize->add_control(new WP_Customize_Control( $wp_customize,
            'shop_page_feature_url_control', array(
				'section'  => 'shop_page_feature',
				'label'	   => 'Featured link URL:',
				'settings' => 'shop-page-feature-url',
				'type'     => 'textarea')));
        $wp_customize->add_setting('shop-page-feature-cta', array('default' => 'Buy Now'));       
        $wp_customize->add_control(new WP_Customize_Control( $wp_customize,
            'shop_page_feature_cta_control', array(
				'section'  => 'shop_page_feature',
				'label'	   => 'Featured link Call to Action:',
				'settings' => 'shop-page-feature-cta',
				'type'     => 'textarea'))); 
	}
}


/**
 * Function to add a row of categories beneath the featured item for quick navigation.
 * Code adapted from https://stackoverflow.com/questions/21009516/get-woocommerce-product-categories-from-wordpress
 * 
 * @since ButtonTheme 1.3.1
 */
if ( ! function_exists( 'bp_shop_category_row' ) ) {

	add_action( 'bp_shop_after_featuredcat', 'bp_shop_category_row' );
	function bp_shop_category_row( $wp_customize ) {
		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no  
		$title        = '';  
		$empty        = 0;

		$args = array(
				'taxonomy'     => $taxonomy,
				'orderby'      => $orderby,
				'show_count'   => $show_count,
				'pad_counts'   => $pad_counts,
				'hierarchical' => $hierarchical,
				'title_li'     => $title,
				'hide_empty'   => $empty
		);
		$all_categories = get_categories( $args );
		echo "<section class='bp-shop-quicknav'><ul class='menu vertical large-horizontal align-center'>";
		foreach ($all_categories as $cat) {
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id;
				echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'" class="button small hollow">'. $cat->name .'</a></li>';
			}
		}
		echo "</ul></section>";
	}
}
