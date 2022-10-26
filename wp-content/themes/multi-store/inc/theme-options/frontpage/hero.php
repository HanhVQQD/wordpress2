<?php
/**
 * Hero section Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_frontpage_panel', 'multi_store_frontpage_hero_options' );
function multi_store_frontpage_hero_options( $section ) {
	$section[ 'multi_store_customizer_frontpage_hero' ] = array(
        'title'  => esc_html__( 'Hero', 'multi-store' ),
        'fields' => array(
            'hero_page' => array(
                'label' => esc_html__( 'Select a hero page', 'multi-store' ),
                'type'  => 'dropdown-pages'
            ),
            'hero_button' => array(
                'label'   => esc_html__( 'Button Text', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'Shop Now', 'multi-store' )
            )
        ),
    );

	return $section;
}