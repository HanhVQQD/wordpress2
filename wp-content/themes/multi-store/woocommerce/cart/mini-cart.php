<?php
/**
 * Mini cart template
 * 
 * @since Multi Store 1.0
 */
?>
<div class="multi-store-woocommerce-mini-cart woocommerce">
	<?php 
		$class = WC()->cart->is_empty() ? '.mini-cart-shop-now-button' : '.multi-store-goto-checkout';
	?>
	<button class="circular-focus screen-reader-text" data-goto="<?php echo esc_attr( $class ); ?>">
		<?php esc_html_e( 'Circular focus', 'multi-store' ); ?>
	</button>

	<div class="multi-store-mini-cart-header">
		<h2><?php esc_html_e( 'Cart', 'multi-store' ); ?></h2>
		<a href="#" class="multi-store-mini-cart-close">
			<?php multi_store_wc()->close_icon(); ?>
		</a>
	</div>
	
	<form class="multi-store-woocommerce-mini-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<div class="multi-store-woocommerce-mini-cart-product-wrapper" data-multi-store-addon-cart-count="<?php echo WC()->cart->cart_contents_count; ?>">
			<?php if ( ! WC()->cart->is_empty() ) : ?>
			<?php 
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$is_visible = apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key );
					
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && $is_visible ) {
						$product_info = multi_store_wc()->get_product_info( array(
							'product' => $_product,
							'cart_item' => $cart_item,
							'cart_item_key' => $cart_item_key
						));
			?>
						<div class="multi-store-woocommerce-mini-cart-product-single">
							<div>
								<div>
									<span class="multi-store-mini-cart-product-name">
										<a href="<?php echo esc_url( $product_info['permalink'] ); ?>">
											<?php echo esc_html( $product_info[ 'name' ] ); ?>
										</a>								
									</span>
								</div>
								<div class="product-quantity">
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = 1;
										} else {
											$product_quantity = $cart_item['quantity'];
										}

										$product_quantity =  apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );

										echo $product_quantity;

									?>
									× <span class="multi-store-mini-cart-product-price">
									<?php echo $product_info[ 'price' ]; ?>
								</span>	
								</div>
							</div>

							<div>
								<a href="<?php echo esc_url( $product_info['permalink'] ); ?>">	
									<?php echo $product_info[ 'thumbnail' ]; ?>	
								</a>	
								<a 
									href="<?php echo $product_info[ 'remove_link' ]; ?>" 
									class="multi-store-remove-mini-cart-item"
									aria-label="<?php echo esc_attr__( 'Remove this item', 'multi-store' ) ?>"
								>
									<?php multi_store_wc()->close_icon(); ?>
								</a>							
							</div>
						</div>
						<?php
					}
				} 
			?>

			<?php else : ?>
				<p class="woocommerce-mini-cart__empty-message">
					<?php esc_html_e( 'No products in the cart.', 'multi-store' ); ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="mini-cart-shop-now-button">
						<?php esc_html_e( 'Shop Now', 'multi-store' ); ?>
					</a>
					<button class="circular-focus screen-reader-text" data-goto=".multi-store-mini-cart-close">
						<?php esc_html_e( 'Circular focus', 'multi-store' ); ?>
					</button>
				</p>
			<?php endif; ?>
		</div>

		<?php $class = WC()->cart->is_empty() ? 'empty': ''; ?>
		<div class="multi-store-mini-cart-btn <?php echo esc_attr( $class ); ?>">
			<?php if( !WC()->cart->is_empty() ): ?>
				<div class="multi-store-mini-cart-total">
					<h3>
						<?php esc_html_e( 'Sub Total:' ,'multi-store' ); ?> 
						<span><?php echo wc_cart_totals_subtotal_html(); ?></span>
					</h3>
				</div>

				<button type="submit" class="multi-store-woocommerce-addon-empty-cart">
					<?php multi_store_wc()->empty_cart_icon(); esc_html_e( 'Empty Cart', 'multi-store' ); ?>
				</button>

				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="multi-store-goto-checkout">
					<?php multi_store_wc()->cart_icon(); esc_html_e( 'Go to Cart', 'multi-store' ); ?>
				</a>
				<button class="circular-focus screen-reader-text" data-goto=".multi-store-mini-cart-close">
					<?php esc_html_e( 'Circular focus', 'multi-store' ); ?>
				</button>
			<?php endif; ?>
		</div>

		<?php if( !is_cart() ){ wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); } ?>
	</form>
</div>