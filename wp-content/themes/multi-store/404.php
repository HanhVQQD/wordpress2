<?php
/**
 * The template for displaying 404 pages
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @since Multi Store 1.0
 */

get_header();
do_action( 'multi_store_before_content' ); ?>

<div class="multi-store-404-wrapper">
	<div class="multi-store-404-content multi-store-container">
		<h2>
			<?php esc_html_e( 'This page doesn\'t seem to exist', 'multi-store' ); ?>
		</h2>
		<p>
			<?php esc_html_e( 'It looks like the link pointing here was faulty. Maybe try searching?', 'multi-store' ) ?>
		</p>
		<div class="multi-store-404-btns">
			<div class="multi-store-404-search">				
				<?php get_search_form(); ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="btn multi-store-404-home-btn">
				<?php esc_html_e( 'Go Back Home', 'multi-store' ); ?>
				<i class="fa fa-greater-than"></i>
			</a>
		</div> 
	</div>
</div>
<?php 
do_action( 'multi_store_after_content' );
get_footer();