<?php 
	require_once '../init.php';
	if (isset($_POST)) {
		 $user_id = $_POST['user_id'];
		 $password = $_POST['password'];
		 $c_password = $_POST['c_password'];

		if (!empty($password)) {
			 if ($password == $c_password) {
		 		$password = md5($password);

		 		$query = array(
		 			'password' => $password
		 		);
		 		$res = $obj->update('user','id',$user_id,$query);
		 		if ($res) {
		 			echo "yes";
		 		}else{
		 			echo "Failed to update password";
		 		}
		 }else{
		 	echo "Password not match";
		 }
		}else{
			echo "Must need to type a password";
		}



	}
 ?>