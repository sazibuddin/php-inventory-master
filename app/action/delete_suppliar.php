<?php 
require '../init.php';

if (isset($_POST['delete_data'])) {
	$delete_id = $_POST['delete_id'];
	$find_suppliar_payment = $obj->find('purchase_payment','suppliar_id',$delete_id);

	if ($find_suppliar_payment) {
		echo "You have no permission to delete this suppliar";
	}else{
		$delete_res = $obj->delete('suppliar' , array('id' => $delete_id));
	if ($delete_res) {
		echo "Faile to delete suppliar";
	}else{
		echo "true";
	}

	}
	
}
