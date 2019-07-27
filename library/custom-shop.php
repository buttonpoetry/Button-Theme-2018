<?php
/**
 * Adds shop page functionality and allows users to edit Shop Page features 
 * from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 1.2.0
 */

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
				'description' => __( 'Alter the featured item section.', 'foundationpress'),
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
		echo "<section class='bp-shop-quicknav'><ul class='menu vertical large-horizontal expanded align-center'>";
		foreach ($all_categories as $cat) {
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id;       
				echo '<li><a href="'. get_term_link($cat->slug, 'product_cat') .'" class="button small hollow">'. $cat->name .'</a></li>';
			}       
		}
		echo "</ul></section>";
	}
}
