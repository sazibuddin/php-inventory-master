<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$id = $_POST['id'];
		$product_name = $_POST['product_name'];
		$brand = $_POST['brand'];
		$p_catagory = $_POST['p_catagory'];

		$p_catagory_name = $obj->find('catagory','id',$p_catagory);
	    $p_catagory_name = $p_catagory_name->name;

		$product_source = $_POST['product_source'];
		$quantity = $_POST['quantity'];
		$alert_quantity = $_POST['alert_quantity'];
		$selling_price = $_POST['selling_price'];
		$date = date('Y-m-d');


			// prodcut add query 
			$query = array(
				'product_name'	 => $product_name,				
				'brand_name'	 => $brand,						
				'catagory_id'	 => $p_catagory,						
				'catagory_name'	 => $p_catagory_name,						
				'product_source' => $product_source,				
				'quantity' 		 => $quantity,			
				'alert_quanttity'=> $alert_quantity,			
				'sell_price' 	 => $selling_price,			
				'last_update_at' 	 => $date,			
			);
			$res = $obj->update('products','id',$id, $query);
			if ($res) {
				echo "Product edit successfull";
			}else{
				echo "Failed to update product";
			}
	}
 ?> 