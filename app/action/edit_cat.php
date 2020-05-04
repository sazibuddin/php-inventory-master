<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$id = $_POST['id'];
		$cat_name = $_POST['cat_name'];
		$cat_descrip = $_POST['cat_descrip'];
		$cat_descrip = $_POST['cat_descrip'];
		$up_date = date('Y-m-d');
		$query = array(
					'name' 		  => $cat_name,
					'description' => $cat_descrip,
					'update_at' => $up_date
				);
		$res = $obj->update('catagory','id',$id, $query);

		if ($res) {
			echo "yes";
		}else{
			echo "no";
		}
	}


 ?>