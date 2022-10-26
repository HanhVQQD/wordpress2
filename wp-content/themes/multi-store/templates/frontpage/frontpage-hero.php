<?php 
/**
 * Template for hero section
 * 
 * @since Multi Store 1.0
 */
?>
<?php
    $id = multi_store_get( 'hero_page' );
    if( $id > 0 ):
        $post = get_post( $id );
        $btn_text = multi_store_get( 'hero_button' );
?>       
        <div class="multi-store-container">
            <div class="multi-store-home-banner-wrapper">
                <?php echo get_the_post_thumbnail( $id ); ?>
                
                <div class="multi-store-hero-meta">
                    <h1><?php echo esc_html( $post->post_title ); ?></h1>
                    <h2><?php echo esc_html( $post->post_excerpt ); ?></h2>
                    <a href="<?php echo esc_url( get_permalink( $id ) ); ?>">
                        <?php echo esc_html( $btn_text ); ?>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
<?php endif; ?>