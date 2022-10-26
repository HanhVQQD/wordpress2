<?php 
/**
 * Header 
 * 
 * @since Multi Store 1.0
 */
?>
<div class="multi-store-header-bottom multi-store-header-wrapper">
    <div class="multi-store-menu-wrapper multi-store-container">
        <div class="multi-store-product-menu-wrapper">
            <div class="multi-store-product-menu-text">
                <a href="#" class="multi-store-product-menu-toggler">
                    <?php $label = multi_store_get( 'header_product_menu_label' ); ?>
                    <span><i class="fa fa-bars"></i><?php echo esc_html( $label ); ?></span>
                </a>
            </div>
            <div class="multi-store-product-toggle-menu">
                <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'product-menu',
                        'echo'           => true,
                        'container'      => false,
                        'menu_id'        => 'product-menu',
                        'menu_class'     => 'navigation clearfix'
                    )); 
                ?>
            </div>
        </div>

        <nav class="multi-store-primary-menu" id="site-navigation">
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'echo'           => true,
                    'container'      => false,
                    'menu_id'        => 'primary',
                    'menu_class'     => 'navigation clearfix'
                )); 
            ?>
        </nav>
        <button class="menu-toggler" id="menu-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span class="screen-reader-text"><?php esc_html_e( 'menu toggler', 'multi-store' ); ?></span>
        </button>
    </div>
</div>