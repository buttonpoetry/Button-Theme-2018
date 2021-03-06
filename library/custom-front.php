<?php
/**
 * Allows users to edit Front Page copy and layout from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.1.0
 */

 /**
 * Adds 'bp_feature_slide' post type to populate front page slider with content.
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
		register_post_type( 'bp_feature_slide', $args );

	}	

	/**
	 * Additionally, generate a metabox for the post type.
 	 * Generated by the WordPress Meta Box generator
 	 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
	  */
	
	/*
		Usage: bp_feature_slide_options_get_meta( 'bp_feature_slide_options_lead' )
		Usage: bp_feature_slide_options_get_meta( 'bp_feature_slide_options_followup' )
		Usage: bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_label' )
		Usage: bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_url' )
	*/
	function bp_feature_slide_options_get_meta( $value ) {
		global $post;

		$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
	}

	add_action( 'add_meta_boxes', 'bp_feature_slide_options_add_meta_box' );
	function bp_feature_slide_options_add_meta_box() {
		add_meta_box(
			'bp_feature_slide_options-feature-slide-options',
			__( 'Feature Slide Options', 'bp_feature_slide_options' ),
			'bp_feature_slide_options_html',
			'bp_feature_slide',
			'normal',
			'default'
		);
	}
	
	function bp_feature_slide_options_html( $post) {
		wp_nonce_field( '_bp_feature_slide_options_nonce', 'bp_feature_slide_options_nonce' ); ?>

		<p>Set these options and set a slide image to create your feature slide. <br> Images should be square, compressed via tinyPNG, and minimum 720x720. 1440x1440 for crisp text/sharp graphics is preferred for Retina/4X/UHD displays.</p>

		<table style="width:100%;">
			<thead>
				<tr>
					<th style="text-align:left;"><label for="bp_feature_slide_options_is_quote"><?php _e( 'Is this a quote?', 'bp_feature_slide_options' ); ?></label></th>
					<th style="text-align:left;"><label for="bp_feature_slide_options_lead"><?php _e( 'Quote or Lead Text', 'bp_feature_slide_options' ); ?></label></th>					
					<th style="text-align:left;"><label for="bp_feature_slide_options_followup"><?php _e( 'Author or Followup Text', 'bp_feature_slide_options' ); ?></label></th>
					<th style="text-align:left;"><label for="bp_feature_slide_options_call_to_action_label"><?php _e( 'Call to action Label', 'bp_feature_slide_options' ); ?></label><br></th>
					<th style="text-align:left;"><label for="bp_feature_slide_options_call_to_action_url"><?php _e( 'Call to action URL', 'bp_feature_slide_options' ); ?></label></th>
					<th style="text-align:left;"><label for="bp_feature_slide_options_is_enabled"><?php _e( 'Enable?', 'bp_feature_slide_options' ); ?></label></th>
				</tr>	
			</thead>
			<tbody>
				<tr style="min-height:140px;">
					<td style="vertical-align:top;"><input type="radio" name="bp_feature_slide_options_is_quote" id="bp_feature_slide_options_is_quote_0" value="Yes" <?php echo ( bp_feature_slide_options_get_meta( 'bp_feature_slide_options_is_quote' ) === 'Yes' ) ? 'checked' : ''; ?>><label for="bp_feature_slide_options_is_quote_0">Yes</label><br><input type="radio" name="bp_feature_slide_options_is_quote" id="bp_feature_slide_options_is_quote_1" value="No" <?php echo ( bp_feature_slide_options_get_meta( 'bp_feature_slide_options_is_quote' ) === 'No' ) ? 'checked' : ''; ?>><label for="bp_feature_slide_options_is_quote_1">No</label><br></td>
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="bp_feature_slide_options_lead" id="bp_feature_slide_options_lead" ><?php echo bp_feature_slide_options_get_meta( 'bp_feature_slide_options_lead' ); ?></textarea></td>
					<td style="vertical-align:top;"><textarea style="resize:yes;width:100%;" name="bp_feature_slide_options_followup" id="bp_feature_slide_options_followup" ><?php echo bp_feature_slide_options_get_meta( 'bp_feature_slide_options_followup' ); ?></textarea></td>
					<td style="vertical-align:top;"><input type="text" name="bp_feature_slide_options_call_to_action_label" id="bp_feature_slide_options_call_to_action_label" value="<?php echo bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_label' ); ?>"></td>
					<td style="vertical-align:top;"><input type="text" name="bp_feature_slide_options_call_to_action_url" id="bp_feature_slide_options_call_to_action_url" value="<?php echo bp_feature_slide_options_get_meta( 'bp_feature_slide_options_call_to_action_url' ); ?>"></td>
					<td style="vertical-align:top;"><input type="radio" name="bp_feature_slide_options_is_enabled" id="bp_feature_slide_options_is_enabled_0" value="Yes" <?php echo ( bp_feature_slide_options_get_meta( 'bp_feature_slide_options_is_enabled' ) === 'Yes' ) ? 'checked' : ''; ?>><label for="bp_feature_slide_options_is_enabled_0">Yes</label><br><input type="radio" name="bp_feature_slide_options_is_enabled" id="bp_feature_slide_options_is_enabled_1" value="No" <?php echo ( bp_feature_slide_options_get_meta( 'bp_feature_slide_options_is_enabled' ) === 'No' ) ? 'checked' : ''; ?>><label for="bp_feature_slide_options_is_enabled_1">No</label><br></td>
				</tr>
			</tbody>
		</table><?php
	}
	
	add_action( 'save_post', 'bp_feature_slide_options_save' );
	function bp_feature_slide_options_save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['bp_feature_slide_options_nonce'] ) || ! wp_verify_nonce( $_POST['bp_feature_slide_options_nonce'], '_bp_feature_slide_options_nonce' ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['bp_feature_slide_options_lead'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_lead', esc_attr( $_POST['bp_feature_slide_options_lead'] ) );
		if ( isset( $_POST['bp_feature_slide_options_is_quote'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_is_quote', esc_attr( $_POST['bp_feature_slide_options_is_quote'] ) );
		if ( isset( $_POST['bp_feature_slide_options_followup'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_followup', esc_attr( $_POST['bp_feature_slide_options_followup'] ) );
		if ( isset( $_POST['bp_feature_slide_options_call_to_action_label'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_call_to_action_label', esc_attr( $_POST['bp_feature_slide_options_call_to_action_label'] ) );
		if ( isset( $_POST['bp_feature_slide_options_call_to_action_url'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_call_to_action_url', esc_url( $_POST['bp_feature_slide_options_call_to_action_url'] ) );
		if ( isset( $_POST['bp_feature_slide_options_is_enabled'] ) )
			update_post_meta( $post_id, 'bp_feature_slide_options_is_enabled', esc_attr( $_POST['bp_feature_slide_options_is_enabled'] ) );
	}
	
	add_action('add_meta_boxes', 'bp_feature_slide_toast_yoast', 100);
	function bp_feature_slide_toast_yoast() {
		remove_meta_box('wpseo_meta', 'bp_feature_slide', 'normal');
	}

	/* Add 'Enabled' as a filterable column */
	add_filter('manage_bp_feature_slide_posts_columns', 'bp_feature_slide_column_register');
	function bp_feature_slide_column_register($defaults) {
    	$defaults['bp_fs_col_enabled'] = 'Enabled';
    	return $defaults;
	}

	add_filter('manage_edit-bp_feature_slide_sortable_columns', 'bp_feature_slide_column_makesortable' );
	function bp_feature_slide_column_makesortable($defaults) {
    	$defaults['bp_fs_col_enabled'] = 'bp_feature_slide_options_is_enabled';
    	return $defaults;
	}

	add_action('manage_bp_feature_slide_posts_custom_column', 'bp_feature_slide_column_content', 10, 2);
	function bp_feature_slide_column_content( $column_name, $post_ID ) {
		if ($column_name == 'bp_fs_col_enabled') {
			if( bp_feature_slide_options_get_meta("bp_feature_slide_options_is_enabled") == "Yes") {
				echo '<span class="dashicons dashicons-yes-alt" style="color:green"></span>';
			}
			else {
				echo '<span class="dashicons dashicons-no"></span>';				
			}
		}   
	}

	add_action( 'pre_get_posts', 'bp_feature_slide_column_sortlogic', 1 );
	function bp_feature_slide_column_sortlogic( $query ) {
		/**
		* We only want our code to run in the main WP query
		* AND if an orderby query variable is designated.
		*/
		if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
			switch( $orderby ) {
				// If we're ordering by 'film_rating'
				case 'bp_feature_slide_options_is_enabled':
					// set our query's meta_key, which is used for custom fields
					$query->set( 'meta_key', 'bp_feature_slide_options_is_enabled' );
					/**
					 * Tell the query to order by our custom field/meta_key's
					 * value, in this film rating's case: PG, PG-13, R, etc.
					 *
					 * If your meta value are numbers, change 'meta_value'
					 * to 'meta_value_num'.
					 */
					if($query->get( 'order' ) == 'asc') { $meta_order = 'desc'; }
					else { $meta_order = 'asc'; }
					$query->set( 'orderby', array('meta_value' => $meta_order, 'post_date' => 'desc', ));
					break;
			}
		}
	}
}

/**
 * Allows users to edit Front Page copy and layout from the Customizer.
 * 
 * @package ButtonTheme
 * @since ButtonTheme 0.2.0
 */
if ( ! function_exists( 'bp_showcase_default_books' ) ) {
	function bp_showcase_default_books() {
	return array(
		30250, // Helium
		43902, // Nothing Is Okay            
		55330, // Lord of the Butterflies
		53666, // Date & Time
		35546, // The Future
		26167 // Depression & Other Magic Tricks
		);
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

		// Remove 'Homepage' and 'Themes' sections, they are confusing and unnecessary. 
		$wp_customize->remove_section( 'static_front_page' ); 
		$wp_customize->remove_panel( 'themes' );

		// Create Front Page Settings panel
		$wp_customize->add_panel(
			'front_page_settings', array(
				'priority'       => 1,
				'theme_supports' => '',
				'title'          => __( 'Front Page Settings', 'foundationpress' ),
				'description'    => __( 'Controls copy and design of the front page.', 'foundationpress' ),
			)
		);

		// Create Showcase section
		$wp_customize->add_section(
			'front_page_showcase', array(
				'title'    => __( 'Showcase Section', 'foundationpress' ),
				'description' => __( 'Alter the appearance of the books showcase homepage.', 'foundationpress'),
				'panel'    => 'front_page_settings',
				'priority' => 1000,
			)
		);

		// Create and set default showcase lead copy & positioning settings
		$wp_customize->add_setting(
			'front_page_showcase_lead',
			array(
				'default' => __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ),
			)
		);
		$wp_customize->add_setting(
			'front_page_showcase_lead_small',
			array(
				'default' => __( 'Showcasing diverse voices because poetry is for everyone.', 'foundationpress' ),
			)
		);
		$wp_customize->add_setting(
			'front_page_top_section',
			array(
				'default' => 'Showcase',
			)
		);

		// Add setting control for Showcase lead text & positioning
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
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'front_page_showcase_lead_small_control',
				array(
					'section'  => 'front_page_showcase',
					'label'	   => 'Shorter Lead copy to show on smaller screens:',
					'settings' => 'front_page_showcase_lead_small',
					'type'     => 'textarea',
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'front_page_top_section_control',
				array(
					'section'  => 'front_page_showcase',
					'label'	   => 'Top section of homepage:',
					'settings' => 'front_page_top_section',
					'type'     => 'radio',
					'choices'  => array( 
						'Showcase' => 'Showcase',
						'Featured' => 'Featured'
						)						
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
		$default_book_ids = bp_showcase_default_books();

		for ( $i = 0; $i < 6; $i++ ) {
			$wp_customize->add_setting(
				'front_page_showcase_books_' . $i,
				array(
					'default' => $default_book_ids[$i],
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
