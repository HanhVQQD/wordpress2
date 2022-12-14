<?php
/**
 * Helper functions
 * @since Multi Store 1.0
 */
if( !class_exists( 'Multi_Store_Helper' ) ) {
	class Multi_Store_Helper {

		public static function the_date( $post_id = null ) {

			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

			$time_tag = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C, $post_id ) ),
				esc_html( get_the_date( get_option( 'date_format' ), $post_id ) ),
				esc_attr( get_the_modified_date( DATE_W3C, $post_id ) ),
				esc_html( get_the_modified_date( DATE_W3C, $post_id ) )
			);

			printf(
				'<span class="posted-on">
					<a href="%1$s" rel="bookmark">
						%2$s
					</a>
				</span>',
				esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time ( 'd' ) ) ),
				$time_tag
			);
		}

		public static function the_category( $post_id = false ) {
			$cat = get_the_category( $post_id );
			if( !empty( $cat ) ) { ?>
				<ul class="post-categories">
					<?php foreach ( $cat as $c ) { ?>
						<li>
							<a href="<?php echo esc_url( get_category_link( $c ) ); ?>">
								<?php echo esc_html( $c->name ); ?>
							</a>
						</li>
					<?php } ?> 
				</ul>
			<?php }
		}

		public static function posted_by( $post_id = false ) {

			if( $post_id ){
				$author_id   = get_post_field( 'post_author', $post_id );
				$author_name = get_the_author_meta( 'display_name', $author_id );
			}

			printf(
				/* translators:1-author link, 2-author image link, 
				 * 3- author text, 4- author name.
				 */
				'<div class="multi-store-author-wrapper">
					<span class="multi-store-author-text">
						%2$s
					</span>
					<a class="multi-store-author-link" href="%1$s">
						<span class="author">
							%3$s
						</span>
					</a>
				</div>',
				esc_url( get_author_posts_url( $post_id ? get_the_author_meta( 'ID', $author_id ) : get_the_author_meta( 'ID' ) ) ),
				esc_html__( 'By ', 'multi-store' ),
				esc_html( $post_id ? $author_name : get_the_author_meta( 'name' ) )
			);
		}

		public static function comment_number() {
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="multi-store-comments">';
				comments_popup_link(
					'<i class="fa fa-comment"></i> '.esc_html__( 'Leave a comment', 'multi-store' ),		
					'<i class="fa fa-comment"></i> '.esc_html__( '1 response', 'multi-store' ),
					'<i class="fa fa-comments"></i> % '. esc_html__( 'responses' , 'multi-store' )
				);
				echo '</span>';
			}
		}

		public static function content_meta( $post_id = false, $author = false ) { ?>
			<div class="multi-store-post-meta">
				<?php 
					self::the_date( $post_id );
					if( $author ) {
						self::posted_by( $post_id );
					}
					self::the_category( $post_id );
					if( !$post_id ) {
						self::comment_number();
					}
				?>
			</div>
		<?php }

		public static function theme_google_font() {
			return array(
                'google' => array( 'Lato', 'Oswald', 'Roboto', 'Raleway', 'Playfair Display', 'Fjalla One', 'Alegreya Sans', 'PT Sans Narrow', 'Open Sans', 'Poppins', 'Montserrat Alternates', 'Ubuntu' )
            );
		}

		public static function get_wp_pagination() {
			the_posts_pagination( 
				array(
					'previous' => esc_html__( '<i class="fa fa-arrow-left"></i>', 'multi-store' ),
					'next'     => esc_html__(  '<i class="fa fa-arrow-right"></i>', 'multi-store' )
				)
			); 
		}

		public static function get_pagination() {
			global $wp_query;
			if( is_home() ) {
				$pagination_format = multi_store_get( 'pagination_format', 'default' );
				if( 'default' == $pagination_format ) {
					self::get_wp_pagination();
				}
				elseif( 'load-more' == $pagination_format ) {
					$total_posts = $wp_query->found_posts;
					$displayed_posts = $wp_query->post_count;    
					if( $displayed_posts < $total_posts ) {
						echo '<a href ="#" class = "multi-store-load-more" data-maxpage="'. $wp_query->max_num_pages .'">' . multi_store_get( 'load_more_text', esc_html__( 'Load More', 'multi-store' ) ) . '</a>' ; 
					}
				}         
			} else {
				self::get_wp_pagination();
			}
		}

		public static function display_tag_list() {			
			$tags_list = get_the_tag_list();
			if ( $tags_list ) { ?>
				<h2><?php esc_html_e( 'Tags:', 'multi-store' ) ?></h2>
				<div class="multi-store-tags-wrapper">
					<?php echo $tags_list; ?>
				</div>
			<?php }
		}

		public static function banner_heading() {
			if( is_page() || is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif(  is_archive() ) {
				the_archive_title( '<h2 class="entry-title">', '</h2>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			} elseif( is_home() && ! is_front_page() ) { // static blog page
				$blog_title = get_the_title( get_option( 'page_for_posts' ) ); ?>
				<h2 class="entry-title"><?php echo esc_html( $blog_title ) ?></h2>
			<?php } elseif( is_home() ) {
				# when home page is latest posts the custom title.
				$blog_title = apply_filters( 'blog_title', multi_store_get( 'blog_page_title' ) ); ?>

				<h2 class="entry-title home-title"><?php echo esc_html( $blog_title ) ?></h2>

			<?php } elseif( is_search() ) {
				get_search_form();
				/* translators: %s: search page result */ 
				?>
				<h2 class="entry-title">
					<?php 
						printf( 
							esc_html__( 'Search Results for: %s', 'multi-store' ), 
							get_search_query()
						);
					?>
				</h2>
			<?php }
		}

		public static function is_active_plugin( $plugin_name ){
			
			switch( $plugin_name ){

				case 'woocommerce':
					return class_exists( 'WooCommerce' );
				break;

				case 'yoast':
					return class_exists( 'WPSEO_Primary_Term' );
				break;

				case 'jetpack':
					return class_exists( 'Jetpack' );
				break;
			}
			return false;
		}

		public static function schema_body( $type ) {
			switch ($type) {
				case 'body' :	
					# Check conditions.
					$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

					# Set up default itemtype.
					$itemtype = 'WebPage';

					# Get itemtype for the blog.
					$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

					# Get itemtype for search results.
					$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
					# Get the result.
					$result = apply_filters( 'multi_store_schema_body_itemtype', $itemtype );

					# Return our HTML.
					echo apply_filters( 'multi_store_schema_body', "itemtype='https://schema.org/" . esc_attr( $result ) . "' itemscope='itemscope' " );
				break;

				case 'header' :
					echo apply_filters( 'multi_store_schema_header', "itemtype='https://schema.org/WPHeader' itemscope='itemscope' role='banner' " );
				break;

				case 'footer' :
				echo apply_filters( 'multi_store_schema_footer', "itemtype='https://schema.org/WPFooter' itemscope='itemscope' role='contentinfo'" );
				break;

				case 'article':
					echo apply_filters( 'multi_store_schema_article', "itemtype='https://schema.org/CreativeWork' itemscope='itemscope'" );
				break;

				default :
			}
		}

		public static function link_pages() {
		    wp_link_pages( array(
		        'before'      => '<div class="multi-store-page-links">' . esc_html__( 'Pages:', 'multi-store' ),
		        'after'       => '</div>',
		        'link_before' => '<span class="multi-store-page-number">',
		        'link_after'  => '</span>'
		    ) );	
		}
	}
}