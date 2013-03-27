<?php 


/**
 * top shopping cart
 * replace at: header.php:57
 */
function _fix_wip_top_cart(){
	global $woocommerce;
	$subTotal = $woocommerce->cart->get_cart_subtotal();
	$cartpage = get_permalink(woocommerce_get_page_id('cart'));
	
	ob_start();
    the_widget('WC_Widget_Cart', array(
    		'title' => __('Shopping Cart', 'wip')
    	), 
    	array(
			'widget_id'=>'wip-top-cart',
			'before_title' => '<h3 id="wip_topcart_title">',
			'after_title' => '</h3>',
			'before_widget' => '',
			'after_widget' => ''
    ));
    $woo_cart = ob_get_clean();

	$top_cart = '<div id="wip_woo_cart"'._wip_logo_on_right().'>' . "\n";
	$top_cart .= '<a class="wip_woo_inner_cart" href="' . $cartpage . '"><span class="top_cart_text">'. __('Shopping Cart', 'wip') .' &mdash; '. $subTotal .'</span></a>' . "\n";
	$top_cart .= '<div class="wip_woo_cart_drop">' . "\n";
	$top_cart .= str_replace(' &rarr;', '', $woo_cart);
	$top_cart .= '</div>' . "\n";
	$top_cart .= '</div>' . "\n";

	return $top_cart;

}



function _fix_wip_woo_custom_css(){
	if(!is_admin()){
		wp_register_style( '_fix_wip_woocommerce', '/wp-content/themes/builder_fix/css/woocommerce_custom.css', array('wip_base'), '1.0');
		wp_enqueue_style( '_fix_wip_woocommerce' );
	}
}

add_action('wp_print_scripts', '_fix_wip_register_js',30);

function _fix_wip_register_js() {
		wp_register_script('_fix_global', '/wp-content/themes/builder_fix/js/global.js', array('jquery', 'prettyPhoto'), $theBuilder_db_version );
	wp_dequeue_script( 'global' );	
	wp_enqueue_script( '_fix_global' );	
}


?>