<?php 
require '../init.php';

if (isset($_POST['delete_data'])) {
	$delete_id = $_POST['delete_id'];
	$delete_res = $obj->delete('staff' , array('id' => $delete_id));
	if ($delete_res) {
		echo "false";
	}else{
		echo "true";
	}
}
