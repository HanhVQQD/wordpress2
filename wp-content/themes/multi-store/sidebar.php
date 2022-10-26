<?php
/**
 * The sidebar on widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Multi Store 1.0
 */

if( !is_active_sidebar( 'multi_store_sidebar' )  ) {
    return;
} 

?>
<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'multi_store_sidebar' ); ?>
</aside>