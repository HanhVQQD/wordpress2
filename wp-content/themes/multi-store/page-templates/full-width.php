<?php 
/*
 * Template Name: Multi Store Full Width
 */
get_header();
?>
<div id="site-content">
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				the_content();
			} 
		}
	?>
</div>
<?php 
get_footer();