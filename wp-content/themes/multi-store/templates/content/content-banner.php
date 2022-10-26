<?php
/**
 * Template for banner
 *
 * @since Multi Store 1.0
 */
?>	
<div class="multi-store-banner-wrapper">
	<?php
		$src = '';
		if( !is_attachment() && ( is_single() || is_page() ) && has_post_thumbnail() ) {
			$src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		}elseif( is_home() && !is_front_page() ) {											
			$src = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'full' );
		}else {
			$src = get_header_image();
		}
	?>
	<?php if( '' != $src ) { ?>
		<img src="<?php echo esc_url( $src ); ?>" alt="<?php esc_attr_e( 'Inner Banner', 'multi-store' ); ?>" />
	<?php } ?>
	<div class="multi-store-container">
		<div class="multi-store-banner-content-inner">
			<div class="multi-store-banner-content">
				<?php Multi_Store_Helper::banner_heading(); ?>
			</div>
			<div class="multi-store-breadcrumb-wrapper">
				<?php multi_store_breadcrumb()->breadcrumb(); ?>
			</div>
		</div>
	</div>
</div>
