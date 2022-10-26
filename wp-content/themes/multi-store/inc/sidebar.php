<?php
/**
 * Sidebar
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Sidebar' ) ) {
	class Multi_Store_Sidebar{

        protected static $instance = null;

        public static function get_instance(){

            if ( null === self::$instance ) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function __construct(){
            add_action( 'widgets_init', array( $this, 'register' ) );
            add_action( 'body_class', array(  $this, 'body_class' ) );
            add_action( 'multi_store_sidebar', array( $this, 'sidebar' ) );
        }

        public function register() {
            register_sidebar(array(
                'name'          => esc_html__( 'Sidebar', 'multi-store' ),
                'id'            => 'multi_store_sidebar',
                'description'   => esc_html__( 'Widgets in this area will be shown on side of the page.', 'multi-store' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            ));

            register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget Area', 'multi-store' ) ,
                'id'            =>  'multi_store_footer',
                'description'   => esc_html__( 'Widgets in this area will be displayed the footer. If empty then column will not be displayed.', 'multi-store' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>'
            ));
        }

        public function body_class( $classes ){

            if( is_single() || is_archive() || is_home() || is_search() ){
                $sidebar_position = multi_store_get( 'sidebar_position' );
                $classes[] = 'multi-store-' . esc_attr( $sidebar_position ) . '-sidebar';
            }

            return $classes;
        }

        public function sidebar() {
            $sidebar_active = $this->is_active();
            if( $sidebar_active ) { ?>
                <div class="multi-store-sidebar-wrapper sidebar-order">
                    <?php get_sidebar(); ?>
                </div>
            <?php }
        }

        public function is_active() {
            if( is_active_sidebar( 'multi_store_sidebar' ) ) {
                $sidebar = multi_store_get( 'sidebar_position' );
                return 'hide' == $sidebar ? false : true;
            }
            return false;
        }
    }
}

if( !function_exists( 'multi_store_sidebar' ) ){
    function multi_store_sidebar(){
        return Multi_Store_Sidebar::get_instance();
    }
    multi_store_sidebar();
}