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
                <?php if( have_posts() ) : ?>
                    <div class="multi-store-row" id="multi-store-main-content">
                        <?php
                            while( have_posts() ) : the_post();
                            ?>
                            <div class="multi-store-content-post">
                                <?php get_template_part( 'templates/content/content', '' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
					<?php
						get_template_part( 'templates/content/content', 'none' );
					?>
				<?php endif; ?>	
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