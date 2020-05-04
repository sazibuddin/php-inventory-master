<?php 
	require_once '../init.php';

	if (isset($_POST)) {
		$return_id = $_POST['return_id'];
		$suppliar_id = $_POST['p_supliar'];
		$find_suppliar_name = $obj->find('suppliar','id',$suppliar_id);
	    $find_suppliar_name = $find_suppliar_name->name;
		$return_date = $_POST['return_date'];
		 $product_id = $_POST['product_id'];
		$p_product_name = $_POST['p_product_name'];
		$return_qty = $_POST['p_pn_quantity'];

		// get price section 
		$p_subtotal = $_POST['p_subtotal'];
		$p_discount_amount = $_POST['p_discount_amount'];
		$p_netTotal = $_POST['p_netTotal'];
		$user = $_SESSION['user_id'];


		$return_query = array(
			'sell_id' => $return_id,
			'suppliar_id' => $suppliar_id,
			'suppliar_name' => $find_suppliar_name,
			'return_date' => $return_date,
			'product_id' => $product_id,
			'product_name' => $p_product_name,
			'return_quantity' => $return_qty,
			'subtotal' => $p_subtotal,
			'discount' => $p_discount_amount,
			'netTotal' => $p_netTotal,
			'netTotal' => $p_netTotal,
			'create_by' => $user,
		);
		$res =  $obj->create('purchase_return',$return_query);
		$find_stock = $obj->find('products','id',$product_id);
		 $new_quantity = $find_stock->quantity - $return_qty;
		 $stock_update_qty = array(
		 	'quantity' => $new_quantity, 
		 );
		 $stock_update_res = $obj->update('products','id',$product_id,$stock_update_qty);
		 $status_up_query = array(
		 	'return_status' => 'return'
		 );
		 $status_up_res = $obj->update('purchase_products','id',$return_id,$status_up_query);
		if ($res) {
			echo "yes";
		}else{
			echo "Failed to return product.";
		}
	}
 ?>