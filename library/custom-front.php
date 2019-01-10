<?php
/**
 * Allows users to edit Front Page copy and layout from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

 /**
 * Adds 'feature_slides' post type to populate front page slider with content.
 * 
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_feature_slides_post_type' ) ) {
	// Register Custom Post Type for Feature Slides on the front page
	add_action( 'init', 'bp_feature_slides_post_type', 0 );
	function bp_feature_slides_post_type() {

		$labels = array(
			'name'                  => _x( 'Feature Slides', 'Post Type General Name', 'foundationpress' ),
			'singular_name'         => _x( 'Feature Slide', 'Post Type Singular Name', 'foundationpress' ),
			'menu_name'             => __( 'Feature Slides', 'foundationpress' ),
			'name_admin_bar'        => __( 'Feature Slides', 'foundationpress' ),
			'archives'              => __( 'Feature Slide Archives', 'foundationpress' ),
			'attributes'            => __( 'Feature Slide Attributes', 'foundationpress' ),
			'parent_item_colon'     => __( 'Parent Feature Slide:', 'foundationpress' ),
			'all_items'             => __( 'All Feature Slides', 'foundationpress' ),
			'add_new_item'          => __( 'Add New Feature Slide', 'foundationpress' ),
			'add_new'               => __( 'Add New', 'foundationpress' ),
			'new_item'              => __( 'New Feature Slide', 'foundationpress' ),
			'edit_item'             => __( 'Edit Feature Slide', 'foundationpress' ),
			'update_item'           => __( 'Update Feature Slide', 'foundationpress' ),
			'view_item'             => __( 'View Feature Slide', 'foundationpress' ),
			'view_items'            => __( 'View Feature Slides', 'foundationpress' ),
			'search_items'          => __( 'Feature Slide', 'foundationpress' ),
			'not_found'             => __( 'Not found', 'foundationpress' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'foundationpress' ),
			'featured_image'        => __( 'Slide Image', 'foundationpress' ),
			'set_featured_image'    => __( 'Set slide image', 'foundationpress' ),
			'remove_featured_image' => __( 'Remove slide image', 'foundationpress' ),
			'use_featured_image'    => __( 'Use as slide image', 'foundationpress' ),
			'insert_into_item'      => __( 'Insert into Feature Slide', 'foundationpress' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Feature Slide', 'foundationpress' ),
			'items_list'            => __( 'Feature Slides list', 'foundationpress' ),
			'items_list_navigation' => __( 'Feature Slides list navigation', 'foundationpress' ),
			'filter_items_list'     => __( 'Filter Feature Slides list', 'foundationpress' ),
		);
		$args = array(
			'label'                 => __( 'Feature Slide', 'foundationpress' ),
			'description'           => __( 'Feature slides for display on the front page.', 'foundationpress' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-slides',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'feature_slide', $args );

	}	

	/**
 	* Generated by the WordPress Meta Box generator
 	* at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 	*/

	function feature_slide_options_get_meta( $value ) {
		global $post;

		$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
	}

	add_action( 'add_meta_boxes', 'feature_slide_options_add_meta_box' );
	function feature_slide_options_add_meta_box() {
		add_meta_box(
			'feature_slide_options-feature-slide-options',
			__( 'Feature Slide Options', 'feature_slide_options' ),
			'feature_slide_options_html',
			'feature_slide',
			'normal',
			'default'
		);
	}
	
	function feature_slide_options_html( $post) {
		wp_nonce_field( '_feature_slide_options_nonce', 'feature_slide_options_nonce' ); ?>

		<p>Set these options and set a slide image to create your feature slide. <br> Images should be square, compressed via tinyPNG, and 600x600 or 640x640.</p>

		<table style="width:100%;">
			<thead>
				<tr>
					<th style="text-align:left;"><label for="feature_slide_options_is_this_a_quote_"><?php _e( 'Is this a quote?', 'feature_slide_options' ); ?></label></th>
					<th style="text-align:left;"><label for="feature_slide_options_lead_paragraph"><?php _e( 'Quote or Lead Text', 'feature_slide_options' ); ?></label></th>					
					<th style="text-align:left;"><label for="feature_slide_options_followup_paragraph"><?php _e( 'Author or Followup Text', 'feature_slide_options' ); ?></label></th>
					<th style="text-align:left;"><label for="feature_slide_options_call_to_action_label"><?php _e( 'Call to action Label', 'feature_slide_options' ); ?></label><br></th>
					<th style="text-align:left;"><label for="feature_slide_options_call_to_action_url"><?php _e( 'Call to action URL', 'feature_slide_options' ); ?></label></th>
				</tr>	
			</thead>
			<tbody>
				<tr style="min-height:140px;">
					<td style="vertical-align:top;"><input type="radio" name="feature_slide_options_is_this_a_quote_" id="feature_slide_options_is_this_a_quote__0" value="Yes" <?php echo ( feature_slide_options_get_meta( 'feature_slide_options_is_this_a_quote_' ) === 'Yes' ) ? 'checked' : ''; ?>><label for="feature_slide_options_is_this_a_quote__0">Yes</label><br><input type="radio" name="feature_slide_options_is_this_a_quote_" id="feature_slide_options_is_this_a_quote__1" value="No" <?php echo ( feature_slide_options_get_meta( 'feature_slide_options_is_this_a_quote_' ) === 'No' ) ? 'checked' : ''; ?>><label for="feature_slide_options_is_this_a_quote__1">No</label><br></td>
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="feature_slide_options_lead_paragraph" id="feature_slide_options_lead_paragraph" ><?php echo feature_slide_options_get_meta( 'feature_slide_options_lead_paragraph' ); ?></textarea></td>
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="feature_slide_options_followup_paragraph" id="feature_slide_options_followup_paragraph" ><?php echo feature_slide_options_get_meta( 'feature_slide_options_followup_paragraph' ); ?></textarea></td>
					<td style="vertical-align:top;"><input type="text" name="feature_slide_options_call_to_action_label" id="feature_slide_options_call_to_action_label" value="<?php echo feature_slide_options_get_meta( 'feature_slide_options_call_to_action_label' ); ?>"></td>
					<td style="vertical-align:top;"><input type="text" name="feature_slide_options_call_to_action_url" id="feature_slide_options_call_to_action_url" value="<?php echo feature_slide_options_get_meta( 'feature_slide_options_call_to_action_url' ); ?>"></td>
				</tr>
			</tbody>
		</table><?php
	}
	
	add_action( 'save_post', 'feature_slide_options_save' );
	function feature_slide_options_save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['feature_slide_options_nonce'] ) || ! wp_verify_nonce( $_POST['feature_slide_options_nonce'], '_feature_slide_options_nonce' ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['feature_slide_options_lead_paragraph'] ) )
			update_post_meta( $post_id, 'feature_slide_options_lead_paragraph', esc_attr( $_POST['feature_slide_options_lead_paragraph'] ) );
			if ( isset( $_POST['feature_slide_options_is_this_a_quote_'] ) )
		update_post_meta( $post_id, 'feature_slide_options_is_this_a_quote_', esc_attr( $_POST['feature_slide_options_is_this_a_quote_'] ) );
		if ( isset( $_POST['feature_slide_options_followup_paragraph'] ) )
			update_post_meta( $post_id, 'feature_slide_options_followup_paragraph', esc_attr( $_POST['feature_slide_options_followup_paragraph'] ) );
		if ( isset( $_POST['feature_slide_options_call_to_action_label'] ) )
			update_post_meta( $post_id, 'feature_slide_options_call_to_action_label', esc_attr( $_POST['feature_slide_options_call_to_action_label'] ) );
		if ( isset( $_POST['feature_slide_options_call_to_action_url'] ) )
			update_post_meta( $post_id, 'feature_slide_options_call_to_action_url', esc_url( $_POST['feature_slide_options_call_to_action_url'] ) );
	}
	

	/*
		Usage: feature_slide_options_get_meta( 'feature_slide_options_lead_paragraph' )
		Usage: feature_slide_options_get_meta( 'feature_slide_options_followup_paragraph' )
		Usage: feature_slide_options_get_meta( 'feature_slide_options_call_to_action_label' )
		Usage: feature_slide_options_get_meta( 'feature_slide_options_call_to_action_url' )
	*/

	add_action('add_meta_boxes', 'bp_feature_slide_toast_yoast', 100);
	function bp_feature_slide_toast_yoast() {
		remove_meta_box('wpseo_meta', 'feature_slide', 'normal');
	}
	
}

