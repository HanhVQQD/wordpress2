<?php
/**
 * General Middle Options
 *
 * @since Multi Store1.0
 */
add_filter( 'multi_store_customizer_header_panel', 'multi_store_middle_header_options' );
function multi_store_middle_header_options( $section ) {

    $section[ 'title_tagline' ] = array(
        'title'    => esc_html__( 'Site Identity', 'multi-store' ),
        'priority' => 1,
        'fields'   => array(
            'logo-size' => array(
                'label'   => esc_html__( 'Logo Size', 'multi-store' ),
                'type'    => 'slider',
                'default' => '180',
                'choices' => array(
                    'min'  => 0,
                    'max'  => 500,
                    'step' => 1
                ),
                'output' => array(
                    array(
                        'element'  => '.multi-store-header-wrapper .multi-store-header .multi-store-site-branding img',
                        'property' => 'max-width',
                        'units'    => 'px'
                    )
                )
            )
        )
    );

	$section[ 'header_middle_options' ] = array(
        'title'  => esc_html__( 'Middle', 'multi-store' ),
        'fields' => array(
            'header_middle_phone' => array(
                'label'   => esc_html__( 'Phone Number', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( '01-1234567', 'multi-store' )
            ),
            'header_middle_phone_text' => array(
                'label'   => esc_html__( 'Phone Text', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'CALL US', 'multi-store' )
            ),
            
            'header_middle_bg_color' => array(
                'label'   => esc_html__( 'Background', 'multi-store' ),
                'type'    => 'color',
                'default' => '#fff',
                'choices' => array(
					'alpha' => true
				),
                'output' => array(
                    array(
                        'element'  => '.multi-store-header-wrapper',
                        'property' => 'background-color'
                    ),
                    array(
                        'element'  => '.multi-store-header-wrapper a.cart-icon .count',
                        'property' => 'color'
                    )
                ),
            )
        ),
    );

	return $section;
}