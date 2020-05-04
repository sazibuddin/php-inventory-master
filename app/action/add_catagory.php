<?php 
require '../init.php';
	if (isset($_POST)) {
		$cat_name = $obj->escape($_POST['cat_name']);
		$cat_descrip = $obj->escape($_POST['cat_descrip']);
		$user = $_SESSION['user_id'];
		if (!empty($cat_name)) {
			  $query = array(
			 	'name' => $cat_name , 
			 	'description' => $cat_descrip,
			 	'created_by' => $user
			 );

		$res = $obj->create('catagory' , $query);
		if ($res) {
			echo "yes";
		}else{
			echo "Failed to add catagory";
		}
	}else{
		echo "Name field required";
		}
	}
 ?>