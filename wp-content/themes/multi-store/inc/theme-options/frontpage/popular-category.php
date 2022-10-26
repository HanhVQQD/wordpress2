<?php
/**
 * Popular Categories Options
 * @since Multi Store 1.0
 */
add_filter( 'multi_store_customizer_frontpage_panel', 'multi_store_frontpage_popuplar_category_options' );
function multi_store_frontpage_popuplar_category_options( $section ) {
    $choices = multi_store_wc()->get_categories_choices();
	$section[ 'multi_store_customizer_frontpage_popular_categories' ] = array(
        'title'  => esc_html__( 'Popular Category One', 'multi-store' ),
        'fields' => array(
            'product_category_1' => array(
                'label'   => esc_html__( 'Select a Product Category', 'multi-store' ),
                'type'    => 'select',
                'choices' => $choices
            ),
            'product_category_2' => array(
                'label'   => esc_html__( 'Select a Product Category', 'multi-store' ),
                'type'    => 'select',
                'choices' => $choices
            ),
            'product_category_3' => array(
                'label'   => esc_html__( 'Select a Product Category', 'multi-store' ),
                'type'    => 'select',
                'choices' => $choices
            ),
            'product_category_button_text' => array(
                'label'   => esc_html__( 'Button Text', 'multi-store' ),
                'type'    => 'text',
                'default' => esc_html__( 'View Products', 'multi-store' )
            )
        ),
    );

	return $section;
}