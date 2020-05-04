<?php 
	require_once '../init.php';

	if (isset($_POST)) {
		$sup_name = $_POST['sup_name'];
		$sup_company = $_POST['sup_company'];
		$sup_contact = $_POST['sup_contact'];
		$sup_email = $_POST['sup_email'];
		$sup_open_blacnce = $_POST['sup_open_blacnce'];
		$sup_reg_date = $obj->convertDateMysql($_POST['sup_reg_date']);
		$supaddress = $_POST['supaddress'];
	    $suppliar_id = "S".time();
	    $user = $_SESSION['user_id'];

		if (!empty($sup_name)) {
			$query = array(
				'suppliar_id' => $suppliar_id,
				'name' => $sup_name,
				'company' => $sup_company,
				'address' => $supaddress,
				'con_num' => $sup_contact,
				'email' => $sup_email,
				'total_due' => $sup_open_blacnce,
				'reg_date' => $sup_reg_date,
				'update_by' => $user
			);

			$res = $obj->create('suppliar' , $query);
			$laset_id = $pdo->query("SELECT LAST_INSERT_ID()");
			$laset_id = $laset_id->fetchColumn();
			if ($res) {
				$add_py_query = array(
					'supliar_id' => $laset_id,
					'due_blance' => $sup_open_blacnce,
				);
				$res = $obj->create('suppliar_balance',$add_py_query);
				echo "yes";
			}else{
				echo "Failed to add member. please try again";
			}
		}else{
			echo "Name field required";
		}
	}


 ?> 