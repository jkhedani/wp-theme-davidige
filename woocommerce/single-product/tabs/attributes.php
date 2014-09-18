<?php
/**
 * Attributes Tab
 */
 
global $woocommerce, $post, $product;

$show_attr = ( get_option( 'woocommerce_enable_dimension_product_attributes' ) == 'yes' ? true : false );

if ( $product->has_attributes() || ( $show_attr && $product->has_dimensions() ) || ( $show_attr && $product->has_weight() ) ) {
	?>
	<div class="panel entry-content" id="tab-attributes">
	
		<?php $heading = apply_filters('woocommerce_product_additional_information_heading', __('Additional Information', 'woocommerce')); ?>
		
		<h3><?php echo $heading; ?></h3>
		
		<?php $product->list_attributes(); ?>
	
	</div>
	<?php
}
?>