<?php 
	require_once '../init.php';

	if (isset($_POST)) {
		$name = $_POST['name'];
		$company = $_POST['company'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$cus_open_blacnce = $_POST['cus_open_blacnce'];
		$reg_date = $obj->convertDateMysql($_POST['reg_date']);
	    $get_m_name = "C".time();

		if (!empty($name)) {
			$query = array(
				'member_id' => $get_m_name,
				'name' => $name,
				'company' => $company,
				'address' => $address,
				'con_num' => $contact,
				'email' => $email,
				'total_due' => $cus_open_blacnce,
				'reg_date' => $reg_date,
				'update_by' => 1
			);

			$res = $obj->create('member' , $query);
			$laset_id = $pdo->query("SELECT LAST_INSERT_ID()");
			$laset_id = $laset_id->fetchColumn();
			if ($res) {
				$add_py_query = array(
					'cus_id' => $laset_id,
					'due_blance' => $cus_open_blacnce,
				);

				$res = $obj->create('customer_blance',$add_py_query);
				 echo "yes";
			}else{
				echo "Failed to add member. please try again";
			}
		}else{
			echo "Name field required";
		}
	}


 ?>