<?php 
/**
 * Footer Hooks
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Footer' ) ){
	class Multi_Store_Footer{

		protected static $instance = null;

		public static function get_instance(){
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function __construct(){
			add_action( 'multi_store_footer_attr', array( $this, 'footer_attr' ) );
			add_action( 'multi_store_before_footer', array( $this, 'footer_widgets' ) );
			add_action( 'multi_store_footer', array( $this, 'footer' ) );
			add_action( 'wp_footer', array( $this, 'scroll_top' ) );
		}

		public function footer_attr(){
			Multi_Store_Helper::schema_body( 'footer' );
		}
		
		public function footer_widgets(){
		    get_template_part( 'templates/footer/footer', 'widgets' );
		}

		public function footer(){
		    get_template_part( 'templates/footer/footer', '' );
		}

		public function scroll_top() {
		    if( !multi_store_get( 'scroll_to_top' ) ) {
		        return;
		    }
		    echo '<a href="#" class="multi-store-scroll-top"><i class="fa fa-angle-up"></i></a>';
		}
	}

	Multi_Store_Footer::get_instance();
}