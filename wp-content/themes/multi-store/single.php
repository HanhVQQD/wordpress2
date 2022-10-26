<?php 
/**
 * The template for displaying all single posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since Multi Store 1.0
 */

get_header(); 
do_action( 'multi_store_before_content' );

?>
<div class="multi-store-single-post-wrapper">
	<div class="multi-store-container" id="content">
		<div class="multi-store-row">
			<main id="main" class="site-main content-order">
				<?php if ( have_posts() ) : ?>
					<div class="multi-store-row">
						<?php while ( have_posts() ) : the_post(); ?>
							<article class="multi-store-single-content" <?php Multi_Store_Helper::schema_body( 'article' ); ?>>
								<?php the_content(); ?>
								<div class="multi-store-tag-wrapper">
									<?php Multi_Store_Helper::display_tag_list(); ?>
								</div>
							</article>
						<?php endwhile; ?>
					</div>					
				<?php endif; ?>
				<div class="multi-store-nav-wrapper">
					<div class="multi-store-nav-previous">
						<?php previous_post_link( '<i class="fa fa-long-arrow-left"></i> %link', '%title', true ); ?>	
					</div>
					<div class="multi-store-nav-next">
						<?php next_post_link( '%link <i class="fa fa-long-arrow-right"></i> ', '%title', true ); ?>	
					</div>
				</div>
				<?php if ( comments_open() || get_comments_number() ) {
					echo '<div class="multi-store-comment-wrapper">';
					if ( comments_open() || get_comments_number() ) {
						echo '<div class="multi-store-comment-wrapper">';
							comments_template();
						echo '</div>';
					}
				} ?>
			</main>		
			<?php do_action( 'multi_store_sidebar' ); ?>
		</div>	
	</div>
</div>
<?php do_action( 'multi_store_after_content' ); 
get_footer() ?>