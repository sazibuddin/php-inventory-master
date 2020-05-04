<?php 
	require_once '../init.php';
	if (isset($_POST['getsuppliarTotalDue'])) {
		$id = $_POST['id'];
		$res = $obj->find('suppliar', 'id',$id);

		echo json_encode($res);
	}

 ?>