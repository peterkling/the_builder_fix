<?php


/* fix broken theme stuff */

function _fix_theme_setup() {
	// we'll use our own woocommerce_css, 
	remove_action('wp_print_styles', 'wip_woo_custom_css');
	add_action('wp_print_styles', '_fix_wip_woo_custom_css'); // find in fixed_functions.php

	// remove default catalog ordering properly
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


	
}
add_action( 'after_setup_theme', '_fix_theme_setup' );


/* fix woocommerce 2.0 stuff */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

?>