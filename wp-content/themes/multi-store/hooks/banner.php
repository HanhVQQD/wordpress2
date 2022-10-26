<?php 
/**
 * Banner Hooks
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Banner' ) ){
	class Multi_Store_Banner extends Multi_Store_Helper{

		protected static $instance = null;

		public static function get_instance(){

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct(){
			add_action( 'multi_store_before_content', array( $this, 'banner' ) );
		}

		public function banner(){
			
			if( is_front_page() && ! is_home() ){
				return;
			}

			if( self::is_active_plugin( 'woocommerce' ) && ( is_shop() || is_product() || is_cart() || is_checkout() || is_product_taxonomy() ) ){
				get_template_part( 'templates/content/content-woocommerce', 'banner' );
				return;
			}

			$enable = false;
			if( is_singular() ){
				$enable = multi_store_get( 'enable_banner_single_page' );
			}else if( is_archive() || is_home() ){
				$enable = multi_store_get( 'enable_banner_archive_page' );
			}

			if( $enable ){
				get_template_part( 'templates/content/content', 'banner' );
			}

		}
	}

	Multi_Store_Banner::get_instance();
}