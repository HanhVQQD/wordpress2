<?php 
/**
 * Header
 * 
 * @since Multi Store 1.0 
 */
?>
<div class="multi-store-usp-container ">
	<div class="multi-store-usp-inner multi-store-container">
		<ul class="multi-store-usp-items">
			<?php 
				$usps = array();
		        $keys = array( 'usp_1', 'usp_2', 'usp_3' );
		        foreach( $keys as $key ){
		            $id = multi_store_get( $key );
		            if( $id ){
		                $post = get_post( $id );
		                $usps[] = array(
		                	'title' => $post->post_title,
		                	'icon'  => 'fa fa-check' 
		                );
		            }
		        }
		        wp_reset_postdata();
		        $usps = apply_filters( 'multi_store_usps', $usps );
				foreach( $usps as $usp ){
					echo sprintf( '<li><i class="%s"></i>%s</li>', 
						esc_html( $usp[ 'icon' ] ), 
						esc_html( $usp[ 'title' ] ) 
					);
				}
			?>
		</ul>
	
		<div class="multi-store-usp-menu">
			<?php 
				wp_nav_menu(array(
					'theme_location' => 'usp-menu',
					'echo'           => true,
					'container'      => false,
					'depth'          => 1,
					'menu_id'        => 'usp-menu',
					'menu_class'     => 'navigation clearfix'
				));
			?>
		</div>
	</div>
</div>