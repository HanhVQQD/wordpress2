<?php 
/**
 * Footer Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_footer_options' );
function multi_store_footer_options( $section ) {
    $section[ 'footer_options' ] = array(
        'title'    => esc_html__( 'Footer Options', 'multi-store' ),
        'priority' => 25,
        'fields'   => array(
            'footer_copyright' => array(
                'label'   => esc_html__( 'Copyright Text', 'multi-store' ),
                'type'    => 'textarea',
                'default' => esc_html__( 'Copyright &copy; All right reserved', 'multi-store' ),
                'partial' => array(
                    'selector' => '.multi-store-footer-copyright-text'
                )
            )
        )
    );
    return $section;
}