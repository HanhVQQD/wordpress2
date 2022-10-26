<?php 
/**
 * Footer Widgets
 * 
 * @since Multi Store 1.0 
 */
if( is_active_sidebar( 'multi_store_footer' ) ) : ?>
    <div class="multi-store-footer-area-wrapper">
        <div class="multi-store-container">
            <div class="multi-store-widget-area">
                <div class="col multi-store-widget-wrapper py-5">
                    <?php dynamic_sidebar( 'multi_store_footer' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; 