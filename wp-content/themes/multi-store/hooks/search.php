<?php 
/**
 * Add search query text
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Search' ) ){
	class Multi_Store_Search{

		public function __construct(){
			add_action( 'multi_store_before_content', array( $this, 'render' ) );
		}

		public function render(){
			if( !is_search() )
				return;
			?>
			<div class="multi-store-container">
				<header class="page-header">
					<h2 class="page-title">
						<?php esc_html_e( 'Search results for: ', 'multi-store' ); ?>
						<span class="page-description"><?php echo get_search_query(); ?></span>
					</h2>
				</header>
			</div>
			<?php
		}
	}

	new Multi_Store_Search();
}