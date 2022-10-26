<?php
/**
 * General Middle Options
 *
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_header_panel', 'multi_store_bottom_header_options' );
function multi_store_bottom_header_options( $section ) {
	$section[ 'header_bottom_options' ] = array(
        'title'  => esc_html__( 'Bottom', 'multi-store' ),
        'fields' => array(
            'header_product_menu' => array(
                'label'   => esc_html__( 'Show Product Menu In Front Page.', 'multi-store' ),
                'type'    => 'toggle',
                'default' => false
            ),
            'header_product_menu_label' => array(
                'label'   => esc_html__( 'Product Menu Label', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'Products', 'multi-store' )
            ),
            'header_bottom_bg_color' => array(
                'label'   => esc_html__( 'Background', 'multi-store' ),
                'type'    => 'color',
                'default' => '#fff',
                'choices' => array(
					'alpha' => true, 
				),
                'output' => array(
                    array(
                        'element'  => '.multi-store-header-bottom.multi-store-header-wrapper',
                        'property' => 'background-color',
                    ),
                    array(
                        'element'  => 'nav.multi-store-primary-menu > ul > li .sub-menu',
                        'property' => 'background-color',
                    )
                )
            ),
            'header_bottom_primary_color' => array(
                'label'   => esc_html__( 'Text Color', 'multi-store' ),
                'type'    => 'color',
                'default' => '#000',
                'choices' => array(
                    'alpha' => true
                ),
                'output' => array(
                    array(
                        'element'  => '.multi-store-product-menu-wrapper',
                        'property' => 'background-color'
                    ),
                    array(
                        'element' => '.multi-store-header-wrapper nav > ul > li a, nav.multi-store-primary-menu > ul > li .sub-menu li a',
                        'property' => 'color'
                    )
                )
            )
        ),
    );

	return $section;
}