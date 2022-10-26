<?php 
/**
 * The template for displaying all single posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since Multi Store 1.0
 */

get_header(); 
do_action( 'multi_store_before_content' );

?>
<div class="woocommerce">
	<div class="multi-store-single-post-wrapper">
		<div class="multi-store-container" id="content">
			<main id="main" class="site-main">
				<?php woocommerce_content(); ?>
			</main>
		</div>
	</div>
</div>
<?php 
do_action( 'multi_store_after_content' ); 
get_footer() ?>