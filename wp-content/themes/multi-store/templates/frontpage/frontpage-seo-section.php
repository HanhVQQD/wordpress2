<?php 
/**
 * About section
 * 
 * @since 1.0
 */ 
$id = multi_store_get( 'about_page' );
if( $id > 0 ):
    $page = get_post( $id );
?>
<div class="multi-store-seo-section-wrapper">
    <div class="multi-store-container">
        <div class="multi-store-seo-inner">
            <div class="seo-section-left">
                <h2><?php echo esc_html( $page->post_title ); ?></h2>
                <?php echo esc_html( $page->post_excerpt ); ?>
            </div>
            <div class="seo-section-right">
                <?php echo get_the_post_thumbnail( $id ); ?>
            </div>
        </div>        
    </div>
</div>
<?php wp_reset_postdata(); endif;