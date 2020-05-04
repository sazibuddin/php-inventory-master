<?php 
	require_once '../init.php';

	if (isset($_POST['find_p_details'])) {
		$p_product_id = $_POST['p_product_id'];

		$product = $obj->find('products','id' , $p_product_id);

		echo json_encode($product);
	}
 ?>