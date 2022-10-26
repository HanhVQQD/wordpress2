<?php
/**
 * Setup Theme
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Theme_Setup' ) ) {
	class Multi_Store_Theme_Setup{

        public function __construct(){
            add_action( 'after_setup_theme', array( $this, 'setup' ) );
        }

        public function setup() {

            $this->register_menus();

            $this->add_post_type_support();
            
            $this->load_text_domain();

            $this->add_content_width();
            
            $this->add_theme_support();
        }

        public function register_menus() {
            register_nav_menus(
                array(
                    'primary'      => esc_html__( 'Primary Menu', 'multi-store' ),
                    'usp-menu'     => esc_html__( 'USP Menu', 'multi-store' ),
                    'product-menu' => esc_html__( 'Product Menu', 'multi-store' )
                )
            );
        }

        public function add_post_type_support(){
            add_post_type_support( 'page', 'excerpt' );
        }

        public function load_text_domain(){
            load_theme_textdomain( 'multi-store', get_theme_file_uri( 'i18n/languages' ) );
        }

        public function add_content_width(){

            $content_width = 1140;
            $layout = multi_store_get( 'layout' );
            if( 'custom' == $layout ){
                $content_width = multi_store_get( 'container_width' );
            }

            /**
             * This variable is intended to be overruled from themes.
             * Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
             * phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
             */         
            $GLOBALS['content_width'] = apply_filters( 'content_width_setup', $content_width );
        }

        public function add_theme_support(){
           
            $supports = array(
                'custom-logo' => array(
                    'width'       => 180,
                    'height'      => 60,
                    'flex-width'  => true,
                    'flex-height' => true,
                    'header-text' => array( 'site-title', 'site-description' )
                ),
                'custom-header' => array(
                    'default-text-color' => '000000',
                    'width'              => 1366,
                    'height'             => 400,
                    'flex-height'        => true,
                    'default-image'      => get_template_directory_uri() . '/assets/img/default-banner.jpg'
                ),
                'html5' => array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption'
                ),
                'post-formats' => array(
                    'gallery',
                    'image',
                    'link',
                    'quote',
                    'video',
                    'audio',
                    'status',
                    'aside'
                ),
                'custom-background' => array(
                    'default-color' => 'ffffff'
                ),
                'align-wide', 
                'wp-block-styles', 
                'post-thumbnails', 
                'customize-selective-refresh-widgets', 
                'responsive-embeds',
                'block-templates'
            );

            # to avoid theme check errors
            add_theme_support( "title-tag" );
            add_theme_support( 'automatic-feed-links' );

            $supports = apply_filters( 'multi_store_theme_support', $supports );
            foreach( $supports as $support => $args ){
                if( is_array( $args ) ){
                    add_theme_support( $support, $args );
                }else{
                    add_theme_support( $args );
                }
            }
        }
    }

    new Multi_Store_Theme_Setup();
}