<?php
/**
* General Theme Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_general_theme_options' );
function multi_store_general_theme_options( $section ) {

    $section['general-options'] = array(
        'title'    => esc_html__( 'General Options', 'multi-store' ),
        'priority' => 10,
        'fields'   => array(
            'assets-version' => array(
                'label' => esc_html__( 'Assets Version', 'multi-store' ),
                'type'  => 'radio-buttonset',
                'choices' => array(
                    'minified'   => esc_html__( 'Minified', 'multi-store' ),
                    'unminified' => esc_html__( 'Unminified', 'multi-store' )
                ),
                'default' => 'unminified'
            ),
            'layout' => array(
                'label'   => esc_html__( 'Layout', 'multi-store' ),
                'type'    => 'radio-buttonset',
                'default' => 'custom',
                'choices' => array(
                    'boxed'  => esc_html__( 'Boxed', 'multi-store' ),
                    'custom' => esc_html__( 'Custom', 'multi-store' )
                ),
            ),
            'container_width' => array(
                'label'   => esc_html__( 'Container Width', 'multi-store' ),
                'type'    => 'slider',
                'default' => 1340,                
                'choices' => array(
                    'min'  => 0,
                    'max'  => 2000,
                    'step' => 1
                ),
                'active_callback' => array(
                    array(
                        'setting'  => 'layout',
                        'operator' => '==',
                        'value'    => 'custom',
                    ),
                ),
                'output' => array(
                    array(
                        'element'  => '.multi-store-container',
                        'property' => 'max-width',
                        'units'    => 'px'
                    )
                )
            ),
            'enable_banner_single_page' => array(
                'label'   => esc_html__( 'Enable Banner in Single Pages', 'multi-store' ),
                'type'    => 'toggle',
                'default' => true
            ),
            'enable_banner_archive_page' => array(
                'label'   => esc_html__( 'Enable Banner in Archive Pages', 'multi-store' ),
                'type'    => 'toggle',
                'default' => true
            ),
            'scroll_to_top' => array(
                'label'   => esc_html__( 'Scroll To Top', 'multi-store' ),
                'type'    => 'toggle',
                'default' => true
            ),  
            'sidebar_position' => array(
                'label'   => esc_html__( 'Sidebar Position' , 'multi-store' ),
                'type'    => 'radio-buttonset',
                'default' => 'right',
                'choices' => array(
                    'left'  => esc_html__( 'Left', 'multi-store' ),
                    'right' => esc_html__( 'Right', 'multi-store' ),
                    'hide'  => esc_html__( 'Hide', 'multi-store' )
                )
            )
        )
    );

    return $section;
}