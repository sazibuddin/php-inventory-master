<?php 
	require_once '../init.php';

	if (isset($_POST)) {
		$expense_catName = $_POST['expense_catName'];
		$expesecatDescrip = $_POST['expesecatDescrip'];
		$user = $_SESSION['user_id'];

		if (!empty($expense_catName)) {
			$query = array(
				'name' => $expense_catName,
				'description' => $expesecatDescrip,
				'added_by' => $user
			);
			$res = $obj->create('expense_catagory',$query);
			if ($res) {
				echo "yes";
			}else{
				echo "Failed to add expense catagory";
			}
		}else{
			echo "Catagory name reuired";
		}
	}
 ?>