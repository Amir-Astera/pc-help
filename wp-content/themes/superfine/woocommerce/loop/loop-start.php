<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $product, $woocommerce_loop;
$pro = '';
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ){
    $pro = ' products';
} 
 
?>
<ul class="products grid-list">