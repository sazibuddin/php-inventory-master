<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$p_supliar = $_POST['p_supliar'];
		$puchar_date = $obj->convertDateMysql($_POST['puchar_date']);
		$p_product_name = $_POST['p_product_name'];
		$product_f_name = $obj->find('products','id',$p_product_name);
		$product_f_name =$product_f_name->product_name;
		$p_p_quantity = $_POST['p_p_quantity'];
		$p_pn_quantity = $_POST['p_pn_quantity'];
		// pass this variable in query 
		$new_quantity = $p_p_quantity + $p_pn_quantity;

		$p_p_price = $_POST['p_p_price'];
		$p_p_sell_price = $_POST['p_p_sell_price'];
		$p_subtotal = $_POST['p_subtotal'];
		// $p_discount_amount = $_POST['p_discount_amount'];
		$prev_total_due = $_POST['supliar_prev_total_due'];
		$p_netTotal = $_POST['p_netTotal'];
		$p_paidBill = $_POST['p_paidBill'];
		$p_dueBill = $_POST['p_dueBill'];
		$p_payMethode = $_POST['p_payMethode'];
		$user = $_SESSION['user_id'];

		// find suppliar previous transition 
		$find_suppliar = $obj->find('suppliar','id',$p_supliar);
		$prev_total_buy = $find_suppliar->total_buy;
		$prev_total_paid = $find_suppliar->total_paid;
		$new_total_buy = $prev_total_buy + $p_subtotal;
	    $new_total_paid = $prev_total_paid + $p_paidBill;
	    $suppliar_name = $find_suppliar->name;



		$buy_query = array(
			'product_id' => $p_product_name,
			'product_name' => $product_f_name,
			'purchase_date' => $puchar_date,
			'purchase_suppliar' => $p_supliar,
			'suppliar_name' => $suppliar_name,
			'prev_quantity' => $p_p_quantity,
			'purchase_quantity' => $p_pn_quantity,
			'purchase_price' => $p_p_price,
			'purchase_sell_price' => $p_p_sell_price,
			'purchase_subtotal' => $p_subtotal,
			'prev_total_due' => $prev_total_due,
			'purchase_net_total' => $p_netTotal,
			'purchase_paid_bill' => $p_paidBill,
			'purchase_due_bill' => $p_dueBill,
			'purchase_pamyent_by' => $p_payMethode,
			'added_by' => $user,
		);
		$res = $obj->create('purchase_products',$buy_query);
		$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
		$invoice_no = $stmt->fetchColumn();
		if ($res) {
			$prodcu_stock_update_query = array(
				'quantity' => $new_quantity,
				'buy_price' => $p_p_price,
				'sell_price' => $p_p_sell_price,
				'last_update_at' => $puchar_date,
			);
			$product_update_res = $obj->update('products','id',$p_product_name,$prodcu_stock_update_query);
			// end of stock update 
			// payment option start 
			$insert_payment = array(
		    	'suppliar_id' => $p_supliar,
		    	'payment_date' => $puchar_date,
		    	'payment_amount' => $p_paidBill,
		    	'payment_type' => $p_payMethode,
		    	'added_by' => $user,
			);

			$payment_res = $obj->create('purchase_payment' , $insert_payment);
			// payment option end 

			//suppliar update

			$suppliar_update_query = array(
				'total_buy' => $new_total_buy,
				'total_paid' => $new_total_paid,
				'total_due' => $p_dueBill,
			);

			$suppliar_update_res = $obj->update('suppliar','id' , $p_supliar,$suppliar_update_query);
			if ($product_update_res) {
				echo "yes";
			}else{
				echo "something wrong please try again";
			}
		}else{
			echo "something wrong please try again";
		}

	}
 ?>