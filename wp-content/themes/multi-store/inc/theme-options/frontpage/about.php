<?php
/**
 * About section Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_frontpage_panel', 'multi_store_frontpage_about_options' );
function multi_store_frontpage_about_options( $section ) {
	$section[ 'multi_store_customizer_frontpage_about' ] = array(
        'title'  => esc_html__( 'About', 'multi-store' ),
        'fields' => array(
            'about_page' => array(
                'label' => esc_html__( 'Select a About Page', 'multi-store' ),
                'type'  => 'dropdown-pages'
            )
        ),
    );

	return $section;
}