<?php 
/**
 * Footer
 * 
 * @since Multi Store 1.0 
 */
?>
<div class="multi-store-container">
    <div class="multi-store-footer-copyright-text">
        <?php echo multi_store_get( 'footer_copyright', 'multi-store' ); ?>
    </div>
    <div class="multi-store-footer-credit">
        <a href="<?php echo esc_url( '//eaglevisionit.com/product-downloads/multi-store/' ); ?>" target="_blank">
            <?php esc_html_e( 'Multi Store', 'multi-store' ); ?>
        </a>
        <?php esc_html_e( 'Theme By ' , 'multi-store' ); ?>
        <a href="<?php echo esc_url( '//www.eaglevisionit.com' ); ?>" target="_blank">
            <?php echo esc_html( 'Eaglevision IT' ); ?>
        </a>
    </div>
</div>