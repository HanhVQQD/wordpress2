<?php 
/**
 * Frontpage product list 
 * 
 * @since Multi Store 1.0
 */

if( !Multi_Store_Helper::is_active_plugin( 'woocommerce' ) )
    return;
?>
<div class="multi-store-popular-product-wrapper">
    <div class="multi-store-container">
        <div class="popular-product-title">
            <h2><?php echo esc_html( multi_store_get( 'frontpage_product_title' ) ); ?></h2>
            <p><?php echo esc_html( multi_store_get( 'frontpage_product_sub_title' ) ); ?></p>
        </div>
        <div class="multi-store-popular-products">
            <?php 
                $type = multi_store_get( 'frontpage_product_type' );
                $limit = multi_store_get( 'frontpage_product_limit' );
                switch( $type ){
                    case 'best-selling':
                        echo do_shortcode( '[products limit="'. absint( $limit ) . '" columns="4" best_selling="true" ]' ); 
                    break;

                    case 'featured':
                        echo do_shortcode( '[products limit="'. absint( $limit ) . '" columns="4" visibility="featured" ]' ); 
                    break;

                    default:
                        echo do_shortcode( '[products limit="'. absint( $limit ) . '" columns="4" orderby="id" order="DESC" visibility="visible" ]' ); 
                    break;
                }
            ?>
        </div>
    </div>
</div>