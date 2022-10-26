<?php 
/*
 * Template Name: Multi Store Front Page
 */
get_header();
do_action( 'multi_store_before_content' ); 
?>
<div id="site-content">
    <?php 
        $templates = array( 'hero', 'popular-categories', 'product', 'popular-categories-two', 'seo-section' );
        foreach( $templates as $slug ){
            get_template_part( 'templates/frontpage/frontpage', $slug ); 
        }
    ?>
</div>
<?php 
do_action( 'multi_store_after_content' ); 
get_footer();