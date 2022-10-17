<?php
//about theme info
add_action( 'admin_menu', 'skt_plants_abouttheme' );
function skt_plants_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-plants'), esc_html__('About Theme', 'skt-plants'), 'edit_theme_options', 'skt_plants_guide', 'skt_plants_mostrar_guide');   
} 
//guidline for about theme
function skt_plants_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-plants'); ?>
		   </div>
          <p><?php esc_html_e('SKT Plants is a garden landscape recycle based responsive flexible easy to use lightweight WordPress theme based on Gutenberg block editor. Can be used for conservation, eco friendly, green renewable energy, non profit, NGO, ecology, gardening, earth, environment, wind, hydro, nature, agriculture, farming, flowers, organic, nursery, wildlife preservation, lawn, fertilizer, forest, bio etc.','skt-plants'); ?></p>
          <a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-plants'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-plants'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-plants'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>