<?php 
require_once '../init.php';
	if (isset($_POST)) {
		$invoice_id = $_POST['invoice_id'];
		$customer = $_POST['customer_name'];
		$orderdate = $obj->convertDateMysql($_POST['orderdate']);

		// now get the array value 

		$prev_order_qty = $_POST['prev_order_qty'];

		$orderQuantity = $_POST['orderQuantity'];
		$price = $_POST['price'];
		$totalPrice = $_POST['totalPrice'];
		$pro_name = $_POST['pro_name'];
		$pid = $_POST['pid'];

		// first stock update info from hidden field
		$up_pid = $_POST['up_pid'];
		$up_quantity = $_POST['up_quantity'];

		$subtotal = $_POST['subtotal'];
		$prev_due = $_POST['prev_due'];
		$netTotal = $_POST['netTotal'];
		$paidBill = $_POST['paidBill'];
		$dueBill = $_POST['dueBill'];
		$payMethode = $_POST['payMethode'];

		// find this customer and invoice info 

		$customer_info = $obj->find('member','id',$customer);
		$invoice_info = $obj->find('invoice','id', $invoice_id);

		// update cutomer balance
		  $cust_total_buy = $customer_info->total_buy - $invoice_info->sub_total;
		  $cust_total_paid = $customer_info->total_paid - $invoice_info->paid_amount;
		  $cust_total_due = $invoice_info->pre_cus_due;
		  $customer_blnce_up = array(
		  	'total_buy' => $cust_total_buy,
		  	'total_paid' => $cust_total_paid,
		  	'total_due'  => $cust_total_due,
		  );

		  $cus_update_res = $obj->update('member','id',$customer,$customer_blnce_up);
		for ($i=0; $i < count($up_pid) ; $i++) { 
			$select_product_data = $pdo->prepare("SELECT * FROM `products` WHERE `id` = $up_pid[$i]");
				$select_product_data->execute();
			 $res = $select_product_data->fetch(PDO::FETCH_OBJ);
				
				$new_quantity =$res->quantity + $up_quantity[$i]; 

			    $stck_update_query = array(
			    	'quantity' => $new_quantity
			    );

			    $stck_update_res = $obj->update('products','id',$res->id, $stck_update_query);
		}

		$invoice_details_del_query = $pdo->prepare("DELETE FROM `invoice_details` WHERE `invoice_no` = $invoice_id");
		$del_res = $invoice_details_del_query->execute();
		$payment_del_query = $pdo->prepare("DELETE FROM `sell_payment` WHERE `customer_id` = $customer ORDER BY `id` DESC LIMIT 1");
		$paymen_del = $payment_del_query->execute();
		
		// invoice table update option 

		$invoice_table_up_query = array(
			'sub_total' => $subtotal,
			'pre_cus_due' => $prev_due,
			'net_total' => $netTotal,
			'paid_amount' => $paidBill,
			'due_amount' => $dueBill,
			'payment_type' => $payMethode
		);
		$invoice_table_up_res = $obj->update('invoice','id',$invoice_id,$invoice_table_up_query);
		// insert data in invoice details table 
		for ($i=0; $i <count($totalPrice) ; $i++) { 
				// substract quantity
			$select_product_data = $pdo->prepare("SELECT * FROM `products` WHERE `id` = $pid[$i]");
				$select_product_data->execute();
				$res = $select_product_data->fetch(PDO::FETCH_OBJ);
			    $new_quantity =$res->quantity - $orderQuantity[$i]; 

			    $stck_update_query = array(
			    	'quantity' => $new_quantity
			    );
			     $stck_update_res = $obj->update('products','id',$res->id, $stck_update_query);

			    $insert_product = $pdo->prepare("INSERT INTO `invoice_details`(`invoice_no`,`pid`, `product_name`, `price`, `quantity`) VALUES (?,?,?,?,?)");
				$insert_product->bindParam(1,$invoice_id,PDO::PARAM_INT);
				$insert_product->bindParam(2,$pid[$i],PDO::PARAM_INT);
				$insert_product->bindParam(3,$pro_name[$i],PDO::PARAM_STR);
				$insert_product->bindParam(4,$totalPrice[$i],PDO::PARAM_STR);
				$insert_product->bindParam(5,$orderQuantity[$i],PDO::PARAM_STR);
				$insert_product->execute();
		}
		$payment_query = array(
		    	'customer_id' => $customer,
		    	'payment_date' => $orderdate,
		    	'payment_amount' => $paidBill,
		    	'payment_type' => $payMethode,
		    	'added_by' => $_SESSION['user_id'],
			);
			$payment_res = $obj->create('sell_payment',$payment_query);
			// find customer previous transition 
			$find_customer_stmt = $obj->find('member','id',$customer);
			$prev_total_buy = $find_customer_stmt->total_buy;
			$prev_total_paid = $find_customer_stmt->total_paid;
			$new_total_buy = $prev_total_buy + $subtotal;
		    $new_total_paid = $prev_total_paid + $paidBill;

		    $member_update_query = array(
				'total_buy' => $new_total_buy,
				'total_paid' => $new_total_paid,
				'total_due' => $dueBill,
			);

			$suppliar_update_res = $obj->update('member','id' , $customer,$member_update_query);

			echo  $invoice_id;






		
	}
 ?>