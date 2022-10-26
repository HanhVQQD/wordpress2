<?php
/**
* Reset Options
* @since Multi Store 1.0
*/
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_theme_reset_options' );
function multi_store_theme_reset_options( $section ) {
    $section[ 'theme_reset_options' ] = array(
        'title'    => esc_html__( 'Reset', 'multi-store' ),
        'priority' => 100,
        'fields'   => array(
            'customizer-reset' => array(
                'type'        => 'custom',
                'description' => esc_html__( 'Reseting will delete all the data. Once reset, you will not be able to get back those data.', 'multi-store' ),
                'default'     => sprintf( '<button class="multi-store-reset-customizer" data-nonce="%s" data-msg="%s"
                    style="background: #2271b1;border-color: #2271b1;color: #fff;text-decoration: none;text-shadow: none;padding: 5px 10px;border-radius: 4px;border:none;cursor:pointer;">
                        <span class="dashicons dashicons-image-rotate" style="margin-right: 6px;font-size: 15px;padding-top: 2px;"></span>%s
                    </button>',
                    wp_create_nonce( 'multi-store-reset-nonce' ),
                    esc_html__( 'Are You Sure To Reset?', 'multi-store' ),
                    esc_html__( 'Reset', 'multi-store' )
                )
            )
        )
    );
    return $section;
}