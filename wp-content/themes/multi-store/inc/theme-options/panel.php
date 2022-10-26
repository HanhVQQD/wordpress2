<?php
/**
 * Theme Options
 * @since Multi Store 1.0
 */
multi_store_theme()->require(array( 

    'theme-options/header/top',
    'theme-options/header/middle',
    'theme-options/header/bottom',

    'theme-options/frontpage/hero',
    'theme-options/frontpage/popular-category',
    'theme-options/frontpage/product',
    'theme-options/frontpage/popular-category-two',
    'theme-options/frontpage/about',
    
    'theme-options/theme-options/colors',
    'theme-options/theme-options/theme-typography',
    'theme-options/theme-options/footer-options',
    'theme-options/theme-options/general-options',
    'theme-options/theme-options/post-options',
    'theme-options/theme-options/reset-options'
), 'inc' );

if( !class_exists( 'Multi_Store_Options' ) ) {
	class Multi_Store_Options extends Multi_Store_Kirki{

        protected static $instance = null;

        public $config = 'multi-store';

        public static function get_instance() {
            if( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            parent::__construct( $this->config );
            add_action( 'init', array( $this, 'fields' ) );
        }

        public function fields(){
            $this->setup( array(
                'multi_store_header_options' => array(
                    'title'    => esc_html__( 'Header', 'multi-store' ),
                    'priority' => 1,
                    'section'  => apply_filters( 'multi_store_customizer_header_panel', [] )
                ),
                'multi_store_theme_options' => array(
                    'title'    => esc_html__( 'Theme Options', 'multi-store' ),
                    'priority' => 5,
                    'section'  => apply_filters( 'multi_store_customizer_theme_panel', [] )
                ),
                'multi_store_frontpage_options' => array(
                    'title'    => esc_html__( 'Front Page', 'multi-store' ),
                    'priority' => 10,
                    'section'  => apply_filters( 'multi_store_customizer_frontpage_panel', [] )
                )
            ));
        }
    }
}

if( !function_exists( 'multi_store_get' ) ) {
    function multi_store_get( $id ) {
        return Multi_Store_Options::get_instance()->get( $id );
    }
}