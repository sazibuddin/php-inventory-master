<?php 
	require_once '../init.php';

	if (isset($_POST['admin_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		print_r($_POST);

	$result = $Ouser->login($username , $password);

		if ($result) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
 ?>