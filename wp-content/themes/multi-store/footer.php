<?php
/**
 * Theme footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Multi Store 1.0
 */ 
?>
        <?php do_action( 'multi_store_before_footer' ); ?>
        <footer <?php do_action( 'multi_store_footer_attr' ); ?> class="multi-store-footer-copyright">
            <?php do_action( 'multi_store_footer' ); ?>
        </footer>
        <?php do_action( 'multi_store_after_footer' ); ?>
        <?php wp_footer(); ?>
    </body>
</html>