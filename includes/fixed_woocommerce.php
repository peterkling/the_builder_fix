<?php 




add_filter( 'woocommerce_checkout_fields' , '_fix_builder_woocommerce_checkout_fields' );
 
function _fix_builder_woocommerce_checkout_fields( $fields ) {
     $fields['billing']['billing_address_1']['class'] = array("form-row-first");
     $fields['billing']['billing_address_2']['class'] = array("form-row-last");
     $fields['billing']['billing_address_2']['label'] = __( 'Address 2', 'woocommerce' );
     $fields['billing']['billing_address_2']['placeholder'] = __( 'Address 2', 'woocommerce' );

     
     $fields['billing']['billing_postcode']['class'] = array("form-row-last");
     $fields['billing']['billing_postcode']['clear'] = 0;
     $fields['billing']['billing_postcode']['label'] = __( 'Postcode/Zip', 'woocommerce' );
     $fields['billing']['billing_postcode']['placeholder'] = __( 'Postcode/Zip', 'woocommerce' );
     $fields['billing']['billing_city']['class'] = array("form-row-first");

     return $fields;
}



?>