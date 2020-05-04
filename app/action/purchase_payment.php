<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		 $suppliar_id = $_POST['suppliar_id'];
		$payment_date = $obj->convertDateMysql($_POST['payment_date']);
		$pay_amount = $_POST['pay_amount'];
		$pay_type = $_POST['pay_type'];
		$pay_descrip = $_POST['pay_descrip'];
		$user = $_SESSION['user_id'];

		if (!empty($payment_date) && !empty($pay_amount)) {
			
			$pay_inser_query = array(
		    	'suppliar_id' => $suppliar_id,
		    	'payment_date' => $payment_date,
		    	'payment_amount' => $pay_amount,
		    	'payment_type' => $pay_type,
		    	'pay_description' => $pay_descrip,
		    	'added_by' => $user,
		    );
		    $res = $obj->create('purchase_payment',$pay_inser_query);
		    if ($res) {
		    	// get Suppliar  payment info
			$suppliar_payment_info = $obj->find('suppliar','id',$suppliar_id);
			$new_paid = $pay_amount + $suppliar_payment_info->total_paid;
		    $new_due = $suppliar_payment_info->total_due - $pay_amount;

		    $update_query = array(
		    	'total_paid' => $new_paid,
		    	'total_due' => $new_due,
		    ); 

		    $payment_update_res = $obj->update('suppliar','id',$suppliar_id,$update_query);
		    if ($payment_update_res) {
		    	echo "yes";
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