/**
 * Allows users to edit Front Page copy and layout from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */
if ( ! function_exists( 'bp_register_theme_customizer_front_page' ) ) {

	add_action( 'customize_register', 'bp_register_theme_customizer_front_page' );
	function bp_register_theme_customizer_front_page( $wp_customize ) {

		// Remove 'Homepage' section, it is confusing and unnecessary. 
		$wp_customize->remove_section( 'static_front_page' ); 

		// Create custom panel
		$wp_customize->add_panel(
			'front_page_settings', array(
				'priority'       => 1,
				'theme_supports' => '',
				'title'          => __( 'Front Page Settings', 'foundationpress' ),
				'description'    => __( 'Controls copy and design of the front page.', 'foundationpress' ),
			)
		);

		// Create custom section for the showcase
		$wp_customize->add_section(
			'front_page_showcase', array(
				'title'    => __( 'Showcase Section', 'foundationpress' ),
				'description' => __( 'Alter the appearance of the books showcase homepage.', 'foundationpress'),
				'panel'    => 'front_page_settings',
				'priority' => 1000,
			)
		);

		// Create and set default showcase lead copy setting
		$wp_customize->add_setting(
			'front_page_showcase_lead',
			array(
				'default' => __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ),
			)
		);

		// Add setting control for Showcase lead text
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'front_page_showcase_lead_control',
				array(
					'section'  => 'front_page_showcase',
					'label'	   => 'Lead copy to show on the homepage:',
					'settings' => 'front_page_showcase_lead',
					'type'     => 'textarea',
				)
			)
		);

		// Create and set default showcase books
		// Get Book IDs to populate selector
		$category_id = 'books';
		$books = get_posts( array(
			'post_type'   => 'product',
			'numberposts' => -1,
			'post_status' => 'publish',
			'tax_query'   => array( array(
					'taxonomy' => 'product_cat',
					'field' => 'name',
					'terms' => $category_id,
					'operator' => 'IN',
				) )
		) );
		
		$book_titles = array();
		$book_ids = array();

		foreach ($books as $book) {
			array_push($book_ids, $book->ID);
			array_push($book_titles, $book->post_title);
		}

		$book_choices = array_combine($book_ids, $book_titles);

		for ( $i = 0; $i < 6; $i++ ) {
			$wp_customize->add_setting(
				'front_page_showcase_books_' . $i,
				array(
					'default' => $books[$i]->ID,
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'front_page_showcase_books_control' . $i,
					array(
						'label'    => 'Showcase book ID #' . $i,
						'section'  => 'front_page_showcase',
						'settings' => 'front_page_showcase_books_' . $i,
						'type'     => 'select',
						'choices'  => $book_choices
					)
				)
			);
		}		
	}
}