<?php
/**
 * External Add to Cart
 */
?>
<?php do_action('woocommerce_before_add_to_cart_button'); ?>

<p class="cart"><a href="<?php echo $product_url; ?>" rel="nofollow" class="single_add_to_cart_button tinyButton roundButton alt"><?php echo apply_filters('single_add_to_cart_text', $button_text, 'external'); ?></a></p>

<?php do_action('woocommerce_after_add_to_cart_button'); ?>