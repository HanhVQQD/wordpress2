<?php 
/**
 * Breadcrumb
 * @since Multi Store 1.0 
 */
if( !class_exists( 'Multi_Store_Breadcrumb' ) ){
	class Multi_Store_Breadcrumb{

		protected static $instance = null;

		public static function get_instance(){

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {			
			add_filter( 'breadcrumb_trail_labels', array( $this, 'change_home_title' ) );
		}

		public function change_home_title( $defaults ) {
			$defaults[ 'home' ] = '<i class="fa fa-home"></i>';
			return $defaults;
		}

		public function breadcrumb() {

			$args = apply_filters( 'multi-store-breadcrumb-args', array( 'container' => 'div' ) );
			echo '<div class="multi-store-breadcrumb-wrapper">';
				multi_store_breadcrumb_trail( $args );
			echo '</div>';
		}
	}
}

if( !function_exists( 'multi_store_breadcrumb' ) ){
	function multi_store_breadcrumb(){
		return Multi_Store_Breadcrumb::get_instance();
	}
	multi_store_breadcrumb();
}