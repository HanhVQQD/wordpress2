<?php 
/**
 * Enqueue scripts and styles
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Script_Loader' ) ){
	class Multi_Store_Script_Loader{

		protected static $instance = null;

		public static function get_instance(){

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct(){
			# Kirki setup is initialised at init hook with priority 10
			# see inc/theme-options/panel.php L 42
			add_action( 'init', array( $this, 'load' ), 50 );
		}

		public function load() {

			$assets_version = multi_store_get( 'assets-version' );

			new Multi_Store_Scripts( $this->get_base_scripts(), $assets_version );

			new Multi_Store_Scripts( $this->get_editor_scripts(), $assets_version, 'enqueue_block_editor_assets' );

			new Multi_Store_Scripts( $this->get_customizer_scripts(), $assets_version, 'customize_controls_enqueue_scripts' );

			new Multi_Store_Scripts(array(
			    array(
			        'handle' => 'customizer-script',
			        'script' => 'assets/js/customizer.js',
			    ),
			), $assets_version, 'customize_controls_enqueue_scripts' );
			
			if( ( is_single() || is_page() ) && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		public function get_base_scripts(){
			return array(
				array(
					'handle'   => 'theme-style',
					'style'    => 'style.css',
					'minified' => false
				),
				array(
					'handle' => 'main-style',
					'style'  => 'assets/css/style.css',
					'version' => '1.5'
				),
				array(
					'handle' => 'google-font',
					'style'  => 'https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100;300;500;700&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400;500;700&display=swap',
					'absolute' => true
				),
				array(
					'handle'  => 'fontawesome',
					'style'   => 'assets/vendor/font-awesome/css/font-awesome.css',
					'version' => '4.7.0'
				),
				array(
					'handle' => 'sticky-js',
					'script' => 'assets/js/jquery.sticky.js'
				),
				array(
					'handle'  => 'multi-store-menu',
					'script'  => 'assets/js/menu.js'
				),
				array(
					'handle'  => 'multi-store-woocommerce',
					'script'  => 'assets/js/woocommerce.js',
					'version' => '1.5'
				),
				array(
					'handle' => 'multi-store-script',
					'script' => 'assets/js/script.js',
					'localize'	=> array(
						'key'	=> 'MULTISTORE',
						'data'	=> array(
							'admin_url'	   => admin_url( 'admin-ajax.php' ),
							'nonce'	       => wp_create_nonce( 'multi-store-loadmore-nonce' ),
							'checkout_url' => esc_url( multi_store_wc()->get_checkout_url() )
						),
					),
					'version' => '1.5'
				)
			);
		}

		public function get_editor_scripts(){
			return array(
				array(
					'handle' => 'editor-style',
					'style'  => 'assets/css/editor-style.css'
				)
			);
		}

		public function get_customizer_scripts(){
			return array(
				array(
					'handle' => 'customizer-style',
					'style'  => 'assets/css/customizer-style.css'
				)
			);
		}
	}

	Multi_Store_Script_Loader::get_instance();
}