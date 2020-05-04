<?php 
	require_once '../init.php';

	if (isset($_POST)) {
		$u_name = $_POST['u_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);

		if (!empty($u_name) && !empty($username) && !empty($password)) {
				$query = array('f_name' => $u_name , 'username' => $username , 'password' => $password);

               		  $res = $obj->create('user' , $query);

               		 if ($res) {
               		 	echo "true";
               		 }else{
               		 	echo "Data inset failed";
               		 }
		}else{
			echo "all_field must be field ou";
		}
	}

 ?>