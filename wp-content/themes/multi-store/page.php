<?php
/**
 * Single Page 
 * 
 * @since Multi Store 1.0
 */
get_header();
do_action( 'multi_store_before_content' ); ?>

<div class="multi-store-single-post-wrapper">
	<div class="multi-store-container" id="content">
		<main id="main" class="site-main">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="multi-store-single-content" <?php Multi_Store_Helper::schema_body( 'article' ); ?>>
						<?php 
							the_content(); 
							Multi_Store_Helper::link_pages();
						?>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>	
		</main>
	</div>	
</div>
<?php get_footer();