<?php 
	require '../init.php';

	if (isset($_POST)) {
		$return_id = $_POST['return_id'];
		$customer_id = $_POST['customer_id'];
		$customer_name = $_POST['customer_name'];


		// product information
		$pid = $_POST['pid'];
		$pro_name = $_POST['pro_name'];
		$orderQuantity = $_POST['orderQuantity'];
		$returnQty = $_POST['returnQty'];
		$sellPrice = $_POST['sellPrice'];


		$return_subtotal = $_POST['return_subtotal'];
		$return_netTotal = $_POST['return_netTotal'];
		$return_date = $obj->convertDateMysql($_POST['return_date']);
		

		$stmt = $pdo->prepare("INSERT INTO `sell_return`(`customer_id`, `customer_name`, `invoice_id`, `return_date`, `amount`) VALUES (?,?,?,?,?)");

		$stmt->bindParam(1, $customer_id , PDO::PARAM_INT);
		$stmt->bindParam(2, $customer_name , PDO::PARAM_STR);
		$stmt->bindParam(3, $return_id , PDO::PARAM_STR);
		$stmt->bindParam(4, $return_date , PDO::PARAM_STR);
		$stmt->bindParam(5, $return_netTotal , PDO::PARAM_STR);
		$stmt->execute() or die("failed");
		$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
		$return_no = $stmt->fetchColumn();

		if ($return_no != null) {
			for ($i=0; $i < count($orderQuantity); $i++) { 
				// update product quantity
				$select_product_data = $pdo->prepare("SELECT * FROM `products` WHERE `id` = $pid[$i]");
				$select_product_data->execute();
				$res = $select_product_data->fetch(PDO::FETCH_OBJ);
			    $new_quantity =$res->quantity + $returnQty[$i]; 

			    $stck_update_query = array(
			    	'quantity' => $new_quantity
			    );

			    $stck_update_res = $obj->update('products','id',$res->id, $stck_update_query);
			}
			$invoice_status_up_query = array(
				'return_status' => 'return'
			);
			    $invoice_status_up_res = $obj->update('invoice','id',$return_id, $invoice_status_up_query);
			    echo "yes";
		}else{
			echo "something goes wrong. please try again";
		}




	}
 ?>