<?php 
/**
 * Ajax functions
 * 
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Ajax' ) ){
	class Multi_Store_Ajax{

		protected static $instance = null;

		public static function get_instance(){

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct(){
			add_action( 'wp_ajax_view_more_posts', array( $this, 'render' ) );
			add_action( 'wp_ajax_nopriv_view_more_posts', array( $this, 'render' ) );
		}

		public function render(){

		    $response = array(
		        'data'   => null,
		        'status' => 400
		    );
		    
		    if( wp_verify_nonce( $_POST['nonce'], 'multi-store-loadmore-nonce' ) ) {
		        $args = json_decode( stripslashes( $_POST['query'] ), true );
		        $args[ 'paged' ] = absint($_POST['page'] );
		        $args[ 'post_status' ] = 'publish';

		        query_posts( $args );

		        ob_start();

		        if( have_posts() ) {
		            while( have_posts() ) {
		                the_post();
		                echo '<div class="multi-store-content-post">';
		                    get_template_part( 'templates/content/content', '' );
		                echo '</div>';
		            }
		        }

		        wp_reset_postdata();
		        
		        $response[ 'data' ] = ob_get_clean(); 
		        ob_flush();
		        $response[ 'status' ] = 200;
		    }
		    wp_send_json( $response[ 'data' ], $response[ 'status' ] );
		}
	}

	Multi_Store_Ajax::get_instance();
}