<?php 
/**
 * Header
 * 
 * @since Multi Store 1.0 
 */
?>
<div class="multi-store-header-wrapper">
    <div class="multi-store-container">
        <div class="multi-store-header">
            <div class="multi-store-site-branding">
                <div>
                    <?php the_custom_logo(); ?>
                    <div class="<?php echo !display_header_text() ? 'screen-reader-text' : ''; ?>">
                        <?php if ( is_front_page() ) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>                                    
                                </a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>                                    
                                </a>
                            </p>
                        <?php endif; ?>
                        <?php $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description">
                                <?php echo esc_html( $description ); ?>                             
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="multi-store-header-right">
                <div class="multi-store-header-search-container">
                    <?php get_search_form(); ?>
                </div>

                <div class="multi-store-header-phone">
                    <?php 
                        $phone = multi_store_get( 'header_middle_phone' );
                        $text  = multi_store_get( 'header_middle_phone_text' );
                    ?>
                    <a href="tel:<?php echo esc_attr( $phone ); ?>">
                        <i class="fa fa-phone"></i>
                        <span><span><?php echo esc_html( $text ); ?></span><?php echo esc_html( $phone ); ?></span>
                    </a>
                </div>
                <?php if( Multi_Store_Helper::is_active_plugin( 'woocommerce' ) ): ?>
                    <div class="multi-store-cart-icon-container">
                        <?php 
                            $link  = multi_store_wc()->get_cart_url();
                            $count = multi_store_wc()->get_cart_total();
                        ?>
                        <a href="<?php echo esc_url( $link ); ?>" class="cart-icon mini-cart-toggler">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="count"><?php echo ( $count > 0 ) ? esc_html( $count ) : 0; ?></span>
                            <span class="cart-text"><?php esc_html_e( 'Cart', 'multi-store' ); ?> </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>