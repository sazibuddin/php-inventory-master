<?php 
require '../init.php';

if (isset($_POST['delete_data'])) {
	$delete_id = $_POST['delete_id'];

	$find_member_payment = $obj->find('sell_payment','customer_id',$delete_id);

	if ($find_member_payment) {
		echo "You have no permission to delete this customer";
	}else{
		$delete_res = $obj->delete('member' , array('id' => $delete_id));
		if ($delete_res) {
			echo "Failed to delete customer";
		}else{
			echo "true";
		}		
	}
}
