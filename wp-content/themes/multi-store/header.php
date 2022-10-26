<?php 
/** 
 * The header for the theme
 *
 * @since Multi Store 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php do_action( 'multi_store_body_attr' ); ?>>
    <?php do_action( 'multi_store_before_header' ); ?>
    <header id="masthead" class="multi-store-main-header">
        <?php
            do_action( 'multi_store_before_main_header' ); 
            do_action( 'multi_store_header' ); 
            do_action( 'multi_store_after_main_header' );
        ?>
    </header>
    <?php do_action( 'multi_store_after_header' );