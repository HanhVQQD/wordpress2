<?php
/**
 * Template for post not found
 * 
 * @since Multi Store 1.0
 */?>
<div class="multi-store-no-results not-found">
    <div class="multi-store-page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'multi-store' ); ?></h1>
    </div>
    <?php if( current_user_can( 'publish_posts' ) ): ?>
        <div class="multi-store-page-content">
            <?php get_search_form(); ?>
            <?php
                printf(
                    '<p>%1$s</p><a href="%2$s">%3$s</a>',
                    esc_html__( 'Sorry, but nothing matched your search. Please try again with some different keywords or you can add post.', 'multi-store' ),
                    esc_url( admin_url( 'post-new.php' ) ),
                    esc_html__( 'Home', 'multi-store' )
                )
            ?>
        </div>
    <?php else: ?>
        <div class="multi-store-page-content">
            <?php 
                get_search_form();
                printf(
                    '<p>%1$s</p> ',
                    esc_html__( 'We can\'t seem to find any result that match your search key.', 'multi-store' ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
            ?>
        </div>
        <div>
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="multi-store-btn-primary">
                <?php esc_html_e( 'Home', 'multi-store' ); ?>
            </a>
        </div>
    <?php endif; ?>
</div>