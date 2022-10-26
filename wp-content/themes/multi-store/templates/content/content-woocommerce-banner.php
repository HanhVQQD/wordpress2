<?php 
/**
 * Woocommerce Breadcrumb
 * 
 * @since Multi Store 1.0
 */
?>
<div class="multi-store-woocommerce-banner">
	<div class="multi-store-woocommerce-breadcrumb multi-store-container">
		<?php if( function_exists( 'woocommerce_breadcrumb' ) ){ woocommerce_breadcrumb(); } ?>
	</div>
</div>