<?php 
	require_once '../init.php';


	if (isset($_POST)) {
		$product_name = $_POST['product_name'];
		$product_code = strtoupper(substr($product_name, 0,1)).time();
		$brand = $_POST['brand'];
		$p_catagory = $_POST['p_catagory'];
		// find catagory name 
		$p_catagory_name = $obj->find('catagory','id',$p_catagory);
	    $p_catagory_name = $p_catagory_name->name;

		$sku = $_POST['sku'];
		$quantity = $_POST['quantity'];
		$alert_quantity = $_POST['alert_quantity'];
		$product_expense = $_POST['product_expense'];
		$selling_price = $_POST['selling_price'];
		$user_id = $_SESSION['user_id'];


		if (!empty($product_name) && !empty($brand) && !empty($p_catagory) && !empty($alert_quantity) && !empty($quantity) && !empty($alert_quantity)) {
			// prodcut add query 
			$query = array(
				'product_name'	 => $product_name,				
				'product_id'	 => $product_code,				
				'brand_name'	 => $brand,						
				'catagory_id'	 => $p_catagory,						
				'catagory_name'	 => $p_catagory_name,				
				'sku' 			 => $sku,				
				'quantity' 		 => $quantity,			
				'alert_quantity' => $alert_quantity,				
				'product_expense' 	 => $product_expense,				
				'sell_price' 	 => $selling_price,			
				'added_by' 		 => $user_id,			
			);
			$res = $obj->create('factory_products', $query);
			if ($res) {
				echo "yes";
			}else{
				echo "Failed to add product";
			}
		}else{
			echo "Please filled out all required field";
		}
	}
 ?>