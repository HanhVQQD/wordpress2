<?php
/**
 * Popular Product Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_frontpage_panel', 'multi_store_frontpage_product_options' );
function multi_store_frontpage_product_options( $section ) {
	$section[ 'multi_store_customizer_frontpage_popular_product' ] = array(
        'title'  => esc_html__( 'Popular Product', 'multi-store' ),
        'fields' => array(
            'frontpage_product_title' => array(
                'label'   => esc_html__( 'Title', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'Best Selling Products', 'multi-store' )
            ),
            'frontpage_product_sub_title' => array(
                'label'   => esc_html__( 'Sub Title', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'Eleifend pharetra, sagittis voluptate.', 'multi-store' )
            ),
            'frontpage_product_limit' => array(
                'label'   => esc_html__( 'Limit', 'multi-store' ),
                'type'    => 'number',
                'default' => 8
            ),
            'frontpage_product_type' => array(
                'label'   => esc_html__( 'Product Type', 'multi-store' ),
                'type'    => 'select',
                'choices' => array(
                    'newest'       => esc_html__( 'Newest', 'multi-store' ),
                    'featured'     => esc_html__( 'Featured', 'multi-store' ),
                    'best-selling' => esc_html__( 'Best Selling', 'multi-store' )
                ),
                'default' => 'newest'
            )
        ),
    );

	return $section;
}