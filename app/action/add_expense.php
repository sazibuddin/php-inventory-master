<?php 	
	require_once '../init.php';

	if (isset($_POST)) {
		$expense_date = $obj->convertDateMysql($_POST['expense_date']);
		$expense_for = $_POST['expense_for'];
		$expense_amount = $_POST['expense_amount'];
		$exp_descrip = $_POST['exp_descrip'];
		$expense_catagory = $_POST['expense_catagory'];
	    $user = $_SESSION['user_id'];

		if (!empty($expense_date) && !empty($expense_for) && !empty($expense_amount)) {
			$query = array(
				'ex_date' => $expense_date,
				'expense_for' => $expense_for,
				'amount' => $expense_amount,
				'expense_cat' => $expense_catagory,
				'ex_description' => $exp_descrip,
				'added_by' => $user,
			);

			$res = $obj->create('expense' , $query);
			if ($res) {
				echo "Expense added successfull";
			}else{
				print_r($pdo->errorInfo());
			}
		}else{
			echo "please filled out required field";
		}
	}
 ?>