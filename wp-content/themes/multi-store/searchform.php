<?php
/**
 * Template for displaying search forms
 *
 * @since Multi Store 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'multi-store' ); ?></span>
        <input 
            type="search" 
            class="search-field" 
            placeholder="<?php echo sprintf( '%1$s...', esc_attr__( 'Search', 'multi-store' ) ); ?>" 
            value="<?php echo esc_attr( get_search_query() ); ?>" 
            name="s"
        />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">
            <?php echo esc_html_x( 'Search', 'submit button', 'multi-store' ); ?>			
        </span>
        <i class="fa fa-search"></i>
    </button>
</form>