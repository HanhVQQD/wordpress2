<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since Multi Store 1.0
 */
get_header();
do_action( 'multi_store_before_content' );
?>
<div class="multi-store-content-wrapper" id="content">
    <div class="multi-store-container">
        <div class="multi-store-row">
            <main id="main" class="site-main content-order">
                <div class="woocommerce">
                    <?php 
                        if( have_posts() ){
                            if( Multi_Store_Helper::is_active_plugin( 'woocommerce' ) ){
                                woocommerce_product_loop_start();
                                while( have_posts() ){
                                    the_post();
                                    if( get_post_type( get_the_ID() ) == 'product' ){
                                        wc_get_template_part( 'content', 'product' );
                                    }else{
                                        ?>
                                        <li class="multi-store-content-post">
                                            <?php get_template_part( 'templates/content/content', '' ); ?>
                                        </li>
                                        <?php
                                    }
                                }
                                woocommerce_product_loop_end();
                            }else{
                                while( have_posts() ){
                                    the_post();
                                    ?>
                                    <div class="multi-store-content-post">
                                        <?php get_template_part( 'templates/content/content', '' ); ?>
                                    </div>
                                    <?php
                                }
                            }
                        }else{
                            get_template_part( 'templates/content/content', 'none' );
                        }
                    ?>
                </div>
                <div class="multi-store-page-navigation">
                    <?php Multi_Store_Helper::get_pagination(); ?>
                </div>
            </main>
            <?php do_action( 'multi_store_sidebar' ); ?>
        </div>        
    </div>	
</div>
<?php  
do_action( 'multi_store_after_content' ); 
get_footer();