<?php
/**
* Theme Typography Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_theme_typography_options' );
function multi_store_theme_typography_options( $section ) {
    $section['theme_options'] = array(
        'title'    => esc_html__( 'Theme Typography', 'multi-store' ),
        'priority' => 11,
        'fields'   => array(
            'general_typography_options' => array(
                'label'   => esc_html__( 'General Typography ', 'multi-store' ),
                'type'    => 'typography',
                'choices' => array( 
                    'fonts' => Multi_Store_Helper::theme_google_font()
                ),
                'default' => array(
                    'font-family'    => 'Poppins',
                    'variant'        => 'regular',
                    'font-style'     => 'normal',
                    'text-transform' => 'none',
                    'font-size'      => '14px',
                    'line-height'    => '1.5',
                    'letter-spacing' => '0'
                ),
                'output'    => array(
                    array(
                        'element' => 'body, .multi-store-header-wrapper nav > ul > li a, .multi-store-header-wrapper .navigation > ul > li a, .multi-store-product-menu-wrapper .multi-store-product-toggle-menu ul li a'
                    )
                )
            ),
            'heading_typography_options' => array(
                'label'   => esc_html__( 'Heading Typography (H1-H6)', 'multi-store' ),
                'type'    => 'typography',
                'choices' => array( 
                    'fonts' => Multi_Store_Helper::theme_google_font()
                ),
                'default' => array(
                    'font-family'    => 'Poppins',
                    'variant'        => 'regular',
                    'text-transform' => 'none',
                    'font-style'     => 'normal',
                    'line-height'    => '1.5',
                    'letter-spacing' => '0'
                ),
                'output' => array(
                    array(
                        'element' => '.multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-title a, 
                        h1, h2, h3, h4, h5, h6, .entry-title, .multi-store-breadcrumb-wrapper ul, .multi-store-comment-wrapper form#commentform input#submit,
                        aside#secondary ul li a, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-excerpt .multi-store-site-button a
                        .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-meta .multi-store-author-wrapper .multi-store-author-link,
                        time.entry-date.published, .multi-store-site-button a, a.multi-store-author-link,
                        .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-title,
                        aside#secondary section .wp-block-search .wp-block-search__label'
                    )
                )
            )
        )
    );
    return $section;
}