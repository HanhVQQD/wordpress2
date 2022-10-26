<?php
/**
* General Theme Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_color_options' );
function multi_store_color_options( $section ) {
    $section[ 'colors' ] = array(
        'title'    => esc_html__( 'Colors', 'multi-store' ),
        'priority' => 5,
        'fields'   => array(
            'primary_color' => array(
                'label'   => esc_html__( 'Primary Color', 'multi-store' ),
                'type'    => 'color',
                'default' => '#f94d1c',
                'output'  => array(
                    array(
                        'element' => '.multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-title a:hover,
                            .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-excerpt .multi-store-site-button a:hover, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-meta .multi-store-author-wrapper .multi-store-author-link:hover, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-meta .posted-on a:hover, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-meta .multi-store-comments a:hover, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-excerpt .multi-store-site-button a:hover, aside#secondary ul li a:hover, .multi-store-footer-copyright > div > div a:hover,.multi-store-nav-wrapper > div a:hover, .multi-store-breadcrumb-wrapper ul li a:hover, .multi-store-widget-area ul li a:hover, .comment-respond .comment-reply-title a:hover, .comment-respond .logged-in-as a:hover, a:hover, a:active, aside#secondary ul li .wp-block-latest-posts__post-excerpt .multi-store-site-button > a:hover, .multi-store-top-bar .multi-store-top-bar-info ul li a:hover, a:focus,
                            .multi-store-product-menu-wrapper .multi-store-product-toggle-menu ul li:before,
                            .multi-store-header-phone a span,
                            .single-product .stars a, .single-product .star-rating span::before,
                            .woocommerce ul.products li.product .star-rating,
                            .multi-store-header-wrapper .multi-store-header .multi-store-site-branding .site-title a:hover,
                            .single-product .product .entry-summary .product_meta > span a,.single-product .product .entry-summary .star-rating span::before, .single-product .product .entry-summary a.woocommerce-review-link
                            ',
                        'property'  => 'color'
                    ),
                    array(
                        'element'  => '.multi-store-footer-copyright > div > div a:hover',
                        'property' => 'color',
                        'suffix'   => '!important'
                    ),
                    array(
                        'element' => '.multi-store-scroll-top, .multi-store-content-wrapper main.site-main .multi-store-content-post .multi-store-content .multi-store-post-category ul li a, .multi-store-comment-wrapper form#commentform input#submit, .wp-block-search__inside-wrapper .wp-block-search__button, 
                            .multi-store-404-wrapper .search-form button.search-submit, 
                            .multi-store-404-wrapper a.btn.multi-store-404-home-btn, .multi-store-no-results.not-found .search-form button.search-submit, .multi-store-no-results.not-found a.multi-store-btn-primary, .multi-store-tag-wrapper .multi-store-tags-wrapper a, .multi-store-banner-wrapper .multi-store-banner-content-inner .multi-store-banner-content .search-form button.search-submit, .multi-store-page-navigation a, .multi-store-page-navigation span,

                            .woocommerce ul.products li.product .button, .woocommerce ul.products li.product .added_to_cart.wc-forward,
                            .woocommerce ul.products li.product .onsale,
                             .multi-store-woocommerce-mini-cart .multi-store-mini-cart-btn .multi-store-goto-checkout,
                            .multi-store-home-banner-wrapper .multi-store-hero-meta a,
                            .multi-store-home-banner-wrapper h1:after,

                            .multi-store-header-wrapper a.cart-icon .count,
                            .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,

                            .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,

                            form.woocommerce-checkout div#order_review #payment button#place_order,

                            .multi-store-popular-category-wrapper .multi-store-popular-category-inner .multi-store-popular-category-meta .readmore:hover,
                            .single-product .product .onsale,
                            .multi-store-popular-category-wrapper .multi-store-popular-category-inner .multi-store-popular-category-meta .readmore:focus,
                            
                            .single-product .product .entry-summary button.button,
                            .multi-store-no-results.not-found a

                            ',
                        'property' => 'background'
                    ),
                    array(
                        'element'  => '.multi-store-popular-category-wrapper .multi-store-popular-category-inner .multi-store-popular-category-meta .readmore:hover',
                        'property' => 'border-color'
                    )
                )
            ),
            'body_text_color' => array(
                'label'   => esc_html__( 'Body Text Color', 'multi-store' ),
                'type'    => 'color',
                'default' => '#000000',
                'output'  => array(
                    array(
                        'element'  => 'body, p',
                        'property' => 'color'
                    ),
                )
            ),
            'heading_text_color' => array(
                'label'   => esc_html__( 'Heading Text Color ( H1 - H6 )', 'multi-store' ),
                'type'    => 'color',
                'default' => '#000000',
                'output'  => array(
                    array(
                        'element'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
                        'property' => 'color'
                    )
                )
            ),
            'footer_color' => array(
                'label'   => esc_html__( 'Footer Background Color', 'multi-store' ),
                'type'    => 'color',
                'default' => '#000000',
                'output'  => array(
                    array(
                        'element'  => '.multi-store-footer-copyright, .multi-store-footer-area-wrapper',
                        'property' => 'background-color'
                    )
                )
            )
        )
    );

    return $section;
}