<?php
/**
 * Allows users to edit Front Page copy and layout from the Customizer.
 * 
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'bp_register_theme_customizer_front_page' ) ) :
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
					'default' => $books[i]->ID,
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

	add_action( 'customize_register', 'bp_register_theme_customizer_front_page' );
endif;