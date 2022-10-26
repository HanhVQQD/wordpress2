<?php
/**
 * Template for individual post
 * 
 * @since Multi Store 1.0
 */ ?>
<article <?php post_class( 'multi-store-content' ); ?> <?php Multi_Store_Helper::schema_body( 'article' ); ?> >
	<div class="multi-store-post-thumbnail">
	    <a href="<?php the_permalink(); ?>" alt="<?php esc_attr_e( 'Post Thumbnail', 'multi-store' ); ?>">
	    	<?php 
	    		if( has_post_thumbnail() ){
	    			the_post_thumbnail();
	    		}else{
	    			echo sprintf( '<img src="%s" alt="%s" />',
	    				get_template_directory_uri() .'/assets/img/default-image.jpg',
	    				esc_html__( 'Dummy Post Thumbnail', 'multi-store' )
	    			);
	    		}
	    	?>
	    </a>
	</div>

	<h2 class="multi-store-post-title">
	    <a href="<?php the_permalink(); ?>">            
	        <?php the_title(); ?>
	    </a>
	</h2>

	<div class="multi-store-post-category">
	    <?php Multi_Store_Helper::the_category(); ?>
	</div>

	<div class="multi-store-post-meta">
	    <?php 
	    	Multi_Store_Helper::posted_by( get_the_ID() );
	    	Multi_Store_Helper::the_date();                    
	    	Multi_Store_Helper::comment_number(); 
	    ?>
	</div>

	<div class="multi-store-post-excerpt">     
	    <?php the_excerpt(); ?>
	</div>
</article>