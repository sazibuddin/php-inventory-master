<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$user = $_SESSION['user_id'];
		if (!empty($name) && !empty($designation) && !empty($contact) && !empty($address)) {
			$query = array(
				'name' => $name,
				'designation' => $designation,
				'con_no' => $contact,
				'email' => $email,
				'address' => $address,
				'added_by' => $user,
			);
			$res = $obj->create('staff',$query);

			if ($res) {
				echo "yes";
			}else{
				echo "Failed to add staff";
			}
		}else{
			echo "please filled out all required field";
		}
	}
 ?>