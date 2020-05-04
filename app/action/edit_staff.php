<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$address = $_POST['address'];
			$query = array(
				'name' => $name,
				'designation' => $designation,
				'con_no' => $contact,
				'email' => $email,
				'address' => $address,
				'added_by' => $user,
			);
			$res = $obj->update('staff','id',$id,$query);

			if ($res) {
				echo "staff update successfull";
			}else{
				echo "Failed to update staff";
			}
	}
 ?>