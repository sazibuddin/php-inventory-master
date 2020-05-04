<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		 $customer_id = $_POST['customer_id'];
		$payment_date = $obj->convertDateMysql($_POST['payment_date']);
		$pay_amount = $_POST['pay_amount'];
		$pay_type = $_POST['pay_type'];
		$pay_descrip = $_POST['pay_descrip'];
		$user = $_SESSION['user_id'];


		if (!empty($payment_date) && !empty($pay_amount)) {
			
			$pay_inser_query = array(
		    	'customer_id' => $customer_id,
		    	'payment_date' => $payment_date,
		    	'payment_amount' => $pay_amount,
		    	'payment_type' => $pay_type,
		    	'pay_description' => $pay_descrip,
		    	'added_by' => $user,
		    );
		    $res = $obj->create('sell_payment',$pay_inser_query);
		    if ($res) {
		    // get purchse table payment
			  $sell_info = $obj->find('member','id',$customer_id);
			   $new_paid = $pay_amount + $sell_info->total_paid;
		       $new_due = $sell_info->total_due - $pay_amount;

		    $update_query = array(
		    	'total_paid' => $new_paid,
		    	'total_due' => $new_due,
		    ); 

		    $payment_update_res = $obj->update('member','id',$customer_id,$update_query);
		    if ($payment_update_res) {
		    	echo "Payment successfull";
		    }else{
		    	echo "something wrong . please try agiain";
		    }
		    }else{
		    	echo "something wrong . please try agiain";
		    }

		}else{
			echo "please filled out all required filled";
		}
	}
 ?>