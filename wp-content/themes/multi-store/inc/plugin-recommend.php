<?php 
/**
 * Plugin recommendation
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Plugin_Recommend' ) ){
	class Multi_Store_Plugin_Recommend{

		public function __construct(){
			add_action( 'tgmpa_register', array( $this, 'plugins' ) );
		}

		public function plugins() {
			$plugins = array(
				array(
					'name'     => esc_html__( 'Woocommerce', 'multi-store' ),
					'slug'     => 'woocommerce',
					'required' => false
				)
			);
			tgmpa( $plugins );
		}
	}

	new Multi_Store_Plugin_Recommend();
}
