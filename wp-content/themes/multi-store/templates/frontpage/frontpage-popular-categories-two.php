<?php 
/**
 * Popular categories 
 * 
 * @since Multi Store 1.0
 */
$keys = array( 'product_category_two_1', 'product_category_two_2', 'product_category_two_3' );
$btn_text = multi_store_get( 'product_category_two_button_text' );
?>
<div class="multi-store-container">
    <div class="multi-store-popular-category-wrapper">
        <?php 
            foreach( $keys as $key ){
                $term_id = multi_store_get( $key );
                if( $term_id > 0 ){

                    $term = get_term( $term_id, 'product_cat' );

                    if( is_wp_error( $term ) )
                        continue;
                    
                    $link = get_term_link( $term->term_id );

                    $thumbnail_id = multi_store_wc()->get_category_thumbnail_id( $term->term_id );
                    $thumnail_url = wp_get_attachment_url(  $thumbnail_id );
                    $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                    ?>
                        <div class="multi-store-popular-category-inner">
                            <?php if( !empty( $thumnail_url ) ): ?>
                                <img src="<?php echo esc_url( $thumnail_url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
                            <?php endif; ?>

                            <div class="multi-store-popular-category-meta">
                                <h3>
                                    <a href="<?php echo esc_url( $link ); ?>">
                                        <?php echo esc_html( $term->name ); ?>
                                    </a>
                                </h3>
                                <a href="<?php echo esc_url( $link ); ?>" class="readmore">
                                    <?php echo esc_html( $btn_text ); ?><i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</div>