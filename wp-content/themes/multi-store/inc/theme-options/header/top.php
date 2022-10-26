<?php 
/**
 * Top Header Options
 * 
 * @since 1.0
 * @package Multi Store WordPress Theme
 */
add_filter( 'multi_store_customizer_header_panel', 'multi_store_top_header_options' );
function multi_store_top_header_options( $section ) {
    $section[ 'header_usp_options' ] = array(
        'title'    => esc_html__( 'Top', 'multi-store' ),
        'priority' => 10,
        'fields'   => array(
            'header_top_enable' => array(
                'label' => esc_html__( 'Enable', 'multi-store' ),
                'type'  => 'toggle'
            ),
            'usp_1' => array(
                'label'   => esc_html__( 'USP 1', 'multi-store' ),
                'type'    => 'dropdown-pages',
                'choices' => array(
                    '0' => esc_html__( 'Select a page', 'multi-store' )
                )
            ),
            'usp_2' => array(
                'label'   => esc_html__( 'USP 2', 'multi-store' ),
                'type'    => 'dropdown-pages',
                'choices' => array(
                    '0' => esc_html__( 'Select a page', 'multi-store' )
                )
            ),
            'usp_3' => array(
                'label'   => esc_html__( 'USP 3', 'multi-store' ),
                'type'    => 'dropdown-pages',
                'choices' => array(
                    '0' => esc_html__( 'Select a page', 'multi-store' )
                )
            ),
            'header_top_bg_color'   => array(
                'label'   => esc_html__( 'Background', 'multi-store' ),
                'type'    => 'color',
                'default' => '#f5f5f5',
                'choices' => array(
					'alpha' => true
				),
                'output' => array(
                    array(
                        'element'  => '.multi-store-usp-container',
                        'property' => 'background-color'
                    ),
                ),
                'active_callback' => array(
                    array(
                        'setting'  => 'usp_enable',
                        'operator' => '==',
                        'value'    => true,
                    ),
                ),
            ),
            'header_top_primary_color'   => array(
                'label'   => esc_html__( 'Text Color', 'multi-store' ),
                'type'    => 'color',
                'default' => '#000000',
                'choices' => array(
					'alpha' => true, 
				),
                'output' => array(
                    array(
                        'element' => '.multi-store-usp-container, .multi-store-usp-container a, .multi-store-usp-container .multi-store-usp-inner .multi-store-usp-items li i',
                        'property' => 'color'
                    )
                ),
                'active_callback' => array(
                    array(
                        'setting'  => 'usp_enable',
                        'operator' => '==',
                        'value'    => true
                    ),
                ),
            ),
        ),
    );
    return $section;
}