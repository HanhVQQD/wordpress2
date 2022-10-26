<?php
/**
 * Multi Store functions and definitions
 * Multi Store only works in WordPress 4.7 or later.
 *
 * @since Multi Store 1.0
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'wp_body_open' ) ) {

    /**
     * Fire the wp_body_open action.
     * Adds backward compatibility for WordPress versions < 5.2
     *
     * @since Multi Store 1.0
     */
    function wp_body_open() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
        do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
    }
}

if( !class_exists( 'Multi_Store_Theme' ) ){
    class Multi_Store_Theme{

        protected static $instance = null;

        public static function get_instance(){
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct(){

            add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
            add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );
            add_action( 'body_class', array(  $this, 'body_class' ) );

            add_action( 'customize_register', array( $this, 'customize_register' ) );

            if ( !class_exists( 'Kirki' ) ) { 
               $this->require( array( 'kirki' ), 'kirki' );
            }

            $modules = array( 
                'kirki',
                'helper',
                'scripts',
                'tgm-plugin-activation',
                'breadcrumb'
            );
            $this->require( $modules );

            $hooks = array(
                'header',
                'footer',
                'banner',
                'search'
            );
            $this->require( $hooks, 'hooks' );

            $modules = array( 
                'theme-options/panel', 
                'ajax',
                'breadcrumb',
                'plugin-recommend',
                'script-loader', 
                'setup', 
                'woocommerce',
                'sidebar'
            );
            $this->require( $modules, 'inc' );
        }

        public function customize_register( $wp_customize ){
            $wp_customize->get_setting( 'background_color' )->default = '#f5f5f5';
        }

        public function excerpt_more( $text ) {
                
            if( is_admin() && !wp_doing_ajax() ) {
                return $text;
            }

            $more = sprintf( '...<div class="multi-store-site-button"><a href="%1$s" class="multi-store-primary-button">%2$s <i class="fa fa-long-arrow-right"></i></a></div>',
                esc_url( get_the_permalink() ),
                multi_store_get( 'readmore_text' )
            );
            return $more;
        }

        public function excerpt_length( $length ) {

            if( is_admin() && !wp_doing_ajax() ) {
                return $length;
            }

            $length = '15';
            return $length;
        }

        public function body_class( $classes ) {

            $post_per_page =  multi_store_get( 'post_per_row' );
            $classes[] = 'multi-store-content-post-' . $post_per_page;

            if( 'boxed' == multi_store_get( 'layout' ) ) {
                $classes[] = 'multi-store-layout-box';
            } 

            return $classes; 
        }

        public function require( $files, $base = 'class' ) { 
            foreach( $files as $file ) {
                $path = $base . '/' . $file . '.php';
                require_once get_theme_file_path( $path );
            }
        }
    }
}

if( !function_exists( "multi_store_theme" ) ){
    function multi_store_theme(){
        return Multi_Store_Theme::get_instance();
    }
    multi_store_theme();
}