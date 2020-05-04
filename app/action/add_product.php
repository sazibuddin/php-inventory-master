<?php 
	require_once '../init.php';


	if (isset($_POST)) {
		$product_name = $_POST['product_name'];
		$product_code = "P".time();
		$brand = $_POST['brand'];
		$p_catagory = $_POST['p_catagory'];
		// find catagory name 
		$p_catagory_name = $obj->find('catagory','id',$p_catagory);
	    $p_catagory_name = $p_catagory_name->name;

		$product_source = $_POST['product_source'];
		$sku = $_POST['sku'];
		$alert_quantity = $_POST['alert_quantity'];
		$user_id = $_SESSION['user_id'];


		if (!empty($product_name) && !empty($brand) && !empty($p_catagory) && !empty($product_source) && !empty($alert_quantity)) {
			// prodcut add query 
			$query = array(
				'product_name'	 => $product_name,				
				'product_id'	 => $product_code,				
				'brand_name'	 => $brand,						
				'catagory_id'	 => $p_catagory,						
				'catagory_name'	 => $p_catagory_name,						
				'product_source' => $product_source,				
				'sku' 			 => $sku,					
				'alert_quanttity'=> $alert_quantity,		
				'added_by' 		 => $user_id,			
			);
			$res = $obj->create('products', $query);
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