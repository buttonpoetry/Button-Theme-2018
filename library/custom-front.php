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
			'bp_front_page_showcase_lead',
			array(
				'default' => __( 'We showcase the power and diversity of voices in our community because we believe that poetry is for everyone.', 'foundationpress' ),
			)
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'front_page_showcase',
				array(
					'type'     => 'textarea',
					'section'  => 'front_page_showcase',
					'settings' => 'bp_front_page_showcase_lead'
				)
			)
		);
	}

	add_action( 'customize_register', 'bp_register_theme_customizer_front_page' );
endif;