<?php
/**
 * Sorting
 */
?>
<form class="woocommerce_ordering" method="POST">
	<div>
	<select name="sort" class="orderby">
		<?php
			$catalog_orderby = apply_filters('woocommerce_catalog_orderby', array(
				'menu_order' 	=> __('Default sorting', 'woocommerce'),
				'title' 		=> __('Sort alphabetically', 'woocommerce'),
				'date' 			=> __('Sort by most recent', 'woocommerce'),
				'price' 		=> __('Sort by price', 'woocommerce')
			));

			foreach ( $catalog_orderby as $id => $name ) 
				echo '<option value="' . $id . '" ' . selected( $_SESSION['orderby'], $id, false ) . '>' . $name . '</option>';
		?>
	</select>
	</div>
</form>