<?php 
/**
 * Header Hooks
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Header' ) ){
	class Multi_Store_Header{

		protected static $instance = null;

		public static function get_instance(){
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function __construct(){
			add_action( 'multi_store_body_attr', array( $this, 'body_attr' ) );
			add_action( 'multi_store_header', array( $this, 'header_usp' ) );
			add_action( 'multi_store_header', array( $this, 'header_middle' ), 20 );
			add_action( 'multi_store_header', array( $this, 'header_bottom' ), 30 );
			add_action( 'multi_store_before_header', array( $this, 'skip_content' ), 30 );

			add_action( 'wp_head', array( $this, 'header_textcolor' ) );
			add_filter( 'body_class', array(  $this, 'body_class' ) );
		}

		public function body_attr(){
			Multi_Store_Helper::schema_body( 'body' );
			body_class();
		}

		public function header_usp(){
			$enable = multi_store_get( 'header_top_enable' );
		    if( $enable ){
		        get_template_part( 'templates/header/header', 'top' );
		    }
		}

		public function header_middle(){
			get_template_part( 'templates/header/header', 'middle' ); 
		}

		public function header_bottom(){
			get_template_part( 'templates/header/header', 'bottom' ); 
		}

		public function skip_content(){
			wp_body_open();
			if( is_front_page() && !is_home() )
				return;
			?>
			<a class="skip-link screen-reader-text" href="#content">
			    <?php esc_html_e( 'Skip to content', 'multi-store' ); ?>
			</a>
			<?php
		}

		public function header_textcolor(){
		?>
		    <style type="text/css">
		        .site-title, .site-title a, .site-description {
		            color: #<?php echo esc_html( get_theme_mod( 'header_textcolor' ) ); ?> !important; 
		        }
		    </style>
		<?php 
		}

		public function body_class( $classes ) {

		    if( multi_store_get( 'header_product_menu' ) ){
		        $classes[] = 'show-product-menu-front-page';
		    }

		    return $classes;
		}
	}

	Multi_Store_Header::get_instance();
}