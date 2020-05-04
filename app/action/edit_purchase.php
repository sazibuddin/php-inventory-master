<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$edit_id = $_POST['edit_id'];
		$p_supliar = $_POST['p_supliar'];
		$puchar_date = $obj->convertDateMysql($_POST['puchar_date']);
		$p_product_name = $_POST['p_product_name'];
		$product_id = $_POST['product_id'];
		$p_p_quantity = $_POST['p_p_quantity'];
		$p_pn_quantity = $_POST['p_pn_quantity'];
		$this_buy_qnty = $_POST['this_buy_qnty'];
		$edit_qty = $this_buy_qnty - $p_pn_quantity;
		// pass this variable in query 
		$new_quantity = $p_p_quantity - $edit_qty;

		$p_p_price = $_POST['p_p_price'];
		$p_p_sell_price = $_POST['p_p_sell_price'];
		$p_subtotal = $_POST['p_subtotal'];
		$p_discount_amount = $_POST['p_discount_amount'];
		$p_netTotal = $_POST['p_netTotal'];
		$p_paidBill = $_POST['p_paidBill'];
		$p_dueBill = $_POST['p_dueBill'];
		$p_payMethode = $_POST['p_payMethode'];
		$user = $_SESSION['user_id'];




		


		$query = array(
			'purchase_date' => $puchar_date,
			'purchase_suppliar' => $p_supliar,
			'purchase_quantity' => $p_pn_quantity,
			'purchase_price' => $p_p_price,
			'purchase_sell_price' => $p_p_sell_price,
			'purchase_subtotal' => $p_subtotal,
			'purchase_discount_amount' => $p_discount_amount,
			'purchase_net_total' => $p_netTotal,
			'purchase_paid_bill' => $p_paidBill,
			'purchase_due_bill' => $p_dueBill,
			'purchase_pamyent_by' => $p_payMethode,
		);
		$res = $obj->update('purchase_products','id',$edit_id , $query);

		if ($res) {
			$prodcu_stock_update_query = array(
				'quantity' => $new_quantity,
				'buy_price' => $p_p_price,
				'sell_price' => $p_p_sell_price,
				'last_update_at' => $puchar_date,
			);
			$product_update_res = $obj->update('products','id',$product_id,$prodcu_stock_update_query);
			// update suppliar blance data
			// $payment_query = array(
			// 	'paid_blance' => $single_payment_paid,
			// 	'due_blance' => $single_payment_due,
			// 	'total_transaction' => $single_payment_total,
			// );
			// $sup_pay_update = $obj->update('suppliar_balance','id' , $single_payment_id,$payment_query);
			//endf of update suppliar blance data
			// payment option update
			$this_payment = $obj->find('purchase_payment','invoice_id',$edit_id);
			$this_payment_id = $this_payment->id;

		// this payment update 	
			$payment_update = array(
			'payment_amount' => $p_paidBill,
			'payment_type' => $p_payMethode,
			'last_update' => $puchar_date,
			);
			$paymnent_update_res = $obj->update('purchase_payment','id',$this_payment_id,$payment_update);
		

			if ($product_update_res) {
				echo "purchase update successfull";
			}else{
				echo "something wrong please try again";
			}
		}else{
			echo "something wrong please try again 2";
		}
	     

	}
 ?>