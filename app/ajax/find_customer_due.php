<?php 
	require_once '../init.php';
	if (isset($_POST['getcusTotalDue'])) {
		$id = $_POST['id'];
		$res = $obj->find('member', 'id',$id);

		echo json_encode($res);
	}

 ?>