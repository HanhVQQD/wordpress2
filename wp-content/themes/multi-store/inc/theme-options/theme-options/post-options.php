<?php
/**
* Post Options
* @since Multi Store 1.0
*/
add_filter( 'multi_store_customizer_theme_panel', 'multi_store_theme_post_options' );
function multi_store_theme_post_options( $section ) {
	$section[ 'theme_post_options' ] = array(
        'title'    => esc_html__( 'Blog/Archive', 'multi-store' ),
        'priority' => 20,
        'fields'   => array(
            'blog_page_title' => array(
                'label'   => esc_html__( 'Home Page Title', 'multi-store' ),
                'default' => esc_html__( 'Blogs', 'multi-store' ),
                'type'    => 'text'
            ),
            'readmore_text' => array(
                'label'   => esc_html__( 'Read More Text', 'multi-store' ),
                'default' => esc_html__( 'Read More', 'multi-store' ),
                'type'    => 'text'
            ),
            'post_per_row' => array(
                'label'   => esc_html__( 'Post Per Row', 'multi-store' ),
                'type'    => 'radio-buttonset',
                'default' => 'three',
                'choices' => array(
                    'one'   => esc_html__( '1', 'multi-store' ),
                    'two'   => esc_html__( '2', 'multi-store' ),
                    'three' => esc_html__( '3', 'multi-store' )
                )  
            ),
            'pagination_format' => array(
                'label'   => esc_html__( 'Post Pagination', 'multi-store' ),
                'type'    => 'radio-buttonset',
                'default' => 'default',
                'choices' => array(
                    'default'   => esc_html__( 'Number', 'multi-store' ),
                    'load-more' => esc_html__( 'Load More', 'multi-store' )
                )
            ),
            'load_more_text' => array(
                'label'           => esc_html__( 'Load More Text', 'multi-store' ),
                'type'            => 'text',
                'default'         => esc_html__( 'Load More', 'multi-store' ),
                'active_callback' => array(
                    array(
                        'setting'  => 'pagination_format',
                        'operator' => '==',
                        'value'    => 'load-more'
                    )
                )
            )
        )
    );
	return $section;
}